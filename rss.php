<?php
	include_once './lib/config.inc.php';
	include_once './lib/parsedown.inc.php';

	$files = array_diff(glob('./md/*.{md}', GLOB_BRACE), array('./md/privacy.md','./md/impress.md','./md/about.md'));
	arsort($files);

	header( "Content-type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8'?>
	<rss version='2.0' xmlns:atom='http://www.w3.org/2005/Atom'>
	<channel>
	<atom:link href='$cfgURL/rss.php' rel='self' type='application/rss+xml' />
	<title>$cfgTitle | RSS</title>
	<link>$cfgURL</link>
	<description>robotisch - RSS</description>
	<language>$cfgLangCode</language>
	";
	
	foreach($files as $file) {
		$anchor = substr($file, 5);
		$contents = file_get_contents($file);
		$Parsedown = new Parsedown();
		$Parsedown->setSafeMode(true);
		$md = $Parsedown->text($contents);
		$headline = substr($md, strpos($md,'<h1>')+4, strpos($md,'</h1>')-4);
		$puller = strip_tags(substr($md, strpos($md,'<p>')+3, 300));
		echo "<item>";
		echo "<title>$headline</title>";
		echo "<link>$cfgURL/index.php?site=$anchor</link>";
		echo "<guid>$cfgURL/index.php?site=$anchor</guid>";

		echo "<description>$puller [...] </description>";
		echo "</item>";
	}
	print"</channel></rss>"

?>	
