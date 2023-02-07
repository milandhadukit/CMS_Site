@extends('layouts.admin_master')


<head>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
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


                    <div class="card-header">Create Event</div>
                   
                    <div class="card-body">
                        <form action="{{ route('store-event') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label class="label"> title event: </label>
                                <input type="text" name="title_event" class="form-control" required autofocus />
                                @error('title_event')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="label"> Description: </label>
                                <textarea name="description" rows="2" cols="30" class="form-control" required></textarea>
                                @error('description')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <label class="label">  date: </label>
                                <input type="date" name="start_date" class="form-control"  id="txtDate"  />
                                @error('start_date')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label class="label"> Time: </label>
                                {{-- <input type="time" name="time" class="form-control"  required /> --}}


                                <input type="text" id="timepicker"  name="time" class="form-control" />



                                
                                @error('time')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>  

                            <div class="form-group">
                                <label class="label"> End Time: </label>
                                <input type="time" name="end_time" class="form-control"  />
                                @error('end_time')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>  

                            <div class="form-group">
                                <label class="label"> Location: </label>
                                <input type="text" name="location" class="form-control" required  />
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


<script>
    $('#timepicker').timepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

@endsection
