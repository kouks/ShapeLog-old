<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="master">

        <div class="row almost-white-bg">
        	<div class="col-12 area-2 center">
        		<h1 class="theme-text">Shape Log</h1>
        	</div>
            <div class="col-12 area-2 center">
                <h3 class="dark-grey-text">Perfect app for logging your gym progress</h3>
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
