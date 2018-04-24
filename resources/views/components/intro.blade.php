@component('containers.fullwidthcontainer', ['fullclass' => 'intro-wrapper'])
    <div class="intro">
        <div class="row">
            <div class="col-12">
                <h1>@php(get_field('intro_titel') ? the_field('intro_titel') : the_title())</h1>
            </div>
            <div class="col-md-6 textpadding">
                <div class="textpaddingwrapper">
                    @php(the_field('intro_tekst'))
                    @if(get_field('intro_link_film'))
                        <a href="@php(the_field('intro_film_link'))"
                           class="magnificfilm btn-blue btn-intro">@php(the_field('intro_link_tekst'))</a>
                    @elseif(get_field('intro_link'))
                        <a href="@php(the_field('intro_link'))"
                           class="btn-blue btn-intro">@php(the_field('intro_link_tekst'))</a>
                    @endif
                </div>
            </div>
            <div class="col-md-6 imagepadding">
                <div class="imagepaddingwrapper">
                    @php($image = get_field('intro_afbeelding'))
                    <img src="{{$image['url']}}" alt="{{$image['alt']}}"/>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            @if(get_field('intro_video'))
                <div class="{{isset($largecolumn) ? $largecolumn : 'col-md-6'}}">
                    @include('components.embed', ['field' => the_field('intro_video')])
                </div>
            @endif
        </div>
    </div>
@endcomponent