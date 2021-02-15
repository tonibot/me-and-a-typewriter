<?php
	include_once './lib/config.inc.php';
	include_once './lib/parsedown.inc.php';
	include_once './lib/main.inc.php';
	common_header();
	
	if(isset($_GET['site'])) {
		if($_GET['site'] == "privacy.md") {
			$files = glob('./md/privacy.{md}', GLOB_BRACE);
		}

		if($_GET['site'] == "impress.md") {
			$files = glob('./md/impress.{md}', GLOB_BRACE);
		}

		if($_GET['site'] == "about.md") {
			$files = glob('./md/about.{md}', GLOB_BRACE);
		}
		
		if(isset($_GET['site'])) {
			$files = glob('./md/' . $_GET['site'], GLOB_BRACE);			
		}
		
	} else {
		$files = array_diff(glob('./md/*.{md}', GLOB_BRACE), array('./md/privacy.md','./md/impress.md','./md/about.md'));
	}
	arsort($files);
	
	if(empty($files)) {
		print"<h1>Artikel nicht gefunden!</h1>";
	} else {
		if(isset($_GET['cnt'])) {
			$cnt = $_GET['cnt'];
		} else {
			$cnt = 0;		
		}		
		
		$sliced=array_slice($files,$cnt,$cfgArticlePerPage);
		
		foreach($sliced as $file) {
			$anchor = substr($file, 5);
			print'<article class="contentBlock">';
			$contents = file_get_contents($file);
			$Parsedown = new Parsedown();
			$Parsedown->setSafeMode(false);
			$Parsedown->setBreaksEnabled(true);
			$Parsedown->setUrlsLinked(true);
			echo $Parsedown->text($contents);
			print"<p><br />perma-link: <a href=\"./index.php?site=$anchor\" id=\"node\">$anchor</a></p>";
			print'</article>';
			print'<br /><br />';
			$cnt++;

			if($cnt%$cfgArticlePerPage == 0) {
				$skip = $cnt-($cfgArticlePerPage*2);
			} else {
				$skip = $cnt - ($cfgArticlePerPage + $cnt%$cfgArticlePerPage); 	
			}

			if($cnt > $cfgArticlePerPage && $cnt%$cfgArticlePerPage == 0 || $cnt == count($files)) {
				if(isset($_GET['cnt'])) {
					echo"<a href=\"./index.php?cnt=$skip\" class=\"skipper\" style=\"color:#fff; float:left;\">◀︎ $cfgSkipperPrev</a>";
				}
			}

			if($cnt%$cfgArticlePerPage == 0 && $cnt != count($files)) {
				echo"<a href=\"./index.php?cnt=$cnt\" class=\"skipper\" style=\"color:#fff; float: right;\">$cfgSkipperNext ▶︎</a>";
			}
		}
	}		
?>
