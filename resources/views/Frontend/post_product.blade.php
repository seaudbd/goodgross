@extends('Layouts.frontend')
@section('content')

    <style type="text/css">
        .dropzone {
            border: 2px dotted #cccccc;
            border-radius: 5px;
        }
    </style>



    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                <div class="text-center mt-5 mb-3">
                    <img src="{{ asset('storage/img/application/post_product.png') }}" height="50">
                </div>
                <div class="text-center border-bottom pb-3" style="border-color: #e8f3ed !important;">
                    <div class="h4">Post a Product and Become a Seller with GoodGross</div>
                </div>

                <form id="post_product_form">

                    @if ( ! auth()->check())

                        <div class="row mt-4">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 mx-auto">

                                <div class="mb-4 text-center primary_text_color_default">
                                    Account Information
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="form-check" style="width: 100%; border: 1px solid #ced4da; padding: 10px 0 10px 35px; border-radius: 5px;">
                                            <input type="radio" class="form-check-input account_type" id="personal_account" name="account_type" value="Personal">
                                            <label class="form-check-label fw-bold" for="personal_account">Personal</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check" style="width: 100%; border: 1px solid #ced4da; padding: 10px 0 10px 35px; border-radius: 5px;">
                                            <input type="radio" class="form-check-input account_type" id="business_account" name="account_type" value="Business">
                                            <label class="form-check-label fw-bold" for="business_account">Business</label>
                                        </div>
                                    </div>
                                </div>


                                <div id="personal_account_content">
                                    <div class="row mb-4">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="first_name" id="first_name_for_personal_account" placeholder="First Name">
                                                <label for="first_name_for_personal_account">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="last_name" id="last_name_for_personal_account" placeholder="Last Name">
                                                <label for="last_name_for_personal_account">Last Name</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="phone" id="phone_for_personal_account" placeholder="Personal Phone">
                                                <label for="phone_for_personal_account">Personal Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="email" id="email_for_personal_account" placeholder="Personal Email">
                                                <label for="email_for_personal_account">Personal Email</label>
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <div id="business_account_content">
                                    <div class="row mb-4">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="name" id="name_for_business_account" placeholder="Business Name">
                                                <label for="name_for_business_account">Business Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-floating">
                                                <select class="form-select" name="type" id="type_for_business_account">
                                                    <option value="">Select Business Type</option>
                                                    <option value="Retail">Retail</option>
                                                    <option value="Wholesale">Wholesale</option>
                                                </select>
                                                <label for="type_for_business_account">Business Type</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" id="phone_for_business_account" placeholder="Business Phone">
                                                <label for="phone_for_business_account">Business Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="email_for_business_account" placeholder="Business Email">
                                                <label for="email_for_business_account">Business Email</label>
                                            </div>
                                        </div>
                                    </div>



                                </div>



                            </div>
                        </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 mx-auto">

                            <div class="row mb-4">
                                <div class="col text-center">
                                    <div class="primary_text_color_default">Category Information</div>
                                    <div style="font-size: 12px; color: #b1b0b9;">Please choose a Category Type where the Product will be listed.</div>

                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" name="category_type_id" id="category_type_id">
                                            <option value="">Select a Category Type</option>
                                            <option value="1" data-type="Retail">Retail</option>
                                            @if(auth()->check() && auth()->user()->account->type === 'Business')
                                                <option value="2" data-type="Wholesale">Wholesale</option>
                                            @endif
                                        </select>
                                        <label for="category_type_id">Category Type</label>
                                    </div>

                                </div>
                            </div>
                            <div id="category_container">

                            </div>

                        </div>
                    </div>


                    <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="property_container">

                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="description_container">

                        </div>
                    </div>



                    <div class="row mb-5">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="post_product_submit_container">

                        </div>
                    </div>



                </form>





            </div>
        </div>
    </div>

    <div style="height: 25px;"></div>

    <div class="modal" tabindex="-1" id="message_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn primary_btn_default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="post_product_success_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Congratulations!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pb-5">
                    Hello <span id="name_container"></span>
                    <div class="row mt-3">
                        <div class="col text-justify">
                            Your product has been posted successfully. Please check your email for further instructions.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn primary_btn_default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script language="JavaScript">

        function loadPageDefault() {
            $('#personal_account').attr('checked', true);
            $('#business_account').attr('checked', false);
            $('#personal_account_content').removeClass('d-none');
            $('#business_account_content').addClass('d-none');

            $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
            $('#post_product_form').find('.invalid-feedback').remove();
            $('#post_product_form').find('.error_message').remove();

            $('#category_type_id').val('');
            $('#category_container').empty();
            $('#property_container').empty();
            $('#description_container').empty();
            $('#post_product_submit_container').empty();
        }

        $(document).ready(function () {
            loadPageDefault();
        });


        $(document).on('click', '#personal_account', function () {
            $('#personal_account').attr('checked', true);
            $('#business_account').attr('checked', false);
            $('#personal_account_content').removeClass('d-none');
            $('#business_account_content').addClass('d-none');
            $('#category_type_id').empty().append('<option value="">Select a Category Type</option><option value="1" data-type="Retail">Retail</option>');

            $('#phone_for_business_account').removeAttr('name');
            $('#email_for_business_account').removeAttr('name');

            $('#phone_for_personal_account').attr('name', 'phone');
            $('#email_for_personal_account').attr('name', 'email');

            $('#category_container').empty();
            $('#property_container').empty();
            $('#post_product_submit_container').empty();
            $('#description_container').empty();
        });

        $(document).on('click', '#business_account', function () {
            $('#personal_account').attr('checked', false);
            $('#business_account').attr('checked', true);
            $('#personal_account_content').addClass('d-none');
            $('#business_account_content').removeClass('d-none');
            $('#category_type_id').empty().append('<option value="">Select a Category Type</option><option value="1" data-type="Retail">Retail</option><option value="2" data-type="Wholesale">Wholesale</option>');

            $('#phone_for_personal_account').removeAttr('name');
            $('#email_for_personal_account').removeAttr('name');

            $('#phone_for_business_account').attr('name', 'phone');
            $('#email_for_business_account').attr('name', 'email');

            $('#category_container').empty();
            $('#property_container').empty();
            $('#post_product_submit_container').empty();
            $('#description_container').empty();
        });

        $(document).on('submit', '#post_product_form', function (event) {
            event.preventDefault();

            $('#post_product_form_submit').addClass('disabled');
            $('#post_product_form_submit_text').addClass('d-none');
            $('#post_product_form_submit_processing').removeClass('d-none');

            $('#post_product_form').find('.is-invalid').removeClass('is-invalid');
            $('#post_product_form').find('.invalid-feedback').remove();
            $('#post_product_form').find('.text-danger').remove();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            // $('[multiple=multiple]').each(function () {
            //     formData.append('property[' + $(this).attr('id').split('_')[2] + ']', $(this).val());
            // });

            $.ajax({
                method: 'post',
                url: '{{ url('post/product') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                global: false,
                success: function (result) {
                    console.log(result);
                    loadPageDefault();

                    $('#post_product_form_submit').removeClass('disabled');
                    $('#post_product_form_submit_text').removeClass('d-none');
                    $('#post_product_form_submit_processing').addClass('d-none');

                    $('#name_container').empty().text(result.name + ',');
                    $('#post_product_success_modal').modal('show');
                },
                error: function (xhr) {
                    console.log(xhr);

                    $('#post_product_form_submit').removeClass('disabled');
                    $('#post_product_form_submit_text').removeClass('d-none');
                    $('#post_product_form_submit_processing').addClass('d-none');

                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {

                                if (key !== 'email' && key !== 'phone' && key !== 'name' && key !== 'type' && key !== 'first_name' && key !== 'last_name' && key !== 'category_type_id' && key !== 'image' && key.includes('size') === false && key.includes('color') === false && key.includes('min_order') === false && key.includes('max_order') === false && key.includes('supply_ability') === false && key.includes('moq') === false) {
                                    let property = key.toLowerCase().replace('(', '').replace(')', '').replace('%', '').replace('?', '');

                                    $('#property_' + property).after('<div class="invalid-feedback"></div>');
                                    $('#property_' + property).addClass('is-invalid');
                                    $.each(value, function (errorKey, errorText) {
                                        $('#property_' + property).parent().find('.invalid-feedback').append('<div>' + errorText + '</div>');
                                    });

                                } else {

                                    if (key === 'image') {
                                        $('#property_' + key).after('<div class="invalid-feedback d-block"></div>');
                                        $('#property_' + key).parent().find('label').addClass('text-danger');
                                        $.each(value, function (k, v) {
                                            $('#property_' + key.toLowerCase()).parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                        });
                                    } else {
                                        if (key.includes('size') === true || key.includes('color') === true) {
                                            if ($('#property_' + key.split('.').join('_')).parent().parent().find('.invalid-feedback').length === 0) {
                                                $('#property_' + key.split('.').join('_')).parent().parent().append('<div class="invalid-feedback"></div>');
                                            }
                                            $('#property_' + key.split('.').join('_')).parent().parent().find('label').addClass('text-danger');
                                            $('#property_' + key.split('.').join('_')).addClass('is-invalid');
                                            $.each(value, function (errorKey, errorText) {
                                                $('#property_' + key.split('.').join('_')).parent().parent().find('.invalid-feedback').append('<div>' + errorText.split('.').join(' ') + '</div>');
                                            });
                                        } else {

                                            if (key.includes('min_order') || key.includes('max_order') || key.includes('supply_ability') || key.includes('moq')) {
                                                if ($('#property_' + key.split('.').join('_')).parent().parent().parent().find('.invalid-feedback').length === 0) {
                                                    $('#property_' + key.split('.').join('_')).parent().parent().parent().append('<div class="invalid-feedback d-block"></div>');
                                                }
                                                $('#property_' + key.split('.').join('_')).addClass('is-invalid');
                                                $.each(value, function (errorKey, errorText) {
                                                    $('#property_' + key.split('.').join('_')).parent().parent().parent().find('.invalid-feedback').append('<div>' + errorText.split('.').join(' ') + '</div>');
                                                });
                                            } else {
                                                if ($('.account_type:checked').val() === 'Personal') {
                                                    $('#' + key + '_for_personal_account').after('<div class="invalid-feedback"></div>');
                                                    $('#' + key + '_for_personal_account').addClass('is-invalid');
                                                    $.each(value, function (k, v) {
                                                        $('#' + key + '_for_personal_account').parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                                    });
                                                } else {
                                                    $('#' + key + '_for_business_account').after('<div class="invalid-feedback"></div>');
                                                    $('#' + key + '_for_business_account').addClass('is-invalid');
                                                    $.each(value, function (k, v) {
                                                        $('#' + key + '_for_business_account').parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                                    });
                                                }
                                            }
                                        }
                                    }
                                }

                            });
                        }
                    }
                }
            });

        });

        function loadCategory(categoryId) {

            $.ajax({
                method: 'get',
                url: '{{ url('post/product/get/child/categories/by/category/id') }}/',
                data: {
                    category_id: categoryId
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    if (result.message !== 'Nothing Found!') {
                        if (result.message === 'Categories Found') {
                            let categoryNumber = $('#category_container').children('div').length;
                            $('#category_container').append('<div class="row mb-4"><div class="col"><div class="form-floating"><select class="form-select" name="category_id[]" id="category_id_' + (categoryNumber + 1) + '"></select><label for="category_id_' + (categoryNumber + 1) + '">Option</label></div></div></div>');
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
                                    $(this).parent().parent().parent().nextAll().remove();
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

                                section.narrative !== '---' ? $('#property_container').append(
                                    '<div class="row mb-4">' +
                                        '<div class="col border-bottom pb-3" style="border-color: #e8f3ed !important;">' +
                                            '<div class="primary_text_color_default">' + section.section + '</div>' +
                                            '<div style="font-size: 12px; color: #b1b0b9;">' + section.narrative + '</div>' +
                                        '</div>' +
                                    '</div>'
                                ) : $('#property_container').append(
                                    '<div class="row mb-4">' +
                                        '<div class="col border-bottom pb-3 primary_text_color_default" style="border-color: #e8f3ed !important;">' + section.section + '</div>' +
                                    '</div>'
                                );

                                $('#property_container').append('<div class="row mb-5" id="section_' + sectionKey + '_properties"></div>');



                                $.each(section.properties, function (propertyKey, property) {

                                    const options = JSON.parse(property.options);
                                    const idValue = property.property.split(' ').join('_').toLowerCase().replace('(', '').replace(')', '').replace('%', '').replace('?', '').replace('.', '');
                                    const nameValue = property.property.split(' ').join('_').toLowerCase();
                                    switch (property.type) {
                                        case 'Input':
                                            $('#section_' + sectionKey + '_properties').append(
                                                '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +
                                                '<div class="form-floating">' +
                                                '<input type="text" class="form-control" name="' + nameValue + '" id="property_' + idValue + '" placeholder="' + property.property + '">' +
                                                '<label for="property_' + idValue + '">' + property.property + '</label>' +
                                                '</div>' +
                                                '</div>');
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().parent().append('<div style="font-size: 12px; color: #b1b0b9;">' + property.narrative + '</div>') : $('#property_' + idValue).parent().parent().append('<div style="height: 18px;"></div>');
                                            break;

                                        case 'Input Group':


                                            let inputGroupElement = '';

                                            $.each(options, function (optionKey, optionValue) {
                                                if (typeof optionValue === 'object') {
                                                    let optionObject = Object.keys(optionValue).map((key) => [(key), optionValue[key]]);

                                                    console.log(optionObject);
                                                    let inputGroupId = optionObject[0][0].split(':')[0].split(' ').join('_').toLowerCase();
                                                    let inputGroupElementOptions = '';
                                                    $.each(optionObject[0][1], function (inputGroupElementOptionKey, inputGroupElementOptionValue) {
                                                        console.log(inputGroupElementOptionValue)
                                                        inputGroupElementOptions += '<option value="' + inputGroupElementOptionValue + '">' + inputGroupElementOptionValue + '</option>';
                                                    });

                                                    if (property.property === 'MOQ') {
                                                        inputGroupElement += '<div class="form-floating" style="width: 40%;"><select class="form-select" name="' + nameValue + '[' + inputGroupId + ']" id="property_' + idValue + '_' + inputGroupId + '">' + inputGroupElementOptions + '</select><label for="property_' + idValue + '_' + inputGroupId + '">' + optionObject[0][0].split(':')[0] + '</label></div>';
                                                    } else if (property.property === 'Supply Ability') {
                                                        inputGroupElement += '<div class="form-floating" style="width: 25%;"><select class="form-select" name="' + nameValue + '[' + inputGroupId + ']" id="property_' + idValue + '_' + inputGroupId + '">' + inputGroupElementOptions + '</select><label for="property_' + idValue + '_' + inputGroupId + '">' + optionObject[0][0].split(':')[0] + '</label></div>';
                                                    } else {
                                                        if (optionObject[0][0].split(':')[0] === 'Currency') {
                                                            inputGroupElement += '<div class="form-floating" style="width: 14%;"><select class="form-select" name="' + nameValue + '[' + inputGroupId + ']" id="property_' + idValue + '_' + inputGroupId + '">' + inputGroupElementOptions + '</select><label for="property_' + idValue + '_' + inputGroupId + '">' + optionObject[0][0].split(':')[0] + '</label></div>';
                                                        } else {
                                                            inputGroupElement += '<div class="form-floating" style="width: 13%;"><select class="form-select" name="' + nameValue + '[' + inputGroupId + ']" id="property_' + idValue + '_' + inputGroupId + '">' + inputGroupElementOptions + '</select><label for="property_' + idValue + '_' + inputGroupId + '">' + optionObject[0][0].split(':')[0] + '</label></div>';
                                                        }
                                                    }



                                                } else {
                                                    let inputGroupId = optionValue.split(':')[0].split(' ').join('_').toLowerCase();
                                                    if (property.property === 'MOQ') {
                                                        inputGroupElement += '<div class="form-floating" style="width: 40%;"><input type="text" class="form-control" name="' + nameValue + '[' + inputGroupId + ']" id="property_' + idValue + '_' + inputGroupId + '" placeholder="' + optionValue.split(':')[0] + '"><label for="property_' + idValue + '_' + inputGroupId + '">' + optionValue.split(':')[0] + '</label></div>';
                                                    } else if (property.property === 'Supply Ability') {
                                                        inputGroupElement += '<div class="form-floating" style="width: 25%;"><input type="text" class="form-control" name="' + nameValue + '[' + inputGroupId + ']" id="property_' + idValue + '_' + inputGroupId + '" placeholder="' + optionValue.split(':')[0] + '"><label for="property_' + idValue + '_' + inputGroupId + '">' + optionValue.split(':')[0] + '</label></div>';
                                                    } else {
                                                        inputGroupElement += '<div class="form-floating" style="width: 15%;"><input type="text" class="form-control" name="' + nameValue + '[' + inputGroupId + ']" id="property_' + idValue + '_' + inputGroupId + '" placeholder="' + optionValue.split(':')[0] + '"><label for="property_' + idValue + '_' + inputGroupId + '">' + optionValue.split(':')[0] + '</label></div>';
                                                    }


                                                }

                                            });
                                            let inputGroupElementHolder;
                                            if (property.property === 'MOQ') {
                                                inputGroupElementHolder = '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +
                                                    '<div class="input-group">' +
                                                    '<span class="input-group-text" style="width: 20%;">' + property.property + '</span>' + inputGroupElement +
                                                    '</div>' +
                                                    '</div>';
                                            } else if (property.property === 'Supply Ability') {
                                                inputGroupElementHolder = '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">' +
                                                    '<div class="input-group">' +
                                                    '<span class="input-group-text" style="width: 25%;">' + property.property + '</span>' + inputGroupElement +
                                                    '</div>' +
                                                    '</div>';
                                            } else {
                                                inputGroupElementHolder = '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">' +
                                                    '<div class="input-group">' +
                                                    '<span class="input-group-text" style="width: 15%;">' + property.property + '</span>' + inputGroupElement +
                                                    '</div>' +
                                                    '</div>';
                                            }
                                            $('#section_' + sectionKey + '_properties').append(
                                                inputGroupElementHolder
                                            );
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().parent().append('<div style="font-size: 12px; color: #b1b0b9;">' + property.narrative + '</div>') : $('#property_' + idValue).parent().parent().append('<div style="height: 18px;"></div>');
                                            break;

                                        case 'User Defined Input':
                                            $('#section_' + sectionKey + '_properties').append(
                                                '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +
                                                    '<div class="input-group">' +
                                                        '<div class="form-floating w-50"><input type="text" class="form-control" name="' + nameValue + '[]" id="property_' + idValue + '_0" placeholder="' + property.property + '"><label for="property_' + idValue + '_0">' + property.property + '</label></div>' +
                                                        '<div class="form-floating w-50"><input type="text" class="form-control" name="' + nameValue + '_quantity[]" id="property_' + idValue + '_quantity_0" placeholder="Quantity"><label for="property_' + idValue + '_quantity_0">Quantity</label></div>' +
                                                    '</div>' +
                                                    '<div class="mt-3" id="add_more_' + idValue + '_container"></div>' +
                                                    '<div><span id="add_more_' + idValue + '" style="cursor: pointer;"><i class="fas fa-plus fa-2x primary_text_color_default"></i> Add More ' + idValue + '</span></div>' +
                                                '</div>'
                                            );
                                            $(document).on('click', '#add_more_' + idValue, function () {
                                                $('#add_more_' + idValue + '_container').append(
                                                    '<div class="form-group">' +
                                                        '<div class="input-group mb-3">' +
                                                            '<input type="text" class="form-control" name="' + nameValue + '[]" id="property_' + idValue + '_' + (parseInt($('#add_more_' + idValue + '_container').children('div').length) + 1) + '" placeholder="' + property.property + '">' +
                                                            '<input type="text" class="form-control" name="' + nameValue + '_quantity[]" id="property_' + idValue + '_quantity_' + (parseInt($('#add_more_' + idValue + '_container').children('div').length) + 1) + '" placeholder="Quantity">' +
                                                            '<span class="remove_' + idValue + '" style="margin-left: 5px; margin-top: 3px; cursor: pointer;"><i class="fas fa-minus-circle fa-2x" style="color: #d21212;"></i></span>' +
                                                        '</div>' +
                                                    '</div>'
                                                );
                                                return false;
                                            });

                                            $(document).on('click', '.remove_' + idValue, function () {
                                                if ($(this).parent().parent().find('.error_message').length === 1) {
                                                    $(this).parent().parent().find('.error_message').remove();
                                                }
                                                $(this).parent().parent().remove();
                                                $.each($('#add_more_' + idValue + '_container').children('div'), function (divKey, divValue) {
                                                    console.log(divValue.children)
                                                    $.each(divValue.children, function (childElemKey, childElemValue) {
                                                        console.log(childElemValue.children)
                                                        $.each(childElemValue.children, function (lastChildKey, lastChildValue) {
                                                            if (lastChildValue.nodeName === 'INPUT') {
                                                                let idAttributeValueArray = lastChildValue.id.split('_');
                                                                idAttributeValueArray[idAttributeValueArray.length - 1] = divKey + 1;
                                                                lastChildValue.id = idAttributeValueArray.join('_');
                                                            }
                                                        });
                                                    });
                                                });
                                                return false;
                                            });
                                            property.narrative !== '---' ?  $('#property_' + idValue + '_0').parent().parent().find('label').append('<div class="smaller">' + property.narrative + '</div>') : $('#property_' + idValue + '_0').parent().parent().find('label').append('<div style="height: 10px;"></div>');
                                            break;

                                        case 'Textarea':
                                            $('#section_' + sectionKey + '_properties').append(
                                                '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +

                                                '<div class="form-floating">' +
                                                '<textarea class="form-control" name="' + nameValue + '" id="property_' + idValue + '" placeholder="' + property.property + '"></textarea>' +
                                                '<label for="property_' + idValue + '">' + property.property + '</label>' +
                                                '</div>' +
                                                '</div>'
                                            );
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().parent().append('<div style="font-size: 12px; color: #b1b0b9;">' + property.narrative + '</div>') : $('#property_' + idValue).parent().parent().append('<div style="height: 18px;"></div>');
                                            break;

                                        case 'Image':
                                            $('#section_' + sectionKey + '_properties').append(
                                                '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +
                                                '<label for="property_' + idValue + '">' + property.property + '</label>' +
                                                '<div class="dropzone dz-clickable mt-1" id="property_' + idValue + '">' +
                                                '<div class="dz-message">Drop files here or click to upload.<br><span class="dz-message-note" style="font-size: 12px; color: #b1b0b9;">(' + property.narrative + ')</span></div>' +
                                                '</div>' +
                                                '</div>');

                                            Dropzone.autoDiscover = false;

                                            let dropzone = new Dropzone('#property_' + idValue, {
                                                method: "post",
                                                headers: {
                                                    'x-csrf-token': '{{ csrf_token() }}',
                                                },
                                                url: "{{ url('post/product/upload/file') }}",

                                                autoQueue: true,
                                                autoProcessQueue: true,
                                                addRemoveLinks: true,
                                                dictRemoveFile: 'Remove',
                                                dictCancelUpload: 'Cancel Upload',
                                                uploadMultiple: false,

                                                success: function (file, response) {
                                                    console.log(file);
                                                    console.log(response);
                                                    if (response.success === false) {
                                                        this.removeFile(file);
                                                        $.jGrowl('The file ' + file.name + ' has been removed because of it does not meet our ' + response.reason + ' requirement.');
                                                    }
                                                }
                                            });

                                            dropzone.on('removedfile', function (file) {

                                                let formData = new FormData();
                                                formData.append('name', file.name);
                                                formData.append('_token', '{{ csrf_token() }}');
                                                $.ajax({
                                                    method: 'post',
                                                    url: '{{ url('post/product/remove/uploaded/file') }}',
                                                    data: formData,
                                                    processData: false,
                                                    contentType: false,

                                                    success: function (result) {
                                                        console.log(result);
                                                    },
                                                    error: function (xhr) {
                                                        console.log(xhr);
                                                    }

                                                });
                                            });



                                            break;

                                        case 'Select Single':
                                            $('#section_' + sectionKey + '_properties').append(
                                                '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +

                                                '<div class="form-floating">' +
                                                '<select class="form-select" name="' + nameValue + '" id="property_' + idValue + '"></select>' +
                                                '<label for="property_' + idValue + '">' + property.property + '</label>' +
                                                '</div>' +

                                                '</div>');
                                            property.narrative !== '---' ?  $('#property_' + idValue).parent().parent().append('<div style="font-size: 12px; color: #b1b0b9;">' + property.narrative + '</div>') : $('#property_' + idValue).parent().parent().append('<div style="height: 18px;"></div>');

                                            $.each(options, function (k, option) {
                                                $('#property_' + idValue).append('<option value="' + option + '">' + option + '</option>');
                                            });
                                            break;

                                        // case 'Select Multiple':
                                        //     $('#property_' + sectionKey + '_' + i).append(
                                        //         '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">' +
                                        //
                                        //             '<div class="row mb-2">' +
                                        //                 '<div class="col">' +
                                        //                     '<span>' + property.property + '</span>' +
                                        //                 '</div>' +
                                        //             '</div>' +
                                        //             '<div class="row">' +
                                        //                 '<div class="col">' +
                                        //                     '<select name="' + nameValue + '" id="property_' + idValue + '" multiple="multiple"></select>' +
                                        //                 '</div>' +
                                        //             '</div>' +
                                        //
                                        //         '</div>');
                                        //
                                        //     $.each(options, function (k, option) {
                                        //         $('#property_' + idValue).append('<option value="' + option + '">' + option + '</option>');
                                        //     });
                                        //     $('#property_' + idValue).multiselect({
                                        //         buttonClass: 'btn btn-outline-dark',
                                        //         buttonContainer : '<div class="dropdown" />',
                                        //         templates: {
                                        //             li: '<li class="dropdown-item"><a><label class="m-0 pl-2 pr-0"></label></a></li>',
                                        //             ul: '<ul class="multiselect-container dropdown-menu p-1 m-0" style="width: 100%;"></ul>'
                                        //         }
                                        //     });
                                        //     break;

                                        case 'Radio':
                                            $('#section_' + sectionKey + '_properties').append(
                                                '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +
                                                    '<div><label>' + property.property + '</label></div>' +
                                                    '<div id="property_' + idValue + '"></div>' +
                                                '</div>'
                                            );

                                            $.each(options, function (k, option) {
                                                if (option.indexOf(':default') > -1) {
                                                    $('#property_' + idValue).append('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="' + nameValue + '" id="' + nameValue + '_' + option.split(':')[0] + '" value="' + option + '" checked><label class="form-check-label" for="' + nameValue + '_' + option.split(':')[0] + '">' + option.split(':')[0] + '</label></div>');
                                                } else {
                                                    $('#property_' + idValue).append('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="' + nameValue + '" id="' + nameValue + '_' + option.split(':')[0] + '" value="' + option + '"><label class="form-check-label" for="' + nameValue + '_' + option.split(':')[0] + '">' + option.split(':')[0] + '</label></div>');
                                                }
                                            });
                                            break;

                                        case 'Checkbox':
                                            $('#section_' + sectionKey + '_properties').append(
                                                '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">' +

                                                '<div class="form-group">' +
                                                '<label for="property_' + idValue + '">' + property.property + '</label>' +
                                                '<div id="property_' + idValue + '"></div>' +
                                                '</div>' +

                                                '</div>');

                                            $.each(options, function (k, option) {
                                                $('#property_' + idValue).append('<input type="checkbox" name="' + nameValue + '" value="' + option + '"> ' + option + '&nbsp;&nbsp;&nbsp;&nbsp;');
                                            });
                                            break;

                                    }

                                });




                            });


                            // $('#description_container').append('<div class="row mt-2"><div class="col font-weight-bold primary_text_color_default  border-bottom pb-2 mb-3">Detailed Description</div></div>')
                            // $('#description_container').append('<textarea id="description"></textarea>');
                            // tinymce.init({
                            //     selector:'#description',
                            //     plugins: [
                            //         'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                            //         'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                            //         'table emoticons template paste help'
                            //     ],
                            //     toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                            //         'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                            //         'forecolor backcolor emoticons | help',
                            //     menu: {
                            //         favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
                            //     },
                            //     menubar: 'favs file edit view insert format tools table help',
                            //
                            //     branding: false,
                            //     height: 400,
                            //
                            // });
                            $('#post_product_submit_container').append('<div class="row mb-5">\n' +
                                '                                <div class="col d-grid gap-2">\n' +
                                '                                    <button type="submit" class="btn primary_btn_default pr-3 pl-3" id="post_product_form_submit">\n' +
                                '                                        <span id="post_product_form_submit_text">Post</span>\n' +
                                '                                        <span id="post_product_form_submit_processing" class="d-none">\n' +
                                '                                            <span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>\n' +
                                '                                            Processing...\n' +
                                '                                        </span>\n' +
                                '                                    </button>\n' +
                                '                                </div>\n' +
                                '                            </div>');

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
                    url: '{{ url('post/product/get/categories/by/category/type/id') }}/',
                    data: {
                        category_type_id: $(this).val()
                    },
                    cache: false,
                    success: function (result) {
                        console.log(result);

                        $('#category_container').empty();
                        $('#property_container').empty();
                        $('#description_container').empty();
                        $('#post_product_submit_container').empty();



                        if (result.length > 0) {
                            let categoryNumber = $('#category_container').children('div').length;
                            $('#category_container').append('<div class="row mb-4"><div class="col"><div class="form-floating"><select class="form-select" name="category_id[]" id="category_id_' + (categoryNumber + 1) + '"></select><label for="category_id_' + (categoryNumber + 1) + '">Option</label></div></div></div>');
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
                                    $(this).parent().parent().parent().nextAll().remove();

                                    $('#property_container').empty();
                                    $('#description_container').empty();
                                    $('#post_product_submit_container').empty();

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
                $('#description_container').empty();
                $('#post_product_submit_container').empty();
            }
            return false;
        });


    </script>
@endsection
