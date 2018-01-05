/*
This is the theme script. It expects to be loaded after jQuery
(see the PHP script inc/enqueue.php for complete context). We
load a couple of things that shipped with underscores, and then
we load the functionality specific to this theme.
*/

import $ from 'jquery'
import './underscores/navigation'
import './underscores/skip-link-focus-fix'
import Popper from 'popper.js'
import 'bootstrap'
import './components/track-window-scroll-events'
// import './components/collapsibles'
// import './components/slideout'

window.jQuery = window.$ = $
window.Popper = Popper

// To load a Vue instance and attach it to #page, uncomment the following line:
// require('./vue-wordpress').init()
