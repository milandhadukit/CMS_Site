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

            <form action="{{route('search-service')}}" method="GET">
                
                <input type="text" name="search" placeholder="Search" />
                <button type="submit">Search</button>
            </form>
            <div class="col-md-12">
                <h3>Manage Service</h3>
                <a href="{{route('add-service')}}" class="btn btn-success" style="float: right"> Add Service </a>
                <table class="table table-bordered">
                    <thead>
                        <th > Title</th>
                        <th> Descreption</th>
                        <th>left content</th>
                        <th>Left Image</th>
                        <th>right content</th>
                        <th>Right Image</th>
                        <th >Action</th>
                    </thead>
                    <tbody >
                       
                     @foreach ($service as $data)
                            <tr>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                
                                <td>{!! html_entity_decode($data->left_content) !!}</td>
                                
                                <td>
                                    <img src="{{ asset('Service_Image/'.$data->left_image) }}" alt="service image" title=" image" height="80px" width="80px">
                                </td>

                               
                                <td>{!! html_entity_decode($data->right_content) !!}</td>

                                <td>
                                    <img src="{{ asset('Service_Image/'.$data->right_image) }}" alt="service" title=" image2" height="80px" width="80px">
                                </td>

                                <td> 
                                    <a href="{{route('edit-service',$data->slug)}}" class="btn btn-dark">Edit</a>
                                    <a href="{{ route('delete-service', $data->slug) }}" class="btn btn-danger"
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
        {!! $service->links() !!}
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
                url: "{{ route('status-service') }}",
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


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data:{'search':$value},
    success:function(data)
    {
    $('tbody').html(data);
    }
    });
    })
    </script>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
 --}}



@endsection

