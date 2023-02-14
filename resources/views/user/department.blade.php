
@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


        <div class="container">

            @foreach($department as $data)
            <h1>{{ $data->title_department }}</h1>
            <h5>{{ $data->description_department }}</h5>

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

