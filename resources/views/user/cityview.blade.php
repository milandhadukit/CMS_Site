
@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


        <div class="container">

            @foreach($city as $data)
            <h1>{{ $data->title_city }}</h1>
            <h5>{{ $data->descreption_city }}</h5>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>{!! html_entity_decode($data->left_content) !!}</td>
                        <td>{!! html_entity_decode($data->right_content) !!}</td>

                    </tr>
                </tbody>
            </table>
        @endforeach

    </div>


    <!-- End of Page Header -->
@endsection

