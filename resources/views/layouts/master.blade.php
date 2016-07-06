<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="master">

        @if(null != Cookie::get('uid'))
            <nav class="row top-bar">
                <a href="/profile/feed" class="profile-pic"><img src="//graph.facebook.com/{{ $user->fbid }}/picture?width=80&height=80"></a>
                <a href="/profile/feed" class="bold">{{ trans('master.logged_as', ['name' => $user->first_name]) }}</a>
                <a href="/profile/feed">{{ trans('master.goto') }}</a>
                <a href="/logout">{{ trans('master.logout') }}</a>
                <a href="/" class="logo"><img src="/img/logo-red-80.png" alt=""></a>
            </nav>
        @endif

        <div class="row header theme-bg">
        	<div class="col-12 area-4 center">
        		<h1 class="light-grey-text">Shape Log</h1>
        	</div>
            
            <div class="col-12 area-4 center">
                <h2 class="light-grey-text">{{ trans('master.motto') }}</h2>
            </div>

            @if(!Cookie::get('uid'))
                <div class="col-12 center area-4">
                    <a class="fb-button center" href="{{ $loginUrl }}">
                        <i class="fa fa-2 fa-facebook"></i> &nbsp;&nbsp;
                        Login with Facebook
                    </a>
                </div>
            @endif
        </div>
        
        @if(Session::get('message'))
            <div class="col-12 area-2 message">
                <div class="area-2 theme-bg">
                    <p class="light-grey-text big bold">{{ Session::get('message') }}</p>
                </div>
            </div>
        @endif

        @if(false && !Cookie::get('cookies'))
            <div class="col-12 cookies">
                <div class="area-2 theme-bg">
                    <p class="light-grey-text big bold">
                        {{ trans('master.cookies') }}
                    </p>
                    <i class="fa fa-times close" aria-hidden="true"></i>
                </div>
            </div>
        @endif

        <div class="content">
            @yield('main') 
        </div>
        
        <div class="row almost-black-bg">
            @include('partials.footer')            
        </div>
    </body>
</html>
