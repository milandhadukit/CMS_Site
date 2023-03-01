{{-- @extends('layouts.user_master')
@section('content') --}}
<!-- Page Header -->
<header>


    @if (Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif


    <div class="container">

        <h3>Quick Links
            How May We Help?</h3>
        @foreach ($department as $d)
            <a href="{{ route('department.slug', $d->slug) }}">
                <h4>{{ $d->title_department }}</h4>
            </a>
        @endforeach

        @foreach ($service as $s)
            <a href="{{ route('service.slug', $s->slug) }}">
                <h4>{{ $s->title }}</h4>
            </a>
        @endforeach

        @foreach ($community as $c)
            <a href="{{ route('comminity.slug', $c->slug) }}">
                <h4>{{ $c->title }}</h4>
            </a>
        @endforeach


        @foreach ($contact as $c)
            <a href="{{ route('contact.slug', $c->slug) }}">
                <h4>{{ $c->title }}</h4>
            </a>
        @endforeach


        @foreach ($city as $cities)
            <a href="{{ route('city.slug', $cities->slug) }}">
                <h4>{{ $cities->title_city }}</h4>
            </a>
        @endforeach

        <h2>City Canlander</h2>
        <a href="{{ route('view.event') }}">
            <img src="{{ asset('Contact_image/1675258519.jpg') }}" alt="image" width="80px" height="80px"> </a>
        <br><br>



        <h3>Join Our Email News!</h3>
        <form action="{{route('news.store')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter name"><br>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="email" placeholder="Enter Email"><br>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-dark" value="submit">Submit</button>
        </form>











        <br><br>
        @foreach ($contact as $data)
            <h4>{{ $data->title }}</h4>
            <img src="{{ asset('Contact_image/' . $data->image) }}" alt="Contact image" height="80px"
                width="80px"><br>
            <h4>{{ $data->description }}</h4>
        @endforeach


    </div>




</header>

<!-- End of Page Header -->
{{-- @endsection --}}
