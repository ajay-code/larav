@extends('admin.layouts.main')

@section('content')
    <div class="row" id="user">
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Products List</div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Budget</th>
                            <th>By</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>#{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->budget }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>
                                    <a href="{{ url('/products/'.$product->slug) }}"
                                    >{{ 'Detail...' }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>


@endsection

