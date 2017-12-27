# Ship: a WordPress Starter Theme
Ship is a WordPress Starter Theme standing on the shoulders of giants like [Underscores](http://underscores.me), [UnderStrap](http://understrap.com), and [Sage](http://roots.io/sage). 

We called it "Ship" because it helps us ship great web experiences, faster.

## Why you should "Ship" your next WordPress Theme:
- It's completely free (as in beer: GPL-2.0)
- Sass stylesheets based on [Bootstrap 4](https://getbootstrap.com)
- Mobile-first, responsive design
- Uses [NPM](https://www.npmjs.com/) to manage dependencies (bye Bower!)
- Build script included, based on [Laravel Mix](https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme) ([Webpack](https://webpack.github.io/) in a beautiful disguise) 
- Auto-minify, concatenate, and version CSS and JS
- Traditional PHP templates or go [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) with [Laravel Blade](https://laravel.com/docs/5.4/blade) (requires PHP 7)
- Jetpack ready
- WooCommerce support
- Contact Form 7 support
- Translation ready

## Other features, in the works:
- Algolia ready: real-time search for admins and visitors
- [Vue.js](https://vuejs.org/) for building themes as [Single-Page Applications](https://en.wikipedia.org/wiki/Single-page_application)
- A theme builder framework based on [Advanced Custom Fields](https://www.advancedcustomfields.com)
- Live reloading
- A build script for generating commercial distributions

## License
Ship is released under the terms of the [GPL version 2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html) or (at your option) any later version

## Support
If you need or can support this project, please head over to [issues](https://github.com/withfatpanda/ship/issues)

## Changelog
See [changelog](CHANGELOG.md)

## Starting a new project
You'll need to have [Composer](https://getcomposer.org/) installed.

1. Open your terminal
2. Run `composer create-project withfatpanda/ship "your/theme/path"`
3. Answer the on-screen questions

## Development
Ship wants your workflow to be as painless as possible. Below we move quickly through several topics that might be new to you, among them *Dependency Management*, *Builds*, and *Asset Loading*. 

For those of you who want a quicker start instead, it goes something like this:

- Create new project with composer: `composer create-project withfatpanda/ship "path/to/your/project"`
- Install dependencies: `npm install`
- Start your watcher (build in the background while you edit your code): `npm build watch`
- Put your main JavaScript into `src/js/theme.js` 
- Build Customizer features into `src/js/customizer.js` 
- Style your theme in `src/sass/theme/_theme.scss`
- Style the content in the admin editors in `src/sass/custom-editor-style.scss`
- Finish dev, test, distribute

### Installing Dependencies
All of Ship's JS and CSS is built upon a core set of dependencies, chief among them being Bootstrap. Laravel Mix—your build system—also loads as a dependency. All of this is handled by [NPM](https://www.npmjs.com), so if you don't have NPM installed, you'll need to [do that first](https://www.npmjs.com/get-npm).

Next, from the root of your theme project, run `npm install`. This will install of your dependencies into a folder called `node_modules/`. There are going to be a lot of files—don't let this freak you out. Welcome to modern JavaScript development.

Once NPM and your dependencies are loaded, you can test-build with the following command: `npm run dev`. 

If you get a "Compiled successfully..." message, then it's all working. If you don't, [post your issue here](https://github.com/withfatpanda/ship/issues).

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

You'll want to put your theme's JavaScript into `src/js/theme.js` and/or load other modules of code into that file.

You'll want to put your theme's styles into `src/sass/theme/_theme.scss` and/or load other modules of code into *that* file. 

#### Other front-end source files:

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
Use this command for active development sessions—it will build dev versions of your JS and CSS, unminified, and will begin "watching" your raw source files, recompiling them into the built output anytime you make a change

`npm run hot`
**Coming soon**: Live Reloading; basically just like the `watch` command, except any changes to raw source files (including PHP files) result in your browser refreshing automatically, too

`npm run production`
This will build minified and versioned copies of your JS and CSS, ready for distribution

`npm run dist`
This will build distribution-ready copies of your JS and CSS, just like the `production` command; then, this command creates a clean copy of your theme in `dist/` ready to ship without all of the dev stuff (build config files, raw JS and Sass code)

### Your built source files
Running any of the front-end build scripts above will generate and place files into an `assets/` folder in the root of your project:

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

The relationships between these compiled files and the raw source files should be fairly straight-forward (**Tip:** they're all named the same), but of special note is the `mix-manifest.json` file. 

The `mix-manifest.json` file, generated automatically during each build, establishes versions for your compiled files, i.e., *versioning*. When using asset loading (see below), the file version numbers are automatically appended to their URLs—this helps to force expiration of these resources from visitors' browsers, keeping their experience of your theme up-to-date.

### Loading assets
When loading a theme asset via PHP, use the global function `asset($path)` where `$path` is relative to your theme's assets folder. For example, invoking `asset('css/theme.css')` would generate a URL for your theme's main stylesheet. For an example in context, refer to the script `src/php/inc/enqueue.php`.

### Live reloading
Coming soon.

### Sass: Syntactically Awesome Style Sheets
If you're not using a CSS preprocessor to build your stylesheets, you're wasting a lot of time. If you've only ever used LESS, making the leap to Sass is fairly straightforward, and like us, we think you'll find Sass to be more robust and better-supported. Learn more about Sass [here](http://sass-lang.com/).

### ES6 and CommonJS
More details coming soon.

### Customizing your build
Your front-end build is powered by NPM and Laravel Mix (Webpack). The build commands described above in *Building* can be found in your `package.json` file in the section named `scripts`. They all ultimately invoke Webpack builds by way of Laravel Mix.

Laravel Mix can be configured by editing `webpack.mix.js`. Most of the functions available to you for automating your builds are listed in this configuration file. You can also read Mix's documentation [here](https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme).

### RTL styles?
Just add a new file to the themes root folder called rtl.css. Add all alignments to this file according to this description:
https://codex.wordpress.org/Right_to_Left_Language_Support

## Single-Page Application Themes
Coming soon.

## Licenses & Credits
- Sage: https://roots.io/sage
- UnderStrap: https://understrap.com (GPL version 2)
- Font Awesome: http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
- Bootstrap: http://getbootstrap.com | https://github.com/twbs/bootstrap/blob/master/LICENSE (Code licensed under MIT documentation under CC BY 3.0.)
and of course
- jQuery: https://jquery.org | (Code licensed under MIT)
- WP Bootstrap Navwalker by Edward McIntyre: https://github.com/twittem/wp-bootstrap-navwalker | GNU GPL
- Bootstrap Gallery Script based on Roots Sage Gallery: https://github.com/roots/sage/blob/5b9786b8ceecfe717db55666efe5bcf0c9e1801c/lib/gallery.php

[![Analytics](https://ga-beacon.appspot.com/UA-5440532-14/withfatpanda/ship/README.md)](https://github.com/igrigorik/ga-beacon)
