<?
header('Content-type: application/xml');
//header('Content-type: text/plain');
//ini_set('display_errors', 1);

//print_r($_GET);

if (!isset($_GET['dir'])) {
    echo("GET parameter song_url not defined.");
}

$dir = $_GET['dir'];

$files = array();

    if ($handle = opendir($dir)) {
        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
            if (preg_match("/(\.mp3)/i", $file)) {
                $files[] = $file;
            }
        }

        closedir($handle);
    }
//    print_r($files);

// shuffle $files
shuffle($files);

//$mp3s = listMp3($song_url);
//$mp3 = $mp3s[0];

echo('<?xml version="1.0" encoding="UTF-8"?>');
?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
    <trackList>
        <? foreach($files as $file) {
            echo ("<track><location>$dir$file</location><title>$file</title></track>\n");
        }
        ?>
    </trackList>
</playlist>