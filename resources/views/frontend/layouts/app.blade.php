<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>App Name - @yield('title')</title>
    <link rel="icon" href="{{ getSiteSetting('favicon') ?? '' }}" type="image/gif" sizes="16x16">
    <!-- style src here -->
    @include('frontend.partials.style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    @toastr_css
</head>

<body>
    @if(Session::has('failed'))
        {{-- <div class="alert alert-danger" role="alert"> 
            <p>{{Session::get('failed')}}</p>
        </div> --}}
        
    @endif
    <!-- navigation here -->
    @if(Request::is('/'))
        @include('frontend.partials.nav')
    @else
        @include('frontend.partials.static-nav')
    @endif
    <!-- main content section here -->
    @yield('content')

    <!-- footer and scripts src here  -->
    @include('frontend.partials.footer')

    {{-- for custom scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    {{-- <script>
        $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-danger").slideUp(500);
        });
    </script> --}}
   
     {{-- @jquery --}}
     @toastr_js
     @toastr_render
     
    @stack('scripts')  
    
</body>
</html>