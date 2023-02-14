
@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


        <div class="container">

            @foreach($service as $serviceData)
            <h1>{{ $serviceData->title }}</h1>
            <h5>{{ $serviceData->description }}</h5>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>{!! html_entity_decode($serviceData->left_content) !!}</td>
                        <td>{!! html_entity_decode($serviceData->right_content) !!}</td>

                    </tr>
                </tbody>
            </table>
        @endforeach

    </div>


    <!-- End of Page Header -->
@endsection

