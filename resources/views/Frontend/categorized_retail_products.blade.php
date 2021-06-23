@extends('Layouts.frontend')
@section('content')


    


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border-bottom pb-2" style="border-color: #e8f3ed !important;">
                        <div class="row">
                            <div class="col-8 category_identity_line">
                                @php
                                    $rootCategories = array_reverse($rootCategories)
                                @endphp
                                <a href="{{ url('/') }}">Home</a> . <a href="{{ url('/') }}">{{ $category->categoryType->category_type }}</a> .
                                @foreach($rootCategories as $rootCategory)
                                    <a href="{{ url('/') }}">{{ $rootCategory }}</a> .
                                @endforeach
                                {{ $category->category }} [ <span id="products_count"></span> Item(s) ]
                            </div>
                            <div class="col-4 text-end" style="font-size: 16px;">
                                <div class="d-inline-block px-1 me-2 py-1" id="grid_view" style="cursor: pointer;">
                                    <i class="fas fa-th"></i> <span style="color: #636363;">Grid</span>
                                </div>
                                <div class="d-inline-block px-1 py-1" id="list_view" style="cursor: pointer;">
                                    <i class="fas fa-th-list"></i> <span style="color: #636363;">List</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2" id="filter_items_container">

                            </div>
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                                <div class="row" id="products_container">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3"></div>




    <script type="text/javascript">

        var viewLayout;

        $(document).ready(function () {

            $.ajax({
                method: 'get',
                url: '{{ url('category/get/filter/items') }}',
                data: {
                    category_id: '{{ $category->id }}',
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    showFilterItems(result);
                    $('#list_view').find('i').removeClass('primary_text_color_default');
                    $('#grid_view').find('i').addClass('primary_text_color_default');
                    let filters = [];
                    $('.filter_input:checkbox:checked').each(function () {
                        filters.push($(this).val());
                    });
                    viewLayout = 'grid';
                    getProducts(viewLayout, filters, $('#price_range_min_amount').text().split('$')[1], $('#price_range_max_amount').text().split('$')[1]);

                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        });

        function getProducts(layout, filters, minPrice, maxPrice) {
            $.ajax({
                method: 'get',
                url: '{{ url('category/get/categorized/products') }}',
                data: {
                    category_id: '{{ $category->id }}',
                    filters: JSON.stringify(filters),
                    min_price: minPrice,
                    max_price: maxPrice,
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#products_count').text(result.length);

                    $('#products_container').empty();
                    if (result.length > 0) {
                        if (layout === 'grid') {
                            showGridView(result);
                        } else {
                            showListView(result);
                        }
                    } else {
                        $('#products_container').append('<div class="alert alert-info" role="alert">No Products Found!</div>');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }


        function showFilterItems(filterItems) {
            $('#filter_items_container').empty();
            $.each(filterItems, function (filterItemKey, filterItem) {

                $('#filter_items_container').append(
                    '<div class="row mb-3">' +
                    '<div class="col">' +
                    '<div class="fw-bold small">' + filterItem.property + '</div>' +
                    '<div id="filter_item_' + filterItem.id +'"></div>' +
                    '</div>' +
                    '</div>'
                );

                if (filterItem.property === 'Price') {
                    $('#filter_item_' + filterItem.id).append(
                        '<div class="mt-3">' +
                            '<div id="price_range"></div>' +
                        '</div>' +
                        '<div class="row mt-3">' +
                            '<div class="col"><label id="price_range_min_amount"></label></div>' +
                            '<div class="col text-end"><label id="price_range_max_amount"></label></div>' +
                        '</div>'
                    );
                    let prices = [];
                    $.each(filterItem.distinct_product_properties, function (productPropertyKey, productProperty) {
                        prices.push(productProperty.value);
                    });
                    $('#price_range').slider({
                        range: true,
                        min: Math.min(...prices),
                        max: Math.max(...prices),
                        step: 50,
                        values: [Math.min(...prices), Math.max(...prices)],
                        slide: function( event, ui ) {

                            $('#price_range_min_amount').text('$' + ui.values[0]);
                            $('#price_range_max_amount').text('$' + ui.values[1] );
                            let filters = [];
                            $('.filter_input:checkbox:checked').each(function () {
                                filters.push($(this).val());
                            });
                            viewLayout = 'grid';
                            getProducts(viewLayout, filters, $('#price_range_min_amount').text().split('$')[1], $('#price_range_max_amount').text().split('$')[1]);
                        }
                    });

                    $('#price_range_min_amount').text('$' + $('#price_range').slider('values', 0));
                    $('#price_range_max_amount').text('$' + $('#price_range').slider('values', 1 ));
                } else {
                    $.each(filterItem.distinct_product_properties, function (productPropertyKey, productProperty) {
                        $('#filter_item_' + filterItem.id).append(
                            '<div class="form-check"><input class="form-check-input filter_input" type="checkbox" value="' + productProperty.value + '" id="filter_property_' + productProperty.value.toLowerCase().split(' ').join('_') + '"><label class="form-check-label" style="font-size: 12px;" for="filter_property_' + productProperty.value.toLowerCase().split(' ').join('_') + '">' + productProperty.value + '</label></div>'
                        );
                    });
                }

            });
        }


        $(document).on('click', '.filter_input', function () {
            let filters = [];
            $('.filter_input:checkbox:checked').each(function () {
                filters.push($(this).val());
            });
            getProducts(viewLayout, filters, $('#price_range_min_amount').text().split('$')[1], $('#price_range_max_amount').text().split('$')[1]);
        });

        function showGridView(products) {
            $.each(products, function (key, product) {
                let title = product.product_properties.find(obj => obj.property.property === 'Title');
                let images = product.product_properties.find(obj => obj.property.property === 'Images');
                let price = product.product_properties.find(obj => obj.property.property === 'Price');
                let shippingCost = product.product_properties.find(obj => obj.property.property === 'Shipping Cost');
                let shippingTime = product.product_properties.find(obj => obj.property.property === 'Shipping Time');

                let daysIncreased = shippingTime.value === 'Same Business Day' ? 0 : shippingTime.value === '1 Business Days - 10 Business Days' ? 10 : shippingTime.value === '15 Business Days' ? 15 : shippingTime.value === '20 Business Days' ? 20 : 30;
                let additionalDetails = '';
                additionalDetails += (parseFloat(shippingCost.value) === 0) ? '<span style="font-size: 10px;">Free Shipping</span><span style="font-size: 10px;"> | </span><span style="font-size: 10px;">Free Return</span><span style="font-size: 10px;"> | </span>' : '<span style="font-size: 10px;">Free Return</span><span style="font-size: 10px;"> | </span>';
                additionalDetails += '<span style="font-size: 10px;">Delivery By ' + $.datepicker.formatDate('M d, y', new Date(new Date().setDate(new Date().getDate() + daysIncreased))) + '</span>';

                $('#products_container').append(
                    '<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3 px-xl-4 px-xxl-3 mb-4">' +
                        '<div class="card border-0">' +
                            '<div class="card-header bg-white border-0">' +
                                '<div class="retail_product_image pt-2" id="product_' + product.id + '"></div>' +
                            '</div>' +
                            '<div class="card-body pt-0 product" data-product_id="' + product.id + '" style="cursor: pointer;">' +
                                '<div class="row">' +
                                    '<div class="col-10"><h5 class="card-title" style="height: 30px; font-size: 14px;">' + title.value + '</h5></div>' +
                                    '<div class="col-2 text-end"><i class="far fa-heart primary_text_color_default" style="cursor: pointer;"></i></div>' +
                                '</div>' +
                                '<div class="card-text">' +
                                    '<div>' +
                                        '<div class="d-inline-block me-1 primary_text_color_default" style="font-size: 12px;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>' +
                                        '<div class="d-inline-block me-2" style="color: #cdcdcd; font-size: 12px;">(25)</div> | ' +
                                        '<div class="d-inline-block ms-2" style="color: #ff0000; font-size: 12px;">31 Sold</div>' +
                                    '</div>' +
                                    '<div class="mt-1" style="color: #363636;"><span style="font-weight: 600; font-size: 16px;">US $' + price.value + '</span></div>' +
                                    '<div class="" style="">' + additionalDetails + '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
                );

                let imagePaths = images.value.split(',');
                $.each(imagePaths, function (imagePathKey, imagePathValue) {
                    let imgSrc = '{{ asset('storage') }}/' + imagePathValue.replace('original', '640x480');
                    let imgLoading = '{{ asset('storage/img/application/img_loading.gif') }}';
                    $('#product_' + product.id).append('<div><img class="img-fluid rounded product" data-product_id="' + product.id + '" style="cursor: pointer;" src="' + imgLoading + '" data-lazy="' + imgSrc + '" alt="' + title.value + '"></div>');
                });

                $('#product_' + product.id).slick({
                    infinite: true,
                    dots: true,
                    arrows:false,
                    autoplay:false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    lazyLoad: 'progressive'
                });
            });
        }


        function showListView(products) {
            $.each(products, function (key, product) {
                let title = product.product_properties.find(obj => obj.property.property === 'Title');
                let images = product.product_properties.find(obj => obj.property.property === 'Images');
                let price = product.product_properties.find(obj => obj.property.property === 'Price');
                let shippingCost = product.product_properties.find(obj => obj.property.property === 'Shipping Cost');
                let shippingTime = product.product_properties.find(obj => obj.property.property === 'Shipping Time');

                let daysIncreased = shippingTime.value === 'Same Business Day' ? 0 : shippingTime.value === '1 Business Days - 10 Business Days' ? 10 : shippingTime.value === '15 Business Days' ? 15 : shippingTime.value === '20 Business Days' ? 20 : 30;
                let additionalDetails = '';
                additionalDetails += (parseFloat(shippingCost.value) === 0) ? '<span style="font-size: 10px;">Free Shipping</span><span style="font-size: 10px;"> | </span><span style="font-size: 10px;">Free Return</span><span style="font-size: 10px;"> | </span>' : '<span style="font-size: 10px;">Free Return</span><span style="font-size: 10px;"> | </span>';
                additionalDetails += '<span style="font-size: 10px;">Delivery By ' + $.datepicker.formatDate('M d, y', new Date(new Date().setDate(new Date().getDate() + daysIncreased))) + '</span>';

                $('#products_container').append(
                    '<div class="col-12 px-xl-4 px-xxl-3 mb-4">' +
                        '<div class="card border-0">' +
                            '<div class="row g-0">' +
                                '<div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 col-xxl-2">' +
                                    '<div class="card-header bg-white border-0 pl-3 pt-2 pb-0">' +
                                        '<div class="retail_product_image" id="product_' + product.id + '"></div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9 col-xxl-10">' +

                                    '<div class="card-body pt-2 product" data-product_id="' + product.id + '" style="cursor: pointer;">' +
                                    '<div class="row">' +
                                    '<div class="col-10"><h5 class="card-title" style="height: 30px; font-size: 14px;">' + title.value + '</h5></div>' +
                                    '<div class="col-2 text-end"><i class="far fa-heart primary_text_color_default" style="cursor: pointer;"></i></div>' +
                                    '</div>' +
                                    '<div class="card-text">' +
                                    '<div>' +
                                    '<div class="d-inline-block me-1 primary_text_color_default" style="font-size: 12px;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>' +
                                    '<div class="d-inline-block me-2" style="color: #cdcdcd; font-size: 12px;">(25)</div> | ' +
                                    '<div class="d-inline-block ms-2" style="color: #ff0000; font-size: 12px;">31 Sold</div>' +
                                    '</div>' +
                                    '<div class="mt-1" style="color: #363636;"><span style="font-weight: 600; font-size: 16px;">US $' + price.value + '</span></div>' +
                                    '<div class="" style="">' + additionalDetails + '</div>' +
                                    '</div>' +
                                    '</div>' +

                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
                );

                let imagePaths = images.value.split(',');
                $.each(imagePaths, function (imagePathKey, imagePathValue) {
                    let imgSrc = '{{ asset('storage') }}/' + imagePathValue.replace('original', '640x480');
                    let imgLoading = '{{ asset('storage/img/application/img_loading.gif') }}';
                    $('#product_' + product.id).append('<div><img class="img-fluid rounded product" data-product_id="' + product.id + '" style="cursor: pointer;" src="' + imgLoading + '" data-lazy="' + imgSrc + '" alt="' + title.title + '"></div>');
                });

                $('#product_' + product.id).slick({
                    infinite: true,
                    dots: true,
                    arrows:false,
                    autoplay:false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    lazyLoad: 'progressive'
                });
            });
        }


        $(document).on('click', '#list_view', function () {
            $('#grid_view').find('i').removeClass('primary_text_color_default');
            $('#list_view').find('i').addClass('primary_text_color_default');
            let filters = [];
            $('.filter_input:checkbox:checked').each(function () {
                filters.push($(this).val());
            });
            viewLayout = 'list';
            getProducts(viewLayout, filters, $('#price_range_min_amount').text().split('$')[1], $('#price_range_max_amount').text().split('$')[1]);
        });

        $(document).on('click', '#grid_view', function () {
            $('#list_view').find('i').removeClass('primary_text_color_default');
            $('#grid_view').find('i').addClass('primary_text_color_default');
            let filters = [];
            $('.filter_input:checkbox:checked').each(function () {
                filters.push($(this).val());
            });
            viewLayout = 'grid';
            getProducts(viewLayout, filters, $('#price_range_min_amount').text().split('$')[1], $('#price_range_max_amount').text().split('$')[1]);
        });

        $(document).on('click', '.product', function () {
            location = '{{ url('product') }}/' + btoa(btoa(btoa(btoa(btoa($(this).data('product_id'))))));
            return false;
        });
    </script>


@endsection
