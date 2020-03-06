<?php
namespace L41rx\FE3H\Enumerations;

use L41rx\FE3H\Enumeration;

class CrestType extends Enumeration
{

	const CREST_OF_FLAMES = [
		'slug' => 'crest_of_flames',
		'name' => 'Crest of Flames',
		'effect' => "Occasionally restores HP equal to 30% of damage dealt. Rarely raises Mt and stops counterattacks.",
		'description' => "The Crest of the goddess who governs the world.",
		'bearers' => "Byleth, Sothis, Nemesis",
		'weapon' => "Sword of the Creator"
	];

	const CREST_OF_SEIROS = [
		'slug' => 'crest_of_seiros',
		'name' => 'Crest of Seiros',
		'effect' => "Occasionally raises Mt when using combat arts.",
		'description' => "Saint Seiros bore this Crest and passed it down through House Hresvelg.",
		'bearers' => "Edelgard, Rhea, Jeralt",
		'weapon' => "Aymr, Sword of Seiros, Seiros Shield",
		'dragon' => "Sky Dragon"
	];

	const CREST_OF_BLAIDDYD = [
		'slug' => 'crest_of_blaiddyd',
		'name' => 'Crest of Blaiddyd',
		'effect' => "Occasionally doubles Atk(Attack) and weapon uses for combat arts.",
		'description' => "The Faerghus royal family's Crest, inherited from Blaiddyd.",
		'bearers' => "Dimitri",
		'weapon' => "Areadbhar",
		'dragon' => "Grim Dragon"
	];

	const CREST_OF_FRALDARIUS = [
		'slug' => 'crest_of_fraldarius',
		'name' => 'Crest of Fraldarius',
		'effect' => "Sometimes raises Mt when using a weapon.",
		'description' => "House Fraldarius's Crest, inherited from Fraldarius.",
		'bearers' => "Felix, Rodrigue",
		'weapon' => "Aegis Shield, Sword of Moralta",
		'dragon' => "Shield Dragon"
	];

	const CREST_OF_LAMINE = [
		'slug' => 'crest_of_lamine',
		'name' => 'Crest of Lamine',
		'effect' => "Occasionally conserves uses of recovery magic.",
		'description' => "A Crest inherited from Lamine.",
		'bearers' => "Mercedes, Jeritza",
		'weapon' => "Rafail Gem, Tathlum Bow",
		'dragon' => "Aegis Dragon"
	];

	const CREST_OF_GAUTIER = [
		'slug' => 'crest_of_gautier',
		'name' => 'Crest of Gautier',
		'effect' => "Occasionally raises Mt when using combat arts.",
		'description' => "House Gautier's Crest, inherited from Gautier.",
		'bearers' => "Sylvain",
		'weapon' => "Lance of Ruin",
		'dragon' => "Fissure Dragon"
	];

	const CREST_OF_DOMINIC = [
		'slug' => 'crest_of_dominic',
		'name' => 'Crest of Dominic',
		'effect' => "Occasionally conserves uses of attack magic.",
		'description' => "House Dominic's Crest, inherited from Dominic.",
		'bearers' => "Annette",
		'weapon' => "Crusher",
		'dragon' => "Crusher Dragon"
	];

	const CREST_OF_DAPHNEL = [
		'slug' => 'crest_of_daphnel',
		'name' => 'Crest of Daphnel',
		'effect' => "Sometimes raises Mt when using combat arts.",
		'description' => "House Daphnel and House Galatea's Crest, inherited from Daphnel.",
		'bearers' => "Ingrid",
		'weapon' => "LÃºin",
		'dragon' => "Flame Dragon"
	];

	const CREST_OF_RIEGAN = [
		'slug' => 'crest_of_riegan',
		'name' => 'Crest of Riegan',
		'effect' => "Sometimes restores HP equal to 30% of damage dealt when using combat arts.",
		'description' => "A Crest inherited from Riegan.",
		'bearers' => "Claude",
		'weapon' => "Failnaught, Sword of Begalta",
		'dragon' => "Star Dragon"
	];

	const CREST_OF_GLOUCESTER = [
		'slug' => 'crest_of_gloucester',
		'name' => 'Crest of Gloucester',
		'effect' => "Occasionally raises Mt during magic attacks.",
		'description' => "House Gloucester's Crest, inherited from Gloucester.",
		'bearers' => "Lysithea, Lorenz",
		'weapon' => "Thyrsus, Axe of Ukonvasara",
		'dragon' => "Craft Dragon"
	];

