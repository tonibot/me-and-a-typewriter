<?php
	include_once './lib/config.inc.php';
	include_once './lib/parsedown.inc.php';
	
	function get_string_between($string, $start, $end){
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	}
	

	$files = array_diff(glob('./md/*.{md}', GLOB_BRACE), array('./md/privacy.md','./md/impress.md','./md/about.md'));
	arsort($files);

	header( "Content-type: text/xml");
	echo '<?xml version="1.0" encoding="UTF-8" ?>';
	echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
	echo '<channel>';
	echo '<atom:link href="'.$cfgURL.'/rss.php" rel="self" type="application/rss+xml" />';
	echo '<title>'.$cfgTitle.' | RSS</title>';
	echo '<link>'.$cfgURL.'</link>';
	echo '<description>RSS</description>';
	echo '<language>'.$cfgLangCode.'</language>';

	foreach($files as $file) {
		$anchor = substr($file, 5);
		$contents = file_get_contents($file);
		$Parsedown = new Parsedown();
		$Parsedown->setSafeMode(true);
		$md = $Parsedown->text($contents);
		$headline = get_string_between($md, '<h1>', '</h1>');
		$puller = get_string_between($md, '<p>', '</p>');
		echo "<item>";
		echo "<title>$headline</title>";
		echo "<link>$cfgURL/index.php?site=$anchor</link>";
		echo "<guid>$cfgURL/index.php?site=$anchor</guid>";

		echo "<description>$puller [...] </description>";
		echo "</item>";
	}
	print"</channel></rss>"

?>	
