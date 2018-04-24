@component('containers.fullwidthcontainer', ['fullclass' => 'newsblock'])
    <div class="menubalk">
        <h2>Laatste nieuws</h2>
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Meer nieuws</a>
    </div>
	<?php $query = new WP_Query( array( 'posts_per_page' => 2 ) );?>
    @if($query->have_posts())
        <div class="row">
            @while($query->have_posts()) @php($query->the_post())
                @include('partials.content')
            @endwhile
        </div>
    @endif
    @php(wp_reset_query())
@endcomponent