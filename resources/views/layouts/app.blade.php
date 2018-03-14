<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
@php(do_action('get_header'))
@include('partials.header')
@include('partials.header-slider')
<div class="wrap container" role="document">
    <div class="content">
        @yield('contenttop')
    </div>
</div>
<div class="content">
    @yield('outsidecontainercontent')
</div>
<div class="wrap container" role="document">
    <div class="content">
        @yield('contentbottom')
    </div>
</div>
@php(do_action('get_footer'))
@include('partials.footer')
@php(wp_footer())
@include('partials.menu')
</body>
</html>
