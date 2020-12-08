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

</head>

<body>
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
    @yield('scripts')
</body>
</html>