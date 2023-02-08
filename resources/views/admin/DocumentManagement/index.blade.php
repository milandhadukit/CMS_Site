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
                <h3>Manage Document</h3>
                <a href="{{ route('documents.create') }}" class="btn btn-success" style="float: right"> Add Document </a>
                <table class="table table-bordered">
                    <thead>
                        <th>No.</th>
                        <th>Title</th>
                        
                        <th>Document</th>

                        <th>Publish Date</th>
                        <th class="text-center">

                            <form method="POST" action="{{ url('multipleusersdelete') }}">
                                {{ csrf_field() }}

                                <input class="btn btn-danger" type="submit" name="submit" value="Delete All " />
                                <input type="checkbox" id="checkAll"> Select All
                        </th>


                        <th>Action</th>

                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($documents as $key => $data) {
                            $name = $documents[$key]->name;
                            ?>
                        <tr>
                            <td >{{ $i }}</td>
                            <td >{{ $data->title }}</td>
                            
                            <td><a
                                href="{{ route('documents.download', $data->document) }}">{{ $data->document }}</a>
                        </td>
                
                        <td>{{ $data->publish_date }}</td>

                            <td ><input name='id[]' type="checkbox" id="checkItem"
                                    value="<?php echo $documents[$key]->id; ?>">
                            </td>

                        
                    




                        <td>
                                    <a href="{{ route('documents.edit', $data->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="{{ route('documents.delete', $data->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>

    

                        <label class="switch">
                                        <input data-id="{{ $data->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $data->status ? 'checked' : '' }}>

                                        <span class="slider"></span>
                                    </label>

                        </td>
                        </tr>

                        <?php $i++; 
                    }
                    ?>
                        {{-- @endforeach --}}
                    </tbody>

                </table>





















            </div>
        </div>
    </div>

    <div style="margin-left:65px;" class="custom-pagination-style">
        {!! $documents->links() !!}
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
                    url: "{{ route('documents.changeStatus') }}",
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script language="javascript">
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);

        });
    </script>
@endsection
