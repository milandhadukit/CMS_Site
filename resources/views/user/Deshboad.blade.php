@extends('layouts.user_master')



@section('content')
    <!-- Page Header -->
    <header>

        <div class="container-fluid">

            @php
                
                $data = App\Models\DeshboardPage::get();
            @endphp




            @foreach ($data as $d)
                <h1>{{ $d->title }}</h1>
                <h5>{{ $d->description }}</h5>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>{!! html_entity_decode($d->left_content) !!}</td>
                            <td>{!! html_entity_decode($d->right_content) !!}</td>
                            <td>@include('user.menuLink')</td>

                        </tr>
                    </tbody>
                </table>
            @endforeach



           

            @if (!empty($results))
                @foreach ($results as $r)

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>{!! html_entity_decode($r->left_content) !!}</td>
                                <td>{!! html_entity_decode($r->right_content) !!}</td>
                                {{-- <td>@include('user.menuLink')</td> --}}

                            </tr>
                        </tbody>
                    </table>
                @endforeach
            @endif

          

        </div>


    </header>

    <!-- End of Page Header -->
@endsection
