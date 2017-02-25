@extends('layouts.form')
@section('content')

    <section>
        <div class="container">
            <div class="row">

                    <div id="wrap_404">
                        <h3 class="title_404">403</h3>
                        <span class="line_1_404">Oops, sorry you are not authorized</span>
                        <br />
                        <a href="{{ url('/') }}" class="readon">Home Page</a>
                    </div>
            </div>
        </div>
    </section>
@endsection
