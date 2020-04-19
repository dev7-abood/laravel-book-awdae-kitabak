{{--<div style="margin-top: 65px"></div>--}}
<nav>
    <br><br>
    <div id="nav-background">
        <div id="nav-container">
            <header id="nav-header">
                @if(Route::has('login'))
                    @auth
                        @if($is_confirmed)
                            <a type="button" href="#"
                               class="btn btn-outline-secondary ml-2 text-white">{{__('layout.add_book')}}&nbsp;<img
                                    style="display: inline-block;width: 25px" src="{{asset('img/add_book.png')}}"></a>
                            <div class="dropdown ml-3">
                                <a type="button" data-toggle="dropdown" class="font-weight-bolder text-white"
                                   aria-haspopup="true" aria-expanded="false">
                                    {!! $fall_name !!} &nbsp; <i class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">{{__('layout.my_data')}}</a>
                                    <a class="dropdown-item" href="#">{{__('layout.my_interests')}}</a>
                                    <a class="dropdown-item" href="#">{{__('layout.my_reservations')}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{__('layout.logout')}}
                                    </a>
                                </div>
                            </div>
                        @else
                            <a class="font-weight-bold text-white ml-2" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{__('layout.logout')}}
                            </a>
                        @endif
                    @else
                        @if(Route::has('register'))
                            <a href="/login" class="btn btn-secondary mr-3">{{__('layout.login')}}</a>
                            <a href="/register"
                                    class="btn btn-outline-info ml-3 mr-2">{{__('layout.register_new_account')}}</a>
                        @endif
                    @endauth
                @endif
                <div id="nav-menu-button"><i class="fas fa-bars"></i></div>
            </header>
            <nav>
                <ul class="nav-ul hide-ul">
                    <li><img src="{{asset('img/logo/logo_white.png')}}" class="ml-3 p-1" width="55px"></li>
                    <li><a class="nav-link active-link" href="#"><i class="fas fa-home"></i></a></li>
                    <li><a class="nav-link" href="#">{{__('layout.categories')}}</a></li>
                    <li><a class="nav-link" href="#">{{__('layout.usage_policy')}}</a></li>
                    <li><a class="nav-link" href="#">{{__('layout.about_us')}}</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>
