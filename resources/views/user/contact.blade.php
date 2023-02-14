
@extends('layouts.user_master')


@section('content')
    <!-- Page Header -->


        <div class="container">

            @foreach($contact as $data)
            <h1>{{ $data->title }}</h1>
            <h5>{{ $data->description }}</h5>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        {{-- <td>{!! html_entity_decode($data->left_content) !!}</td>
                        <td>{!! html_entity_decode($data->right_content) !!}</td> --}}

                        <td>
                            <img src="{{ asset('Contact_image/'.$data->image) }}" alt="image" width="80px" height="80px"> 
                        </td>



                    </tr>
                </tbody>
            </table>
        @endforeach

    </div>


    <!-- End of Page Header -->
@endsection

