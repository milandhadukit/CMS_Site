@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


    <div class="container-fluid">

        @foreach ($department as $data)
            <h1>{{ $data->title_department }}</h1>
            <h5>{{ $data->description_department }}</h5>


            <div class="row table table-bordered">
                <div class="col-sm-4">
                    {!! html_entity_decode($data->left_content) !!}
                </div>
                <div class="col-sm-4">
                    {!! html_entity_decode($data->right_content) !!}
                </div>
                <div class="col-sm-4">
                    @include('user.menuLink')
                </div>
            </div>
        @endforeach

    </div>


    <!-- End of Page Header -->
@endsection
