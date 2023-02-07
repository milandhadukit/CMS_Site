@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="col-md-12">
                <h3>Manage Event</h3>
                <a href="{{ route('add-event') }}" class="btn btn-success" style="float: right"> Add Event </a>
                <table class="table table-bordered">
                    <thead>

                        <th>Event</th>
                        <th>Description</th>
                        <th>date</th>
                        <th> day</th>
                        <th>Time</th>
                        <th>End Time</th>
                        <th>Location</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($event as $data)
                            <tr>

                                <td>{{ $data->title_event }}</td>
                                <td>{{ $data->description }}</td>

                                <td> {{ \Carbon\Carbon::parse($data->start_date)->format('d/m/Y') }}</td>
                                <td>{{\Carbon\Carbon::parse($data->start_date)->format('l')}}</td>
                                <td>{{\Carbon\Carbon::parse($data->time)->format('g:i A')}}</td>

                                @if ( empty ($data->end_time))

                               <td> {{$data->end_time}}</td>
                              @else

                                <td>{{$data->end_time}}{{\Carbon\Carbon::parse($data->end_time)->format(' A')}}</td>

                                @endif

                                {{-- <td>{{ $data->end_time }}</td> --}}
                                <td>{{ $data->location }}</td>


                                <td>
                                    <a href="{{ route('edit-event', $data->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="{{ route('delete-event', $data->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>

                                    {{-- <input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $data->status ? 'checked' : '' }}> --}}

                                    <label class="switch" >
                                        <input data-id="{{ $data->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $data->status ? 'checked' : '' }}>

                                        <span class="slider"></span>
                                    </label>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <div style="margin-left:65px;" class="custom-pagination-style">
        {!! $event->links() !!}
    </div>

    <style>
        .custom-pagination-style svg {
            width: 50px;
        }
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('status-event') }}",
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection
