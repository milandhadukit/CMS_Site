@extends('layouts.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('index-deparment')}}"class="btn btn-outline-info"> Back </a>
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif


                    <div class="card-header">Update Service</div>
                    <div class="card-body">
                        <form  action="{{ route('update-deparment',$department->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label"> Title: </label>
                                <input type="text" name="title_department" class="form-control" value="{{ $department->title_department}}" />
                                @error('title_department')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="label"> Description: </label>
                                <textarea name="description_department" rows="2" cols="30" class="form-control" >{{ $department->description_department}}</textarea>
                                @error('description_department')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                           
                            <div class="form-group">
                                <label class="label"> left content: </label>
                                <textarea name="left_content" id="summernote" class="form-control"  >{{ $department->left_content}}</textarea>
                                @error('left_content')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                         

                            <div class="form-group">
                                <label class="label"> right content : </label>
                                <textarea name="right_content" id="summernote2" class="form-control"  >{{ $department->right_content}}</textarea>
                                @error('right_content')
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

@section('scripts')
    <script>
        $(function() {
           

            $('#summernote').summernote()
            $('#summernote2').summernote()
            
        });
    </script>




@endsection