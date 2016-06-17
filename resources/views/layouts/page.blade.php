<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="master">

        <div class="row light-grey-bg full-height">
        <div class="col-2">&nbsp;</div>

            <div class="col-10 light-grey-bg">
                @if(null !== Session::get('message'))
                <div class="col-12 area-2 message">
                    <div class="area-2 theme-bg light-grey-text big bold">
                        {{ Session::get('message') }}
                    </div>
                </div>
                @endif

                @yield('main')                
            </div>
        </div>
        
        @include('partials.side-menu')
        
        <div class="row almost-black-bg">
            @include('partials.footer')            
        </div>

    </body>
</html>
