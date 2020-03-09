<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\Character;

foreach (Character::all() as $c) {
    echo "<pre>".htmlspecialchars(file_get_contents("https://fireemblemwiki.org/wiki/" . $c['name']))."</pre>";
    echo "<hr>ZZMARKER-{$c['name']}<hr>XYZ-MARKER-{$c['name']}<hr>";
}
?>
