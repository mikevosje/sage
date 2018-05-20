<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
@php(do_action('get_header'))
@include('partials.header')
@include('partials.header-slider')
@yield('content')
@php(do_action('get_footer'))
@include('partials.footer')
@include('partials.footerscripts')
@php(wp_footer())
@include('partials.menu')
</body>
</html>
