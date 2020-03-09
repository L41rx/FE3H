<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\Character;

$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0\r\n"
    ]
];

$context = stream_context_create($opts);

foreach (Character::all() as $c) {
    $html = file_get_contents("https://fireemblemwiki.org/wiki/" . $c['name'], false, $context);
    file_put_contents(__DIR__.'/../src/data/wiki_rip.html', "\n\nSTART-{$c['name']}-{$c['slug']}\n\n", FILE_APPEND);
    file_put_contents(__DIR__.'/../src/data/wiki_rip.html', $html, FILE_APPEND);
    file_put_contents(__DIR__.'/../src/data/wiki_rip.html', "\n\nEND-{$c['name']}-{$c['slug']}\n\n", FILE_APPEND);

    file_put_contents(__DIR__.'/../src/data/wiki_rips/'.$c['slug'].'.html', $html);
}
echo "done.";

