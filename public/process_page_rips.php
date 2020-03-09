<?php
require_once __DIR__.'/../vendor/autoload.php';

function contains($str, $sub) {
    if (strpos($str, $sub) !== false)
        return true;
    return false;
}

$handle = fopen(__DIR__."/../src/data/page_rips_wiki.html", "r");
$grab_bio = false;
$bios = [];
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if ($grab_bio) {
            array_push($bios, $line);
            $grab_bio = false;
        }

        if (contains($line, 'id="Biography"'))
            $grab_bio = true;
    }
    fclose($handle);
} else {
    die("wtf cant read");
}

foreach ($bios as $bio) {
    echo "'description' => '";
    echo trim(str_replace("'", "\'", strip_tags($bio)), "\n");
    echo "'\n";
}

