<?php


namespace L41rx\FE3H\Enumerations;

use L41rx\FE3H\Enumeration;

class Moon extends Enumeration
{
	public static function default(string $property) {
        switch ($property) {
            case 'name':
            case 'location':
                return "Unknown";
                break;
        }

        return parent::default($property);
    }

	const GARLAND = [
		'slug' => 'garland',
		'name' => 'Garland Moon',
		'order' => 0
	];

	const BLUE_SEA = [
		'slug' => 'blue_sea',
		'name' => 'Blue Sea Moon',
		'order' => 1
	];

	const VERDANT_RAIN = [
		'slug' => 'verdant_rain',
		'name' => 'Verdant Rain Moon',
		'order' => 2
	];

	const HORSEBOW_MOON = [
		'slug' => 'horsebow_moon',
		'name' => 'Horsebow Moon',
		'order' => 3
	];

	const WYVERN = [
		'slug' => 'wyvern',
		'name' => 'Wyvern Moon',
		'order' => 4
	];

	const RED_WOLF = [
		'slug' => 'red_wolf',
		'name' => 'Red Wolf Moon',
		'order' => 5
	];

	const ETHEREAL = [
		'slug' => 'ethereal',
		'name' => 'Ethereal Moon',
		'order' => 6
	];

	const GUARDIAN_MOON = [
		'slug' => 'guardian_moon',
		'name' => 'Guardian Moon',
		'order' => 7
	];

	const PEGASUS = [
		'slug' => 'pegasus',
		'name' => 'Pegasus Moon',
		'order' => 8
	];
}

/*
guardian moon
pegasis
lone			// ???
great tree		// ??
harpstring		// ???
garland
blue sea
verdant rain
horsebow
wyvern
red wolf
ethereal

all kills-
1 skillxp dmitri axe(E)
2 dmitri bow(E)
3 byleth sword(D+)

conwhateverly, 26 xp for singing in faith for ingrtid and ashe. st macuiel day, 2nd month

*/
