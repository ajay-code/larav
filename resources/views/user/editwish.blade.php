@extends('layouts.form')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h3 class="add-wish-head">Add your wish...</h3>
            </div>

                <div class="row">
                    <div class="col-md-5 wish-images">
                        <div class="row">
                            <form action="{{ url('wish/'.$product->id.'/photos/') }}" enctype="multipart/form-data" class="dropzone" >
                                {{ csrf_field() }}
                              <div class="fallback">
                                <input name="file" type="file" multiple />
                              </div>
                            </form>
                        </div>
                        .<div class="row">
                            <div class="col-md-12 gallery">
                                @foreach ($product->photos()->get() as $photo)

                                    <div class="col-xs-6 gallery_image">
                                      <label>{{ $photo->id }}</label>
                                        <div class="img-wrap">
                                          <form method="post" id="upload-photo" action="{{ url('wish/photos/'.$photo->id) }}">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="_method" value="DELETE">
                                              <button type="submit" class="close">×</button>
                                              <a href="#" data-lity="">
                                                  <img src="{{ getStorageUrl($photo->thumbnailpath()) }}" alt="" data-id="245">
                                              </a>
                                          </form>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>



                    {{-- Details --}}

                    <div class="col-md-6 col-md-offset-1 wish-data">
                        <form id="wish-form" class="Wish-form" role="form" method="POST"
                        action="{{ url('/wish/'. $product->id . '/edit') }}">
                        {{ csrf_field() }}
                            {{-- RightHand Side Of Form --}}

                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <input class="form-control" type="text" name="title" placeholder="Enter title"
                                   value="{{ old('title') ? old('title') : $product->title }}"
                                   required>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">

                                <textarea class="form-control" data-autosize name="description"
                                          placeholder="Enter Description"
                                          required>{{ old('description') ? old('description') : $product->description }}</textarea>

                        </div>

                        <div id="category">

                            <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">

                                <select class="form-control" name="category"
                                        v-model="categoryIndex"
                                @change="getSubCategories()"
                                >
                                <option value="">Choose category</option>
                                <option v-for="(category, index) in categories" :value="index">
                                    @{{ category.name }}
                                </option>
                                </select>

                            </div>

                            <div class="form-group {{ $errors->has('subcategory') ? ' has-error' : '' }}">

                                <select id="subcat" class="form-control" name="subcategory" >
                                    <option value="">Choose subcategory</option>
                                    <option v-for="subcategory in subCategories" :value="subcategory.id">
                                        @{{ subcategory.name }}
                                    </option>
                                </select>

                            </div>

                        </div>

                        <div class="form-group input-tags">
                            <input class="form-control" type="text" name="tags" id="tags" placeholder="Add Tags">
                        </div>

                        <div class="form-group {{ $errors->has('budget') ? ' has-error' : '' }}">

                            <input class="form-control" type="number" name="budget" placeholder="Enter budget"
                                   class="budget" required
                                   value="{{ old('budget') ? old('budget') : $product->budget }}">

                            @if ($errors->has('budget'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('budget') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class=" wish-buttons">
                            <button name="add" type="submit" class="btn btn-default wish-button">Add</button>
                            <button name="cancel" type="reset" class="btn btn-default wish-button">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
@endsection

@section('scripts')
    <script>

        categoryIndex = {{ old('category') ? old('category') : $product->subcategory->category_id  }} || '';
        subcategoryId = {{ old('subcategory') ? old('subcategory') : $product->subcategory_id  }} || '';
        categoryId = {{ $product->subcategory->category_id }} || '';
        new Vue({
            el: '#category',
            data: {
                categories: [],
                subCategories: [],
                categoryIndex: categoryIndex,
                subcategoryId: ''
            },
            created: function () {
                axios.get('/user/api/category').then(res => {
                    this.categories = res.data;
                    if(window.categoryId){
                        this.categories.forEach((category, index)=>{
                            if(window.categoryId == category.id){
                                this.categoryIndex = index
                            }
                        });
                    }
                    this.getSubCategories();
                })
            },
            mounted(){
                setTimeout(()=>{
                    if(window.subcategoryId){
                        window.$('#subcat').val(window.subcategoryId);
                    }
                }, 2000)

            },
            methods: {
                getSubCategories: function () {
                    if (this.categoryIndex === '') {
                        this.subCategories = []
                    } else {
                        this.subCategories = this.categories[this.categoryIndex].subcategories
                    }

                }
            }
        });
    </script>
    <script type="text/javascript">

    </script>
    @if($errors->has('primaryImage'))
        <script>
            swal({
                title: "Missing Image",
                text: "Please provide The primary Image",
                type: "info",
            })
        </script>
    @endif
    @include('layouts.partial.tags')
@stop
