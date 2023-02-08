@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('documents')}}"class="btn btn-outline-info"> Back </a>
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif


                    <div class="card-header">Update Document</div>
                    <div class="card-body">
                        <form  action="{{ route('documents.update',$document->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label"> Title: </label>
                                <input type="text" name="title" class="form-control" value="{{ $document->title }}" />
                                @error('title')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="label"> Description: </label>
                                <textarea name="description" rows="2" cols="30" class="form-control" >{{ $document->description }}</textarea>
                                @error('description')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror

                                {{-- @if ($errors->has('description'))
                                <div class="error" style="color:red;">{{ $errors->first('description') }}</div>
                                @endif --}}

                            </div>

                            <div class="form-group">
                                <label class="label"> document: </label>
                                <input type="file" name="document" class="form-control"  value="{{ $document->document }}" />
                                @error('document')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror       
                            </div>

                            <div class="form-group">
                                <label class="label"> publish_date: </label>
                                <input type="date" name="publish_date" class="form-control"  value="{{ $document->publish_date }}"/>
                                @error('publish_date')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                           
                           


                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="submit" />
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

