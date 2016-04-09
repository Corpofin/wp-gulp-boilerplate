## Wordpress Gulp Boilerplate

This is a basic template to use Gulp for developing Wordpress themes. You get all the usual goodness of Gulp and Bower for managing dependencies and  packages. It comes setup with:

- SASS(SCSS)
- CSS autoprefixing
- CSS minification
- JavaScript minification
- JavaScript hinting
- Image minification.

You also get [normalize.css](https://necolas.github.io/normalize.css/) and [JQuery](https://jquery.com) to start with. Use bower and npm to add whatever else you need.

## Setup

If you're already up and running with most of the usual Node ecosystem tools this won't require much effort.

* Install [npm](http://blog.npmjs.org/post/85484771375/how-to-install-npm).
* Install [Gulp](http://gulpjs.com/): `npm install -g gulp`.
* Install [Bower](http://bower.io/#install-bower): `npm install -g bower`.
* Install all NodeJS dependencies with `npm install` and then all packages with `bower install`.

## Gulp

* Run `gulp watch` while you develop the theme. This will continuously update the theme in the _dist_ folder as you save your changes.
* Run `gulp build` when you are ready to build the production ready version of your theme.

This setup assumes that you will build your theme in directory completely separate to your Wordpress installation. In this case, you will probably want to symlink the theme folder in _dist_ to your themes directory of Wordpress, so that you can check your theme as you build it. You can do this with `ln -s build_directory wordpress_themes_directory`, where _build_directory_ is your theme directory created in _dist_ and _wordpress_themes_folder_ is your themes directory in your instance of Wordpress.

The gulp implementation doesn’t include LiveReload or Browser Sync because of the decoupled nature of Wordpress themes and Wordpress itself. You will have to configure your Wordpress server if you want.
