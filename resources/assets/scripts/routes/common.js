import Swiper from 'swiper';
import 'jquery-sticky';
import '../partials/googlemaps';

export default {
  init() {
    // JavaScript to be fired on all pages
  
    $(".header").sticky({
      topSpacing: 0,
    });
  
    $(".magnificfilm").each(function () {
      $(this).magnificPopup({
        type: 'iframe',
        iframe: {
          patterns: {
            youtube: {
              index: 'youtube.com/',
              id: function (url) {
                var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                if (!m || !m[1]) return null;
                return m[1];
              },
              src: '//www.youtube.com/embed/%id%?autoplay=1',
            },
            vimeo: {
              index: 'vimeo.com/',
              id: function (url) {
                var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                if (!m || !m[5]) return null;
                return m[5];
              },
              src: '//player.vimeo.com/video/%id%?autoplay=1',
            },
          },
        },
      });
    })
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
