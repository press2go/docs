# Docs
`Docs` is a document handling system build with the [Slim Framework](http://www.slimframework.com/) on the basis of [Docs Reader](https://github.com/daylerees/docs-reader) by [Dayle Rees](https://twitter.com/daylerees)

## But why?
Why not just use Docs Reader, you ask?
Well.. It wasn't able to do the things I wanted it to do and also it dragged around 28MB of Laravel components, so I simply mocked this one up using the Slim Framework.

## What is different?
### Areas
This implementation also supports multiple levels of documents. I call these _areas_. This means that you can make completely separate areas for your documents. Like one for `API` and another for `jobs`. These two areas have nothing to do with each other.

### Sub-folders
Apart from this, each area can store documents in sub-folders, for better overview.

### Settings
Settings for each area can se set in the `_settings.json` file.

    {"title": "Area 1", "index": "page1"}

The title of this areas is `Area 1` and the default page to load as index is `page1.md` in the same directory.

### Setup
The setup process is easy. You should make a `settings.php` file in the root directory containing the following:

    define('DOC_PATH', '<THE FULL PATH TO THE DOCS AREA>');
    define('HT_PATH', '<THE HTTP PATH TO THE AREAS>');
    //define('GOOGLE_ANALYTICS', '<GOOGLE ANALYTICS CODE>');

You also need to install the Composer components; run `composer.phar install` and setup your web server.

## License
This software is open-sourced software license under the [MIT license](http://opensource.org/licenses/MIT)
