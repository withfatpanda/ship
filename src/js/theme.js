/*
This is the theme script. It expects to be loaded after jQuery
(see theme script inc/enqueue.php for complete context). We
load a couple of things that shipped with underscores, and then
we load whatever is specific to this theme.
*/

require('./underscores/navigation')
require('./underscores/skip-link-focus-fix')

// To load initialize a Vue instance and attach it to #page,
// uncomment the following line:
require('./vue-wordpress').init()