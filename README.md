# Ship: WordPress Theme Framework

Ship is a WordPress Theme Framework based on [UnderStrap](https://understrap.com).

Thanks to UnderStrap, Ship combines [Underscores](https://underscores.me) with Bootstrap (version 4), making for a world-class starting point for your next WordPress theme project. 

We called the framework "Ship" because it helps us ship great web experiences, faster.

## License
Like UnderStrap and Underscores, Ship is released under the terms of the [GPL version 2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html) or (at your option) any later version.

## Support
If you need or can support this project, please head over to [issues](https://github.com/withfatpanda/ship/issues). And if you're feeling flush, please support the [UnderStrap](http://understrap.com) project by purchasing a license for it.

## Changelog
See [changelog](CHANGELOG.md)

## Basic Features
- WordPress starter theme provides all standard views 
- Combines Underscore's PHP and JavaScript baseline with Bootstrap's front-end framework
- Uses NPM to manage front-end dependencies and build minified source files
- [Font Awesome](http://fortawesome.github.io/Font-Awesome/)

### And, thanks entirely to UnderStrap and Underscores:
- Jetpack ready
- WooCommerce support
- Contact Form 7 support
- Translation ready

## Advanced Features
All of these things are works in progress.

- Live reloading to speed up your development workflow
- Distribution script (refactored for Webpack) produces a clean copy of the theme ready to ship, without all of the dev stuff (config files, raw JS, and your SCSS)
- Build environment configuration files
- Algolia ready: real-time search features FTW
- Automatic Image optimization (refactored for Webpack)
- [Vue.js](https://vuejs.org/) for building themes that use the [REST API](https://developer.wordpress.org/rest-api/), and [Bootstrap + Vue](https://bootstrap-vue.js.org/) for speeding up development of fancy UI
- A theme builder framework based on [Advanced Custom Fields](https://www.advancedcustomfields.com)

## Installation

### Classic install
- Download Ship from [GitHub](https://github.com/withfatpanda/ship)
- Upload it into your WordPress themes folder, e.g., `/wp-content/themes/`
- Log into your WordPress admin
- Go to **Appearance → Themes**
- Activate the Ship theme

### Composer project creation
- Open your terminal
- Change to the directory where you want to create a Ship-based project
- Type `composer create-project withfatpanda/ship`
- Answer the on-screen questions to generate your theme's meta data

### Bedrock install
We love building WordPress sites with [Bedrock](https://roots.io/bedrock/). If you have a Bedrock site running, instead of nesting your theme inside your WordPress codebase, you can use the Composer autoloader to bootstrap your theme from any path on your local system

- Open your terminal
- Create your project where you want it using `composer create-project withfatpanda/ship "path/to/your-theme"`
- During the setup process, take note of what you provide for your *Package name* setting, e.g., `your-package/name` (don't use that; make one up for yourself)
- Edit the Bedrock site's `composer.json`, and add a repository, like this:

```
"repositories": [
  {
    "type": "path",
    "url": "path/to/your-theme"
  }
]
```

- Back at the command line, now use Composer to load your theme as a dependency: `composer require your-package/name:*`

## Development workflow
Ship wants your front-end development workflow to be as painless as possible. The best front-end build system for the money is [Webpack](https://webpack.github.io/), but it's also the most difficult to learn. Thankfully, there's [Laravel Mix](https://github.com/JeffreyWay/laravel-mix)—Mix handles 80% of the difficult Webpack config work for you, and Ship provides sensible, WordPress-specific defaults for the rest. 

### Installing Dependencies
All of Ship's JS and CSS is built upon a core set of dependencies, chief among them bootstrap. Webpack also loads as a dependency. All of this is handled by NPM, so if you don't have NPM installed, you'll need to [do that first](https://www.npmjs.com/get-npm).

Next, from the root of your theme project, run `npm install`. This will install of your dependencies into a folder called `node_modules/`. There are a lot of them. Don't let this freak you out: welcome to modern JavaScript development.

Once NPM and your dependencies are loaded, you can test-build with the following command: `npm run dev`. If you get a "Compiled successfully..." message, then it's all working.

### Front-end source files
The JS and CSS source files that underpin your new theme are as follows—there are other files in there too, but those listed below are the ones relevant to learning this part:

```
├── src
    ├── img
    │   ├── header.jpg
    ├── js
    │   ├── customizer.js
    │   └── theme.js
    └── sass
        ├── theme
        │   ├── _theme.scss
        │   └── _variables.scss
        ├── custom-editor-style.scss
        └── theme.scss
```

**img/header.jpg** is an example so that you know where to place static imagery for your theme; files placed here are optimized and copied to public assets during the build

**js/customizer.js** is where you can write code that will load into the [Customizer](https://codex.wordpress.org/Theme_Customization_API#Step_2:_Create_a_JavaScript_File); there are some examples therein

**js/theme.js** is where you write code that will load into every view of your theme

**sass/theme/_theme.scss** is where you write SCSS for your theme's main stylesheet

**sass/theme/_variables.scss** is where you set variables that influence Bootstrap's styles as well as those in your theme

**sass/custom-editor-style.scss** is where you write SCSS to generate a stylesheet that loads inside TinyMCE; the default just loads your theme's main stylesheet and adds some padding to the `<body>` tag

**sass/theme.scss** knits together all of your theme-specific SCSS code with Bootstrap, Font Awesome, and a bit of magic from the Underscores and UnderStrap projects

### Building
Building your front-end code is as simple as running scripts with NPM at the command line. Just open your terminal, switch to the root of your theme project, and run any of the following:

`npm run dev`
This will build your JS and CSS unminified and (when we finish building it) using development environment settings

`npm run watch`
This will build dev versions of your JS and CSS, unminified, and will begin "watching" your raw source files, recompiling them into the built output anytime you make a change

`npm run hot`
**Coming soon**: Live Reloading; basically just like the `watch` command, except any changes to raw source files (including PHP files) result in your browser refreshing automatically, too

`npm run production`
This will build minified and versioned copies of your JS and CSS, ready for distribution

`npm run dist`
This will build distribution-ready copies of your JS and CSS, just like the `production` command, but then this command also creates a clean copy of your theme in `dist/`, ready to ship without all of the dev stuff (config files, raw JS, and your SCSS)

### Front-end compiled files
Running any of the front-end build scripts will generate and place files into an `assets/` folder:

```
├── assets
    ├── css
    │   ├── custom-editor-style.css
    │   ├── custom-editor-style.css.map
    │   ├── theme.css
    │   └── theme.css.map
    ├── fonts
    │   └── ... all the fonts extracted during the build
    ├── img
    │   └── ... all the images from src/img
    ├── js
    │   ├── customizer.js
    │   ├── customizer.js.map
    │   ├── theme.js
    │   └── theme.js.map
    └── mix-manifest.json
```

The relationships between these compiled files and the raw source files should be fairly straight-forward (tip: they're all named the same). 

Of special note above is the `mix-manifest.json` file. 

This file, generated automatically during the build, is used for establishing versions for your compiled files, i.e., *versioning*. The version numbers are automatically appended to asset URLs, thus forcing expiration of these resources from visitors' browsers.

### Loading assets
When loading assets in your stylesheets, they should be versioned automatically.

When loading an asset via PHP, use the global function `asset($path)` where `$path` is relative to your theme's assets folder. For example, invoking `asset('css/theme.css')` would generate a URL for your theme's main stylesheet.

Generating asset URLs this way will incorporate the assets' current versions, thus ensuring that browsers load the latest copies. For an example in context, refers to the script `inc/enqueue.php`.

### Live Reloading
Coming soon.

### Sass: Syntactically Awesome Style Sheets
If you're not using a CSS preprocessor to build your stylesheets, you're wasting a lot of time. If you've only ever used LESS, making the leap to Sass is fairly straightforward, and like us, we think you'll find Sass to be more robust and better-supported.

Learn more about Sass [here](http://sass-lang.com/).

### ES6 and CommonJS

### Vue and Bootstrap + Vue
Coming soon.

### Customizing your build

### RTL styles?
Just add a new file to the themes root folder called rtl.css. Add all alignments to this file according to this description:
https://codex.wordpress.org/Right_to_Left_Language_Support

## Page Templates

### Blank Template

The `blank.php` template is useful when working with various page builders and can be used as a starting blank canvas.

### Empty Template

The `empty.php` template displays a header and a footer only. A good starting point for landing pages.

### Full Width Template

The `fullwidthpage.php` template has full width layout without a sidebar.

## Functions and Includes

## Licenses & Credits
- UnderStrap: https://understrap.com (GPL version 2)
- Font Awesome: http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
- Bootstrap: http://getbootstrap.com | https://github.com/twbs/bootstrap/blob/master/LICENSE (Code licensed under MIT documentation under CC BY 3.0.)
and of course
- jQuery: https://jquery.org | (Code licensed under MIT)
- WP Bootstrap Navwalker by Edward McIntyre: https://github.com/twittem/wp-bootstrap-navwalker | GNU GPL
- Bootstrap Gallery Script based on Roots Sage Gallery: https://github.com/roots/sage/blob/5b9786b8ceecfe717db55666efe5bcf0c9e1801c/lib/gallery.php

[![Analytics](https://ga-beacon.appspot.com/UA-5440532-14/withfatpanda/ship/README.md)](https://github.com/igrigorik/ga-beacon)
