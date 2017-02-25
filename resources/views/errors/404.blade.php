@extends('layouts.form')
@section('content')
    <section>
        <div class="container">
            <div class="row">

                    <div id="wrap_404">
                        <h3 class="title_404">404</h3>
                        <span class="line_1_404">Oops, sorry we can't find that page!</span>
                        <br />
                        <span class="line_2_404">
                            Either something went wrong or the page doesn't exist anymore.</span>
                        <br />
                        <a href="{{ url('/') }}" class="readon">Home Page</a>
                    </div>
            </div>
        </div>
    </section>
@endsection
