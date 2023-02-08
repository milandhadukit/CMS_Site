@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">



                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif


                    <div class="card-header">Create Contact</div>
                    <div class="card-body">
                        <form  action="{{ route('store-contact') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label class="label"> Employment Descreption: </label>
                                <textarea name="employment_descreption" rows="2" cols="30" class="form-control"  autofocus></textarea>
                                @error('employment_descreption')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

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

                                <label class="label"> Image: </label>
                                <input type="file" name="image" class="form-control"  />
                                @error('image')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>













                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="submit" />
                                {{-- <button type="submit" class="btn btn-success btn-sm">Save</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
