@extends('layouts.headerfooter')
@section('body')

    DAFTAR BASIC USER 
    <br><br>
    <form action="{{ route("basicUser.store") }}" method="POST">
        {{ csrf_field() }}
        email : <input name="email"> <br>
        nama depan : <input name="first_name"> <br>
        nama belakang : <input name="last_name"> <br>
        password : <input type="password" name="password"> <br>
        ulang password : <input type="password" name="password_confirmation"> <br>
        <div class="g-recaptcha" 
           data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
        </div>
        <input type="submit">
    </form>
    @if($errors->has('g-recaptcha-response'))
        <div class="col-sm-12 alert alert-warning" role="alert" style="margin-bottom:15px;">
            @foreach($errors->get('g-recaptcha-response', ':message') as $error) {{$error}} @endforeach
        </div>
    @endif
@endsection

@section('script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection