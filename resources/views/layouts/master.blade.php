<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="master">

        @if(isset($_SESSION["facebook_access_token"]))
            <nav class="row top-bar">
                <a href="/profile" class="img"><img src="//graph.facebook.com/{{ $user->fbid }}/picture?width=80&height=80"></a>
                <a href="/profile" class="bold">Logged in as {{ $user->first_name }}</a>
                <a href="/profile">Go to profile</a>
                <a href="/profile/logout">Logout</a>
            </nav>
        @endif

        <div class="row header theme-bg">
        	<div class="col-12 area-2 center">
        		<h1 class="light-grey-text">Shape Log</h1>
        	</div>
            <div class="col-12 area-2 center">
                <h3 class="light-grey-text">The perfect tool for monitoring your gym progress</h3>
            </div>
        </div>
        
        @if(null !== Session::get('message'))
        <div class="col-12 area-2 message">
            <div class="area-2 theme-bg light-grey-text big bold">
                {{ Session::get('message') }}
            </div>
        </div>
        @endif

        @yield('main')
        
        <div class="row almost-black-bg">
            @include('partials.footer')            
        </div>
    </body>
</html>
