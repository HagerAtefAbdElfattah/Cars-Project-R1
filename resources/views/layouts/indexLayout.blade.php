
<!doctype html>
<html lang="en">
 {{-- Head --}}
  <head>
      
    @include('includes.head')
    
  </head>
 {{-- /Head --}}
  <body>
    <div class="site-wrap" id="home-section">
    {{-- Header --}}

        @include('includes.header')

    {{-- Header --}}
        
    
            {{-- content --}}

            @yield('content')
            
            {{-- content --}}

    {{-- footer --}}
        @include('includes.footer')
    {{-- /footer --}}

    </div>
    {{-- footer JS --}}
    @include('includes.footerJs')
    {{-- /footer JS --}}
  </body>

</html>

