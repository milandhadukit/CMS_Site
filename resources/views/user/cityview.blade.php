
@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


        <div class="container-fluid" style="height:100vh">

            @foreach($city as $data)
            <h1>{{ $data->title_city }}</h1>
            <h5>{{ $data->descreption_city }}</h5>

          
                    <div class="row table table-bordered" >
                        <div class="col-sm-4">
                            {!! html_entity_decode($data->left_content) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! html_entity_decode($data->right_content) !!}
                        </div>
                        <div class="col-sm-4" >
                            @include('user.menuLink')
                        </div>
                    </div>
                    
              
        
        @endforeach
      
    </div>
 

    <!-- End of Page Header -->
@endsection

