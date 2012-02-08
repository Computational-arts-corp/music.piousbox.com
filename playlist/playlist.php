<?
// print_r($_GET);

if (!isset($_GET['song_url'])) {
    echo("GET parameter song_url not defined.");
    die;
}

$song_url = $_GET['song_url'];

header('Content-type: application/xml');
echo('<?xml version="1.0" encoding="UTF-8"?>');
?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
    <trackList>
        <track>
            <location><?= $song_url; ?>.mp3</location>
            <title><?= $song_url; ?></title>
        </track>

    </trackList>
</playlist>