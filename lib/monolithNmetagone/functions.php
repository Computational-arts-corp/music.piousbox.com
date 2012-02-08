<?php

function e($in) {
    echo($in);
}

function pr($in) {
    e('<pre>');
    print_r($in);
    e('</pre>');
}

/**
 * Trash; this function should not be used anywhere.
 * @param <type> $directory
 * @return <type>
 */
function dirList($directory) {

    // create an array to hold directory list
    $results = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // keep going until all files in directory have been read
    while ($file = readdir($handler)) {

        // if $file isn't this directory or its parent,
        // add it to the results array
        if ($file != '.' && $file != '..')
            $results[] = $file;
    }

    // tidy up: close the handler
    closedir($handler);

    // done!
    return $results;
}

/**
 *
 * @param string $path path to the directory to be traversed.
 * @return array $files the array with filenames.
 */
function listFiles($path) {
    $files = array();

    if ($handle = opendir($path)) {
        // echo "Directory handle: $handle\n<br />";
        // echo "Files:\n<br />";

        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
            $files[] = $file;
        }

        closedir($handle);
        return $files;
    }
}

function listDirs($path) {
    $files = array();

    if ($handle = opendir($path)) {
        // echo "Directory handle: $handle\n<br />";
        // echo "Files:\n<br />";

        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
            // if (is_dir($file) && $file !== '.' && $file !== '..' && $file !== '.svn')

            if (is_dir($path . $file) && $file != '..' && $file != '.' && $file != '.svn') {
                $files[] = $file;
            }
        }

        closedir($handle);
        return $files;
    }
}

function listMp3($path) {
    $files = array();

    if ($handle = opendir($path)) {
//        echo "Directory handle: $handle\n<br />";
//        echo "Files:\n<br />";

        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
            if (preg_match("/(\.mp3)/i", $file)) {
                $files[] = $file;
            }
        }

        closedir($handle);
        return $files;
    }
}

function listImages($path) {
    $files = array();

    if ($handle = opendir($path)) {
        // echo "Directory handle: $handle\n<br />";
        // echo "Files:\n<br />";

        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
            if (preg_match("/(jpg|png|gif)/i", $file)) {
                $files[] = $file;
            }
        }

        closedir($handle);
        return $files;
    }
}

function post($url, $data) {
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
    curl_setopt($process, CURLOPT_HEADER, 1);
    curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
    if ($this->cookies == TRUE)
        curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
    if ($this->cookies == TRUE)
        curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
    curl_setopt($process, CURLOPT_ENCODING, $this->compression);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    if ($this->proxy)
        curl_setopt($process, CURLOPT_PROXY, $this->proxy);
    curl_setopt($process, CURLOPT_POSTFIELDS, $data);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($process, CURLOPT_POST, 1);
    $return = curl_exec($process);
    curl_close($process);
    return $return;
}

