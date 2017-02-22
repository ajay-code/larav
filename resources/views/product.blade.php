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
                                    <div id="slider" class="flexslider">
                                      <ul class="slides">
                                        <li>
                                          <img src="{{ $product->getPrimaryPhoto()->thumbnailUrl() }}" />
                                        </li>
                                        @if ($product->getSecondaryPhotos())
                                                @foreach($product->getSecondaryPhotos() as $photo)
                                                    <li>
                                                        <img src="{{$photo->thumbnailUrl()}}" alt="">
                                                    </li>
                                                @endforeach
                                        @endif
                                        <!-- items mirrored twice, total of 12 -->
                                      </ul>
                                    </div>
                                    <div id="carousel" class="flexslider">
                                      <ul class="slides">
                                        <li>
                                          <img src="{{ $product->getPrimaryPhoto()->thumbnailUrl() }}" />
                                        </li>
                                        @if ($product->getSecondaryPhotos())
                                                @foreach($product->getSecondaryPhotos() as $photo)
                                                    <li>
                                                        <img src="{{$photo->thumbnailUrl()}}" alt="">
                                                    </li>
                                                @endforeach
                                        @endif
                                      
                                        <!-- items mirrored twice, total of 12 -->
                                      </ul>
                                    </div>
                            

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                
                                <div class="wish-tags" style="margin-bottom: 20px;">
                                    @if (!$product->tagged->isEmpty())
                                        @foreach($product->tags as $tag)
                                            <div class="wish-tag">{{ $tag['name'] }}</div>
                                        @endforeach
                                    @endif
                                    @if(Auth::check())
                                        @if(Auth::user()->id !== $product->user->id)
                                        <span class="pull-right add-to-my-wish margin-0">
                                            <add-to-wishlist product-id="{{ $product->id }}"></add-to-wishlist>
                                        </span>
                                        @endif
                                    @endif
                                </div>
                                <h2>{{ $product->title }}</h2>

                                <p>{{ nl2br($product->description) }} </p>

                                <p><b>Category:</b>{{ $product->subcategory->name }}</p>

                                <p><b>Bids:</b> Open</p>

                                <span>
									<span>US ${{ $product->budget }}</span>
								</span>
                                <p>By: {{ $product->user->name }}</p>

                                @if(Auth::check())
                                    @if(Auth::user()->id !== $product->user->id)
                                        @if(! $product->madeBid(Auth::user()))
                                            <bid-form slug="{{ $product->slug }}" ></bid-form>
                                        @endif
                                    @endif
                                @endif

                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->


                </div>
            </div>
        </div>
    </section>
@endsection
