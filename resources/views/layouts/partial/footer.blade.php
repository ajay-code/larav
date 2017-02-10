@inject('helper', 'App\Http\Utilities\Helper')
<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2 style="font-size:39px"><span>b</span>uyagoo</h2>
                        <p>Buyagoo provides a simple solution to complications involved in, buying, selling and
                            discussing</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3    ">
                        <div class="video-gallery text-center">

                            <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x" style="color:#fff;"></i>
                            <i class="fa fa-address-card-o fa-stack-1x fa-inverse" style="color:#fe980f"></i>
                            </span>


                            <h2 style="margin-top:9px">Verified Users</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                             <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x" style="color:#fff;"></i>
                                <i class="fa fa-thumbs-up fa-stack-1x fa-inverse" style="color:#fe980f"></i>
                            </span>
                            <h2 style="margin-top:9px">Trustworthy Platform</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                           <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x" style="color:#fff;"></i>
                                <i class="fa fa-signing fa-stack-1x fa-inverse" style="color:#fe980f"></i>
                            </span>
                            <h2 style="margin-top:9px">Easy to use</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                             <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x" style="color:#fff;"></i>
                                <i class="fa fa-balance-scale fa-stack-1x fa-inverse" style="color:#fe980f"></i>
                            </span>
                            <h2 style="margin-top:9px">Meet your demands</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 visible-lg">
                    <div class="address">
                        <img src="{{getStorageUrl('images/home/map.png')}}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-categories" style="background-color:#F1f1f1">
        <div class="container" style="margin-bottom:21px">

            @if($categories = $helper->categories() )
                @foreach($categories->chunk($helper->categoryChunk) as $categorySet)
                    <div class="col-sm-3">
                        @foreach($categorySet as $category)
                            <div class="single-widget">
                                <h5><a href="{{ url('/category/'.$category->slug) }}">{{ $category->name }}</a></h5>
                                @foreach($category->subcategories as $subcategory)
                                    <span>
                                            <a href="{{ url('/subcategory/'.$subcategory->slug) }}">
                                                {{ $subcategory->name }}
                                            </a>|
                                    </span>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="clearfix"></div>
            @endif

        </div>
    </div>

    <div class="footer-widget" style="background-color:#F1f1f1">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>--}}

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">

        </div>
    </div>

</footer><!--/Footer-->
