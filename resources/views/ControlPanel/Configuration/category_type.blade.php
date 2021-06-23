@extends('Layouts.control_panel')

@section('content')
    <div class="row">
        <div class="col">
            Configuration | {{ $activeMenu }}

            <div class="row mt-3">
                <div class="col">
                    <button type="button" class="btn btn-sm primary_btn_default" id="add">ADD</button>
                </div>
                <div class="col" id="search_section">
                    <form id="search_form">
                        <div class="input-group">
                            <input type="text" id="search_key" class="form-control border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn primary_btn_default" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
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
                            <th>Category Type</th>
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
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Category Type</h5>
                            <button type="button" class="close add_modal_close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="padding-left: 80px; padding-right: 80px; padding-bottom: 50px;">
                            <div id="add_form_message" class="text-center text-danger">

                            </div>
                            <form id="add_form">
                                <input name="id" type="hidden" id="id">
                                <div class="form-group">
                                    <label for="category_type">Category Type</label>
                                    <input name="category_type" type="text" class="form-control" id="category_type" placeholder="Category Type">
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

                                <div class="row mt-3">
                                    <div class="col text-right">
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
                            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                            let link = [];
                            for (let i=1; i<=result.last_page; i++) {
                                let linkUrl = '{{ url('control/panel/configuration/category/type/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
                                if (result.current_page === i) {
                                    link[i] = '<a href="#" class="page-link primary_btn_default pagination_active" data-url="' + linkUrl + '">' + i + '</a>';
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

                        $.each(result.data, function (key, value) {

                            $('#records').append($('<tr></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] + '</td>')
                                .append('<td>' + value.category_type + '</div></td>')
                                .append('<td>' + value.status + '</td>')
                                .append('<td>' + value.narrative + '</td>')
                                .append('<td><i class="far fa-edit fa-2x edit text-info" data-id="' + value.id + '" style="cursor: pointer;" data-toggle="tooltip" title="Edit"></i><i class="fas fa-trash fa-2x ml-3 delete text-danger" data-id="' + value.id + '" style="cursor: pointer;" data-toggle="tooltip" title="Delete"></i></td>')
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

        var currentPageUrl = '';
        var lastPageUrl = '';
        var totalRecord = 0;

        $(document).ready(function () {
            $('#search_key').val('');
            currentPageUrl = '{{ url('control/panel/configuration/category/type/get/records') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('control/panel/configuration/category/type/get/records') }}/' + searchKey + '/{{ $recordPerPage }}';
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
                url: '{{ url('control/panel/configuration/category/type/apply/bulk/operation') }}',
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
            return true;
        }

        $(document).on('submit', '#add_form', function () {
            $('#add_form_message').empty();
            $('#add_form').find('.text-danger').removeClass('text-danger');
            $('#add_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_form').find('span').remove();
            let data = new FormData(this);

            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('control/panel/configuration/category/type/save/record') }}',
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
                                    $('#' + key).after('<span></span>');
                                    $('#' + key).parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
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
                $('#category_type').focus();
            });
            return false;
        });



        $(document).on('click', '.edit', function () {
            let categoryTypeId = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('control/panel/configuration/category/type/get/record') }}',
                data: {
                    id: categoryTypeId
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearAddForm();
                    $('#id').val(result.id);
                    $('#category_type').val(result.category_type);
                    $('#status').val(result.status);
                    if (result.narrative !== '---') {
                        $('#narrative').val(result.narrative);
                    }
                    $('#add_form_submit').text('UPDATE');
                    $('#add_modal').modal('show').on('shown.bs.modal', function () {
                        $('#category_type').focus();
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
                {{--url: '{{ url('control/panel/configuration/category/type/delete/record') }}',--}}
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
            if (isPositiveInteger(pageNumber) && pageNumber <= lastPageNumber) {
                let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                currentPageUrl = '{{ url('control/panel/configuration/category/type/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
