<?php
    require_once __DIR__.'/../vendor/autoload.php';
    $abilities_json = file_get_contents(__DIR__.'/../src/data/abilities.json');
    $abilities = json_decode($abilities_json, true);

    echo "namespace L41rx\FE3H\Enumerations;\n\n";
    echo "use L41rx\FE3H\Enumeration;\n\n";
    echo "class Ability extends Enumeration\n";
    echo "{\n\n";

    foreach ($abilities as $a) {
        $a['slug'] = str_replace('_+', '_plus', $a['slug']);

        echo "\tconst " . strtoupper($a['slug']) . " = [\n";
        echo "\t\t'slug' => '{$a['slug']}',\n";
        echo "\t\t'name' => \"{$a['name']}\",\n";
        echo "\t\t'description' => \"{$a['description']}\",\n";
        echo "\t\t'acquisition' => \"{$a['acquisition']}\",\n";
        echo "\t\t'tags' => [";

        $tag_str = "";
        foreach ($a['tags'] as $tag) {
            $tag_str .= "'{$tag}', ";
        }
        $tag_str = rtrim($tag_str, ", \t\n");
        echo $tag_str."]\n";

        echo "\t];\n\n";
    }

echo "}\n";
