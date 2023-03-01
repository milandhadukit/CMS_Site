
@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


        <div class="container">

            @foreach($eventCalander as $eventData)

            <h5>{{ $eventData->description }}</h5>
            <h5>start data :  {{ \Carbon\Carbon::parse($eventData->start_date)->format('d/m/Y') }}</h5>
            <td> Day :{{\Carbon\Carbon::parse($eventData->start_date)->format('l')}}</td>
            <h5>Location: {{$eventData->location}}</h5>

         
            {{-- {{\Carbon\Carbon::parse($eventData->start_date)->format('l')}} --}}
          

        @endforeach

    </div>


    <!-- End of Page Header -->
@endsection

