    <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav ml-auto align-items-center">

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            City Government
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach ($city as $cityData)
                                <a class="dropdown-item" href="{{ route('city.slug', $cityData->slug) }}">
                                    {{ $cityData->title_city }}</a>
                            @endforeach

                        </div>

                    </li> --}}


                            <ul class="navbar-nav ml-auto align-items-center">

                                @php
                                    $menuData = App\Models\Menu::where('parent_id', 0)->get();
                                @endphp
                    
                                @foreach ($menuData as $menu)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $menu->name }}
                                      </a>
                    
                                       @if (count($menu->childs))
                    
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                @foreach($menu->childs as $child)
                                              <a class="dropdown-item" href="{{ $child->url }}">
                                                {{ $child->name }}</a>
                                                @endforeach
                                            </div>
                                    
                                        @endif                
                    
                                    </li>
                                @endforeach
                    
                            </ul>



                            {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Department
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                @foreach ($department as $departmentData)
                                    <a class="dropdown-item"
                                        href="{{ route('department.slug', $departmentData->slug) }}">
                                        {{ $departmentData->title_department }}</a>
                                @endforeach
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                @foreach ($service as $s)
                                    <a class="dropdown-item"
                                        href="{{ route('service.slug', $s->slug) }}">{{ $s->title }}</a>
                                @endforeach
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Community
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                @foreach ($community as $communityData)
                                    <a class="dropdown-item"
                                        href="{{ route('comminity.slug', $communityData->slug) }}">{{ $communityData->title }}</a>
                                @endforeach
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contact
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                @foreach ($contact as $data)
                                    <a class="dropdown-item"
                                        href="{{ route('contact.slug', $data->slug) }}">{{ $data->title }}</a>
                                @endforeach
                        </li>
                </ul>

 --}}

                            <form action="{{ route('search-data') }}" method="GET">
                                <div class="form-group">
                                    <div class="col-md-6">

                                        <input type="text" name="search" placeholder="Search" id="search"
                                            class="form-control" />
                                        <button type="submit">Search</button>
                            </form>
                    </div>
            </div>






            <a href="{{ route('user.dashboard') }}">
                <h3>Dashboard</h3>
            </a>

            {{-- <a href="{{ route('user.menulink') }}">
            <h3>Menu Link</h3>
        </a> --}}



        </div>
        </div>
    </nav>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