	const CREST_OF_GONERIL = [
		'slug' => 'crest_of_goneril',
		'name' => 'Crest of Goneril',
		'effect' => "Sometimes allows combat arts to prevent enemy counterattacks.",
		'description' => "House Goneril's Crest, inherited from Goneril.",
		'bearers' => "Hilda",
		'weapon' => "Freikugel",
		'dragon' => "Kalpa Dragon"
	];

	const CREST_OF_CHARON = [
		'slug' => 'crest_of_charon',
		'name' => 'Crest of Charon',
		'effect' => "Occasionally raises Mt when using combat arts.",
		'description' => "House Charon's Crest, inherited from Charon.",
		'bearers' => "Catherine, Lysithea",
		'weapon' => "Thunderbrand",
		'dragon' => "Lightning Dragon"
	];

	const CREST_OF_MACUIL = [
		'slug' => 'crest_of_macuil',
		'name' => 'Crest of Macuil',
		'effect' => "Occasionally raises Mt during magic attacks.",
		'description' => "Saint Macuil bore this Crest. It is a symbol of magic and mastery of the wind.",
		'bearers' => "The Wind Caller",
		'weapon' => "Sword of Begalta",
		'dragon' => "Wind Dragon"
	];

	const CREST_OF_CICHOL = [
		'slug' => 'crest_of_cichol',
		'name' => 'Crest of Cichol',
		'effect' => "Sometimes let combat arts prevent enemy counterattacks.",
		'description' => "Saint Cichol bore this Crest. It is a symbol of strength and the land.",
		'bearers' => "Seteth, Ferdinand",
		'weapon' => "Spear of Assal, Ochain Shield",
		'dragon' => "Earth Dragon"
	];

	const CREST_OF_INDECH = [
		'slug' => 'crest_of_indech',
		'name' => 'Crest of Indech',
		'effect' => "Occasionally allows weapon attacks to strike twice.",
		'description' => "Saint Indech bore this Crest. It is a symbol of wisdom and water.",
		'bearers' => "The Immovable, Bernadetta, Hanneman",
		'weapon' => "The Inexhaustible",
		'dragon' => "Water Dragon"
	];

	const CREST_OF_CETHLEANN = [
		'slug' => 'crest_of_cethleann',
		'name' => 'Crest of Cethleann',
		'effect' => "Sometimes raises Mt when using recovery magic.",
		'description' => "Saint Cethleann bore this Crest. A symbol of kindness and mastery of light.",
		'bearers' => "Flayn, Linhardt",
		'weapon' => "Caduceus Staff",
		'dragon' => "Light Dragon"
	];

	const CREST_OF_MAURICE = [
		'slug' => 'crest_of_maurice',
		'name' => 'Crest of Maurice',
		'effect' => "Sometimes raises Mt when using a weapon.",
		'description' => "The Crest of a Hero whose identity was lost to history.",
		'bearers' => "Wandering Beast, Marianne",
		'weapon' => "Blutgang",
		'dragon' => "Storm Dragon"
	];

	const CREST_OF_TIMOTHEOS = [
		'slug' => 'crest_of_timotheos',
		'name' => 'Crest of Timotheos',
		'effect' => "Occasionally does not consume a use for recovery magic.",
		'weapon' => "Dark Creator Sword",
		'dragon' => "Dark Dragon"
	];

	const CREST_OF_NOA = [
		'slug' => 'crest_of_noa',
		'name' => 'Crest of Noa',
		'effect' => "Occasionally does not consume a use during magic attacks.",
		'weapon' => "Dark Creator Sword",
		'dragon' => "Bloom Dragon"
	];

	const CREST_OF_ERNEST = [
		'slug' => 'crest_of_ernest',
		'name' => 'Crest of Ernest',
		'effect' => "Occasionally stops enemy counterattacks when using a weapon.",
		'dragon' => "Thorn Dragon"
	];

	const CREST_OF_CHEVALIER = [
		'slug' => 'crest_of_chevalier',
		'name' => 'Crest of Chevalier',
		'effect' => "Sometimes restores HP equal to 30% of damage dealt when using Combat Arts.",
		'dragon' => "Snow Dragon"
	];

	const CREST_OF_AUBIN = [
		'slug' => 'crest_of_aubin',
		'name' => 'Crest of Aubin',
		'effect' => "Occasionally prevents enemy counterattacks when using a weapon.",
		'dragon' => "Ice Dragon"
	];

}
