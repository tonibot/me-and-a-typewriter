<?php
	include_once './lib/parsedown.inc.php';
	include_once './lib/main.inc.php';
	common_header();

	$files = array_diff(glob('./md/*.{md}', GLOB_BRACE), array('./md/privacy.md','./md/impress.md','./md/about.md'));

	$tags = array();
	$complex = array();
	foreach($files as $file) {
		$contents = file_get_contents($file);
		$Parsedown = new Parsedown();
		$Parsedown->setSafeMode(true);
		$md = $Parsedown->text($contents);
		$tagsString = substr($md, strpos($md,'div class="tags"')+20, strpos($md,'/div')-31);
		$tagArray = explode(",", $tagsString);
		$site = substr($file, 5, strlen($file));
		foreach ($tagArray as $val) {
			array_push($complex, array($val, $site));
		}
	}

	foreach($complex as $val) {
		if(!in_array($val[0], $tags)) {
			array_push($tags, $val[0]);
		}
	}
	natsort($tags);

	foreach($tags as $head) {
		print"<h4>$head</h4>";
		foreach($complex as $key => $val) {
			if($val[0] == $head) {
				print'<a href="./index.php?site='. $val[1] .'" style="margin-left: 20px">'. $val[1] .'</a><br />';
			}
		}
	}
	common_footer();
?>	
