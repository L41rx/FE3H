<?php

$chars = ["Byleth",
"Hubert",
"Ferdinand",
"Linhardt",
"Caspar",
"Bernadetta",
"Dorothea",
"Petra",
"Dedue",
"Felix",
"Ashe",
"Sylvain",
"Mercedes",
"Annette",
"Ingrid",
"Lorenz",
"Raphael",
"Ignatz",
"Lysithea",
"Marianne",
"Hilda",
"Leonie",
"Rhea",
"Seteth",
"Flayn",
"Hanneman",
"Manuela",
"Gilbert",
"Alois",
"Catherine",
"Shamir",
"Cyril",
"Jeritza",
"Anna",
"Yuri",
"Balthus",
"Constance",
"Hapi"];










foreach ($chars as $c) {
	echo "const ";
	echo strtoupper($c)." = [\n";
	echo "\t'slug' => \"".strtolower($c)."\",\n";
	echo "\t'name' => \"".$c."\"\n";
	echo "];\n\n";
};

















