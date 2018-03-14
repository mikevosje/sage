<?php
$field = 'header_afbeeldingen';
$option = '';
if ( is_archive() ) {
	$field  = get_post_type() . '_header_header_afbeeldingen';
	$option = 'option';
}
if(basename( get_page_template() ) === 'template-contact.blade.php') : ?>
<div class="header-background" style="">
	<?php
	$location = get_field( 'google_maps', 'option' );

	if( ! empty( $location ) ):
	?>
    <div class="acf-map">
        <div class="marker" data-lat="<?php echo $location['lat']; ?>"
             data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
	<?php endif; ?>
</div>
<?php elseif(have_rows( $field, $option)) :
if(count( get_field( $field, $option) ) > 1) : ?>
<div class="swiper-container swiper-container-header">
    <div class="swiper-wrapper">
        @if (have_rows($field, $option))
            @while(have_rows($field, $option)) @php(the_row())
            <div class="swiper-slide" style="background-image: url(@php(the_sub_field('afbeelding'))">
                <div class="container">
                    @if(get_sub_field('titel'))
                        <div class="title">
                            <h2>@php(the_sub_field('titel'))</h2>
                        </div>
                        <div class="subtitle">
                            @if(get_sub_field('link'))
                                <a href="@php(the_sub_field('link'))" class="btn btn-outline-light">Lees meer</a>

                            @endif
                        </div>
                    @endif
                </div>
            </div>
            @endwhile
        @endif
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination-white"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
</div>
<?php else :
$property = get_field( $field, $option )[0];
?>
<div class="header-background" style="background-image: url({{$property['afbeelding']}}">
    <div class="container">
        <div class="title">
            <h2>{{$property['titel']}}</h2>
        </div>
        <div class="subtitle">
            @if($property['link'])
                <a href="{{$property['link']}}" class="btn btn-outline-light">Lees meer</a>

            @endif
        </div>
    </div>
</div>
<?php endif;
endif;?>
