@inject('helper', 'App\Http\Utilities\Helper')
<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category--->
        @foreach($helper->categories() as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ $category->id }}">

                            @if($category->subcategories->count() > 0)
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            @endif

                        </a>
                        <a   href="{{ url('/category/'.$category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </h4>
                </div>
                @if($category->subcategories->count() > 0)
                    <div id="{{ $category->id }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->subcategories as $subcategory)
                                    <li><a href="{{ url('/subcategory/'.$subcategory->slug) }}">{{ $subcategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Tags</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach($helper->tags() as $tag)
                    <li><a href="{{ url('/tag/'.$tag->name) }}"> <span class="pull-right">({{ $tag->count }})</span>{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->




</div>
