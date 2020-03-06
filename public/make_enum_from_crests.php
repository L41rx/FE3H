<?php
    require_once __DIR__.'/../vendor/autoload.php';
    $magic_json = file_get_contents(__DIR__.'/../src/data/crests.json');
    $crests = json_decode($magic_json, true);

    echo "namespace L41rx\FE3H\Enumerations;\n\n";
    echo "use L41rx\FE3H\Enumeration;\n\n";
    echo "class CrestType extends Enumeration\n";
    echo "{\n\n";

    foreach ($crests as $a) {
        // $a['slug'] = str_replace('_+', '_plus', $a['slug']);

        echo "\tconst " . makeConstName($a['name']) . " = [\n";

        $html = "";
        $html .= "\t\t'slug' => '".makeSlug($a['name'])."',\n";
        $html .= "\t\t'name' => '".($a['name'])."',\n";
        $html .= "\t\t'effect' => \"{$a['effect']}\",\n";

        if (isset($a['description']))
        	$html .= "\t\t'description' => \"{$a['description']}\",\n";

        if (isset($a['bearers']))
        	$html .= "\t\t'bearers' => \"{$a['bearers']}\",\n";

        if (isset($a['weapon']))
        	$html .= "\t\t'weapon' => \"{$a['weapon']}\",\n";

        if (isset($a['dragon']))
        	$html .= "\t\t'dragon' => \"{$a['dragon']}\",\n";
        
        $html = rtrim($html, ",\n");

		echo $html."\n";
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




/*{
"name": "Crest of Flames",
"description": "The Crest of the goddess who governs the world.",
"bearers": "Byleth, Sothis, Nemesis",
"effect": "Occasionally restores HP equal to 30% of damage dealt. Rarely raises Mt and stops counterattacks.",
"weapon": "Sword of the Creator"
},*/