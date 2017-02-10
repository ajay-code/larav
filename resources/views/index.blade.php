@extends('layouts.main')
@section('content')

    @include('partials.slider')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('partials.sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Latest Items</h2>

                        @foreach($products->chunk(4) as $productSet)
                            @foreach($productSet as $product)
                                <div class="col-sm-3 col-sm-offset-0  col-xs-8 col-xs-offset-2">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{$product->getPrimaryPhoto()->thumbnailUrl()}}" alt=""/>
                                                <h2>${{ $product->budget }}</h2>
                                                <p>{{ Str::words($product->title, 5) }}</p>
                                                <a href="{{ url('/products/'.$product->slug) }}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>View More</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                        @endforeach


                    </div><!--features_items-->

                    <div class="category-tab visible-lg"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                @foreach($categories as $category)
                                    <li class="@if($loop->first){{ 'active' }} @endif"><a
                                                href="#category{{ $category->id }}"
                                                data-toggle="tab">{{ Str::words($category->name, 2, '') }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content ">
                            @foreach($categories as $category)
                                <div class="tab-pane fade @if($loop->first){{ 'active' }} @endif in"
                                     id="category{{ $category->id }}">
                                    @foreach($category->products4->chunk(4) as $productSet)

                                        @foreach($productSet as $product)
                                            <div class="col-sm-3 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{$product->getPrimaryPhoto()->thumbnailUrl()}}"
                                                                 alt=""/>
                                                            <h2>${{ $product->budget }}</h2>
                                                            <p>{{ Str::words($product->title, 3, '') }}</p>
                                                            <a href="{{ url('/products/'.$product->slug) }}" class="btn btn-default add-to-cart"><i
                                                                        class="fa fa-shopping-cart"></i>View More</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @break
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide hidden-xs" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend1.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend2.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend3.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend1.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend2.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend3.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                        {{--Display For mobile--}}

                        <div id="mobile-recommended-item-carousel" class="carousel slide hidden-sm hidden-md hidden-lg"
                             data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend1.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">

                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend2.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">

                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{getStorageUrl('images/home/recommend3.jpg')}}"
                                                         alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>View more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a class="left recommended-item-control" href="#mobile-recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#mobile-recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
