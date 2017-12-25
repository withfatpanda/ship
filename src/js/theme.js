/*
This is the theme script. It expects to be loaded after jQuery
(see the PHP script inc/enqueue.php for complete context). We
load a couple of things that shipped with underscores, and then
we load the functionality specific to this theme.
*/

require('./underscores/navigation')
require('./underscores/skip-link-focus-fix')

window.Popper = require('popper.js')
require('bootstrap')

// To load a Vue instance and attach it to #page, uncomment the following line:

//require('./vue-wordpress').init()