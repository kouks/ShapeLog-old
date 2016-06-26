<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="master">

        @if(isset($_SESSION["fbid"]))
            <nav class="row top-bar">
                <a href="/profile" class="profile-pic"><img src="//graph.facebook.com/{{ $user->fbid }}/picture?width=80&height=80"></a>
                <a href="/profile" class="bold">Logged in as {{ $user->first_name }}</a>
                <a href="/profile">Go to profile</a>
                <a href="/profile/logout">Logout</a>
                <a href="/" class="logo"><img src="/img/graph.png" alt=""></a>
            </nav>
        @endif

        <div class="row header theme-bg">
        	<div class="col-12 area-4 center">
        		<h1 class="light-grey-text">Shape Log</h1>
        	</div>
            
            <div class="col-12 area-4 center">
                <h2 class="light-grey-text">The perfect tool for monitoring your gym progress</h2>
            </div>

            @if(!isset($_SESSION["fbid"]))
                <div class="col-12 center area-4">
                    <a class="fb-button center" href="{{ $loginUrl }}">
                        <i class="fa fa-2 fa-facebook"></i> &nbsp;&nbsp;
                        Login with Facebook
                    </a>
                </div>
            @endif
        </div>
        
        @if(null !== Session::get('message'))
            <div class="col-12 area-2 message">
                <div class="area-2 theme-bg">
                    <p class="light-grey-text big bold">{{ Session::get('message') }}</p>
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
