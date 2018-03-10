@extends('layouts.headerfooter')
@section('body')

    <div>
        <label>SLIDER CERITANYA<label>
    </div>
    <br><br><br>
    <label>Keseruan Didekat Mu</label>
    <table>
        @foreach($events as $i => $event)
        <tr class="active">
            <td>{{ $i+1 }}</td>
            <td>{{ $event->EventImage[0]->event_image}}</td>
            <td>{{ $event->ticket_price }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->Category->category }}</td>
            <td>{{ $event->location }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->start_date }}</td>
            <td>{{ $event->start_time }}</td>
        </tr>
        @endforeach
    </table>
    <br><br>
        <label>Promo Didekat Mu</label>
    <table>
        @foreach($promos as $i => $promo)
        <tr class="active">
            <td>{{ $i+1 }}</td>
            <td>{{ $promo->EventImage[0]->event_image }}</td>
            <td>{{ $promo->ticket_price }}</td>
            <td>{{ $promo->name }}</td>
            <td>{{ $promo->Category->category }}</td>
            <td>{{ $promo->location }}</td>
            <td>{{ $promo->description }}</td>
            <td>{{ $promo->start_date }}</td>
            <td>{{ $promo->start_time }}</td>
        </tr>
        @endforeach
    </table>

@endsection