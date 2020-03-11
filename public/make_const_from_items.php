<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/data/lost_items.php';

use \L41rx\FE3H\Enumerations\Character;
use \L41rx\FE3H\Enumerations\LostItem;

/*echo "namespace L41rx\FE3H\Enumerations;\n\n";
echo "use L41rx\FE3H\Enumeration;\n\n";
echo "class LostItem extends Enumeration\n";
echo "{\n\n";

foreach ($lost_items as $a) {
    echo "\tconst " . makeConstName($a['name']) . " = [\n";
    echo "\t\t'slug' => '".makeSlug($a['name'])."',\n";
    echo "\t\t'name' => \"{$a['name']}\",\n";
    echo "\t\t'character' => Character::".makeConstName($a['character']).",\n";
    echo "\t\t'location' => \"{$a['location']}\",\n";
    echo "\t\t'moon' => {$a['moon']},\n";
    echo "\t];\n\n";
}

echo "}\n";




echo "\n\n\n\n\n";*/





$character_items = "";
foreach (Character::all() as $c_slug => $character) {
	$character_items .= 'Character: '.$character['name']."\nlost items: [";
	foreach (LostItem::all() as $l_slug => $lost_item) {
		if ($character['slug'] === $lost_item['owner']) {
			$character_items .= 'LostItem::'.strtoupper($lost_item['slug']).',';
		}
	}
	$character_items .= "]\n\n";
}

echo $character_items;



function dd($var) {
	var_dump($var);
	die(1);
}





function makeConstName($name) {
$replace = [
	"'" => '',
	' ' => '_'
];
$name = str_replace(" ", "_", $name);
$name = str_replace("'", "", $name);
return strtoupper($name);
}

function makeSlug($name) {
$name = str_replace(" ", "_", $name);
$name = str_replace("'", "", $name);
return strtolower($name);   
}
