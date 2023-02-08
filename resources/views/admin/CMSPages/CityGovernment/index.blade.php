@extends('layouts.admin_master')

{{-- <head>
    <meta name="_token" content="{{ csrf_token() }}">
</head> --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif  

            <form action="{{route('search-city')}}" method="GET">
                
                <input type="text" name="search" placeholder="Search" />
                <button type="submit">Search</button>
            </form>
            <div class="col-md-12">
                <h3>Manage City Goverment</h3>
                <a href="{{route('add-city')}}" class="btn btn-success" style="float: right"> Add City Goverment </a>
                <table class="table table-bordered">
                    <thead>
                        <th > Title</th>
                        <th> Descreption</th>
                        <th>left content</th>
                        <th>right content</th>

                        <th >Action</th>
                    </thead>
                    <tbody >
                       
                     @foreach ($cityGoverment as $data)
                            <tr>
                                <td>{{ $data->title_city }}</td>
                                <td>{{ $data->descreption_city }}</td>
                
                                <td>{!! html_entity_decode($data->left_content) !!}</td>
                                <td>{!! html_entity_decode($data->right_content) !!}</td>
                                <td> 
                                    <a href="{{route('edit-city',$data->id)}}" class="btn btn-dark">
                                       
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg>
                                    </a>

                                    <a href="{{ route('delete-city', $data->id) }}" class="btn btn-danger"
                                        id="delete">  

                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                          </svg>
                                        </a>
                                      
                                      

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
        {!! $cityGoverment->links() !!}
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
                url: "{{ route('status-city') }}",
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

