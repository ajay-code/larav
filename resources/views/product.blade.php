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
                    @if ($product)
                        
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
                                            <a href="{{ url('/tag/'.$tag->name) }}">
                                                <div class="wish-tag">{{ $tag['name'] }}</div>
                                            </a>
                                        @endforeach
                                    @endif

                                    @can('copy', $product)
                                        <span class="pull-right add-to-my-wish margin-0">
                                            <add-to-wishlist product-id="{{ $product->id }}"></add-to-wishlist>
                                        </span>
                                    @endcan

                                    @can('update', $product)
                                        <span class="pull-right add-to-my-wish margin-0">
                                            <a href="{{ url('/wish/'.$product->id.'/edit') }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </span>
                                    @endcan
                                </div>
                                <h2>{{ $product->title }}</h2>

                                <p>{{ nl2br($product->description) }} </p>

                                <p><b>Category:</b>{{ $product->subcategory->name }}</p>

                                <p><b>Total Bids:</b> {{ $product->bids->count() }} </p>

								<p><span class="budget">US ${{ $product->budget }}</span></p>
                                <p><i class="fa fa-user-circle orange"></i> {{ $product->user->name }}</p>

                                @can('bid', $product)
                                        @if(! $product->madeBid(Auth::user()))
                                            <bid-form slug="{{ $product->slug }}" ></bid-form>
                                        @endif
                                @endcan

                                @can('update', $product)
                                    <div class="bid">
                                    <h4>Proposals</h4>
                                    
                                    @foreach ($product->bids as $bid)
                                        <div class="bid__item">
                                            <p>Message: {{ nl2br($bid->message) }}</p>
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <span class="margin-right-20">Budget: ${{ $bid->budget }}</span>
                                                </div>
                                                <div> 
                                                   <i class="fa fa-user-circle"></i>
                                                    {{ $bid->seller->name }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                @endcan

                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    @else
                        <h3>This Product Does not Exist</h3>
                    @endif


                </div>
            </div>
        </div>
    </section>
@endsection
