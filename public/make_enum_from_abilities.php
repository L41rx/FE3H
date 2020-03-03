<?php
    require_once __DIR__.'/../vendor/autoload.php';
    $magic_json = file_get_contents(__DIR__.'/../src/data/reason_magic.json');
    $magic = json_decode($magic_json, true);

    echo "namespace L41rx\FE3H\Enumerations;\n\n";
    echo "use L41rx\FE3H\Enumeration;\n\n";
    echo "class Magic extends Enumeration\n";
    echo "{\n\n";

    foreach ($magic as $a) {
        // $a['slug'] = str_replace('_+', '_plus', $a['slug']);

        echo "\tconst " . makeConstName($a['name']) . " = [\n";
        echo "\t\t'slug' => '".makeSlug($a['name'])."',\n";
        echo "\t\t'name' => \"{$a['name']}\",\n";
        echo "\t\t'mt' => \"{$a['mt']}\",\n";
        echo "\t\t'hit' => \"{$a['hit']}\",\n";
        echo "\t\t'crit' => \"{$a['crit']}\",\n";
        echo "\t\t'range' => \"{$a['range']}\",\n";
        echo "\t\t'durability' => \"{$a['durability']}\",\n";
        echo "\t\t'weight' => \"{$a['weight']}\",\n";
        echo "\t\t'effect' => \"{$a['effect']}\",\n";
        echo "\t\t'skill' => Skill::REASON\n";
        echo "\t];\n\n";
    }

echo "}\n";


function makeConstName($name) {
    $name = str_replace(" ", "_", $name);
    return strtoupper($name);
}

function makeSlug($name) {
    $name = str_replace(" ", "_", $name);
    return strtolower($name);   
}