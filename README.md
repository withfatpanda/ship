# Rocket: WordPress Theme Framework

Ship is a WordPress Theme Framework based on [UnderStrap](https://understrap.com).

Thanks to UnderStrap, Ship combines [Underscores](https://underscores.me) with Bootstrap (version 4), making for a world-class starting point for your next WordPress theme project. We called it "Ship" because it helps us ship great web experiences, faster.

## License
Like UnderStrap and Underscores, Ship is released under the terms of the [GPL version 2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html) or (at your option) any later version.

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
All are works in progress.

- Distribution script (refactored for Webpack)
- Algolia ready
- Image optimization built into front-end build
- [Vue.js](https://vuejs.org/) for building themes that use the [REST API](https://developer.wordpress.org/rest-api/)
- A theme builder framework based on [Advanced Custom Fields](https://www.advancedcustomfields.com)

## Installation

### Classic install
- Download Ship from [GitHub](https://github.com/withfatpanda/ship)
- Upload it into your WordPress themes folder, e.g., `/wp-content/themes/`
- Log into your WordPress admin
- Go to **Appearance → Themes**
- Activate the Ship theme

### Composer install
- Open your terminal
- Change to the directory where you want to create a Ship-based project
- Type `composer create-project withfatpanda/ship`
- Answer the on-screen questions to generate your theme's meta data

### Bedrock install
We love building WordPress sites with [Bedrock](https://roots.io/bedrock/). If you have a Bedrock site running, instead of nesting your theme inside your WordPress codebase, you can use the Composer autoloader to bootstrap your theme from any path on your local system

- Open your terminal
- Create your project where you want it using `composer create-project withfatpanda/ship "path/to/your-theme"`
- During the setup processveeeeeevkslklmffdvfvf, take note of what you provide for your *Package name* setting, e.g., `your-package/name` (don't use that; make one up for yourself)
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
Ship wants your front-end development workflow to be as painless as possible. The best front-end build system for the money is [Webpack](https://webpack.github.io/), but it's also the most difficult to learn. Thankfully, there's [Laravel Mix](https://github.com/JeffreyWay/laravel-mix)—Mix handles 80% of the difficult configuration work for you, and Ship provides sensible defaults for the rest. 

### Installing Dependencies
All of Ship's JS and CSS is built upon a core set of dependencies, chief among them bootstrap. Webpack also loads as a dependency. All of this is handled by NPM. If you don't have NPM installed, you'll need to [do that first](https://www.npmjs.com/get-npm).

Next, from the root of your theme project, run `npm install`.

Then, you can test build with the following command: `npm run dev`. If you get a "Compiled successfully..." message, then it's all working.

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
        └── customer-editor-style.scss
```

**img/header.jpg** is an example so that you know where to place static imagery for your theme; files placed here are optimized and copied to public assets during the build

**js/customerizer.js** 

### Front-end compiled files


### 
To work and compile your Sass files on the fly start:


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

## Licenses & Credits
- UnderStrap: https://understrap.com (GPL version 2)
- Font Awesome: http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
- Bootstrap: http://getbootstrap.com | https://github.com/twbs/bootstrap/blob/master/LICENSE (Code licensed under MIT documentation under CC BY 3.0.)
and of course
- jQuery: https://jquery.org | (Code licensed under MIT)
- WP Bootstrap Navwalker by Edward McIntyre: https://github.com/twittem/wp-bootstrap-navwalker | GNU GPL
- Bootstrap Gallery Script based on Roots Sage Gallery: https://github.com/roots/sage/blob/5b9786b8ceecfe717db55666efe5bcf0c9e1801c/lib/gallery.php


[![Analytics](https://ga-beacon.appspot.com/UA-139292-31/chromeskel_a/readme)](https://github.com/igrigorik/ga-beacon)
