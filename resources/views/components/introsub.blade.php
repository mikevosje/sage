@component('containers.container')
    <div class="intro row">
        <div class="col-md-6">
            <h1>@php(the_sub_field('intro_titel'))</h1>
            @php(the_sub_field('intro_tekst'))
            @if(get_sub_field('intro_link_film'))
                <a href="@php(the_sub_field('intro_film_link'))"
                   class="magnificfilm btn-orange btn-intro">@php(the_sub_field('intro_link_tekst'))</a>
            @elseif(get_sub_field('intro_link'))
                <a href="@php(the_sub_field('intro_link'))"
                   class="btn-orange btn-intro">@php(the_sub_field('intro_link_tekst'))</a>
            @endif
        </div>
        <div class="col-md-6">
            @php($image = get_sub_field('intro_afbeelding'))
            <img src="{{$image['url']}}" alt="{{$image['alt']}}"/>
        </div>
    </div>
@endcomponent