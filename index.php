<?
$libPath = 'lib';
$musicRootDirAddr = "music/";
ini_set('display_errors', 0);
?>

<html>
    <head>
        <title>song_exchange</title>
        <link rel="icon" type="image/gif" href="favicon.gif" />
        <style>
            @import url('style.css');
            body {
                font-size: .8em;
                font-family: monospace;
		background: url('http://manydemons.com/archive/2010/img/backgrounds/skull_1.jpg');
            }
            .object {

            }
            .lbl {
                float: left;
                display: block;
                width: 300px;
                border: 1px dotted black;
                border-right: 0;
            }
	#footer {
		margin: 20px;
		text-align: center;
		color: silver;
	}
	#individual_files {
		border: 1px solid yellow;
		width: 900px;
		background: white;
	}
        </style>

    </head>
    <body>

        

        <?php
        require_once("$libPath/monolithNmetagone/functions.php");




        /* config */
        $musicDir = isset($_GET['music_dir']) ? $_GET['music_dir'] : 'music/'; // this is path relative to server
// e("musicDir: ". $musicDir);

        $files = listMp3($musicDir);

        $dirs = listDirs($musicDir . "/"); // must be slash-final

        e("<h2><a href='index.php'>home</a> -> $musicDir</h2>");
        e("<h2>Subdirectories:</h2>");
        foreach ($dirs as $file) {
            e("<a href='" . $_SERVER['PHP_SELF'] . "?music_dir=$musicDir$file/'>$file</a><br />");
        }
        e('<hr />');

        if ($files != array()) {
        ?>
            <h3>All at once</h3>
            <div class='object'>
                <object type="application/x-shockwave-flash" width="600" height="200"
                        data="lib/xspf/xspf_player.swf?playlist_url=playlistDir.php?dir=<?=$musicDir;?>">
                    <param name="movie"
                           value="lib/xspf/xspf_player.swf?playlist_url=playlistDir.php?dir=<?=$musicDir;?>" />
                </object>
            </div>
    
<div id='individual_files'>
            <h3>Individual files.</h3>

        <?
            foreach ($files as $file) {
                $playlistAddrTmp = "playlist/$musicDir/$file";
                // $playlistAddrTmp = str_replace(" ", "%20", $playlistAddrTmp);
        ?>
                <div class='object'><span class='lbl'><a href='<?= $musicDir . $file; ?>'><?= $musicDir . $file; ?></a></span>
                    <object type="application/x-shockwave-flash" width="400" height="60"
                            data="lib/xspf/xspf_player_slim.swf?playlist_url=playlist/<?= $musicDir; ?>/<?= $file; ?>">
                        <param name="movie"
                               value="lib/xspf/xspf_player_slim.swf?playlist_url=playlist/<?= $musicDir; ?>/<?= $file; ?>" />
                    </object>
                </div>
                <!-- <a href='lib/xspf/xspf_player_slim.swf?playlist_url=playlist/<?= $musicDir; ?>/<?= $file; ?>'>lib/xspf/xspf_player_slim.swf?playlist_url=playlist/<?= $musicDir; ?>/<?= $file; ?></a> -->
        <?php
            }
        }
        ?>

        <!--
        <object type="application/x-shockwave-flash" width="400" height="170"
        data="http://localhost/manydemons2/song_exchange/lib/xspf/xspf_player_slim.swf?playlist_url=http://localhost/manydemons2/song_exchange/playlist/localhost/manydemons2/song_exchange/music/a1981.mp3">
        <param name="movie"
2A        value="http://localhost/manydemons2/song_exchange/lib/xspf/xspf_player_slim.swf?playlist_url=http://localhost/manydemons2/song_exchange/playlist/localhost/manydemons2/song_exchange/music/a1981.mp3" />
        </object>
        -->

        <!--
        <object type="application/x-shockwave-flash" width="400" height="170"
        data="http://localhost/manydemons2/song_exchange/lib/xspf/xspf_player_slim.swf?playlist_url=http://localhost/manydemons2/song_exchange/playlist/localhost/manydemons2/song_exchange/music/a1981.mp3">
        <param name="movie"
        value="http://localhost/manydemons2/song_exchange/lib/xspf/xspf_player_slim.swf?playlist_url=http://localhost/manydemons2/song_exchange/playlist/localhost/manydemons2/song_exchange/music/a1981.mp3" />
        </object>
        -->
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8643197-12']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<hr />
<div id=footer>PHP code Copyright &copy; piousbox 2009 2010 Feel free to contact me for sourcecode. <img src=http://manydemons.com/archive/2010/img/contact.png /><br />
Note: most music here is copyrighted by their respective owners. Illegal use of this music in any way is strictly prohibited!<br />
I donated $5 and use XSPF Web Musix Player: <a href="http://musicplayer.sourceforge.net/">XSPF Hideout</a><br />
</div>





