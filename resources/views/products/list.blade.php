<div class="row isotope-grid">
    @foreach($products as $key => $product)
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
							{!!  \App\Helpers\Helper::price($product->product_price, $product->price_sale)  !!}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
