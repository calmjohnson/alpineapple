import hljs from 'highlight.js';

hljs.highlightAll();

import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
 
Alpine.plugin(focus)

window.Alpine = Alpine

Alpine.start()