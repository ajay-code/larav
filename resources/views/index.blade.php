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
                                                <div class="productinfo">
                                                    <a href="{{ url('/products/'.$product->slug) }}">
                                                        <img src="{{$product->getPrimaryPhoto()->thumbnailUrl()}}" alt=""/>
                                                    </a>
                                                    <p>
                                                    <a class="product-title" href="{{ url('/products/'.$product->slug) }}">
                                                        {{ Str::words($product->title) }}
                                                    </a>   
                                                    </p>
                                                    <p>
                                                        <span class="buyagoo-color">Budget</span>  
                                                        <span class="budget"> ${{ $product->budget }}</span>
                                                        

                                                    </p>
                                                    <p><span class="by-user "> 
                                                            <i class="fa fa-user-circle"></i> {{ $product->user->name }}
                                                        </span> </p>
                                                    <p class="see-more"> <a href="{{ url('/category/'.$product->subcategory->category->slug) }}">See more in this category 
                                                        <i class="fa fa-chevron-right right-arrow"></i> 
                                                    </a></p>
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
                                            <div class="col-sm-3 col-sm-offset-0  col-xs-8 col-xs-offset-2">
                                
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <a href="{{ url('/products/'.$product->slug) }}">
                                                        <img src="{{$product->getPrimaryPhoto()->thumbnailUrl()}}" alt=""/>
                                                    </a>
                                                    <p>
                                                    <a class="product-title" href="{{ url('/products/'.$product->slug) }}">
                                                        {{ Str::words($product->title) }}
                                                    </a>   
                                                    </p>
                                                    <p>
                                                        <span class="buyagoo-color">Budget</span>  
                                                        <span class="budget"> ${{ $product->budget }}</span>
                                                                    
                                                    </p>
                                                    <p><span class="by-user "> 
                                                            <i class="fa fa-user-circle"></i> {{ $product->user->name }}
                                                        </span> </p>
                                                    <p class="see-more"> <a href="{{ url('/category/'.$product->subcategory->category->slug) }}">See more in this category 
                                                        <i class="fa fa-chevron-right right-arrow"></i> 
                                                    </a></p>
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
                                @foreach($random->chunk(3) as $products)
                                    <div class="item {{ $loop->first ? 'active' : '' }}">
                                    @foreach($products as $product)
                                                <div class="col-sm-4 col-sm-offset-0  col-xs-8 col-xs-offset-2">
                                        
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo">
                                                            <a href="{{ url('/products/'.$product->slug) }}">
                                                                <img src="{{$product->getPrimaryPhoto()->thumbnailUrl()}}" alt=""/>
                                                            </a>
                                                            <p>
                                                            <a class="product-title" href="{{ url('/products/'.$product->slug) }}">
                                                                {{ Str::words($product->title) }}
                                                            </a>   
                                                            </p>
                                                            <p>
                                                                <span class="buyagoo-color">Budget</span>  
                                                                <span class="budget"> ${{ $product->budget }}</span>
                                                                

                                                            </p>
                                                            <p><span class="by-user "> 
                                                                    <i class="fa fa-user-circle"></i> {{ $product->user->name }}
                                                                </span> </p>
                                                            <p class="see-more"> <a href="{{ url('/category/'.$product->subcategory->category->slug) }}">See more in this category 
                                                                <i class="fa fa-chevron-right right-arrow"></i> 
                                                            </a></p>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    @endforeach
                                    </div>
                                @endforeach
                                    
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
                            @foreach($random as $product)
                                {{-- expr --}}
                                <div class="item {{ $loop->first ? 'active' : '' }}">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="{{ url('/products/'.$product->slug) }}">
                                                                    <img src="{{$product->getPrimaryPhoto()->thumbnailUrl()}}" alt=""/>
                                                    </a>
                                                    <a class="product-title" href="{{ url('/products/'.$product->slug) }}">
                                                                {{ Str::words($product->title) }}
                                                            </a>   
                                                            </p>
                                                            <p>
                                                                <span class="buyagoo-color">Budget</span>  
                                                                <span class="budget"> ${{ $product->budget }}</span>
                                                                

                                                            </p>
                                                            <p><span class="by-user "> 
                                                                    <i class="fa fa-user-circle"></i> {{ $product->user->name }}
                                                                </span> </p>
                                                            <p class="see-more"> <a href="{{ url('/category/'.$product->subcategory->category->slug) }}">See more in this category 
                                                                <i class="fa fa-chevron-right right-arrow"></i> 
                                                            </a></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
