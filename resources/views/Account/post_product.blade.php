@extends('Layouts.account')
@section('content')
    <style type="text/css">

        #post_product_page_container {
            margin-top: 20px;
        }

        @media only screen and (max-device-width: 768px) {
            #post_product_page_container {
                margin-top: 20px;
            }
        }
    </style>
    <form id="post_product_form">
    <div class="container-fluid" id="post_product_page_container">





        <div class="row">
            <div class="col text-center primary_text_color_default  font-weight-bold">
                Category Information
            </div>
        </div>
        <div class="row">
            <div class="col border-bottom text-center small pb-2">
                Please Choose a Category Type where the Product will be Listed.
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col">
                <select class="form-control" name="category_type_id" id="category_type_id">
                    <option value="">Select a Category Type</option>
                    @if($accountDetails->type === 'Wholesale')
                        @foreach($categoryTypes as $categoryType)
                            <option value="{{ $categoryType->id }}" data-type="{{ $categoryType->category_type }}">{{ $categoryType->category_type }}</option>
                        @endforeach
                    @else
                        @foreach($categoryTypes as $categoryType)
                            @if($accountDetails->type === $categoryType->category_type)
                                <option value="{{ $categoryType->id }}" data-type="{{ $categoryType->category_type }}">{{ $categoryType->category_type }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div id="category_container">

        </div>









        <div class="row mt-3">
            <div class="col" id="property_container">

            </div>
        </div>

        <div class="row mt-3">
            <div class="col" id="description_container">

            </div>
        </div>



        <div class="row mt-3">
            <div class="col text-right" id="post_product_submit_container">

            </div>
        </div>


    </div>
    </form>

    <div style="height: 250px;"></div>

    <div class="modal fade" id="post_product_success_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Congrats!</h5>
                    <button type="button" class="close post_product_success_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding-left: 30px; padding-right: 30px; padding-bottom: 50px;">
                    Congratulations! <span id="name_container"></span>
                    <div class="row mt-3">
                        <div class="col text-justify">
                            Your Product has been Posted Successfully. Thanks for Continuing Selling with GoodGross.
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center" id="registration_link_container">

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-right">
                            <button type="button" class="btn primary_btn_default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="JavaScript">

        function loadPageDefault() {
            $('#category_type_id').val('');
            $('#post_product_form').find('.text-danger').removeClass('text-danger');
            $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
            $('#post_product_form').find('.error_message').remove();
            $('#category_container').empty();
            $('#property_container').empty();
            $('#post_product_submit_container').empty();
            $('#description_container').empty();
        }

        $(document).ready(function () {
            loadPageDefault();

        });

        $(document).on('submit', '#post_product_form', function () {
            $('#post_product_form').find('.text-danger').removeClass('text-danger');
            $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
            $('#post_product_form').find('.error_message').remove();
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');

            $('[multiple=multiple]').each(function () {
                data.append('property[' + $(this).attr('id').split('_')[2] + ']', $(this).val());
            });

            $.ajax({
                method: 'post',
                url: '{{ url('account/post/product') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);

                    $('#name_container').append(result.business_name);
                    loadPageDefault();
                    $('#post_product_success_modal').modal('show');
                },
                error: function (xhr) {
                    console.log(xhr);

                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {

                                if (key !== 'email' && key !== 'business_name' && key !== 'contact_number' && key !== 'category_type_id' && key !== 'image') {
                                    let property = key.toLowerCase().replace('(', '').replace(')', '').replace('%', '').replace('?', '');

                                    $('#property_' + property).after('<span class="error_message"></span>');
                                    $('#property_' + property).parent().find('label').addClass('text-danger');
                                    $('#property_' + property).addClass('is-invalid');
                                    $.each(value, function (errorKey, errorText) {
                                        $('#property_' + property).parent().find('.error_message').addClass('text-danger').append('<p>' + errorText + '</p>');
                                    });


                                } else {

                                    if (key === 'image') {
                                        $('#property_' + key.toLowerCase()).after('<span class="error_message"></span>');
                                        $('#property_' + key.toLowerCase()).parent().find('label').addClass('border-danger');
                                        $('#property_' + key.toLowerCase()).parent().parent().children('label').eq(0).addClass('text-danger');
                                        $.each(value, function (k, v) {
                                            $('#property_' + key.toLowerCase()).parent().find('.error_message').addClass('text-danger').append('<p>' + v + '</p>');
                                        });
                                    } else {

                                        $('#' + key).after('<span class="error_message"></span>');
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.error_message').addClass('text-danger').append('<p>' + v + '</p>');
                                        });
                                    }
                                }

                            });
                        }
                    }
                }
            });
            return false;
        });

        function loadCategory(categoryId) {

            $.ajax({
                method: 'get',
                url: '{{ url('account/post/product/get/child/categories') }}/' + categoryId,
                cache: false,
                success: function (result) {
                    console.log(result);
                    if (result.message !== 'Nothing Found!') {
                        if (result.message === 'Categories Found') {
                            let categoryNumber = $('#category_container').children('div').length;
                            $('#category_container').append('<div class="row mb-3 mt-3"><div class="col"><select class="form-control" name="category_id[]" id="category_id_' + (categoryNumber + 1) + '"></select></div></div>');
                            if (result.categories.length > 1) {
                                $('#category_id_' + (categoryNumber + 1)).append('<option value="">Select an Option</option>');
                            }
                            $.each(result.categories, function (key, category) {
                                $('#category_id_' + (categoryNumber + 1)).append('<option value="' + category.id + '">' + category.category + '</option>');
                            });
                            if (result.categories.length === 1) {
                                loadCategory(result.categories[0].id);
                            } else {
                                $('#category_id_' + (categoryNumber + 1)).on('change', function () {
                                    $(this).parent().parent().nextAll().remove();

                                    $('#property_container').empty();
                                    $('#post_product_submit_container').empty();
                                    $('#description_container').empty();


                                    $('#post_product_form').find('.text-danger').removeClass('text-danger');
                                    $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
                                    $('#post_product_form').find('.error_message').remove();
                                    loadCategory($(this).val());
                                });
                            }
                        } else {

                            $.each(result.sections, function (sectionKey, section) {

                                section.narrative !== '---' ? $('#property_container').append('<div class="row mt-3"><div class="col font-weight-bold primary_text_color_default ">' + section.section + '</div></div>') : $('#property_container').append('<div class="row mt-3"><div class="col font-weight-bold primary_text_color_default  border-bottom pb-2">' + section.section + '</div></div>');
                                if (section.narrative !== '---') {
                                    $('#property_container').append('<div class="row"><div class="col border-bottom small pb-2">' + section.narrative + '</div></div>');
                                }
                                $('#property_container').append('<div id="section_' + sectionKey + '_properties"></div>');


                                let i = 0;
                                let options;
                                let idValue;
                                let nameValue;
                                $.each(section.properties, function (propertyKey, property) {
                                    if (propertyKey % 2 === 0) {
                                        i++;
                                        i === 1 ? $('#section_' + sectionKey + '_properties').append('<div class="row mt-2" id="property_' + sectionKey + '_' + i + '"></div>') : $('#section_' + sectionKey + '_properties').append('<div class="row mt-2" id="property_' + sectionKey + '_' + i + '"></div>');
                                    }


                                    idValue = property.property.split(' ').join('_').toLowerCase().replace('(', '').replace(')', '').replace('%', '').replace('?', '');
                                    nameValue = property.property.split(' ').join('_').toLowerCase();
                                    switch (property.type) {
                                        case 'Input':
                                            $('#property_' + sectionKey + '_' + i).append(
                                                '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +

                                                '<div class="form-group">' +
                                                '<label for="property_' + idValue + '">' +
                                                '<span>' + property.property + '</span>' +

                                                '</label>' +
                                                '<input type="text" class="form-control" name="' + nameValue + '" id="property_' + idValue + '" placeholder="' + property.property + '">' +
                                                '</div>' +

                                                '</div>');
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().find('label').append('<div class="smaller">' + property.narrative + '</div>') : $('#property_' + idValue).parent().find('label').append('<div style="height: 10px;"></div>');
                                            break;

                                        case 'Textarea':
                                            $('#property_' + sectionKey + '_' + i).append(
                                                '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +

                                                '<div class="form-group">' +
                                                '<label for="property_' + idValue + '">' +
                                                '<span>' + property.property + '</span>' +
                                                '</label>' +
                                                '<textarea class="form-control" name="' + nameValue + '" id="property_' + idValue + '"></textarea>' +
                                                '</div>' +

                                                '</div>');
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().find('label').append('<div class="smaller">' + property.narrative + '</div>') : $('#property_' + idValue).parent().find('label').append('<div style="height: 10px;"></div>');
                                            break;

                                        case 'Image':
                                            $('#property_' + sectionKey + '_' + i).append(
                                                '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +

                                                '<div class="form-group">' +
                                                '<label for="property_' + idValue + '">' +
                                                '<span>' + property.property + '</span>' +
                                                '</label>' +
                                                '<div class="custom-file">' +
                                                '<input type="file" class="form-control" name="' + nameValue + '" id="property_' + idValue + '">' +
                                                '<label class="custom-file-label" for="property_' + idValue + '">Choose file</label>' +
                                                '</div>' +
                                                '</div>' +

                                                '</div>');
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().parent().children('label').eq(0).append('<div class="smaller">' + property.narrative + '</div>') : $('#property_' + idValue).parent().parent().children('label').eq(0).append('<div style="height: 10px;"></div>');
                                            break;

                                        case 'Select Single':
                                            $('#property_' + sectionKey + '_' + i).append(
                                                '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +

                                                '<div class="form-group">' +
                                                '<label for="property_' + idValue + '">' +
                                                '<span>' + property.property + '</span>' +
                                                '</label>' +
                                                '<select class="form-control" name="' + nameValue + '" id="property_' + idValue + '"></select>' +
                                                '</div>' +

                                                '</div>');
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().find('label').append('<div class="smaller">' + property.narrative + '</div>') : $('#property_' + idValue).parent().find('label').append('<div style="height: 10px;"></div>');
                                            options = property.options.split(',');
                                            $.each(options, function (k, option) {
                                                $('#property_' + idValue).append('<option value="' + option + '">' + option + '</option>');
                                            });
                                            break;

                                        case 'Select Multiple':
                                            $('#property_' + sectionKey + '_' + i).append(
                                                '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +

                                                    '<div class="row mb-2">' +
                                                        '<div class="col">' +
                                                            '<span>' + property.property + '</span>' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<div class="row">' +
                                                        '<div class="col">' +
                                                            '<select name="' + nameValue + '" id="property_' + idValue + '" multiple="multiple"></select>' +
                                                        '</div>' +
                                                    '</div>' +

                                                '</div>');
                                            options = property.options.split(',');
                                            $.each(options, function (k, option) {
                                                $('#property_' + idValue).append('<option value="' + option + '">' + option + '</option>');
                                            });
                                            $('#property_' + idValue).multiselect({
                                                buttonClass: 'btn btn-outline-dark',
                                                buttonContainer : '<div class="dropdown" />',
                                                templates: {
                                                    li: '<li class="dropdown-item"><a><label class="m-0 pl-2 pr-0"></label></a></li>',
                                                    ul: '<ul class="multiselect-container dropdown-menu p-1 m-0" style="width: 100%;"></ul>'
                                                }
                                            });
                                            break;

                                        case 'Radio':
                                            $('#property_' + sectionKey + '_' + i).append(
                                                '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +

                                                '<div class="form-group">' +
                                                '<label for="property_' + idValue + '">' + property.property + '</label>' +
                                                '<div id="property_' + idValue + '"></div>' +
                                                '</div>' +

                                                '</div>');
                                            options = property.options.split(',');
                                            $.each(options, function (k, option) {
                                                if (option.indexOf(':default') > -1) {
                                                    $('#property_' + idValue).append('<input type="radio" name="' + nameValue + '" value="' + option + '" checked> ' + option.split(':')[0] + '&nbsp;&nbsp;&nbsp;&nbsp;');
                                                } else {
                                                    $('#property_' + idValue).append('<input type="radio" name="' + nameValue + '" value="' + option + '"> ' + option + '&nbsp;&nbsp;&nbsp;&nbsp;');
                                                }
                                            });
                                            break;

                                        case 'Checkbox':
                                            $('#property_' + sectionKey + '_' + i).append(
                                                '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +

                                                '<div class="form-group">' +
                                                '<label for="property_' + idValue + '">' + property.property + '</label>' +
                                                '<div id="property_' + idValue + '"></div>' +
                                                '</div>' +

                                                '</div>');
                                            options = property.options.split(',');
                                            $.each(options, function (k, option) {
                                                $('#property_' + idValue).append('<input type="checkbox" name="' + nameValue + '" value="' + option + '"> ' + option + '&nbsp;&nbsp;&nbsp;&nbsp;');
                                            });
                                            break;

                                    }

                                });




                            });


                            $('#description_container').append('<div class="row mt-2"><div class="col font-weight-bold primary_text_color_default  border-bottom pb-2 mb-3">Detailed Description</div></div>')
                            $('#description_container').append('<textarea id="description"></textarea>');
                            tinymce.init({
                                selector:'#description',
                                plugins: [
                                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                                    'table emoticons template paste help'
                                ],
                                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                                    'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                                    'forecolor backcolor emoticons | help',
                                menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
                                },
                                menubar: 'favs file edit view insert format tools table help',
                                content_css: 'css/content.css',
                                branding: false,
                                height: 400,
                                images_upload_url: '/upload',
                            });
                            $('#post_product_submit_container').append('<button type="submit" class="btn primary_btn_default">Post the Product</button>');

                        }
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }

        $(document).on('change', '#category_type_id', function () {
            if ($(this).val() !== '') {
                $.ajax({
                    method: 'get',
                    url: '{{ url('account/post/product/get/categories') }}/' + $(this).val(),
                    cache: false,
                    success: function (result) {
                        console.log(result);

                        $('#category_container').empty();
                        $('#property_container').empty();
                        $('#post_product_submit_container').empty();
                        $('#description_container').empty();

                        $('#post_product_form').find('.text-danger').removeClass('text-danger');
                        $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
                        $('#post_product_form').find('.error_message').remove();

                        if (result.length > 0) {
                            let categoryNumber = $('#category_container').children('div').length;
                            $('#category_container').append('<div class="row mb-3 mt-3"><div class="col"><select class="form-control" name="category_id[]" id="category_id_' + (categoryNumber + 1) + '"></select></div></div>');
                            if (result.length > 1) {
                                $('#category_id_' + (categoryNumber + 1)).append('<option value="">Select an Option</option>');
                            }
                            $.each(result, function (key, category) {
                                $('#category_id_' + (categoryNumber + 1)).append('<option value="' + category.id + '">' + category.category + '</option>');
                            });
                            if (result.length === 1) {
                                loadCategory(result[0].id);
                            } else {
                                $('#category_id_' + (categoryNumber + 1)).on('change', function () {
                                    $(this).parent().parent().nextAll().remove();

                                    $('#property_container').empty();
                                    $('#post_product_submit_container').empty();
                                    $('#description_container').empty();

                                    $('#post_product_form').find('.text-danger').removeClass('text-danger');
                                    $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
                                    $('#post_product_form').find('.error_message').remove();

                                    loadCategory($(this).val());
                                });
                            }
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            } else {

                $('#category_container').empty();
                $('#property_container').empty();
                $('#post_product_submit_container').empty();
                $('#description_container').empty();

                $('#post_product_form').find('.text-danger').removeClass('text-danger');
                $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
                $('#post_product_form').find('.error_message').remove();
            }
            return false;
        });


    </script>
@endsection