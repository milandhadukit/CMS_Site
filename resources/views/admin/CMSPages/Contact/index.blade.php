@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>Manage Contact</h3>
                <a href="{{route('add-contact')}}" class="btn btn-success" style="float: right"> Add Contact </a>
                <table class="table table-bordered">
                    <thead>
                        <th >Employment Descreption</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th >Action</th>
                    </thead>
                    <tbody>
                     @foreach ($details as $data)
                            <tr>
                                <td>{{ $data->employment_descreption }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                                <td>
                                    <img src="{{ asset('Contact_image/'.$data->image) }}" alt="Contact image" title=" image" height="80px" width="80px"></td>

                                <td> 
                                    <a href="{{route('edit-contact',$data->id)}}" class="btn btn-dark">Edit</a>
                                    <a href="{{ route('delete-contact', $data->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>
                                    {{-- <form action="{{route('delete-contact',$data->id)}}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Delete" />
                                  
                                    </form> --}}

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('status-contact') }}",
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
