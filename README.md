# me & a typewriter

A blogsystem based on markdownfiles.
I really love to use markdown for my private notes, recipes, articles etc.
So I decided to script a simple microblogging system in php which is based on markdown.

## Libraries & sources
* __parsedown__ for parsing (https://github.com/erusev/parsedown)
* Stylesheets from __markdowncss__ (https://markdowncss.github.io/).

## Simple
__me & a typewriter__ don't need a database. Just write an arcticle in markdown and upload the md-file.

## Installation
* clone source and drop it on your php-enabled webspace.
* edit ./lib/config.php.inc
  * select theme and edit language settings.
  * you can find a lot auf markdown css files on the web, just drop them to ./lib/css/ and edit the config file.
