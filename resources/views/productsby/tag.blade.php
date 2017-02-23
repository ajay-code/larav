@extends('layouts.main')
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('partials.sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">#{{ $tag }}</h2>

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
                                                        <span class="by-user pull-right"> 
                                                            <i class="fa fa-user-circle"></i> {{ $product->user->name }}
                                                        </span>            
                                                    </p>
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
                        {{ $products->links() }}
                    </div><!--features_items-->


                </div>
            </div>
        </div>
    </section>
@endsection
