<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="page">

        <div class="row almost-white-bg full-height">
            <div class="col-1">&nbsp;</div>

            <div class="col-11 content">
                @if(Session::get('message'))
                    <div class="col-12 area-2 message">
                        <div class="area-2 theme-bg light-grey-text big bold">
                            <p class="light-grey-text big bold">{{ Session::get('message') }}</p>
                        </div>
                    </div>
                @endif

                @yield('main')                
            </div>
        </div>
        
        @include('partials.side-menu')
        
        <div class="row">
            <div class="col-1">&nbsp;</div>

            <div class="col-11 almost-black-bg">
                @include('partials.footer')           
            </div>       
        </div>

    </body>
</html>
