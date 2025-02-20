import './bootstrap';

import Alpine from 'alpinejs';
import anime from 'animejs/lib/anime.es.js';

anime({
  targets: '.box',
  translateX: 250,
  duration: 800,
  easing: 'easeOutQuad'
});


window.Alpine = Alpine;

Alpine.start();
