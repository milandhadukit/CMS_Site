@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('index-event')}}"class="btn btn-outline-info"> Back </a>
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif


                    <div class="card-header">update Event</div>
                    <div class="card-body">
                        <form action="{{ route('update-event',$event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label class="label"> Title Event: </label>
                                <input type="text" name="title_event" class="form-control"  value="{{$event->title_event}}" autofocus />
                                @error('title_event')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="label"> Description: </label>
                                <textarea name="description" rows="2" cols="30" class="form-control" >{{$event->description}}</textarea>
                                @error('description')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <label class="label">  Date: </label>
                                <input type="date" name="start_date" class="form-control"  id="txtDate"  value="{{$event->start_date}}" />
                                @error('start_date')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

    
                          
                            <div class="form-group">
                                <label class="label"> time: </label>
                                <input type="time" name="time" class="form-control"  value="{{$event->time}}" />
                                @error('time')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="label">End time: </label>
                                <input type="time" name="end_time" class="form-control"  value="{{$event->end_time}}" />
                                @error('end_time')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="label"> Location: </label>
                                <input type="text" name="location" class="form-control" value="{{$event->location}}"  />
                                @error('location')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>




                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="submit" />
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
    $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#txtDate').attr('min', minDate);
});
</script>
@endsection
