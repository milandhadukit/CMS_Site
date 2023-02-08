@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form action="{{route('search-community')}}" method="GET">
                
                <input type="text" name="search" placeholder="Search" />
                <button type="submit">Search</button>
            </form>
            <div class="col-md-12">
                <h3>Manage Community</h3>
                <a href="{{route('add-community')}}" class="btn btn-success" style="float: right"> Add Community </a>
                <table class="table table-bordered">
                    <thead>
                        <th > Title</th>
                        <th> Descreption</th>
                        <th>left content</th>
                        <th>right content</th>
                        <th>Action</th>
                    </thead>
                    <tbody >
                       
                     @foreach ($community as $data)
                            <tr>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                
                                <td>{!! html_entity_decode($data->left_content) !!}</td>
                                <td>{!! html_entity_decode($data->right_content) !!}</td>
                                <td> 
                                    <a href="{{route('edit-community',$data->id)}}" class="btn btn-dark">Edit</a>
                                    <a href="{{ route('delete-community', $data->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>

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
        {!! $community->links() !!}
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
                url: "{{ route('status-community') }}",
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    // console.log(data.message)
                    alert(data.message);
                }
            });
        })
    })
</script>





@endsection

