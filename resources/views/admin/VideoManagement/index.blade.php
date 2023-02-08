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
                <h3>Manage Video</h3>
                <a href="{{ route('add-video') }}" class="btn btn-success" style="float: right"> Add Video </a>
                <table class="table table-bordered">
                    <thead>

                        <th>Title</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($video as $data)
                            <tr>

                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                                <td>
                                    <a href="{{ $data->link }}" target="_blank">{{ $data->link }}</a>
                                </td>

                    
                                <td>
                                    <a href="{{ route('edit-video', $data->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="{{ route('delete-video', $data->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>

                                  

                                    <label class="switch">
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
        {!! $video->links() !!}
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
                    url: "{{ route('status-video') }}",
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {
                        alert(data.message);
                    }
                });
            })
        })
    </script>
@endsection
