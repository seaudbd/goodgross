@extends('Layouts.control_panel')

@section('content')
    <div class="row">
        <div class="col">
            Configuration | {{ $activeMenu }}


            <div class="row mt-3">
                <div class="col" style="padding-top: 32px;">
                    <button type="button" class="btn btn-sm primary_btn_default" id="add">ADD</button>
                </div>
                <div class="col" id="search_section">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label for="category_type_id_for_search">Category Type</label>
                                    <select class="form-control" id="category_type_id_for_search">
                                        <option value="">All</option>
                                        @foreach($categoryTypes as $categoryType)
                                            <option value="{{ $categoryType->id }}">{{ $categoryType->category_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label for="search_key">Search Key</label>
                                    <input type="text" class="form-control" placeholder="Search..." id="search_key">
                                </div>

                            </div>
                            <div class="col-xl-4" style="padding-top: 32px;">
                                <button class="btn btn-sm primary_btn_default btn-block" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row sr-only mt-3" id="record_section">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-2 pt-2">
                            <input type="checkbox" id="bulk_records"> All Check
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                            <select name="bulk_status" id="bulk_status" class="form-control">
                                <option value="">Select an Action</option>
                                <option value="Active">Make Active</option>
                                <option value="Inactive">Make Inactive</option>
                            </select>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-1">
                            <button type="button" id="bulk_apply" class="btn btn-sm primary_btn_default">Apply</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Property</th>
                            <th>Category Type</th>
                            <th>Section</th>
                            <th>Property Type</th>
                            <th>Options</th>
                            <th>Status</th>
                            <th>Narrative</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="records"></tbody>
                    </table>
                </div>
            </div>

            <div class="row sr-only" id="no_record_section">
                <div class="col text-center mt-3">
                    No Record Found
                </div>
            </div>

            <div class="row sr-only" style="margin-top: 15px; margin-bottom: 50px;">
                <div class="sr-only" id="pagination_section">
                    <ul class="pagination" role="navigation" id="pagination_links">

                    </ul>
                </div>
                <div class="text-right" id="record_count_section">

                </div>
            </div>

            <div class="modal fade" id="add_modal">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Property</h5>
                            <button type="button" class="close add_modal_close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="padding-left: 80px; padding-right: 80px; padding-bottom: 50px;">
                            <div id="add_form_message" class="text-center text-danger">

                            </div>
                            <form id="add_form">
                                <input name="id" type="hidden" id="id">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="property">Property</label>
                                            <input name="property" type="text" class="form-control" id="property" placeholder="Property">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_type_id">Category Type</label>
                                            <select name="category_type_id" class="form-control" id="category_type_id">
                                                <option value="">Select a Category Type</option>
                                                @foreach($categoryTypes as $categoryType)
                                                    <option value="{{ $categoryType->id }}">{{ $categoryType->category_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="section_id">Section</label>
                                            <select name="section_id" class="form-control" id="section_id">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="narrative">Narrative</label>
                                            <textarea name="narrative" type="text" class="form-control" id="narrative" placeholder="Narrative"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="type">Property Type</label>
                                            <select name="type" type="text" class="form-control" id="type">
                                                <option value="Input">Input</option>
                                                <option value="Input Group">Input Group</option>
                                                <option value="User Defined Input">User Defined Input</option>
                                                <option value="Textarea">Textarea</option>
                                                <option value="Image">Image</option>
                                                <option value="Select Single">Select: Single</option>
                                                <option value="Select Multiple">Select: Multiple</option>
                                                <option value="Radio">Radio</option>
                                                <option value="Checkbox">Checkbox</option>
                                            </select>
                                        </div>

                                        <div id="options_container">

                                        </div>
                                        <div class="sr-only mt-3">
                                            <button type="button" class="btn btn-outline-info btn-sm border-0" id="add_more_option"><i class="fas fa-plus primary_text_color_default" data-toggle="tooltip" title="Add More Option"></i> Add Option</button>
                                        </div>

                                        <div id="input_groups_container">

                                        </div>

                                        <div class="sr-only mt-3">
                                            <button type="button" class="btn btn-outline-info btn-sm border-0" id="add_more_input_group"><i class="fas fa-plus primary_text_color_default" style="cursor: pointer;" data-toggle="tooltip" title="Add More Input Group"></i> Add Group</button>

                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-9">
                                        <label for="is_required"><input type="checkbox" id="is_required"> Required</label>
                                        <label for="is_for_search_engine"><input type="checkbox" id="is_for_search_engine"> Index for Search Engine</label>
                                        <label for="is_for_product_listing"><input type="checkbox" id="is_for_product_listing"> Show on Product List View</label>
                                        <label for="is_for_filter"><input type="checkbox" id="is_for_filter"> Filter</label>

                                    </div>
                                    <div class="col-3 text-right">
                                        <button type="button" class="btn btn-primary btn-sm add_modal_close" data-dismiss="modal">CLOSE</button>
                                        <button type="submit" class="btn primary_btn_default btn-sm ml-3" id="add_form_submit"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript">

        $(document).on('change', '#category_type_id', function () {
            $('#section_id').empty().append('<option value="">Choose a Section</option>');
            if ($(this).val() !== '') {
                $.ajax({
                    method: 'get',
                    url: '{{ url('control/panel/configuration/property/get/records/from/section/by/category/type/id') }}',
                    data: {
                        category_type_id: $(this).val()
                    },
                    success: function (result) {
                        console.log(result);
                        $.each(result, function (key, section) {
                            $('#section_id').append('<option value="' + section.id + '">' + section.section + '</option>')
                        });
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            }
        });

        $(document).on('change', '#type', function () {
            $('#options_container').empty();
            $('#input_groups_container').empty();
            if ($(this).val() !== 'Input' && $(this).val() !== 'User Defined Input' && $(this).val() !== 'Textarea' && $(this).val() !== 'Image') {
                if ($(this).val() === 'Input Group') {
                    $('#add_more_option').parent().addClass('sr-only');
                    $('#add_more_input_group').parent().removeClass('sr-only');
                    let inputGroupCount = parseInt($('#input_groups_container').children('div').length);
                    let inputGroupElement =
                        '<div class="p-3 border">' +
                            '<div class="input-group">' +
                                '<input name="group_names[]" type="text" class="form-control" id="group_names_' + inputGroupCount + '" placeholder="Name">' +
                                '<select class="form-control" name="group_types[]" id="group_types_' + inputGroupCount + '"><option value="">Type</option><option value="Input">Input</option><option value="Select">Select</option></select>' +
                                '<div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_input_group" style="cursor: pointer;" title="Remove Option"></i></span></div>' +
                            '</div>' +
                            '<div id="group_' + inputGroupCount + '_options"></div>' +
                            '<div class="sr-only mt-3 small"><i class="fas fa-plus primary_text_color_default" id="group_' + inputGroupCount + '_add_more_option" style="cursor: pointer;" data-toggle="tooltip" title="Add More Input Group"></i> Add Group Option</div>' +
                        '</div>';
                    $('#input_groups_container').empty().append(inputGroupElement);
                    $('#group_' + inputGroupCount + '_add_more_option').on('click', function () {
                        let inputGroupOptionCount = parseInt($('#group_' + inputGroupCount + '_options').children('div').length);
                        let inputGroupOptionElement = '<div class="input-group mt-3"><input name="input_group_' + inputGroupCount + '_options[]" type="text" class="form-control" id="input_group_' + inputGroupCount + '_options_' + inputGroupOptionCount + '" placeholder="Option"><div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_input_group_option" style="cursor: pointer;" title="Remove Option"></i></span></div></div>';
                        $('#group_' + inputGroupCount + '_options').append(inputGroupOptionElement);
                        $('.remove_input_group_option').on('click', function () {
                            $(this).parent().parent().parent().remove();
                        });
                    });
                    $('#group_types_' + inputGroupCount).on('change', function () {
                        $('#group_' + inputGroupCount + '_options').empty();
                        $('#group_' + inputGroupCount + '_add_more_option').parent().addClass('sr-only');
                        if ($(this).val() === 'Select') {
                            let inputGroupOptionCount = parseInt($('#group_' + inputGroupCount + '_options').children('div').length);
                            let inputGroupOptionElement = '<div class="input-group mt-3"><input name="input_group_' + inputGroupCount + '_options[]" type="text" class="form-control" id="input_group_' + inputGroupCount + '_options_' + inputGroupOptionCount + '" placeholder="Option"><div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_input_group_option" style="cursor: pointer;" title="Remove Option"></i></span></div></div>';
                            $('#group_' + inputGroupCount + '_options').append(inputGroupOptionElement);
                            $('#group_' + inputGroupCount + '_add_more_option').parent().removeClass('sr-only');
                            $('.remove_input_group_option').on('click', function () {
                                $(this).parent().parent().parent().remove();
                            });
                        }
                    });

                } else {
                    $('#add_more_input_group').parent().addClass('sr-only');
                    $('#add_more_option').parent().removeClass('sr-only');
                    let optionCount = parseInt($('#options_container').children('div').length);
                    let optionElement = '<div class="input-group"><input name="options[]" type="text" class="form-control" id="options_' + optionCount + '" placeholder="Option"><div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_option" style="cursor: pointer;" title="Remove Option"></i></span></div></div>';
                    $('#options_container').empty().append(optionElement);
                }

            } else {
                $('#options_container').empty();
                $('#add_more_option').parent().addClass('sr-only');
                $('#input_groups_container').empty();
                $('#add_more_input_group').parent().addClass('sr-only');
            }
        });

        $(document).on('click', '#add_more_option', function () {
            let optionCount = parseInt($('#options_container').children('div').length);
            let optionElement = '<div class="input-group mt-3"><input name="options[]" type="text" class="form-control" id="options_' + optionCount + '" placeholder="Option"><div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_option" style="cursor: pointer;" title="Remove Option"></i></span></div></div>';
            $('#options_container').append(optionElement);
        });
        $(document).on('click', '.remove_option', function () {
            $(this).parent().parent().parent().remove();
        });

        $(document).on('click', '#add_more_input_group', function () {
            let inputGroupCount = parseInt($('#input_groups_container').children('div').length);
            let inputGroupElement =
                '<div class="p-3 border mt-3">' +
                    '<div class="input-group mt-3"><input name="group_names[]" type="text" class="form-control" id="group_names_' + inputGroupCount + '" placeholder="Name"><select class="form-control" name="group_types[]" id="group_types_' + inputGroupCount + '"><option value="">Type</option><option value="Input">Input</option><option value="Select">Select</option></select><div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_input_group" style="cursor: pointer;" title="Remove Option"></i></span></div></div>' +
                    '<div id="group_' + inputGroupCount + '_options"></div>' +
                    '<div class="sr-only mt-3 small"><i class="fas fa-plus primary_text_color_default" id="group_' + inputGroupCount + '_add_more_option" style="cursor: pointer;" data-toggle="tooltip" title="Add More Input Group"></i> Add Group Option</div>' +
                '</div>';
            $('#input_groups_container').append(inputGroupElement);
            $('#group_' + inputGroupCount + '_add_more_option').on('click', function () {
                let inputGroupOptionCount = parseInt($('#group_' + inputGroupCount + '_options').children('div').length);
                let inputGroupOptionElement = '<div class="input-group mt-3"><input name="input_group_' + inputGroupCount + '_options[]" type="text" class="form-control" id="input_group_' + inputGroupCount + '_options_' + inputGroupOptionCount + '" placeholder="Option"><div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_input_group_option" style="cursor: pointer;" title="Remove Option"></i></span></div></div>';
                $('#group_' + inputGroupCount + '_options').append(inputGroupOptionElement);
                $('.remove_input_group_option').on('click', function () {
                    $(this).parent().parent().parent().remove();
                });
            });
            $('#group_types_' + inputGroupCount).on('change', function () {
                $('#group_' + inputGroupCount + '_options').empty();
                $('#group_' + inputGroupCount + '_add_more_option').parent().addClass('sr-only');
                if ($(this).val() === 'Select') {
                    let inputGroupOptionCount = parseInt($('#group_' + inputGroupCount + '_options').children('div').length);
                    let inputGroupOptionElement = '<div class="input-group mt-3"><input name="input_group_' + inputGroupCount + '_options[]" type="text" class="form-control" id="input_group_' + inputGroupCount + '_options_' + inputGroupOptionCount + '" placeholder="Option"><div class="input-group-append"><span class="input-group-text" style="background-color: transparent; padding: 0.1rem 0.75rem;"><i class="fas fa-minus fa-2x text-danger remove_input_group_option" style="cursor: pointer;" title="Remove Option"></i></span></div></div>';
                    $('#group_' + inputGroupCount + '_options').append(inputGroupOptionElement);
                    $('#group_' + inputGroupCount + '_add_more_option').parent().removeClass('sr-only');
                    $('.remove_input_group_option').on('click', function () {
                        $(this).parent().parent().parent().remove();
                    });
                }
            });

        });



        $(document).on('click', '.remove_input_group', function () {
            $(this).parent().parent().parent().parent().remove();
        });

        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
            $('#bulk_records').prop('checked', false);
            $('#bulk_status').val('');
            $('#records').empty();
            $('#no_record_section').addClass('sr-only');
            $('#record_count_section').removeClass('col-sm-12 col-sm-2');
            $('#pagination_section').removeClass('col-sm-10');
            $('#pagination_section').parent().addClass('sr-only');
            $('#pagination_section').addClass('sr-only');
            $('#pagination_links').empty();
            $('#record_count_section').empty();
            return true;
        }
        function gets(url) {
            setPageDefaults();
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    totalRecord = result.total;
                    lastPageUrl = result.last_page_url;
                    lastPageNumber = result.last_page;
                    let firstItem = result.current_page - 4;
                    let lastItem = result.current_page + 4;
                    if (result.total > 0) {
                        $('#record_count_section').append('Record: ' + result.from + ' ~ ' + result.to + ' of ' + result.total);
                        if (result.total > '{{ $recordPerPage }}') {
                            let categoryTypeId = $('#category_type_id_for_search').val() === '' ? 'null' : $('#category_type_id_for_search').val();
                            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                            let link = [];
                            for (let i=1; i<=result.last_page; i++) {
                                let linkUrl = '{{ url('control/panel/configuration/property/get/records') }}/' + categoryTypeId + '/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
                                if (result.current_page === i) {
                                    link[i] = '<a href="#" class="page-link pagination_active" data-url="' + linkUrl + '">' + i + '</a>';
                                } else {
                                    link[i] = '<a href="#" class="page-link primary_btn_default" data-url="' + linkUrl + '">' + i + '</a>';
                                }
                            }

                            if (result.last_page <= 9) {
                                for (let i = 1; i<=result.last_page; i++){
                                    $('#pagination_links').append('<li class="page-item">' + link[i] + '<li>');
                                }
                            } else {
                                if (result.current_page <= 5) {
                                    firstItem = 1;
                                } else if (lastItem >= lastPageNumber) {
                                    firstItem = lastPageNumber - 8;
                                }
                                for (let i=0; i<9; i++) {
                                    $('#pagination_links').append('<li class="page-item">' + link[firstItem+i] + '<li>');
                                }
                                let jumpOver = '<div class="form-inline"><label for="jump_pagination">Go To</label><input type="text" pattern="\d+" class="form-control form-control-sm mx-2" id="jump_pagination"><label for="jump_pagination">Page</label></div>';
                                $('#pagination_links').append(jumpOver);
                            }
                            $('#record_count_section').addClass('col-sm-2');
                            $('#pagination_section').addClass('col-sm-10');
                            $('#pagination_section').removeClass('sr-only');
                        } else {
                            $('#record_count_section').addClass('col-sm-12');
                        }
                        let sl = [];
                        for (let j = result.from; j <= result.to; j++) {
                            sl.push(j);
                        }

                        let recordColor;
                        $.each(result.data, function (key, value) {
                            recordColor = parseInt(value.is_required) === 1 ? 'color: green;' : 'color: red;';

                            $('#records').append($('<tr style="' + recordColor + '"></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] + '</td>')
                                .append('<td>' + value.property + '</div></td>')
                                .append('<td>' + value.section.category_type.category_type + '</div></td>')
                                .append('<td>' + value.section.section + '</div></td>')
                                .append('<td>' + value.type + '</div></td>')
                                .append('<td>' + (value.options === null ? '---' : value.options) + '</div></td>')
                                .append('<td>' + value.status + '</td>')
                                .append('<td width="30%">' + value.narrative + '</td>')
                                .append('<td width="10%"><i class="far fa-edit fa-2x edit text-info" data-id="' + value.id + '" style="cursor: pointer;" data-toggle="tooltip" title="Edit"></i><i class="fas fa-trash fa-2x ml-3 delete text-danger" data-id="' + value.id + '" style="cursor: pointer;" data-toggle="tooltip" title="Delete"></i></td>')
                            );
                        });

                        $('#record_section').removeClass('sr-only');
                        $('#pagination_section').parent().removeClass('sr-only');
                    } else {
                        $('#no_record_section').removeClass('sr-only');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return true;
        }

        let currentPageUrl = '';
        let lastPageUrl = '';
        let totalRecord = 0;

        $(document).ready(function () {
            $('#category_type_id_for_search').val('');
            $('#search_key').val('');
            currentPageUrl = '{{ url('control/panel/configuration/property/get/records') }}/null/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let categoryTypeId = $('#category_type_id_for_search').val() === '' ? 'null' : $('#category_type_id_for_search').val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('control/panel/configuration/property/get/records') }}/' + categoryTypeId + '/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);
            return false;
        });

        $('#bulk_records').click(function () {
            $('.bulk_record').not(this).prop('checked', this.checked);
            $('#bulk_records').not(this).prop('checked', this.checked);
            return true;
        });

        $(document).on('click', '#bulk_apply', function () {
            let data = new FormData(),
                status = $('#bulk_status').val(),
                ids = [];
            $('.bulk_record:checkbox:checked').each(function () {
                ids.push($(this).val());
            });
            data.append('ids', ids);
            data.append('status', status);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('control/panel/configuration/property/apply/bulk/operation') }}',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    gets(currentPageUrl);
                },
                error: function (xhr) {
                    console.log(xhr);
                    let message = '';
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                $.each(value, function (k, v) {
                                    message += v + '<br>';
                                });
                            });
                        }
                    }
                    $.toaster({ title: 'Warning', priority : 'danger', message : message });
                }
            });
            return false;
        });

        function clearAddForm() {
            $('#add_form').trigger('reset');
            $('#id').val('');
            $('#add_form_message').empty();
            $('#add_form').find('.text-danger').removeClass('text-danger');
            $('#add_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_form').find('span').remove();
            $('#add_more_option').parent().addClass('sr-only');
            $('#options_container').empty();
            $('#add_more_input_group').parent().addClass('sr-only');
            $('#input_groups_container').empty();
            $('#section_id').empty().append('<option value="">Choose a Section</option>');
            return true;
        }

        $(document).on('submit', '#add_form', function () {
            $('#add_form_message').empty();
            $('#add_form').find('.text-danger').removeClass('text-danger');
            $('#add_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_form').find('.invalid-feedback').remove();
            let data = new FormData(this);
            $('#is_required').is(':checked') ? data.append('is_required', '1') : data.append('is_required', '0');
            $('#is_for_search_engine').is(':checked') ? data.append('is_for_search_engine', '1') : data.append('is_for_search_engine', '0');
            $('#is_for_product_listing').is(':checked') ? data.append('is_for_product_listing', '1') : data.append('is_for_product_listing', '0');
            $('#is_for_filter').is(':checked') ? data.append('is_for_filter', '1') : data.append('is_for_filter', '0');

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('control/panel/configuration/property/save/record') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('.add_modal_close').trigger('click');
                    if ($('#id').val() === '') {
                        let landingPageUrl;
                        if (totalRecord !== 0 && (totalRecord % '{{ $recordPerPage }}') === 0) {
                            landingPageUrl = lastPageUrl.split('=')[0] + '=' + (parseInt(lastPageUrl.split('=')[1]) + 1);
                        } else {
                            landingPageUrl = lastPageUrl;
                        }
                        currentPageUrl = landingPageUrl;
                        gets(landingPageUrl);
                    } else {
                        gets(currentPageUrl);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'id') {
                                    console.log(key.split('.'));
                                    let idValue = key.split('.');
                                    if (idValue.length > 1) {
                                        idValue = '#' + key.split('.')[0] + '_' + key.split('.')[1];
                                    } else {
                                        idValue = '#' + key.split('.')[0];
                                    }
                                    $(idValue).after('<div class="invalid-feedback"></div>');
                                    $(idValue).parent().find('label').addClass('text-danger');
                                    $(idValue).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $(idValue).parent().find('.invalid-feedback').append('<p>' + v + '</p>');
                                    });
                                } else {
                                    $.each(value, function (k, v) {
                                        $('#add_form_message').append('<p style="margin: 0;">' + v + '</p>');
                                    });


                                }
                            });
                        }
                    }
                }
            });
            return false;
        });

        $(document).on('click', '#add', function () {
            clearAddForm();
            $('#add_form_submit').text('SAVE');
            $('#add_modal').modal('show').on('shown.bs.modal', function () {
                $('#property').focus();
            });
            return false;
        });



        $(document).on('click', '.edit', function () {
            let propertyId = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('control/panel/configuration/property/get/record') }}',
                data: {
                    id: propertyId
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearAddForm();
                    $('#id').val(result.id);
                    $('#property').val(result.property);
                    $('#category_type_id').val(result.section.category_type.id);
                    $('#section_id').append('<option value="' + result.section.id + '" selected>' + result.section.section + '</option>');
                    $('#type').val(result.type);
                    if (result.options !== '---' && result.options !== null) {
                        let options = result.options.split(',');
                        $.each(options, function (key, option) {
                            let optionElement = '<div class="form-group"><label for="options_' + key + '">Option ' + (key + 1) + ' <i class="fas fa-minus fa-2x color_default remove_option" style="cursor: pointer;" title="Remove Option"></i></label><input name="options[]" type="text" value="' + option + '" class="form-control" id="options_' + key + '" placeholder="Option ' + (key + 1) + '"></div>';
                            $('#options_container').append(optionElement);
                        });
                        $('#options_container').parent().next().removeClass('sr-only');
                    }
                    if (parseInt(result.is_required) === 1) {
                        $('#is_required').prop('checked', true);
                    }
                    if (parseInt(result.is_for_search_engine) === 1) {
                        $('#is_for_search_engine').prop('checked', true);
                    }
                    if (parseInt(result.is_for_product_listing) === 1) {
                        $('#is_for_product_listing').prop('checked', true);
                    }
                    if (parseInt(result.is_for_filter) === 1) {
                        $('#is_for_filter').prop('checked', true);
                    }
                    $('#status').val(result.status);
                    if (result.narrative !== '---') {
                        $('#narrative').val(result.narrative);
                    }
                    $('#add_form_submit').text('UPDATE');
                    $('#add_modal').modal('show').on('shown.bs.modal', function () {
                        $('#property').focus();
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });


        $(document).on('click', '.delete', function () {
            {{--let id = $(this).data('id');--}}
            {{--let data = new FormData();--}}
            {{--data.append('id', id);--}}
            {{--data.append('_token', '{{ csrf_token() }}');--}}
            {{--$.ajax({--}}
                {{--method: 'post',--}}
                {{--url: '{{ url('control/panel/configuration/property/delete/record') }}',--}}
                {{--data: data,--}}
                {{--contentType: false,--}}
                {{--processData: false,--}}
                {{--cache: false,--}}
                {{--success: function (result) {--}}
                    {{--console.log(result);--}}
                    {{--gets(currentPageUrl);--}}
                {{--},--}}
                {{--error: function (xhr) {--}}
                    {{--console.log(xhr);--}}
                {{--}--}}
            {{--});--}}
            return false;
        });

        $(document).on('change', '#jump_pagination', function () {
            let pageNumber = parseInt($('#jump_pagination').val());
            console.log(pageNumber);
            if (Number.isInteger(pageNumber) && pageNumber <= lastPageNumber) {
                let categoryTypeId = $('#category_type_id_for_search').val() === '' ? 'null' : $('#category_type_id_for_search').val();
                let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                currentPageUrl = '{{ url('control/panel/configuration/property/get/records') }}/' + categoryTypeId + '/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
