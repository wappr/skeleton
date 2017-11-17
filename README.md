# silex skeleton(ish)

This repo is to serve as a semi-basic skeleton for the Silex framework. It
includes basic user authentication, Eloquent ORM, CSRF, and Monolog logging. It
will also include some tools for creating, transpiling, compiling, and minifying
your SCSS, CSS, and ES6 JavaScript. All of these resources should be and hopefully
are, a great start to any project when using PHP.

## Getting Started

This skeleton is based on [Silex](https://github.com/silexphp/Silex). It
uses the [Eloquent ORM](https://github.com/illuminate/database).

### Installation

You will need to install PHP packages using [Composer](http://getcomposer.org/).

```bash
composer install
```

This project also requires some node modules. The node modules can be installed
by running the following commands. Visit [Yarn's Installation page](https://yarnpkg.com/lang/en/docs/install/)
for help installing Yarn.

```bash
yarn install
```

### Building the project

This project utilizes Gulp to compile SCSS and transpile ES6 JavaScript. It
then injects those files into a twig template.

By running `npm run build` it will build all the needed files. If you want it to
build each time you save one of your asset files, you can run `npm run watch`.

### Configuration

You will need to copy `config-example.php` to `config.php` and update the values
with the correct information.

### Serving

You can serve the site locally by running `npm run serve`. This will run
`cd public; php -S localhost:8080`. You can then view the site in your browser
by going to [http://localhost:8080/](http://localhost:8080/).
