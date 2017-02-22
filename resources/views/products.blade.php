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
                        <h2 class="title text-center">Products</h2>

                        @if($products->count() <= 0)
                            <div class="alert alert-danger" role="alert">
                              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                              <span class="sr-only">Error:</span>
                              No Product Found
                            </div>
                        @endif

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
                                                <p class="user-product">By <span>{{ $product->user->name }}</span></p>
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
