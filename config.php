<?php
    if(is_writable("./lib/config.inc")) {
        if(!empty($_REQUEST)) {
            
            $title = $_REQUEST['formTitle'];
            $url = $_REQUEST["formURL"];
            $articlePerPage = $_REQUEST["formArticlePerPage"];
            $lang = $_REQUEST["formLanguage"];
            $theme = $_REQUEST["formTheme"];	
            
            if(isset($_REQUEST["formNavHome"])) {
                $home = "true";
            } else {
                $home = "false";
            } 

            if(isset($_REQUEST["formNavPrivacy"])) {
                $privacy = "true";
            } else {
                $privacy = "false";
            } 

            if(isset($_REQUEST["formNavImpress"])) {
                $impress = "true";
            } else {
                $impress = "false";
            } 

            if(isset($_REQUEST["formNavAbout"])) {
                $about = "true";
            } else {
                $about = "false";
            } 

            if(isset($_REQUEST["formNavTags"])) {
                $tags = "true";
            } else {
                $tags = "false";
            } 

            if(isset($_REQUEST["formNavRSS"])) {
                $rss = "true";
            } else {
                $rss = "false";
            } 

            if($_REQUEST["action"] == "setConfig") {
                $file = fopen("./lib/config.inc","rb+");
                if(!$file) {
                    $this->Error('Unable to open "config.inc"');
                }
                $config = "<?php\n";
                $config .= "\$cfgTitle = \"$title\";\n";
                $config .= "\$cfgURL = \"$url\";\n";
                $config .= "\$cfgArticlePerPage = \"$articlePerPage\";\n";
                $config .= "\$cfgLang = \"$lang\";\n";
                $config .= "\$cfgTheme = \"$theme\";\n";
                $config .= "\$cfgNav = array($home,$privacy,$impress,$about,$tags,$rss);\n?>";
                $config .= "\n\n\n";
                fwrite($file,$config);
                fclose($file);
            }

        }
        include_once("./lib/main.inc.php");
        common_header();

        //loadConfig
        include("./lib/config.inc");

        //load language-file
        include("./lib/languages.inc.php");

        print '
            <article>
            <div class="config">
                <form action="./config.php" method="POST" class="formConfig">';

        print '<h1>'. $language[$cfgLang][2] .'</h1>'; //headline
        print '<h2>'. $language[$cfgLang][12] .'</h2>'; //Basics
        print '
                    <p><input type="text" name="formTitle" placeholder="'.$language[$cfgLang][13].'" value="'.$cfgTitle.'"></p>
                    <p><input type="text" name="formURL" placeholder="'.$language[$cfgLang][14].'" value="'.$cfgURL.'"></p>';
        print '<h2>'. $language[$cfgLang][15] .'</h2><p><select name="formArticlePerPage">';
        for($n=1; $n<11; $n++) {
            print '<option value="'. $n .'"';
            if($cfgArticlePerPage == $n) {
                print ' selected="selected"';
            }
            print '>'. $n .'</option>';
        }            
        
        print '</select></p>';
        print '<h2>'. $language[$cfgLang][3] .'</h2>'; //Language
        print '<p><select name="formLanguage">';
        foreach($language as $key => $value) {
            print '<option value="'. $key .'"';
            if($key == $cfgLang) {
                print ' selected="selected"';
            }
            print '>'. $value[1] .'</option>';
        }
        print '</select></p>';

        print '<h2>'. $language[$cfgLang][4] .'</h2>'; //Themes
        $result_dirs = scandir("./lib/css/");
        print '<p><select name="formTheme">';
        foreach($result_dirs as $data) {
            if(strtolower(substr($data,strlen($data)-4,strlen($data))) == ".css" && $data != "base.css") {
                    print '<option value="'. $data .'"';
                    if($data == $cfgTheme) {
                        print ' selected="selected"';
                    }
                    print'>'. $data .'</option>';      
            }
        }
        print '</select><p>';
        print '<h2>'. $language[$cfgLang][5] .'</h2>'; //Menu
        print '<p><label for="formNavHome">'. $language[$cfgLang][6] .'</label><input type="checkbox" name="formNavHome"';
        if($cfgNav[0] == true) {
            print ' checked="checked"';
        }
        print '/></p><p><label for="formNavPrivacy">'. $language[$cfgLang][7] .'</label><input type="checkbox" name="formNavPrivacy"';
        if($cfgNav[1] == true) {
            print ' checked="checked"';
        }
        print '/></p><p><label for="formNavInmpress">'. $language[$cfgLang][8] .'</label><input type="checkbox" name="formNavImpress"';
        if($cfgNav[2] == true) {
            print ' checked="checked"';
        }
        print '/></p><p><label for="formNavAbout">'. $language[$cfgLang][9] .'</label><input type="checkbox" name="formNavAbout"';
        if($cfgNav[3] == true) {
            print ' checked="checked"';
        }
        print '/></p><p><label for="formNavTags">'. $language[$cfgLang][10] .'</label><input type="checkbox" name="formNavTags"';
        if($cfgNav[4] == true) {
            print ' checked="checked"';
        }
        print '/></p><p><label for="formNavRSS">'. $language[$cfgLang][11] .'</label><input type="checkbox" name="formNavRSS"';
        if($cfgNav[5] == true) {
            print ' checked="checked"';
        }
        print '/></p><p><input type="hidden" name="action" value="setConfig"><input type="submit">';
        print '</form></div></article>';
        common_footer();
    } else {
        include_once("./lib/main.inc.php");
        common_header();
            print '"./lib/config.inc" not writable! please check readme.md';
        common_footer();
    }
?>