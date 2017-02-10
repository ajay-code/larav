@extends('layouts.main')
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('partials.sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ $product->getPrimaryPhoto()->thumbnailUrl() }}" alt=""/>
                                <h3>ZOOM</h3>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img src="{{ getStorageUrl('images/product-details/similar1.jpg') }}"
                                                        alt=""></a>
                                        <a href=""><img src="{{ getStorageUrl('images/product-details/similar2.jpg') }}"
                                                        alt=""></a>
                                        <a href=""><img src="{{ getStorageUrl('images/product-details/similar3.jpg') }}"
                                                        alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="{{ getStorageUrl('images/product-details/similar1.jpg') }}"
                                                        alt=""></a>
                                        <a href=""><img src="{{ getStorageUrl('images/product-details/similar2.jpg') }}"
                                                        alt=""></a>
                                        <a href=""><img src="{{ getStorageUrl('images/product-details/similar3.jpg') }}"
                                                        alt=""></a>
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <h2>{{ $product->title }}</h2>
                                <span>
									<span>US ${{ $product->budget }}</span>
                                    @if(Auth::check())
                                        <add-to-wishlist product-id="{{ $product->id }}"></add-to-wishlist>

                                    @endif
								</span>
                                <p><b>Status:</b> Open</p>
                                <p><b>Description:</b> {{ nl2br($product->description) }} </p>
                                <p><b>Brand:</b>{{ config('app.name') }}</p>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->


                </div>
            </div>
        </div>
    </section>
@endsection
