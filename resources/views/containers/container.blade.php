<!-- /resources/views/components/container.blade.php -->

<div class="wrap container" role="document">
    <div class="content {{isset($class) ? $class : ''}}">
        {{ $slot }}
    </div>
</div>