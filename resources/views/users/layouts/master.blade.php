<!DOCTYPE html>
<html>
  <head>
    @include('users.layouts.header')
    @stack('customcss')
  </head>
  <body>
    <div class="page-holder">
      @include('users.layouts.navbar')
      
      @include('users.layouts.modal')

      <!-- HERO SECTION-->
      <div class="container">
        @yield('content')
      </div>

      @include('users.layouts.footer')
      
      <!-- JavaScript files-->
      <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/lightbox2/js/lightbox.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/nouislider/nouislider.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/owl.carousel2/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
      <script src="{{ asset('asset/js/front.js') }}"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      @stack('customjs')
    </div>
  </body>
</html>