<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $crest_types = \L41rx\FE3H\Enumerations\CrestType::all();
    $crest_sizes = \L41rx\FE3H\Enumerations\CrestSize::all();

    echo "<?php\n\nnamespace L41rx\FE3H\Enumerations;\n\n";
    echo "use L41rx\FE3H\Enumeration;\n";
    echo "use L41rx\FE3H\Enumeration\CrestType;\n";
    echo "use L41rx\FE3H\Enumeration\CrestSize;\n\n";
    echo "class Crest extends Enumeration\n";
    echo "{\n\n";

    foreach ($crest_types as $ct_key => $ct) {
    	foreach ($crest_sizes as $cs_key => $cs) {
	        echo "\tconst " . makeConstName($ct_key, $cs_key) . " = [\n";
	        echo "\t\t'slug' => '".makeSlug($ct_key, $cs_key)."',\n";
	        echo "\t\t'name' => '".makeSlug($ct_key, $cs_key)."',\n";
	        echo "\t\t'crest_type' => CrestType::{$ct_key},\n";
	        echo "\t\t'crest_size' => CrestSize::{$cs_key}\n";
	        echo "\t];\n\n";
	    }
    }

echo "}\n";


function makeConstName($ct, $cs) {
	$name = $cs."_".$ct;
    return strtoupper($name);
}

function makeSlug($ct, $cs) {
    $name = $cs."_".$ct;
    return strtolower($name);   
}

function makeName()
