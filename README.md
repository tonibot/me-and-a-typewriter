# me & a typewriter

Edition Ni


ChatGPT

A very simple blog system that displays Markdown files as articles in a responsive web view.

I really love Markdown and have used it for my private notes, recipes, articles, and the novel, which will be released as soon as I retire. 😄

I prefer Typora for editing my Markdown files (https://typora.io/), but you are free to use any editor—even "echo >" will do the job.

## Markdown?

Markdown is a easy-to-learn markup language to style text without a big fat editor.

Eg. '# Lorem ipsum dolor sit amet' eq. '<h1>' or '** lorem **' for emphasis. 

For further Information have a look here:

https://docs.github.com/de/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax

## Libraries

__parsedown__ for parsing the Markdown files (https://github.com/erusev/parsedown)

## Simple
__me & a typewriter__ don't need a database. Just create your content and upload (via ftp or scp) the md-file into /md/.

## Conventions

* In order to identify your content file you must use the suffix **".md"**.
* Each content file (.md) has to start with a date and time (24h) information:

​		YYYYMMDDHHmm, e.g. 202101161800

 * create or edit a privacy.md, about.md, impress.md for further legal informations and a notes about your blog.

 * add a div with the class "tags" to your markdown-file, eg.

   ```<div class="tags">Test, News, Code</div>```

## Installation & Configuration
* clone source and upload it to your php-enabled webspace.
* call the config.php to setup up your blog (themes, url, navigation etc.)
* chmod ./lib/config.inc to read-only to secure your config

## Themes

* Aries dark/lime
* Taurus dark/red
* Virgo  dark/purple
* Pesce dark/blue
* Aquarius dark/cyan
* frosty light/black (typewriter) (⚠️ google fonts)
* newdish light/beachy (⚠️ google fonts)

