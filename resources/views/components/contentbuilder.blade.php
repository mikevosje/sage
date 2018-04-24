@if(have_rows('content_builder_content_builder'))
    @while(have_rows('content_builder_content_builder')) @php(the_row())
    <div class="col-12 content_block">
        <div class="row">
            @if(get_row_layout() == 'tekst_afbeelding')
				<?php $text = get_sub_field( 'tekst_groep' );?>
				<?php $image = get_sub_field( 'afbeelding_groep' );?>
                <div class="col-md-6 col-12 textpadding textpadding-right order-1">
                    <div class="textpaddingwrapper">
                        <h2 class="title-{{$text['tekst_kleur_titel']}}">{{$text['tekst_titel']}}</h2>
                        {!! $text['tekst_tekst'] !!}
                    </div>
                </div>
                <div class="col-md-6 col-12 imagepadding order-2">
                    <div class="imagepaddingwrapper">
                        <img src="{{$image['afbeelding_afbeelding']['url']}}"
                             title="{{$image['afbeelding_afbeelding']['title']}}"
                             alt="{{$image['afbeelding_afbeelding']['alt']}}"/>
                    </div>
                </div>
            @endif
            @if(get_row_layout() == 'afbeelding_tekst')
				<?php $text = get_sub_field( 'tekst_groep' );?>
				<?php $image = get_sub_field( 'afbeelding_groep' );?>
                <div class="col-md-6 col-12 textpadding textpadding-right order-md-2 order-1">
                    <div class="textpaddingwrapper">
                        <h2 class="title-{{$text['tekst_kleur_titel']}}">{{$text['tekst_titel']}}</h2>
                        {!! $text['tekst_tekst'] !!}
                    </div>
                </div>
                    <div class="col-md-6 col-12 imagepadding imagepadding-right order-md-1 order-2">
                        <div class="imagepaddingwrapper">
                            <img src="{{$image['afbeelding_afbeelding']['url']}}"
                                 title="{{$image['afbeelding_afbeelding']['title']}}"
                                 alt="{{$image['afbeelding_afbeelding']['alt']}}"/>
                        </div>
                    </div>
            @endif
            @if(get_row_layout() == 'tekst_tekst')
				<?php $tekst_left = get_sub_field( 'tekst_links_groep' );?>
                <div class="col-md-6 col-12 textpadding order-1">
                    <div class="textpaddingwrapper">
                        <h2 class="title-{{$tekst_left['tekst_kleur_titel']}}">{{$tekst_left['tekst_titel']}}</h2>
                        {!! $tekst_left['tekst_tekst'] !!}
                    </div>
                </div>
				<?php $text_right = get_sub_field( 'tekst_rechts_groep' );?>
                <div class="col-md-6 col-12 textpadding textpadding-right order-2">
                    <div class="textpaddingwrapper">
                        <h2 class="title-{{$text_right['tekst_kleur_titel']}}">{{$text_right['tekst_titel']}}</h2>
                        {!! $text_right['tekst_tekst'] !!}
                    </div>
                </div>
            @endif
            @if(get_row_layout() == 'tekst_breed')
				<?php $text = get_sub_field( 'tekst_groep' );?>
                <div class="col-12 order-1">
                    <h2 class="title-{{$text['tekst_kleur_titel']}}">{{$text['tekst_titel']}}</h2>
                    {!! $text['tekst_tekst'] !!}
                </div>
            @endif
        </div>
    </div>
    @endwhile
@endif