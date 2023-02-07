<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>
    {{-- <link rel="icon" href="{{ asset('/home/img/icon/icon.png') }}" type="image/icon" /> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('/home/img/icon/icon.png') }}" type="image/icon" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.include.topscript')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
       
        @include('admin.include.header')
        @include('admin.include.leftnav')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"
                                        style="color: #2db843;">Dashboard</a></li>
                                </li>

                                 <?php $segments = request()->segment(1); ?>
                                <li class="breadcrumb-item">
                                    <a href="{{ $segments }}" style="color: black;">{{ request()->segment(1) }}</a>
                                </li> 

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        @include('admin.include.footer')
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @include('admin.include.bottomscript')
    @yield('scripts')

</body>

</html>
