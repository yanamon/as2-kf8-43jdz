@extends('layouts.headerfooter')
@section('body')

    <div>
        <label>Login<label>
    </div>
    <br>
    <div><button><a href="/home">Login</a></button></div>
    <div>
        <label>Or Regis</label>
        <div>
            <button><a href="{{route("basicUser.create")}}">Sign Up User<a></button>
            <button><a href="{{route("eo.create")}}">Sign Up EO</a></button>
        </div>
    </div>

@endsection