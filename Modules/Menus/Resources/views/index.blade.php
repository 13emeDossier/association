<!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Menu -->
                        @foreach($items as $item)
                            @if(count($item['children'])==0)<li class="nav-item">@endif
                            @if(count($item['children'])>0)<li class="nav-item dropdown">@endif
                                
                            
                                @if(count($item['type'])==0)<a class="nav-link" href="{{ route($item['url']) }}">{{ $item->title }}</a>@endif
                                @if(count($item['type'])==1)<a class="nav-link" href="{{ $item['url'] }}">{{ $item->title }}</a>@endif
                                
                                <li class="nav-item">
                                    @foreach($item['children'] as $child)
                                        @if(count($item['type'])==0)<a class="nav-link" href="{{ route($item['url']) }}">{{ $item->title }}</a>@endif
                                        @if(count($item['type'])==1)<a class="nav-link" href="{{ $item['url'] }}">{{ $item->title }}</a>@endif
                                    @endforeach        
                                </li>
                            </li>
                        @endforeach

</ul>
<ul class="navbar-nav ml-auto"><!-- Left Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    
</ul>
