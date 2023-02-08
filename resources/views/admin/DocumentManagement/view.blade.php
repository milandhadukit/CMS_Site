
@extends('layouts.admin_master')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"
                        style="color: #2db843;">Dashboard</a></li>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('documents') }}"
                    style="color: #2db843;">Document Management</a></li>
            </li>
            <li class="breadcrumb-item"><a href="#"
                style="color: #2db843;">View Document</a></li>
        </li>
            </ol>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>View Document</h3>
                        <div class="table-responsive">

                            @if(count($documents) > 0)
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Document</th>
                                    <th>Description</th>
                                    <th>Publish Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($documents as $document)
                                    <tr>
                                        <td><a href="{{ route('documents.download', $document->document) }}">{{ $document->document }}</a></td>
                                        <td>{{ $document->description }}</td>
                                        <td>{{ $document->publish_date }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                                    </table>
                                    @else
                                    No Records Found
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
