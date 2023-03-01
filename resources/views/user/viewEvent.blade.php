@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->

    <a href="{{route('show.calander')}}">Monthly Calander </a>
    <div class="container">

        @foreach ($eventCalander as $eventData)
            {{-- <a href="{{route('view.event.details',$eventData->slug)}}"> <h4>{{ $eventData->title_event }}</h4></a> --}}

            <ul class="accordion-list" >
                <li >
                    <h3>{{ $eventData->title_event }}</h3>

                    <div class="answer">
        
                        <h5> Description :{{ $eventData->description }}</h5>
                        <h5>start data : {{ \Carbon\Carbon::parse($eventData->start_date)->format('d/m/Y') }}</h5>
                        <td> Day :{{ \Carbon\Carbon::parse($eventData->start_date)->format('l') }}</td>
                        <h5>Location: {{ $eventData->location }}</h5>

                    </div>
                </li>
            </ul>

            <h5> Time : {{ \Carbon\Carbon::parse($eventData->time)->format('g:i A') }}</h5>

            @if (empty($eventData->end_time))
                <td> {{ $eventData->end_time }}</td>
            @else
                <td> EndTime: {{ $eventData->end_time }}{{ \Carbon\Carbon::parse($eventData->end_time)->format('A') }}</td>
            @endif
        @endforeach

        

    </div>

 

    <!-- End of Page Header -->
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.accordion-list > li > .answer').hide();

        $('.accordion-list > li').click(function() {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active").find(".answer").slideUp();
            } else {
                $(".accordion-list > li.active .answer").slideUp();
                $(".accordion-list > li.active").removeClass("active");
                $(this).addClass("active").find(".answer").slideDown();
            }
            return false;
        });

    });
</script>




