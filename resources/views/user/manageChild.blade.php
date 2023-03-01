<ul>
    @foreach($childs as $child)
       <li>
          
       <a href="{{$child->url}}"> {{ $child->name }}</a>

       {{-- <a href="{{url('/') . '/' . $child->url}}"> {{ $child->name }}</a> --}}



       {{-- @if(count($child->childs))
                @include('user.manageChild',['childs' => $child->childs])
            @endif --}}

           
       </li>
    @endforeach
    </ul>