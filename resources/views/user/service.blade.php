
@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


        <div class="container-fluid">

            @foreach($service as $serviceData)
            <h1>{{ $serviceData->title }}</h1>
            <h5>{{ $serviceData->description }}</h5>

         



                    <div class="row table table-bordered" >
                        <div class="col-sm-4">
                            {!! html_entity_decode($serviceData->left_content) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! html_entity_decode($serviceData->right_content) !!}
                        </div>
                        <div class="col-sm-4" >
                            @include('user.menuLink')
                        </div>
                    </div>



              
        @endforeach

    </div>


    <!-- End of Page Header -->
@endsection

