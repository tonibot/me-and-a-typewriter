# me & a typewriter

A blogsystem based on markdownfiles.
I really love to use markdown for my private notes, recipes, articles etc.
So I decided to script a simple microblogging system in php which is based on markdown.

## Libraries & sources
* __parsedown__ for parsing (https://github.com/erusev/parsedown)
* Stylesheets from __markdowncss__ (https://markdowncss.github.io/).

## Simple
__me & a typewriter__ don't need a database. Just write an arcticle in markdown and upload the md-file into /md/.

* Filename convention
 * Every article-file (.md) has to start with a date and time (24h) information YYYYMMDDHHmm, e.g. 202101161800
 * create or edit a privacy.md, about.md, impress.md for further legal informations and a notes about your blog. Delete one or more of these file to configure your navbar.

## Tags

add a div with class="tags" in every your markdown-file, eg.

```<div class="tags">Test, News, Code</div>```

## Installation
* clone source and drop it on your php-enabled webspace.
* edit ./lib/config.php.inc
  * select theme and edit language settings.
  * you can find a lot auf markdown css files on the web, just drop them to ./lib/css/ and edit the config file.
