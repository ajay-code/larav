@extends('layouts.main')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="row">
                        <h3 class="add-wish-head">Your wishlist...</h3>
                    </div>
                    @foreach($products as $product)
                        {{--Start Of Wish--}}
                        <div class="row wish-row">
                            <div class="wishlist-images col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                                <div class="primary-image-show">

                                    @if($photo = $product->getPrimaryPhoto())
                                        <img src="{{$photo->thumbnailUrl()}}" alt="">
                                    @endif

                                </div>

                                @if ($product->getSecondaryPhotos())
                                    <div class="secondary-wish-images">
                                        @foreach($product->getSecondaryPhotos() as $photo)
                                            <div class="wish-image">
                                                <img src="{{$photo->thumbnailUrl()}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="wish-details col-sm-8 col-sm-offset-0  col-xs-10 col-xs-offset-1">
                                <div class="wish-tags">
                                    @if (!$product->tagged->isEmpty())
                                        @foreach($product->tags as $tag)
                                            <div class="wish-tag">{{ $tag['name'] }}</div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="wish-title">
                                    <h3>{{ $product->title }}.</h3>
                                </div>
                                <div class="wish-desc">
                                    {!! nl2br(Str::words($product->description, 20)) !!}
                                </div>
                                <div class="to-bottom">
                                    <div class="wish-category">
                                        <p><span>Category:</span> {{ $product->subcategory->name }}</p>
                                    </div>
                                    <div class="wish-budget">
                                        <i class="fa fa-money"></i><span> {{ $product->budget }} </span>
                                    </div>
                                    <div class="wish-timings">
                                        <span><i class="fa fa-clock-o"></i> {{ $product->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--End Of Wish--}}
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
