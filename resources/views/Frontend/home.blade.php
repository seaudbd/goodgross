@extends('Layouts.frontend')
@section('content')

    <style type="text/css">

        /*//////////////////////////////////////////////////Retail and Wholesale Menu CSS for Mobile Screen///////////////////////////////////////////////////////////////*/
        .nav-link {
            padding: 3px 10px;
        }
        .area_expanded_indicator {
            float: right;
        }
        .retail_child_element_container, .wholesale_child_element_container {
            background: #ffffff;
        }

        .retail_top_li {
            background: #f0f0f0;
            border-bottom: 1px solid #fdfdfd;
        }
        .retail_top_li a {
            text-decoration: none;
            font-size: 0.9rem;
            color: #000000;
        }
        .wholesale_top_li {
            background: #f0f0f0;
            border-bottom: 1px solid #fdfdfd;
        }
        .wholesale_top_li a {
            text-decoration: none;
            font-size: 0.9rem;
            color: #000000;
        }




















        /*//////////////////////////////////////////////////Retail Menu CSS Start///////////////////////////////////////////////////////////////*/

        .retail_top_ul,
        .retail_ul_level_1,
        .retail_ul_level_2 {
            padding: 0;
        }
        .retail_li_level_1,
        .retail_li_level_2,
        .retail_li_level_3 {
            list-style-type: none;
            cursor: pointer;
            border-bottom: 1px solid #f0f0f0;
            padding: 0 0;
            position: relative;
        }
        .retail_li_level_1 {
            background: #f3f3f3;
            border-bottom: 1px solid #ffffff;

        }
        .retail_li_level_1:hover,
        .retail_li_level_2:hover,
        .retail_li_level_3:hover {
            background: #ffffff;
            box-shadow: 0 0 10px -1px lightblue;
        }

        .retail_li_level_1:hover > a,
        .retail_li_level_2:hover > a,
        .retail_li_level_3:hover > a {
            color: #328c59;
        }



        .retail_li_level_1:last-child,
        .retail_li_level_2:last-child,
        .retail_li_level_3:last-child {
            border-bottom: none;
        }
        .retail_li_level_1 a,
        .retail_li_level_2 a,
        .retail_li_level_3 a {
            text-decoration: none;
            font-size: 14px;
            color: #333333;



        }

        .retail_li_level_1 a {
            margin-left: 35px;
        }
        .retail_li_level_1 img {
            background: #328c59;
            height: 24px;
            width: 30px;
            position: absolute;
        }
        .retail_div_level_1 {
            position: absolute;
            background: #ffffff;
            cursor: auto;

        }
        .retail_div_level_1_hide {
            display: none;
            left: -5000px;
            width: 0;
            top: -5000px;
            height: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .retail_div_level_1_show {
            display: block;
            left: 100%;
            width: 100%;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .retail_div_level_2 {
            position: absolute;
            background: #ffffff;
            cursor: auto;
        }
        .retail_div_level_2_hide {
            display: none;
            left: -5000px;
            width: 0;
            top: -5000px;
            height: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .retail_div_level_2_show {
            display: block;
            left: 100%;
            width: 100%;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        /*//////////////////////////////////////////////////Retail Menu CSS End///////////////////////////////////////////////////////////////*/




        .wholesale_col_1_top_ul,
        .wholesale_col_2_top_ul,
        .wholesale_col_3_top_ul,
        .wholesale_col_1_ul_level_1,
        .wholesale_col_1_ul_level_2,
        .wholesale_col_2_ul_level_1,
        .wholesale_col_2_ul_level_2,
        .wholesale_col_3_ul_level_1,
        .wholesale_col_3_ul_level_2 {
            padding: 0;
        }
        .wholesale_col_1_li_level_1,
        .wholesale_col_1_li_level_2,
        .wholesale_col_1_li_level_3,
        .wholesale_col_2_li_level_1,
        .wholesale_col_2_li_level_2,
        .wholesale_col_2_li_level_3,
        .wholesale_col_3_li_level_1,
        .wholesale_col_3_li_level_2,
        .wholesale_col_3_li_level_3 {
            list-style-type: none;
            cursor: pointer;
            padding: 5px 10px;
            border-bottom: 1px solid #f0f0f0;
            position: relative;
        }

        .wholesale_col_1_li_level_1,
        .wholesale_col_2_li_level_1,
        .wholesale_col_3_li_level_1 {
            background: #ffffff;
        }

        .wholesale_col_1_li_level_1:hover,
        .wholesale_col_2_li_level_1:hover,
        .wholesale_col_3_li_level_1:hover,
        .wholesale_col_1_li_level_2:hover,
        .wholesale_col_2_li_level_2:hover,
        .wholesale_col_3_li_level_2:hover,
        .wholesale_col_1_li_level_3:hover,
        .wholesale_col_2_li_level_3:hover,
        .wholesale_col_3_li_level_3:hover {
            box-shadow: 0 0 10px -1px lightblue;
        }

        .wholesale_col_1_li_level_1:hover > a,
        .wholesale_col_2_li_level_1:hover > a,
        .wholesale_col_3_li_level_1:hover > a,
        .wholesale_col_1_li_level_2:hover > a,
        .wholesale_col_2_li_level_2:hover > a,
        .wholesale_col_3_li_level_2:hover > a,
        .wholesale_col_1_li_level_3:hover > a,
        .wholesale_col_2_li_level_3:hover > a,
        .wholesale_col_3_li_level_3:hover > a {
            color: #328c59;
        }

        .wholesale_col_1_li_level_1:last-child,
        .wholesale_col_1_li_level_2:last-child,
        .wholesale_col_1_li_level_3:last-child,
        .wholesale_col_2_li_level_1:last-child,
        .wholesale_col_2_li_level_2:last-child,
        .wholesale_col_2_li_level_3:last-child,
        .wholesale_col_3_li_level_1:last-child,
        .wholesale_col_3_li_level_2:last-child,
        .wholesale_col_3_li_level_3:last-child {
            border-bottom: none;
        }
        .wholesale_col_1_li_level_1 a,
        .wholesale_col_1_li_level_2 a,
        .wholesale_col_1_li_level_3 a,
        .wholesale_col_2_li_level_1 a,
        .wholesale_col_2_li_level_2 a,
        .wholesale_col_2_li_level_3 a,
        .wholesale_col_3_li_level_1 a,
        .wholesale_col_3_li_level_2 a,
        .wholesale_col_3_li_level_3 a {
            text-decoration: none;
            font-size: 14px;
            color: #333333;

        }

        .wholesale_col_1_div_level_1, .wholesale_col_2_div_level_1, .wholesale_col_3_div_level_1 {
            position: absolute;
            background: #fafafa;
            cursor: auto;

        }

        .wholesale_col_1_div_level_1_hide, .wholesale_col_2_div_level_1_hide, .wholesale_col_3_div_level_1_hide {
            display: none;
            left: -10000px;
            width: 0;
            top: -10000px;
            height: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .wholesale_col_1_div_level_1_show, .wholesale_col_2_div_level_1_show, .wholesale_col_3_div_level_1_show {
            display: block;
            left: 100%;
            width: 100%;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }


        .wholesale_col_1_div_level_2, .wholesale_col_2_div_level_2, .wholesale_col_3_div_level_2 {
            position: absolute;
            background: #fafafa;
            cursor: auto;
        }

        .wholesale_col_1_div_level_2_hide, .wholesale_col_2_div_level_2_hide, .wholesale_col_3_div_level_2_hide {
            display: none;
            left: -10000px;
            width: 0;
            top: -10000px;
            height: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .wholesale_col_1_div_level_2_show, .wholesale_col_2_div_level_2_show, .wholesale_col_3_div_level_2_show {
            display: block;
            left: 100%;
            width: 100%;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }


        @media screen and (min-width: 300px) {
            #retail_wrapper {
                margin-bottom: 10px;
            }
        }

        @media screen and (min-width: 1200px) {
            #retail_wrapper {
                padding-right: 5px;
                flex: 20% !important;
                max-width: 20% !important;
            }
            #wholesale_wrapper {
                padding-left: 5px;
                flex: 80% !important;
                max-width: 80% !important;
            }
            #wholesale_1 {
                padding-right: 5px;
            }
            #wholesale_2 {
                padding-left: 5px;
                padding-right: 5px;
            }
            #wholesale_3 {
                padding-left: 5px;
            }
        }

        @media screen and (min-width: 1400px) {
            #retail_wrapper {
                padding-right: 10px;
                flex: 20% !important;
                max-width: 20% !important;
            }
            #wholesale_wrapper {
                padding-left: 10px;
                flex: 80% !important;
                max-width: 80% !important;
            }
            #wholesale_1 {
                padding-right: 10px;
            }
            #wholesale_2 {
                padding-left: 10px;
                padding-right: 10px;
            }
            #wholesale_3 {
                padding-left: 10px;
            }
        }


        .slick-slide {
            margin: 0 10px;
        }

        .slick-list {
            margin: 0 -10px;
        }

        .deals_of_the_day .slick-prev:hover,
        .deals_of_the_day .slick-next:hover{
            box-shadow: 0 2px 8px 2px rgba(20,23,28,.15);
        }
        .deals_of_the_day .slick-prev:focus,
        .deals_of_the_day .slick-next:focus{
            box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1) !important;
        }

        .deals_of_the_day .slick-prev,
        .deals_of_the_day .slick-next{
            width: 47px;
            height: 47px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);
            z-index: 1;
            top: calc( 50% - 25px);
        }
        .deals_of_the_day .slick-prev{
            left: -15px;
        }
        .deals_of_the_day .slick-prev.slick-disabled,
        .deals_of_the_day .slick-next.slick-disabled{
            opacity: 0;
        }
        .deals_of_the_day .slick-prev:before{
            content: url({{ asset('storage/img/application/prev_arrow.png') }});
            line-height: 0;
            opacity: 1
        }
        .deals_of_the_day .slick-next{
            right: -15px
        }
        .deals_of_the_day .slick-next:before{
            content: url({{ asset('storage/img/application/next_arrow.png') }});
            line-height: 0;
            opacity: 1;
        }

    </style>

    <div class="container-fluid pt-3" style="background: #fdfdfd;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3" id="retail_wrapper">
                        <div class="text-dark font-weight-bold text-center retail_title" style="background-color: #f3f3f3; color: #636363; font-size: 1.2rem; padding: 3px 0; border-bottom: 1px solid #ffffff;">Retail Market</div>
                        <div id="retail"></div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9" id="wholesale_wrapper">
                        <div class="text-dark font-weight-bold text-center wholesale_title" style="background-color: #f3f3f3; color: #636363; font-size: 1.2rem; padding: 3px 0;">Manufacturers & Suppliers</div>
                        <div id="wholesale"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="overlay" style="display: none; z-index: 199; width: 100%; height: 100%; position: fixed; top: 0; right: 0; bottom: 0; left: 0; background: rgba(0,0,0,0.25); overflow-x: hidden;"></div>

    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">






                {{--<div class="row mt-3">--}}
                    {{--<div class="col">--}}
                        {{--<div style="border-bottom: 1px solid #d1f9e2;"><h6 class="primary_btn_default d-inline-block" style="margin: 0; color: white; padding: 10px 50px 10px 10px; border-top-right-radius: 50px;">Deals of the Day</h6></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row mt-2">--}}
                    {{--<div class="col">--}}
                        {{--<div class="deals_of_the_day">--}}
                            {{--@foreach($dealsOfTheDay as $key => $product)--}}
                                {{--@php--}}
                                {{--$imagePath = str_replace('original', '640x480', explode(',', $product->productProperties->where('property', 'Images')->first('value')->value)[0]);--}}
                                {{--@endphp--}}
                                {{--<div>--}}
                                    {{--<div style="margin: 10px 0 !important; padding: 15px 30px !important; box-shadow: 0 0 10px -2px lightblue !important; border-radius: 5px; !important;">--}}
                                        {{--<img class="img-fluid" src="{{ asset('storage/' . $imagePath) }}" alt="Card image">--}}

                                        {{--<div>--}}
                                            {{--<h6 class="mt-3" style="color: #333333;">{{ $product->productProperties->where('property', 'Title')->first('value')->value }}</h6>--}}
                                            {{--<div class="small" style="color: #333333">{{ $product->account->business_name }}</div>--}}
                                            {{--<div class="small">--}}
                                            {{--<span class="primary_text_color_default">--}}
                                                {{--<i class="fas fa-star"></i>--}}
                                                {{--<i class="fas fa-star"></i>--}}
                                                {{--<i class="fas fa-star"></i>--}}
                                                {{--<i class="fas fa-star"></i>--}}
                                                {{--<i class="fas fa-star"></i>--}}
                                            {{--</span>--}}
                                                {{--<span style="color: #333333;">(25)</span> | <span style="color: #ff0000;">5 Sold</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="mt-3" style="color: #333333;"><span style="font-weight: 600;">US ${{ number_format($product->productProperties->where('property', 'Price')->first('value')->value, 2) }}</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row mt-3">--}}
                    {{--<div class="col">--}}
                        {{--<div style="border-bottom: 1px solid #d1f9e2;"><h6 class="primary_btn_default d-inline-block" style="margin: 0; color: white; padding: 10px 50px 10px 10px; border-top-right-radius: 50px;">Popular Retail Categories</h6></div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row mt-2">--}}
                    {{--<div class="col">--}}
                        {{--<div class="deals_of_the_day">--}}
                            {{--@foreach($dealsOfTheDay as $key => $product)--}}
                                {{--<div>--}}
                                    {{--<div style="margin: 10px 0 !important; padding: 15px 30px !important; box-shadow: 0 0 10px -2px lightblue !important; border-radius: 5px; !important;">--}}
                                        {{--<img style="height: 200px; width: auto;" src="{{ asset('storage/' . $product->productProperties->where('property', 'Image')->first('value')->value) }}" alt="Card image">--}}
                                        {{--<div>--}}
                                            {{--<h6 style="color: #333333;">{{ $product->productProperties->where('property', 'Title')->first('value')->value }}</h6>--}}
                                            {{--<div class="small" style="color: #333333">{{ $product->account->business_name }}</div>--}}
                                            {{--<div class="small">--}}
                                    {{--<span class="primary_text_color_default">--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                    {{--</span>--}}
                                                {{--<span style="color: #333333;">(25)</span> | <span style="color: #ff0000;">5 Sold</span>--}}
                                            {{--</div>--}}
                                            {{--<div style="color: #333333;">Price Per Unit: <span style="font-weight: 600;">US ${{ number_format($product->productProperties->where('property', 'Price')->first('value')->value, 2) }}</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}



                {{--<div class="row mt-3">--}}
                    {{--<div class="col">--}}
                        {{--<div style="border-bottom: 1px solid #d1f9e2;"><h6 class="primary_btn_default d-inline-block" style="margin: 0; color: white; padding: 10px 50px 10px 10px; border-top-right-radius: 50px;">Popular Wholesale Categories</h6></div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="row mt-2">--}}
                    {{--<div class="col">--}}
                        {{--<div class="deals_of_the_day">--}}
                            {{--@foreach($dealsOfTheDay as $key => $product)--}}
                                {{--<div>--}}
                                    {{--<div style="margin: 10px 0 !important; padding: 15px 30px !important; box-shadow: 0 0 10px -2px lightblue !important; border-radius: 5px; !important;">--}}
                                        {{--<img style="height: 200px; width: auto;" src="{{ asset('storage/' . $product->productProperties->where('property', 'Image')->first('value')->value) }}" alt="Card image">--}}
                                        {{--<div>--}}
                                            {{--<h6 style="color: #333333;">{{ $product->productProperties->where('property', 'Title')->first('value')->value }}</h6>--}}
                                            {{--<div class="small" style="color: #333333">{{ $product->account->business_name }}</div>--}}
                                            {{--<div class="small">--}}
                                    {{--<span class="primary_text_color_default">--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                    {{--</span>--}}
                                                {{--<span style="color: #333333;">(25)</span> | <span style="color: #ff0000;">5 Sold</span>--}}
                                            {{--</div>--}}
                                            {{--<div style="color: #333333;">Price Per Unit: <span style="font-weight: 600;">US ${{ number_format($product->productProperties->where('property', 'Price')->first('value')->value, 2) }}</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row mt-3">--}}
                    {{--<div class="col">--}}
                        {{--<div style="border-bottom: 1px solid #d1f9e2;"><h6 class="primary_btn_default d-inline-block" style="margin: 0; color: white; padding: 10px 50px 10px 10px; border-top-right-radius: 50px;">Top Retail Brands</h6></div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row mt-2">--}}
                    {{--<div class="col">--}}
                        {{--<div class="deals_of_the_day">--}}
                            {{--@foreach($dealsOfTheDay as $key => $product)--}}
                                {{--<div>--}}
                                    {{--<div style="margin: 10px 0 !important; padding: 15px 30px !important; box-shadow: 0 0 10px -2px lightblue !important; border-radius: 5px; !important;">--}}
                                        {{--<img style="height: 200px; width: auto;" src="{{ asset('storage/' . $product->productProperties->where('property', 'Image')->first('value')->value) }}" alt="Card image">--}}
                                        {{--<div>--}}
                                            {{--<h6 style="color: #333333;">{{ $product->productProperties->where('property', 'Title')->first('value')->value }}</h6>--}}
                                            {{--<div class="small" style="color: #333333">{{ $product->account->business_name }}</div>--}}
                                            {{--<div class="small">--}}
                                    {{--<span class="primary_text_color_default">--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                    {{--</span>--}}
                                                {{--<span style="color: #333333;">(25)</span> | <span style="color: #ff0000;">5 Sold</span>--}}
                                            {{--</div>--}}
                                            {{--<div style="color: #333333;">Price Per Unit: <span style="font-weight: 600;">US ${{ number_format($product->productProperties->where('property', 'Price')->first('value')->value, 2) }}</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row mt-3">--}}
                    {{--<div class="col">--}}
                        {{--<div style="border-bottom: 1px solid #d1f9e2;"><h6 class="primary_btn_default d-inline-block" style="margin: 0; color: white; padding: 10px 50px 10px 10px; border-top-right-radius: 50px;">Top Wholesale Brands</h6></div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="row mt-2">--}}
                    {{--<div class="col">--}}
                        {{--<div class="deals_of_the_day">--}}
                            {{--@foreach($dealsOfTheDay as $key => $product)--}}
                                {{--<div>--}}
                                    {{--<div style="margin: 10px 0 !important; padding: 15px 30px !important; box-shadow: 0 0 10px -2px lightblue !important; border-radius: 5px; !important;">--}}
                                        {{--<img style="height: 200px; width: auto;" src="{{ asset('storage/' . $product->productProperties->where('property', 'Image')->first('value')->value) }}" alt="Card image">--}}
                                        {{--<div>--}}
                                            {{--<h6 style="color: #333333;">{{ $product->productProperties->where('property', 'Title')->first('value')->value }}</h6>--}}
                                            {{--<div class="small" style="color: #333333">{{ $product->account->business_name }}</div>--}}
                                            {{--<div class="small">--}}
                                    {{--<span class="primary_text_color_default">--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                    {{--</span>--}}
                                                {{--<span style="color: #333333;">(25)</span> | <span style="color: #ff0000;">5 Sold</span>--}}
                                            {{--</div>--}}
                                            {{--<div style="color: #333333;">Price Per Unit: <span style="font-weight: 600;">US ${{ number_format($product->productProperties->where('property', 'Price')->first('value')->value, 2) }}</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}











            </div>
        </div>
    </div>





    <div style="height: 25px;"></div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.deals_of_the_day').slick({
                infinite: false,
                dots: true,
                arrows:true,
                autoplay:true,
                autoplaySpeed: 3000,
                slidesToShow: 4,
                slidesToScroll: 1,

                responsive: [
                    {
                        breakpoint: 1540,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 900,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }

                ]
            });
        });


    </script>



    <script type="text/javascript">




        $(document).mouseup(function(e) {

            if ($(e.target).closest('.retail_top_ul').length === 0 &&
                $(e.target).closest('.wholesale_col_1_top_ul').length === 0 &&
                $(e.target).closest('.wholesale_col_2_top_ul').length === 0 &&
                $(e.target).closest('.wholesale_col_3_top_ul').length === 0) {
                $('.retail_li_level_1').children('div').removeClass('retail_div_level_1_show').addClass('retail_div_level_1_hide');
                $('.wholesale_col_1_li_level_1').children('div').removeClass('wholesale_col_1_div_level_1_show').addClass('wholesale_col_1_div_level_1_hide');
                $('.wholesale_col_2_li_level_1').children('div').removeClass('wholesale_col_2_div_level_1_show').addClass('wholesale_col_2_div_level_1_hide');
                $('.wholesale_col_3_li_level_1').children('div').removeClass('wholesale_col_3_div_level_1_show').addClass('wholesale_col_3_div_level_1_hide');
                $('.overlay').hide();
            }
        });

        $(document).on('click', '.retail_li_level_1', function () {

            $('#retail_wrapper').css({'z-index': '200'});
            $('.wholesale_title').css({'z-index': '100'});
            $('#wholesale_1').css({'z-index': '100'});
            $('#wholesale_2').css({'z-index': '100'});
            $('#wholesale_3').css({'z-index': '100'});
            $('.wholesale_col_1_li_level_1').children('div').removeClass('wholesale_col_1_div_level_1_show').addClass('wholesale_col_1_div_level_1_hide');
            $('.wholesale_col_2_li_level_1').children('div').removeClass('wholesale_col_2_div_level_1_show').addClass('wholesale_col_2_div_level_1_hide');
            $('.wholesale_col_3_li_level_1').children('div').removeClass('wholesale_col_3_div_level_1_show').addClass('wholesale_col_3_div_level_1_hide');
            if ($(this).children('div').hasClass('retail_div_level_1_hide')) {
                $('.retail_li_level_1').children('div').removeClass('retail_div_level_1_show').addClass('retail_div_level_1_hide');
                let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
                $(this).children('div').removeClass('retail_div_level_1_hide').addClass('retail_div_level_1_show').height($('.retail_top_ul').innerHeight()).css({'top': top});
                $('.overlay').show();
            } else {
                $('.retail_li_level_1').children('div').removeClass('retail_div_level_1_show').addClass('retail_div_level_1_hide');
                $('.overlay').hide();
            }

        });

        $(document).on('mouseover', '.retail_li_level_2', function () {
            $('.retail_li_level_2').children('div').removeClass('retail_div_level_2_show').addClass('retail_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('retail_div_level_2_show').height($('.retail_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
            }
        });

        $(document).on('click', '.retail_li_level_2', function () {
            $('.retail_li_level_2').children('div').removeClass('retail_div_level_2_show').addClass('retail_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('retail_div_level_2_show').height($('.retail_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
                return false;
            } else {
                location = $(this).children('a').attr('href');
            }
        });

        $(document).on('mouseout', '.retail_li_level_2', function () {
            $(this).children('div').removeClass('retail_div_level_2_show').addClass('retail_div_level_2_hide');
            $(this).parent().parent().css({'border-top-right-radius': '5px', 'border-bottom-right-radius': '5px'});
        });

        $(document).on('click', '.retail_li_level_3', function () {
            location = $(this).children('a').attr('href');
        });




        $(document).on('click', '.wholesale_col_1_li_level_1', function () {

            $('#retail_wrapper').css({'z-index': '100'});
            $('.wholesale_title').css({'z-index': '201'});
            $('#wholesale_1').css({'z-index': '200'});
            $('#wholesale_2').css({'z-index': '100'});
            $('#wholesale_3').css({'z-index': '100'});
            $('.retail_li_level_1').children('div').removeClass('retail_div_level_1_show').addClass('retail_div_level_1_hide');
            $('.wholesale_col_2_li_level_1').children('div').removeClass('wholesale_col_2_div_level_1_show').addClass('wholesale_col_2_div_level_1_hide');
            $('.wholesale_col_3_li_level_1').children('div').removeClass('wholesale_col_3_div_level_1_show').addClass('wholesale_col_3_div_level_1_hide');
            if ($(this).children('div').hasClass('wholesale_col_1_div_level_1_hide')) {
                $('.wholesale_col_1_li_level_1').children('div').removeClass('wholesale_col_1_div_level_1_show').addClass('wholesale_col_1_div_level_1_hide');

                let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
                console.log(top);
                $(this).children('div').removeClass('wholesale_col_1_div_level_1_hide').addClass('wholesale_col_1_div_level_1_show').height($('.wholesale_col_1_top_ul').innerHeight()).css({'top': top});
                $('.overlay').show();
            } else {
                $('.wholesale_col_1_li_level_1').children('div').removeClass('wholesale_col_1_div_level_1_show').addClass('wholesale_col_1_div_level_1_hide');
                $('.overlay').hide();
            }

        });


        $(document).on('mouseover', '.wholesale_col_1_li_level_2', function () {
            $('.wholesale_col_1_li_level_2').children('div').removeClass('wholesale_col_1_div_level_2_show').addClass('wholesale_col_1_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('wholesale_col_1_div_level_2_show').height($('.wholesale_col_1_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
            }
        });

        $(document).on('click', '.wholesale_col_1_li_level_2', function () {
            $('.wholesale_col_1_li_level_2').children('div').removeClass('wholesale_col_1_div_level_2_show').addClass('wholesale_col_1_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('wholesale_col_1_div_level_2_show').height($('.wholesale_col_1_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
                return false;
            } else {
                location = $(this).children('a').attr('href');
            }
        });

        $(document).on('mouseout', '.wholesale_col_1_li_level_2', function () {
            $(this).children('div').removeClass('wholesale_col_1_div_level_2_show').addClass('wholesale_col_1_div_level_2_hide');
            $(this).parent().parent().css({'border-top-right-radius': '5px', 'border-bottom-right-radius': '5px'});
        });


        $(document).on('click', '.wholesale_col_1_li_level_3', function () {
            location = $(this).children('a').attr('href');
        });

        $(document).on('click', '.wholesale_col_2_li_level_1', function () {
            $('#retail_wrapper').css({'z-index': '100'});
            $('.wholesale_title').css({'z-index': '201'});
            $('#wholesale_1').css({'z-index': '100'});
            $('#wholesale_2').css({'z-index': '200'});
            $('#wholesale_3').css({'z-index': '100'});
            $('.retail_li_level_1').children('div').removeClass('retail_div_level_1_show').addClass('retail_div_level_1_hide');
            $('.wholesale_col_1_li_level_1').children('div').removeClass('wholesale_col_1_div_level_1_show').addClass('wholesale_col_1_div_level_1_hide');
            $('.wholesale_col_3_li_level_1').children('div').removeClass('wholesale_col_3_div_level_1_show').addClass('wholesale_col_3_div_level_1_hide');
            if ($(this).children('div').hasClass('wholesale_col_2_div_level_1_hide')) {
                $('.wholesale_col_2_li_level_1').children('div').removeClass('wholesale_col_2_div_level_1_show').addClass('wholesale_col_2_div_level_1_hide');
                let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
                $(this).children('div').removeClass('wholesale_col_2_div_level_1_hide').addClass('wholesale_col_2_div_level_1_show').height($('.wholesale_col_2_top_ul').innerHeight()).css({'top': top});
                $('.overlay').show();
            } else {
                $('.wholesale_col_2_li_level_1').children('div').removeClass('wholesale_col_2_div_level_1_show').addClass('wholesale_col_2_div_level_1_hide');
                $('.overlay').hide();
            }

        });

        $(document).on('mouseover', '.wholesale_col_2_li_level_2', function () {
            $('.wholesale_col_2_li_level_2').children('div').removeClass('wholesale_col_2_div_level_2_show').addClass('wholesale_col_2_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('wholesale_col_2_div_level_2_show').height($('.wholesale_col_2_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
            }
        });

        $(document).on('click', '.wholesale_col_2_li_level_2', function () {
            $('.wholesale_col_2_li_level_2').children('div').removeClass('wholesale_col_2_div_level_2_show').addClass('wholesale_col_2_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('wholesale_col_2_div_level_2_show').height($('.wholesale_col_2_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
                return false;
            } else {
                location = $(this).children('a').attr('href');
            }
        });

        $(document).on('mouseout', '.wholesale_col_2_li_level_2', function () {
            $(this).children('div').removeClass('wholesale_col_2_div_level_2_show').addClass('wholesale_col_2_div_level_2_hide');
            $(this).parent().parent().css({'border-top-right-radius': '5px', 'border-bottom-right-radius': '5px'});
        });

        $(document).on('click', '.wholesale_col_2_li_level_3', function () {
            location = $(this).children('a').attr('href');
        });



        $(document).on('click', '.wholesale_col_3_li_level_1', function () {
            $('#retail_wrapper').css({'z-index': '100'});
            $('.wholesale_title').css({'z-index': '201'});
            $('#wholesale_1').css({'z-index': '100'});
            $('#wholesale_2').css({'z-index': '100'});
            $('#wholesale_3').css({'z-index': '200'});
            $('.retail_li_level_1').children('div').removeClass('retail_div_level_1_show').addClass('retail_div_level_1_hide');
            $('.wholesale_col_1_li_level_1').children('div').removeClass('wholesale_col_1_div_level_1_show').addClass('wholesale_col_1_div_level_1_hide');
            $('.wholesale_col_2_li_level_1').children('div').removeClass('wholesale_col_2_div_level_1_show').addClass('wholesale_col_2_div_level_1_hide');
            if ($(this).children('div').hasClass('wholesale_col_3_div_level_1_hide')) {
                $('.wholesale_col_3_li_level_1').children('div').removeClass('wholesale_col_3_div_level_1_show').addClass('wholesale_col_3_div_level_1_hide');
                let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
                $(this).children('div').removeClass('wholesale_col_3_div_level_1_hide').addClass('wholesale_col_3_div_level_1_show').height($('.wholesale_col_3_top_ul').innerHeight()).css({'top': top});
                $('.overlay').show();
            } else {
                $('.wholesale_col_3_li_level_1').children('div').removeClass('wholesale_col_3_div_level_1_show').addClass('wholesale_col_3_div_level_1_hide');
                $('.overlay').hide();
            }

        });


        $(document).on('mouseover', '.wholesale_col_3_li_level_2', function () {
            $('.wholesale_col_3_li_level_2').children('div').removeClass('wholesale_col_3_div_level_2_show').addClass('wholesale_col_3_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('wholesale_col_3_div_level_2_show').height($('.wholesale_col_3_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
            }
        });

        $(document).on('click', '.wholesale_col_3_li_level_2', function () {
            $('.wholesale_col_3_li_level_2').children('div').removeClass('wholesale_col_3_div_level_2_show').addClass('wholesale_col_3_div_level_2_hide');
            let top = $(this).prevAll().length === 0 ? 0 : (parseFloat($(this).prevAll().innerHeight()) * $(this).prevAll().length * -1)  - $(this).prevAll().length;
            $(this).children('div').addClass('wholesale_col_3_div_level_2_show').height($('.wholesale_col_3_top_ul').height()).css({'top': top});
            if ($(this).has('div').length) {
                $(this).parent().parent().css({'border-top-right-radius': '0', 'border-bottom-right-radius': '0'});
                return false;
            } else {
                location = $(this).children('a').attr('href');
            }
        });

        $(document).on('mouseout', '.wholesale_col_3_li_level_2', function () {
            $(this).children('div').removeClass('wholesale_col_3_div_level_2_show').addClass('wholesale_col_3_div_level_2_hide');
            $(this).parent().parent().css({'border-top-right-radius': '5px', 'border-bottom-right-radius': '5px'});
        });


        $(document).on('click', '.wholesale_col_3_li_level_3', function () {
            location = $(this).children('a').attr('href');
        });



        $.ajax({
            method: 'get',
            url: '{{ url('get/category/types') }}',
            cache: false,
            success: function (result) {
                console.log(result);
                $('#retail').empty();
                $('#wholesale').empty();

                let screenWidth = $(window).width();

                let retailRootCategories = [];
                let retailChildCategories = [];


                let wholesaleRootCategories = [];
                let wholesaleChildCategories = [];


                $.each(result, function (typeKey, categoryType) {
                    console.log(categoryType.category_type)
                    if (categoryType.category_type === 'Retail') {
                        $.each(categoryType.categories, function (categoryKey, category) {
                            if (parseInt(category.root_id) === 0) {
                                retailRootCategories.push(category);
                            } else {
                                retailChildCategories.push(category);
                            }
                        });

                        retailRootCategories.sort(function (a, b) {
                            return parseFloat(a.sequence) - parseFloat(b.sequence);
                        });
                        retailChildCategories.sort(function (a, b) {
                            return parseFloat(a.sequence) - parseFloat(b.sequence);
                        });


                        if (parseFloat(screenWidth) < 1200) {
                            $('#retail').append('<ul id="category_type_id_' + categoryType.id + '" class="nav flex-column flex-nowrap overflow-hidden"></ul>');
                            let categoryTitle;
                            $.each(retailRootCategories, function (retailRootKey, retailRootObj) {
                                categoryTitle = retailRootObj.category;
                                if (retailChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(retailRootObj.id); })) {
                                    $('#category_type_id_' + retailRootObj.category_type_id).append(
                                        '<li class="nav-item retail_top_li">' +
                                        '<a href="#nav_id_' + retailRootObj.id + '" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav_id_' + retailRootObj.id + '" class="nav-link collapsed text-truncate">' +
                                        '<span>' + categoryTitle + '</span><span class="area_expanded_indicator">[+]</span>' +
                                        '</a>' +
                                        '<div class="collapse retail_child_element_container" id="nav_id_' + retailRootObj.id + '">' +
                                        '<ul id="category_id_' + retailRootObj.id + '" class="flex-column pl-4 nav"></ul>' +
                                        '</div>' +
                                        '</li>'
                                    );
                                    $('.nav-link').on('click', function () {
                                        if ($(this).hasClass('collapsed')) {
                                            $(this).find('.area_expanded_indicator').text('[-]');
                                        } else {
                                            $(this).find('.area_expanded_indicator').text('[+]');
                                        }

                                    });
                                } else {
                                    let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(retailRootObj.id)))));
                                    $('#category_type_id_' + retailRootObj.category_type_id).append('<li class="nav-item retail_top_li"><a href="' + url + '" class="nav-link text-truncate"><span>' + categoryTitle + '</span></a></li>');
                                }
                            });
                        } else {
                            $('#retail').append('<ul class="retail_top_ul"></ul>');
                            let categoryTitle;

                            let categoryIcon;
                            let categoryIconSource;
                            $.each(retailRootCategories, function (retailRootKey, retailRootObj) {
                                categoryTitle = retailRootObj.category;
                                categoryIconSource = '{{ asset('storage') }}/' + retailRootObj.icon;
                                categoryIcon = retailRootObj.icon === null ? '' : '<img src="' + categoryIconSource + '" alt="' + retailRootObj.category + '">';
                                if (retailChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(retailRootObj.id); })) {
                                    $('.retail_top_ul').append('<li class="retail_li_level_' + retailRootObj.level + '">' + categoryIcon + '<a href="javascript:void(0)">' + categoryTitle + '</a><svg height="10" width="7" style="position: absolute; top: 7px; right: 5px;"><line x1="0" y1="0" x2="5" y2="5" style="stroke:rgb(51,51,51);stroke-width:1;"/><line x1="5" y1="5" x2="0" y2="10" style="stroke:rgb(51,51,51);stroke-width:1;"/></svg><div class="retail_div_level_' + retailRootObj.level + ' retail_div_level_' + retailRootObj.level + '_hide"><ul id="category_id_' + retailRootObj.id + '" class="retail_ul_level_' + retailRootObj.level + '"></ul></div></li>');
                                } else {

                                    let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(retailRootObj.id)))));
                                    $('.retail_top_ul').append('<li class="retail_li_level_' + retailRootObj.level + '">' + categoryIcon + '<a href="' + url + '">' + categoryTitle + '</a></li>');
                                }
                            });
                        }

                        loadRetailChildCategories(retailChildCategories);

                    }
                    if (categoryType.category_type === 'Wholesale') {
                        $.each(categoryType.categories, function (categoryKey, category) {
                            if (parseInt(category.root_id) === 0) {
                                wholesaleRootCategories.push(category);
                            } else {
                                wholesaleChildCategories.push(category);
                            }
                        });

                        wholesaleRootCategories.sort(function (a, b) {
                            return parseFloat(a.sequence) - parseFloat(b.sequence);
                        });
                        wholesaleChildCategories.sort(function (a, b) {
                            return parseFloat(a.sequence) - parseFloat(b.sequence);
                        });

                        let i = 0;
                        $('#wholesale').append('<div class="row"><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4" id="wholesale_1"></div><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4" id="wholesale_2"></div><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4" id="wholesale_3"></div></div>');

                        let categoryTitle;
                        $.each(wholesaleRootCategories, function (wholesaleRootKey, wholesaleRootObj) {
                            categoryTitle = wholesaleRootObj.category;

                            if (screenWidth < 1200) {
                                if (i < 15) {
                                    if (i === 0) {
                                        $('#wholesale_1').append('<ul id="wholesale_category_type_id_1" class="nav flex-column flex-nowrap overflow-hidden"></ul>');
                                    }

                                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleRootObj.id); })) {
                                        $('#wholesale_category_type_id_1').append(
                                            '<li class="nav-item wholesale_top_li">' +
                                            '<a href="#nav_id_' + wholesaleRootObj.id + '" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav_id_' + wholesaleRootObj.id + '" class="nav-link collapsed text-truncate">' +
                                            '<span>' + categoryTitle + '</span><span class="area_expanded_indicator">[+]</span>' +
                                            '</a>' +
                                            '<div class="collapse wholesale_child_element_container" id="nav_id_' + wholesaleRootObj.id + '">' +
                                            '<ul id="category_id_' + wholesaleRootObj.id + '" class="flex-column pl-2 nav"></ul>' +
                                            '</div>' +
                                            '</li>'
                                        );
                                        $('.nav-link').on('click', function () {
                                            if ($(this).hasClass('collapsed')) {
                                                $(this).find('.area_expanded_indicator').text('[-]');
                                            } else {
                                                $(this).find('.area_expanded_indicator').text('[+]');
                                            }
                                        });
                                    } else {
                                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleRootObj.id)))));
                                        $('#wholesale_category_type_id_1').append('<li class="nav-item wholesale_top_li"><a href="' + url + '" class="nav-link text-truncate"><span>' + categoryTitle + '</span></a></li>');
                                    }
                                } else if (i < 29) {
                                    if (i === 15) {
                                        $('#wholesale_2').append('<ul id="wholesale_category_type_id_2" class="nav flex-column flex-nowrap overflow-hidden"></ul>');
                                    }

                                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleRootObj.id); })) {
                                        $('#wholesale_category_type_id_2').append(
                                            '<li class="nav-item wholesale_top_li">' +
                                            '<a href="#nav_id_' + wholesaleRootObj.id + '" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav_id_' + wholesaleRootObj.id + '" class="nav-link collapsed text-truncate">' +
                                            '<span>' + categoryTitle + '</span><span class="area_expanded_indicator">[+]</span>' +
                                            '</a>' +
                                            '<div class="collapse wholesale_child_element_container" id="nav_id_' + wholesaleRootObj.id + '">' +
                                            '<ul id="category_id_' + wholesaleRootObj.id + '" class="flex-column pl-2 nav"></ul>' +
                                            '</div>' +
                                            '</li>'
                                        );
                                        $('.nav-link').on('click', function () {
                                            if ($(this).hasClass('collapsed')) {
                                                $(this).find('.area_expanded_indicator').text('[-]');
                                            } else {
                                                $(this).find('.area_expanded_indicator').text('[+]');
                                            }
                                        });
                                    } else {
                                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleRootObj.id)))));
                                        $('#wholesale_category_type_id_2').append('<li class="nav-item wholesale_top_li"><a href="' + url + '" class="nav-link text-truncate"><span>' + categoryTitle + '</span></a></li>');
                                    }
                                } else if (i >= 29) {
                                    if (i === 29) {
                                        $('#wholesale_3').append('<ul id="wholesale_category_type_id_3" class="nav flex-column flex-nowrap overflow-hidden"></ul>');
                                    }

                                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleRootObj.id); })) {
                                        $('#wholesale_category_type_id_3').append(
                                            '<li class="nav-item wholesale_top_li">' +
                                            '<a href="#nav_id_' + wholesaleRootObj.id + '" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav_id_' + wholesaleRootObj.id + '" class="nav-link collapsed text-truncate">' +
                                            '<span>' + categoryTitle + '</span><span class="area_expanded_indicator">[+]</span>' +
                                            '</a>' +
                                            '<div class="collapse wholesale_child_element_container" id="nav_id_' + wholesaleRootObj.id + '">' +
                                            '<ul id="category_id_' + wholesaleRootObj.id + '" class="flex-column pl-2 nav"></ul>' +
                                            '</div>' +
                                            '</li>'
                                        );
                                        $('.nav-link').on('click', function () {
                                            if ($(this).hasClass('collapsed')) {
                                                $(this).find('.area_expanded_indicator').text('[-]');
                                            } else {
                                                $(this).find('.area_expanded_indicator').text('[+]');
                                            }
                                        });
                                    } else {
                                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleRootObj.id)))));
                                        $('#wholesale_category_type_id_3').append('<li class="nav-item wholesale_top_li"><a href="' + url + '" class="nav-link text-truncate"><span>' + categoryTitle + '</span></a></li>');
                                    }
                                }
                            } else {




                                if (i < 15) {
                                    if (i === 0) {
                                        $('#wholesale_1').append('<ul id="wholesale_category_type_id_1" class="wholesale_col_1_top_ul"></ul>');
                                    }

                                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleRootObj.id); })) {
                                        $('#wholesale_category_type_id_1').append('<li class="wholesale_col_1_li_level_' + wholesaleRootObj.level + '"><a href="javascript:void(0)">' + categoryTitle + '</a><svg height="10" width="7" style="position: absolute; top: 14px; right: 5px;"><line x1="0" y1="0" x2="5" y2="5" style="stroke:rgb(51,51,51);stroke-width:1;"/><line x1="5" y1="5" x2="0" y2="10" style="stroke:rgb(51,51,51);stroke-width:1;"/></svg><div class="wholesale_col_1_div_level_' + wholesaleRootObj.level + ' wholesale_col_1_div_level_' + wholesaleRootObj.level + '_hide"><ul id="category_id_' + wholesaleRootObj.id + '" class="wholesale_col_1_ul_level_' + wholesaleRootObj.level + '"></ul></div></li>');
                                    } else {
                                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleRootObj.id)))));
                                        $('#wholesale_category_type_id_1').append('<li class="wholesale_col_1_li_level_' + wholesaleRootObj.level + '"><a href="' + url + '">' + categoryTitle + '</a></li>');
                                    }
                                } else if (i < 29) {
                                    if (i === 15) {
                                        $('#wholesale_2').append('<ul id="wholesale_category_type_id_2" class="wholesale_col_2_top_ul"></ul>');
                                    }

                                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleRootObj.id); })) {
                                        $('#wholesale_category_type_id_2').append('<li class="wholesale_col_2_li_level_' + wholesaleRootObj.level + '"><a href="javascript:void(0)">' + categoryTitle + '</a><svg height="10" width="7" style="position: absolute; top: 14px; right: 5px;"><line x1="0" y1="0" x2="5" y2="5" style="stroke:rgb(51,51,51);stroke-width:1;"/><line x1="5" y1="5" x2="0" y2="10" style="stroke:rgb(51,51,51);stroke-width:1;"/></svg><div class="wholesale_col_2_div_level_' + wholesaleRootObj.level + ' wholesale_col_2_div_level_' + wholesaleRootObj.level + '_hide"><ul id="category_id_' + wholesaleRootObj.id + '" class="wholesale_col_2_ul_level_' + wholesaleRootObj.level + '"></ul></div></li>');
                                    } else {
                                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleRootObj.id)))));
                                        $('#wholesale_category_type_id_2').append('<li class="wholesale_col_2_li_level_' + wholesaleRootObj.level + '"><a href="' + url + '">' + categoryTitle + '</a></li>');
                                    }
                                } else if (i >= 29) {
                                    if (i === 29) {
                                        $('#wholesale_3').append('<ul id="wholesale_category_type_id_3" class="wholesale_col_3_top_ul"></ul>');
                                    }

                                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleRootObj.id); })) {
                                        $('#wholesale_category_type_id_3').append('<li class="wholesale_col_3_li_level_' + wholesaleRootObj.level + '"><a href="javascript:void(0)">' + categoryTitle + '</a><svg height="10" width="7" style="position: absolute; top: 14px; right: 5px;"><line x1="0" y1="0" x2="5" y2="5" style="stroke:rgb(51,51,51);stroke-width:1;"/><line x1="5" y1="5" x2="0" y2="10" style="stroke:rgb(51,51,51);stroke-width:1;"/></svg><div class="wholesale_col_3_div_level_' + wholesaleRootObj.level + ' wholesale_col_3_div_level_' + wholesaleRootObj.level + '_hide"><ul id="category_id_' + wholesaleRootObj.id + '" class="wholesale_col_3_ul_level_' + wholesaleRootObj.level + '"></ul></div></li>');
                                    } else {
                                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleRootObj.id)))));
                                        $('#wholesale_category_type_id_3').append('<li class="wholesale_col_3_li_level_' + wholesaleRootObj.level + '"><a href="' + url + '">' + categoryTitle + '</a></li>');
                                    }
                                }


                            }



                            i++;
                        });
                        loadWholesaleChildCategories(wholesaleChildCategories);
                    }
                });
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });


        function loadRetailChildCategories(retailChildCategories) {
            let screenWidth = $(window).width();
            let categoryTitle;
            if (screenWidth < 1200) {
                $.each(retailChildCategories, function (retailChildKey, retailChildObj) {
                    categoryTitle = retailChildObj.category;
                    if (retailChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(retailChildObj.id); })) {
                        $('#category_id_' + retailChildObj.root_id).append(
                            '<li class="nav-item">' +
                            '<a href="#nav_id_' + retailChildObj.id + '" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav_id_' + retailChildObj.id + '" class="nav-link collapsed py-1">' +
                            '<span>' + categoryTitle + '</span><span class="area_expanded_indicator">[+]</span>' +
                            '</a>' +
                            '<div class="collapse" style="border-bottom: 1px solid #f0f0f0;" id="nav_id_' + retailChildObj.id + '">' +
                            '<ul id="category_id_' + retailChildObj.id + '" class="flex-column nav pl-4"></ul>' +
                            '</div>' +
                            '</li>'
                        );
                        $('.nav-link').on('click', function () {
                            if ($(this).hasClass('collapsed')) {
                                $(this).find('.area_expanded_indicator').text('[-]');
                            } else {
                                $(this).find('.area_expanded_indicator').text('[+]');
                            }
                        });
                    } else {
                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(retailChildObj.id)))));
                        $('#category_id_' + retailChildObj.root_id).append('<li class="nav-item"><a href="' + url + '" class="nav-link"><span>' + categoryTitle + '</span></a></li>');
                    }
                });
            } else {
                $.each(retailChildCategories, function (retailChildKey, retailChildObj) {
                    categoryTitle = retailChildObj.category;
                    if (retailChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(retailChildObj.id); })) {
                        $('#category_id_' + retailChildObj.root_id).append('<li class="retail_li_level_' + retailChildObj.level + '"><a href="javascript:void(0)">' + categoryTitle + '</a><svg height="10" width="7" style="position: absolute; top: 7px; right: 5px;"><line x1="0" y1="0" x2="5" y2="5" style="stroke:rgb(51,51,51);stroke-width:1;"/><line x1="5" y1="5" x2="0" y2="10" style="stroke:rgb(51,51,51);stroke-width:1;"/></svg><div class="retail_div_level_' + retailChildObj.level + ' retail_div_level_' + retailChildObj.level + '_hide"><ul id="category_id_' + retailChildObj.id + '" class="retail_ul_level_' + retailChildObj.level + '"></ul></div></li>');
                    } else {
                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(retailChildObj.id)))));
                        $('#category_id_' + retailChildObj.root_id).append('<li class="retail_li_level_' + retailChildObj.level + '"><a href="' + url + '">' + categoryTitle + '</a></li>');
                    }

                });
            }


        }

        function loadWholesaleChildCategories(wholesaleChildCategories) {
            let screenWidth = $(window).width();
            let categoryTitle;
            if (screenWidth < 1200) {
                $.each(wholesaleChildCategories, function (wholesaleChildKey, wholesaleChildObj) {
                    categoryTitle = wholesaleChildObj.category;
                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleChildObj.id); })) {
                        $('#category_id_' + wholesaleChildObj.root_id).append(
                            '<li class="nav-item">' +
                            '<a href="#nav_id_' + wholesaleChildObj.id + '" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav_id_' + wholesaleChildObj.id + '" class="nav-link collapsed py-1">' +
                            '<span>' + categoryTitle + '</span><span class="area_expanded_indicator">[+]</span>' +
                            '</a>' +
                            '<div class="collapse" id="nav_id_' + wholesaleChildObj.id + '" aria-expanded="false" style="border-bottom: 1px solid #f0f0f0;">' +
                            '<ul id="category_id_' + wholesaleChildObj.id + '" class="flex-column nav pl-4"></ul>' +
                            '</div>' +
                            '</li>'
                        );
                        $('.nav-link').on('click', function () {
                            if ($(this).hasClass('collapsed')) {
                                $(this).find('.area_expanded_indicator').text('[-]');
                            } else {
                                $(this).find('.area_expanded_indicator').text('[+]');
                            }
                        });
                    } else {
                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleChildObj.id)))));
                        $('#category_id_' + wholesaleChildObj.root_id).append('<li class="nav-item"><a href="' + url + '" class="nav-link"><span>' + categoryTitle + '</span></a></li>');
                    }
                });
            } else {
                $.each(wholesaleChildCategories, function (wholesaleChildKey, wholesaleChildObj) {
                    categoryTitle = wholesaleChildObj.category;
                    let columnIdentity = $('#category_id_' + wholesaleChildObj.root_id).attr('class').split('_')[2];
                    if (wholesaleChildCategories.some(function (obj) { return parseInt(obj['root_id']) === parseInt(wholesaleChildObj.id); })) {
                        $('#category_id_' + wholesaleChildObj.root_id).append('<li class="wholesale_col_' + columnIdentity + '_li_level_' + wholesaleChildObj.level + '"><a href="javascript:void(0)">' + categoryTitle + '</a><svg height="10" width="7" style="position: absolute; top: 14px; right: 5px;"><line x1="0" y1="0" x2="5" y2="5" style="stroke:rgb(51,51,51);stroke-width:1;"/><line x1="5" y1="5" x2="0" y2="10" style="stroke:rgb(51,51,51);stroke-width:1;"/></svg><div class="wholesale_col_' + columnIdentity + '_div_level_' + wholesaleChildObj.level + ' wholesale_col_' + columnIdentity + '_div_level_' + wholesaleChildObj.level + '_hide"><ul id="category_id_' + wholesaleChildObj.id + '" class="wholesale_col_' + columnIdentity + '_ul_level_' + wholesaleChildObj.level + '"></ul></div></li>');
                    } else {
                        let url = '{{ url('category') }}/' + btoa(btoa(btoa(btoa(btoa(wholesaleChildObj.id)))));
                        $('#category_id_' + wholesaleChildObj.root_id).append('<li class="wholesale_col_' + columnIdentity + '_li_level_' + wholesaleChildObj.level + '"><a href="' + url + '">' + categoryTitle + '</a></li>');
                    }
                });
            }


        }
    </script>


@endsection
