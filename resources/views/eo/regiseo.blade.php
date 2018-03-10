@extends('layouts.headerfooter')
@section('body')

    DAFTAR EVENT ORGANIZER
    <br><br>
    <form action="{{ route("eo.store") }}" method="POST">
        {{ csrf_field() }}
        email : <input name="email"> <br>
        nama depan : <input name="first_name"> <br>
        nama belakang : <input name="last_name"> <br>
        password : <input input type="password" name="password"> <br>
        ulang password : <input type="password" name="password_confirmation"> <br>
        telepon : <input type="number" name="phone"> <br>
        alamat : <input name="address"> <br>
        <div class="g-recaptcha" 
           data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
        </div>
        <input type="submit">
    </form>

@endsection

@section('script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection