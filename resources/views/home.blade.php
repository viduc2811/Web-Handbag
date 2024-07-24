@extends('main')
@section('content')
@php
use App\Models\Product;
use Carbon\Carbon;
$fiveDaysAgo = Carbon::now()->subDays(15);
$newProducts = Product::where('created_at', '>=', $fiveDaysAgo)->paginate(16);
@endphp


<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">

            @foreach($sliders as $slider)
            <a href="{{ $slider->url }}">
                <div class="item-slick1" style="background-image: url({{ $slider->thumb }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    {{ $slider->name }}
                                </h2>
                            </div>


                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- New Product -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Sản phẩm mới nhất
            </h3>
        </div>
        <div class="row">
            @foreach($newProducts as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{ $product->thumb }}" alt="{{ $product->product_name }}">
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/{{ $product->product_id }}-{{ Str::slug($product->product_name, '-') }}.html"
                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $product->product_name }}
                            </a>

                            <span class="stext-105 cl3">
                                {!! \App\Helpers\Helper::price($product->product_price, $product->price_sale) !!}
                            </span>
                            <span class="stext-105 cl3">
                                @if ($product->product_quantity != 0)

                                @else
                                <p style="color:red;">Hết hàng</p>
                                @endif
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer clearfix">
            {!! $newProducts->links('pagination') !!}
        </div>
    </div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Sản phẩm
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </button>
            </div>
        </div>

        <div id="loadProduct">
            @include('products.list')
        </div>


        <!-- Load more -->
        <div class="card-footer clearfix">
            {!! $newProducts->links('pagination') !!}
        </div>
    </div>

    <!-- Cart -->
    @endsection