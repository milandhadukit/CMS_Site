@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('index-video')}}"class="btn btn-outline-info"> Back </a>
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif


                    <div class="card-header">Create Video</div>
                    <div class="card-body">
                        <form  action="{{ route('store-video') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label"> Title: </label>
                                <input type="text" name="title" class="form-control"  />
                                @error('title')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="label"> Description: </label>
                                <textarea name="description" rows="2" cols="30" class="form-control" ></textarea>
                                @error('description')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="label"> Link: </label>
                                <input type="text" name="link" class="form-control"  />
                                @error('link')
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
