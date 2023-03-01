<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CMS</title>

    @include('user.include.topscript')

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <div class="wrapper">
        @include('user.include.header')
     


        <div class="content-wrapper">

            <div class="content-header">

            </div>
            @yield('content')
        </div>
        @include('user.include.footer')

    </div>
    @include('user.include.bottomscript')
    @yield('scripts')

</body>
</html>
