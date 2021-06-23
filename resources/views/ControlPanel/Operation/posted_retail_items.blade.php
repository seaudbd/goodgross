@extends('Layouts.control_panel')

@section('content')
    <div class="row">
        <div class="col">
            Operation | {{ $activeMenu }}

            <div class="row mt-3">
                <div class="col">
                    <div class="row sr-only" id="bulk_action_section">
                        <div class="col-sm-3">
                            <input type="checkbox" id="bulk_records"> All Check
                        </div>
                        <div class="col-sm-4">
                            <select name="bulk_status" id="bulk_status" class="form-control">
                                <option value="">Select an Action</option>
                                <option value="Approved">Make Approved</option>
                                <option value="Declined">Make Declined</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" id="bulk_apply" class="btn btn-sm primary_btn_default">Apply</button>
                        </div>
                    </div>
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

            <div class="row mt-3 sr-only" id="record_section">
                <div class="col">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price Per Unit</th>
                            <th>Associated Account</th>
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
        </div>
    </div>






    <script language="JavaScript">




        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
            $('#bulk_action_section').addClass('sr-only');
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
                                let linkUrl = '{{ url('control/panel/operation/posted/retail/items/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
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
                        let title;
                        let quantity;
                        let pricePerUnit;
                        let accountInformation;
                        let narrative;
                        let postingStatus;
                        let recordInitialPoint;
                        let recordTextColorClass;
                        $.each(result.data, function (key, value) {

                            title = value.product_properties.find(obj => obj.property.property === 'Title');
                            quantity = value.product_properties.find(obj => obj.property.property === 'Quantity');
                            pricePerUnit = value.product_properties.find(obj => obj.property.property === 'Price');
                            accountInformation = value.account.personal_account !== null ? value.account.type + ':' + value.account.number + '-' + value.account.personal_account.first_name + ' ' + value.account.personal_account.first_name : value.account.type + ':' + value.account.number + '-' + value.account.business_account.name;
                            narrative = (value.narrative === null) ? '---' : value.narrative;
                            recordInitialPoint = value.status !== 'Posted' ? '<input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] : sl[key];
                            recordTextColorClass = value.status === 'Approved' ? 'text-success' : value.status === 'Declined' ? 'text-primary' : value.status === 'Pending' ? 'text-warning' : 'text-danger';


                            if (value.status === 'Posted') {
                                postingStatus = 'No Action';
                            } else if (value.status === 'Pending') {
                                postingStatus = '<select class="form-control posting_status" data-id="' + value.id + '"><option value="" selected>Select an Action</option><option value="Approved">Make Approved</option><option value="Declined">Make Declined</option></select>';
                            } else if (value.status === 'Approved') {
                                postingStatus = '<select class="form-control posting_status" data-id="' + value.id + '"><option value="" selected>Select an Action</option><option value="Declined">Declined</option></select>';
                            } else if (value.status === 'Declined') {
                                postingStatus = '<select class="form-control posting_status" data-id="' + value.id + '"><option value="" selected>Select an Action</option><option value="Approved">Approved</option></select>';
                            }

                            $('#records').append($('<tr class="' + recordTextColorClass + '"></tr>')
                                .append('<td>' + recordInitialPoint + '</td>')
                                .append('<td>' + title.value + '</td>')
                                .append('<td>' + quantity.value + '</td>')
                                .append('<td>US $' + parseFloat(pricePerUnit.value).toFixed(2) + '</td>')
                                .append('<td>' + accountInformation + '</td>')
                                .append('<td>' + value.status + '</td>')
                                .append('<td>' + narrative + '</td>')
                                .append('<td>' + postingStatus + '</td>')
                            );
                        });

                        $('#record_section').removeClass('sr-only');
                        $('#pagination_section').parent().removeClass('sr-only');
                        $('#bulk_action_section').removeClass('sr-only');
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
            currentPageUrl = '{{ url('control/panel/operation/posted/retail/items/get/records') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('control/panel/operation/posted/retail/items/get/records') }}/' + searchKey + '/{{ $recordPerPage }}';
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
            if (status !== '' && ids.length > 0) {
                data.append('ids', ids);
                data.append('status', status);
                data.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    method: 'post',
                    url: '{{ url('control/panel/operation/posted/retail/items/apply/bulk/operation') }}',
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
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'You must have to select a Bulk Action and make at least a single record checked.' });
            }

            return false;
        });






        $(document).on('change', '.posting_status', function () {
            let id = $(this).data('id');
            let status = $(this).val();
            let data = new FormData();
            data.append('id', id);
            data.append('status', status);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('control/panel/operation/posted/retail/items/change/status') }}',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $.toast({
                        text : result.message,
                        showHideTransition : 'slide',
                        bgColor : 'green',
                        textColor : '#eee',
                        allowToastClose : true,
                        hideAfter : 5000,
                        stack : 5,
                        textAlign : 'left',
                        position : 'bottom-left'
                    });
                    gets(currentPageUrl);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });


        $(document).on('change', '#jump_pagination', function () {
            let pageNumber = parseInt($('#jump_pagination').val());

            if (isPositiveInteger(pageNumber) && pageNumber <= lastPageNumber) {
                let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                currentPageUrl = '{{ url('control/panel/operation/posted/retail/items/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
