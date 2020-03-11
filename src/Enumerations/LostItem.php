<?php

namespace L41rx\FE3H\Enumerations;

use L41rx\FE3H\Enumeration;

class LostItem extends Enumeration
{

	public static function render($slug)
    {
        $constant = self::get($slug);
        $title = "This item belongs to ".ucfirst($constant['owner']).'.';
        if (isset($constant['location']))
        	$title .= " It can be found in the ".$constant['location'];

        if (isset($constant['moon']) && isset($constant['moon']['slug'])) // one
        	$title .= " during ".$constant['moon']['name'];
        else if (isset($constant['moon']) && isset($constant['moon'][0]['slug'])) { // more than one
        	$moon_names = [];
        	foreach ($constant['moon'] as $moon)
        		array_push($moon_names, $moon['name']);
        	$title .= " during: ".implode(', ', $moon_names);
        }

        $title .= '.';

        return '<span title="'.$title.'">'.$constant['name'].'</span>';
    }

	const WOODEN_FLASK = [
		'slug' => 'wooden_flask',
		'name' => "Wooden Flask",
		'owner' => 'jeralt',
		'location' => "Second Floor Lobby",
		'moon' => Moon::GARLAND
	];

	const SKETCH_OF_A_SIGIL = [
		'slug' => 'sketch_of_a_sigil',
		'name' => "Sketch of a Sigil",
		'owner' => 'hanneman',
		'location' => "Second Floor Hallway",
		'moon' => Moon::GARLAND
	];

	const HAND_DRAWN_MAP = [
		'slug' => 'hand_drawn_map',
		'name' => "Hand Drawn Map",
		'owner' => 'leonie',
		'location' => "Dining Hall Gardens",
		'moon' => Moon::GARLAND
	];

	const WHITE_GLOVE = [
		'slug' => 'white_glove',
		'name' => "White Glove",
		'owner' => 'edelgard',
		'location' => "Black Eagle Classroom",
		'moon' => Moon::GARLAND
	];

	const WOODEN_BUTTON = [
		'slug' => 'wooden_button',
		'name' => "Wooden Button",
		'owner' => 'raphael',
		'location' => "Training Grounds",
		'moon' => Moon::GARLAND
	];

	const TATTERED_OVERCOAT = [
		'slug' => 'tattered_overcoat',
		'name' => "Tattered Overcoat",
		'owner' => 'caspar',
		'location' => "Training Grounds",
		'moon' => Moon::GARLAND
	];

	const SCHOOL_OF_SORCERY_BOOK = [
		'slug' => 'school_of_sorcery_book',
		'name' => "School of Sorcery Book",
		'owner' => 'annette',
		'location' => "Dining Hall",
		'moon' => Moon::GARLAND
	];

	const LEATHER_BOW_SHEATH = [
		'slug' => 'leather_bow_sheath',
		'name' => "Leather Bow Sheath",
		'owner' => 'claude',
		'location' => "Reception Hall",
		'moon' => Moon::GARLAND
	];

	const ELEGANT_HAIR_CLIP = [
		'slug' => 'elegant_hair_clip',
		'name' => "Elegant Hair Clip",
		'owner' => 'rhea',
		'location' => "Second Floor - Audience Chamber",
		'moon' => Moon::GARLAND
	];

	const USED_BOTTLE_OF_PERFUME = [
		'slug' => 'used_bottle_of_perfume',
		'name' => "Used Bottle of Perfume",
		'owner' => 'hilda',
		'location' => "Marketplace",
		'moon' => Moon::BLUE_SEA
	];

	const CONFESSIONAL_LETTER = [
		'slug' => 'confessional_letter',
		'name' => "Confessional Letter",
		'owner' => 'marianne',
		'location' => "Stables",
		'moon' => Moon::BLUE_SEA
	];

	const ARTIFICIAL_FLOWER = [
		'slug' => 'artificial_flower',
		'name' => "Artificial Flower",
		'owner' => 'lorenz',
		'location' => "Pathway North of Knight's Hall",
		'moon' => Moon::BLUE_SEA
	];

	const BAG_OF_TEA_LEAVES = [
		'slug' => 'bag_of_tea_leaves',
		'name' => "Bag of Tea Leaves",
		'owner' => 'ferdinand',
		'location' => "Black Eagles Classroom",
		'moon' => Moon::BLUE_SEA
	];

	const THUNDERBRAND_REPLICA = [
		'slug' => 'thunderbrand_replica',
		'name' => "Thunderbrand Replica",
		'owner' => 'caspar',
		'location' => "Training Grounds",
		'moon' => Moon::BLUE_SEA
	];

	const BADGE_OF_GRADUATION = [
		'slug' => 'badge_of_graduation',
		'name' => "Badge of Graduation",
		'owner' => 'catherine',
		'location' => "Training Grounds",
		'moon' => Moon::BLUE_SEA
	];

	const NOXIOUS_HANDKERCHIEF = [
		'slug' => 'noxious_handkerchief',
		'name' => "Noxious Handkerchief",
		'owner' => 'hubert',
		'location' => "Training Grounds",
		'moon' => Moon::BLUE_SEA
	];

	const MYSTERIOUS_NOTEBOOK = [
		'slug' => 'mysterious_notebook',
		'name' => "Mysterious Notebook",
		'owner' => 'alois',
		'location' => "Cathedreal - Holy Mausoleum Entrance",
		'moon' => Moon::BLUE_SEA
	];

	const WELLNESS_HERBS = [
		'slug' => 'wellness_herbs',
		'name' => "Wellness Herbs",
		'owner' => 'manuela',
		'location' => "Second Floor - Infirmary",
		'moon' => Moon::BLUE_SEA
	];

	const SECRET_LEDGER = [
		'slug' => 'secret_ledger',
		'name' => "Secret Ledger",
		'owner' => 'anna',
		'location' => "Dining Hall Gardens",
		'moon' => Moon::BLUE_SEA
	];

	const NEEDLE_AND_THREAD = [
		'slug' => 'needle_and_thread',
		'name' => "Needle and Thread",
		'owner' => 'bernadetta',
		'location' => "1st Floor Dormitories - Outside Bernadetta's Room",
		'moon' => Moon::VERDANT_RAIN
	];

	const PORTRAIT_OF_RHEA = [
		'slug' => 'portrait_of_rhea',
		'name' => "Portrait of Rhea",
		'owner' => 'cyril',
		'location' => "2nd Floor Dormitories - Hallway",
		'moon' => Moon::VERDANT_RAIN
	];

	const FEATHER_PILLOW = [
		'slug' => 'feather_pillow',
		'name' => "Feather Pillow",
		'owner' => 'linhardt',
		'location' => "Dining Hall",
		'moon' => Moon::VERDANT_RAIN
	];

	const CURRY_COMB = [
		'slug' => 'curry_comb',
		'name' => "Curry Comb",
		'owner' => 'ingrid',
		'location' => "Entrance Hall",
		'moon' => Moon::VERDANT_RAIN
	];

	const ENCYCLOPEDIA_OF_SWEETS = [
		'slug' => 'encyclopedia_of_sweets',
		'name' => "Encyclopedia of Sweets",
		'owner' => 'lysithea',
		'location' => "Golden Deer Classroom",
		'moon' => Moon::VERDANT_RAIN
	];

	const UNUSED_LIPSTICK = [
		'slug' => 'unused_lipstick',
		'name' => "Unused Lipstick",
		'owner' => 'sylvain',
		'location' => "Reception Hall",
		'moon' => Moon::VERDANT_RAIN
	];

	const EXOTIC_FLOWER = [
		'slug' => 'exotic_flower',
		'name' => "Exotic Flower",
		'owner' => 'petra',
		'location' => "Reception Hall",
		'moon' => Moon::VERDANT_RAIN
	];

	const SWORD_BELT_FRAGMENT = [
		'slug' => 'sword_belt_fragment',
		'name' => "Sword Belt Fragment",
		'owner' => 'felix',
		'location' => "Training Hall",
		'moon' => Moon::VERDANT_RAIN
	];

	const ART_BOOK = [
		'slug' => 'art_book',
		'name' => "Art Book",
		'owner' => 'ignatz',
		'location' => "Cathedral",
		'moon' => Moon::VERDANT_RAIN
	];

	const NIMBUS_CHARM = [
		'slug' => 'nimbus_charm',
		'name' => "Nimbus Charm",
		'owner' => 'constance',
		'location' => "Abyss Entrance",
		'moon' => Moon::VERDANT_RAIN
	];

	const MAKEUP_BRUSH = [
		'slug' => 'makeup_brush',
		'name' => "Makeup Brush",
		'owner' => 'yuri',
		'location' => "Sauna",
		'moon' => Moon::VERDANT_RAIN
	];

	const ANTIQUE_CLASP = [
		'slug' => 'antique_clasp',
		'name' => "Antique Clasp",
		'owner' => 'flayn',
		'location' => "Fishing Pond",
		'moon' => Moon::HORSEBOW_MOON
	];

	const AGRICULTURAL_SURVEY = [
		'slug' => 'agricultural_survey',
		'name' => "Agricultural Survey",
		'owner' => 'ferdinand',
		'location' => "Stables",
		'moon' => Moon::HORSEBOW_MOON
	];

	const HOW_TO_BE_TIDY = [
		'slug' => 'how_to_be_tidy',
		'name' => "How to Be Tidy",
		'owner' => 'marianne',
		'location' => "Stables",
		'moon' => Moon::HORSEBOW_MOON
	];

	const GARDENING_SHEARS = [
		'slug' => 'gardening_shears',
		'name' => "Gardening Shears",
		'owner' => 'dedue',
		'location' => "Training Grounds",
		'moon' => Moon::HORSEBOW_MOON
	];

	const BLACK_LEATHER_GLOVES = [
		'slug' => 'black_leather_gloves',
		'name' => "Black Leather Gloves",
		'owner' => 'dimitri',
		'location' => "Training Grounds",
		'moon' => Moon::HORSEBOW_MOON
	];

	const SILVER_BROOCH = [
		'slug' => 'silver_brooch',
		'name' => "Silver Brooch",
		'owner' => 'dorothea',
		'location' => "Officer's Academy Courtyard",
		'moon' => Moon::HORSEBOW_MOON
	];

	const SPOTLESS_BANDAGE = [
		'slug' => 'spotless_bandage',
		'name' => "Spotless Bandage",
		'owner' => 'hilda',
		'location' => "Golden Deer Classroom",
		'moon' => Moon::HORSEBOW_MOON
	];

	const SILVER_NECKLACE = [
		'slug' => 'silver_necklace',
		'name' => "Silver Necklace",
		'owner' => 'gilbert',
		'location' => "Entrance Hall",
		'moon' => Moon::HORSEBOW_MOON
	];

	const HOW_TO_BAKE_SWEETS = [
		'slug' => 'how_to_bake_sweets',
		'name' => "How to Bake Sweets",
		'owner' => 'mercedes',
		'location' => "Cathedral",
		'moon' => Moon::HORSEBOW_MOON
	];

	const BUNDLE_OF_HERBS = [
		'slug' => 'bundle_of_herbs',
		'name' => "Bundle of Herbs",
		'owner' => 'ashe',
		'location' => "Cathedral",
		'moon' => Moon::HORSEBOW_MOON
	];

	const SEIROS_SCRIPTURES = [
		'slug' => 'seiros_scriptures',
		'name' => "Seiros Scriptures",
		'owner' => 'rhea',
		'location' => "Cathedral",
		'moon' => Moon::HORSEBOW_MOON
	];

	const HAMMER_AND_CHISEL = [
		'slug' => 'hammer_and_chisel',
		'name' => "Hammer and Chisel",
		'owner' => 'hanneman',
		'location' => "Second Floor",
		'moon' => Moon::HORSEBOW_MOON
	];

	const BUNDLE_OF_DRY_HEMP = [
		'slug' => 'bundle_of_dry_hemp',
		'name' => "Bundle of Dry Hemp",
		'owner' => 'shamir',
		'location' => "Marketplace",
		'moon' => Moon::WYVERN
	];

	const JOUSTING_ALMANAC = [
		'slug' => 'jousting_almanac',
		'name' => "Jousting Almanac",
		'owner' => 'ingrid',
		'location' => "Entrance Hall",
		'moon' => Moon::WYVERN
	];

	const BLACK_IRON_SPUR = [
		'slug' => 'black_iron_spur',
		'name' => "Black Iron Spur",
		'owner' => 'felix',
		'location' => "Dining Hall",
		'moon' => Moon::WYVERN
	];

	const BURLAP_SACK_OF_ROCKS = [
		'slug' => 'burlap_sack_of_rocks',
		'name' => "Burlap Sack of Rocks",
		'owner' => 'raphael',
		'location' => "Dining Hall",
		'moon' => Moon::WYVERN
	];

	const SMALL_TANNED_HIDE = [
		'slug' => 'small_tanned_hide',
		'name' => "Small Tanned Hide",
		'owner' => 'petra',
		'location' => "Reception Hall",
		'moon' => Moon::WYVERN
	];

	const LETTER_TO_RHEA = [
		'slug' => 'letter_to_rhea',
		'name' => "Letter to Rhea",
		'owner' => 'catherine',
		'location' => "Training Grounds",
		'moon' => Moon::WYVERN
	];

	const SHINY_STRIATED_PEBBLE = [
		'slug' => 'shiny_striated_pebble',
		'name' => "Shiny Striated Pebble",
		'owner' => 'hapi',
		'location' => "First Floor - Dormitories",
		'moon' => Moon::WYVERN
	];

	const STILL_LIFE_PICTURE = [
		'slug' => 'still_life_picture',
		'name' => "Still Life Picture",
		'owner' => 'bernadetta',
		'location' => "1st Floor Dormitory",
		'moon' => Moon::RED_WOLF
	];

	const WELL_USED_HATCHET = [
		'slug' => 'well_used_hatchet',
		'name' => "Well Used Hatchet",
		'owner' => 'cyril',
		'location' => "Dining Hall Gardens",
		'moon' => Moon::RED_WOLF
	];

	const CRUDE_ARROWHEADS = [
		'slug' => 'crude_arrowheads',
		'name' => "Crude Arrowheads",
		'owner' => 'leonie',
		'location' => "Dining Hall Balcony",
		'moon' => Moon::RED_WOLF
	];

	const FOREIGN_GOLD_COIN = [
		'slug' => 'foreign_gold_coin',
		'name' => "Foreign Gold Coin",
		'owner' => 'alois',
		'location' => "Fishing Pond",
		'moon' => Moon::RED_WOLF
	];

	const OLD_MAP_OF_ENBARR = [
		'slug' => 'old_map_of_enbarr',
		'name' => "Old Map of Enbarr",
		'owner' => 'flayn',
		'location' => "Fishing Pond",
		'moon' => Moon::RED_WOLF
	];

	const A_TREATSIE_ON_ETIQUITTE = [
		'slug' => 'a_treatsie_on_etiquitte',
		'name' => "A Treatsie on Etiquitte",
		'owner' => 'lorenz',
		'location' => "Entrance Hall",
		'moon' => Moon::RED_WOLF
	];

	const SONGSTRESS_POSTER = [
		'slug' => 'songstress_poster',
		'name' => "Songstress Poster",
		'owner' => 'dorothea',
		'location' => "Officer's Academy",
		'moon' => Moon::RED_WOLF
	];

	const THE_SAINTS_REVEALED = [
		'slug' => 'the_saints_revealed',
		'name' => "The Saints Revealed",
		'owner' => 'linhardt',
		'location' => "Reception Hall",
		'moon' => Moon::RED_WOLF
	];

	const CRUMPLED_LOVE_LETTER = [
		'slug' => 'crumpled_love_letter',
		'name' => "Crumpled Love Letter",
		'owner' => 'sylvain',
		'location' => "Knight's Hall",
		'moon' => Moon::RED_WOLF
	];

	const UNFINISHED_FABLE = [
		'slug' => 'unfinished_fable',
		'name' => "Unfinished Fable",
		'owner' => 'seteth',
		'location' => "Second Floor - Advisory Room",
		'moon' => Moon::RED_WOLF
	];

	const CLEAN_DUSTING_CLOTH = [
		'slug' => 'clean_dusting_cloth',
		'name' => "Clean Dusting Cloth",
		'owner' => 'manuela',
		'location' => "Second Floor - Infirmary",
		'moon' => Moon::RED_WOLF
	];

	const FRUIT_PRESERVES = [
		'slug' => 'fruit_preserves',
		'name' => "Fruit Preserves",
		'owner' => 'mercedes',
		'location' => "Cathedral",
		'moon' => Moon::RED_WOLF
	];

	const MILD_STOMACH_POISON = [
		'slug' => 'mild_stomach_poison',
		'name' => "Mild Stomach Poison",
		'owner' => 'claude',
		'location' => "Golden Deer Classroom",
		'moon' => Moon::RED_WOLF
	];

	const REPELLENT_POWDER = [
		'slug' => 'repellent_powder',
		'name' => "Repellent Powder",
		'owner' => 'constance',
		'location' => "Dining Hall Gardens",
		'moon' => Moon::RED_WOLF
	];

	const EVIL_REPELLING_AMULET = [
		'slug' => 'evil_repelling_amulet',
		'name' => "Evil-Repelling Amulet",
		'owner' => 'ashe',
		'location' => "Fishing Pond",
		'moon' => Moon::ETHEREAL
	];

	const CENTIPEDE_PICTURE = [
		'slug' => 'centipede_picture',
		'name' => "Centipede Picture",
		'owner' => 'shamir',
		'location' => "Stables",
		'moon' => Moon::ETHEREAL
	];

	const BIG_SPOON = [
		'slug' => 'big_spoon',
		'name' => "Big Spoon",
		'owner' => 'raphael',
		'location' => "Dining Hall",
		'moon' => Moon::ETHEREAL
	];

	const PRINCESS_DOLL = [
		'slug' => 'princess_doll',
		'name' => "Princess Doll",
		'owner' => 'lysithea',
		'location' => "Reception Hall",
		'moon' => Moon::ETHEREAL
	];

	const BLUE_STONE = [
		'slug' => 'blue_stone',
		'name' => "Blue Stone",
		'owner' => 'ignatz',
		'location' => "Golden Deer Classroom",
		'moon' => Moon::ETHEREAL
	];

	const OLD_CLEANING_CLOTH = [
		'slug' => 'old_cleaning_cloth',
		'name' => "Old Cleaning Cloth",
		'owner' => 'cyril',
		'location' => "Second Floor Lobby",
		'moon' => Moon::ETHEREAL
	];

	const CARVING_HAMMER = [
		'slug' => 'carving_hammer',
		'name' => "Carving Hammer",
		'owner' => 'gilbert',
		'location' => "Knight's Hall",
		'moon' => Moon::ETHEREAL
	];

	const LENS_CLOTH = [
		'slug' => 'lens_cloth',
		'name' => "Lens Cloth",
		'owner' => 'hanneman',
		'location' => "Knight's Hall",
		'moon' => Moon::ETHEREAL
	];

	const BOOK_OF_GHOST_STORIES = [
		'slug' => 'book_of_ghost_stories',
		'name' => "Book of Ghost Stories",
		'owner' => 'mercedes',
		'location' => "Cathedral - East Side",
		'moon' => Moon::ETHEREAL
	];

	const OLD_FISHING_ROD = [
		'slug' => 'old_fishing_rod',
		'name' => "Old Fishing Rod",
		'owner' => 'seteth',
		'location' => "Cathedral - Saint Statue Room",
		'moon' => Moon::ETHEREAL
	];

	const ANIMATED_BAIT = [
		'slug' => 'animated_bait',
		'name' => "Animated Bait",
		'owner' => 'linhardt',
		'location' => "Library",
		'moon' => [ Moon::ETHEREAL, Moon::GUARDIAN_MOON ]
	];

	const UNFINISHED_SCORE = [
		'slug' => 'unfinished_score',
		'name' => "Unfinished Score",
		'owner' => 'annette',
		'location' => "Blue Lion Classroom",
		'moon' => [ Moon::ETHEREAL, Moon::GUARDIAN_MOON ]
	];

	const INTRODUCTION_TO_MAGIC = [
		'slug' => 'introduction_to_magic',
		'name' => "Introduction to Magic",
		'owner' => 'alois',
		'location' => "Fishing Pond",
		'moon' => Moon::GUARDIAN_MOON
	];

	const LIGHT_PURPLE_VEIL = [
		'slug' => 'light_purple_veil',
		'name' => "Light Purple Veil",
		'owner' => 'manuela',
		'location' => "Greenhouse",
		'moon' => Moon::GUARDIAN_MOON
	];

	const LOVELY_COMB = [
		'slug' => 'lovely_comb',
		'name' => "Lovely Comb",
		'owner' => 'dorothea',
		'location' => "Greenhouse",
		'moon' => Moon::GUARDIAN_MOON
	];

	const PEGASUS_HORSESHOES = [
		'slug' => 'pegasus_horseshoes',
		'name' => "Pegasus Horseshoes",
		'owner' => 'ingrid',
		'location' => "Stables",
		'moon' => Moon::GUARDIAN_MOON
	];

	const WEATHERED_CLOAK = [
		'slug' => 'weathered_cloak',
		'name' => "Weathered Cloak",
		'owner' => 'catherine',
		'location' => "Entrance Hall",
		'moon' => Moon::GUARDIAN_MOON
	];

	const NOSELESS_PUPPET = [
		'slug' => 'noseless_puppet',
		'name' => "Noseless Puppet",
		'owner' => 'gilbert',
		'location' => "Knight's Hall Entrance",
		'moon' => Moon::GUARDIAN_MOON
	];

	const IRON_COOKING_POT = [
		'slug' => 'iron_cooking_pot',
		'name' => "Iron Cooking Pot",
		'owner' => 'dedue',
		'location' => "Knight's Hall",
		'moon' => Moon::GUARDIAN_MOON
	];

	const TRAINING_LOGBOOK = [
		'slug' => 'training_logbook',
		'name' => "Training Logbook",
		'owner' => 'dimitri',
		'location' => "Knight's Hall",
		'moon' => Moon::GUARDIAN_MOON
	];

	const LETTER_TO_THE_GODDESS = [
		'slug' => 'letter_to_the_goddess',
		'name' => "Letter to the Goddess",
		'owner' => 'ignatz',
		'location' => "Golden Deer Classroom",
		'moon' => Moon::GUARDIAN_MOON
	];

	const HANDMADE_HAIR_CLIP = [
		'slug' => 'handmade_hair_clip',
		'name' => "Handmade Hair Clip",
		'owner' => 'hilda',
		'location' => "Golden Deer Classroom",
		'moon' => Moon::GUARDIAN_MOON
	];

	const TOOTHED_DAGGER = [
		'slug' => 'toothed_dagger',
		'name' => "Toothed Dagger",
		'owner' => 'felix',
		'location' => "Training Grounds",
		'moon' => Moon::GUARDIAN_MOON
	];

	const ANIMAL_BONE_DICE = [
		'slug' => 'animal_bone_dice',
		'name' => "Animal Bone Dice",
		'owner' => 'shamir',
		'location' => "Training Grounds",
		'moon' => Moon::GUARDIAN_MOON
	];

	const SNAPPED_WRITING_QUILL = [
		'slug' => 'snapped_writing_quill',
		'name' => "Snapped Writing Quill",
		'owner' => 'seteth',
		'location' => "Second Floor - Advisory Room",
		'moon' => Moon::GUARDIAN_MOON
	];

	const BAG_OF_SEEDS = [
		'slug' => 'bag_of_seeds',
		'name' => "Bag of Seeds",
		'owner' => 'marianne',
		'location' => "Cathedral",
		'moon' => Moon::GUARDIAN_MOON
	];

	const DUSTY_BOOK_OF_FABLES = [
		'slug' => 'dusty_book_of_fables',
		'name' => "Dusty Book of Fables",
		'owner' => 'flayn',
		'location' => "Cathedral",
		'moon' => Moon::GUARDIAN_MOON
	];

	const FUR_SCARF = [
		'slug' => 'fur_scarf',
		'name' => "Fur Scarf",
		'owner' => 'leonie',
		'location' => "Near Amiibo Gazebo",
		'moon' => Moon::GUARDIAN_MOON
	];

	const BOARD_GAME_PIECE = [
		'slug' => 'board_game_piece',
		'name' => "Board Game Piece",
		'owner' => 'claude',
		'location' => "Entrance Hall next to Lysithea",
		'moon' => Moon::GUARDIAN_MOON
	];

	const WAX_DIPTYCH = [
		'slug' => 'wax_diptych',
		'name' => "Wax Diptych",
		'owner' => 'annette',
		'location' => "Dining Hall",
		'moon' => Moon::PEGASUS
	];

	const MAINTENANCE_OIL = [
		'slug' => 'maintenance_oil',
		'name' => "Maintenance Oil",
		'owner' => 'ferdinand',
		'location' => "Dining Hall",
		'moon' => Moon::PEGASUS
	];

	const ANNOTATED_DICTIONARY = [
		'slug' => 'annotated_dictionary',
		'name' => "Annotated Dictionary",
		'owner' => 'petra',
		'location' => "Dining Hall",
		'moon' => Moon::PEGASUS
	];

	const GROUNDING_CHARM = [
		'slug' => 'grounding_charm',
		'name' => "Grounding Charm",
		'owner' => 'caspar',
		'location' => "Dining Hall",
		'moon' => Moon::PEGASUS
	];

	const HEDGEHOG_CASE = [
		'slug' => 'hedgehog_case',
		'name' => "Hedgehog Case",
		'owner' => 'bernadetta',
		'location' => "Graveyard",
		'moon' => Moon::PEGASUS
	];

	const NEW_BOTTLE_OF_PERFUME = [
		'slug' => 'new_bottle_of_perfume',
		'name' => "New Bottle of Perfume",
		'owner' => 'lysithea',
		'location' => "Reception Hall",
		'moon' => Moon::PEGASUS
	];

	const SILK_HANDKERCHIEF = [
		'slug' => 'silk_handkerchief',
		'name' => "Silk Handkerchief",
		'owner' => 'lorenz',
		'location' => "Golden Deer Classroom",
		'moon' => Moon::PEGASUS
	];

	const THE_HISTORY_OF_SRENG = [
		'slug' => 'the_history_of_sreng',
		'name' => "The History of Sreng",
		'owner' => 'sylvain',
		'location' => "Blue Lions Classroom",
		'moon' => Moon::PEGASUS
	];

	const MOON_KNIGHTS_TALE = [
		'slug' => 'moon_knights_tale',
		'name' => "Moon Knight's Tale",
		'owner' => 'ashe',
		'location' => "Cathedral",
		'moon' => Moon::PEGASUS
	];

	const FADED_STAR_CHART = [
		'slug' => 'faded_star_chart',
		'name' => "Faded Star Chart",
		'owner' => 'rhea',
		'location' => "Second Floor - Library",
		'moon' => Moon::PEGASUS
	];

	const BALANCE_SCALE = [
		'slug' => 'balance_scale',
		'name' => "Balance Scale",
		'owner' => 'anna',
		'location' => "Above Graveyard",
		'moon' => Moon::PEGASUS
	];

	const BASKET_OF_BERRIES = [
		'slug' => 'basket_of_berries',
		'name' => "Basket of Berries",
		'owner' => 'hapi',
		'location' => "Greenhouse",
		'moon' => Moon::PEGASUS
	];

	const STIFF_HAND_WRAP = [
		'slug' => 'stiff_hand_wrap',
		'name' => "Stiff Hand Wrap",
		'owner' => 'balthus',
		'location' => "Fishing Pond",
		'moon' => Moon::PEGASUS
	];

	const EASTERN_PORCELAIN = [
		'slug' => 'eastern_porcelain',
		'name' => "Eastern Porcelain",
		'owner' => 'edelgard',
		'location' => 'Black Lions classroom'
	];

	const TIME_WORN_QUILL_PEN = [
		'slug' => 'time_worn_quill_pen',
		'name' => "Time-worn Quill Pen",
		'owner' => 'edelgard',
	];

	const DULLED_LONGSWORD = [
		'slug' => 'dulled_longsword',
		'name' => "Dulled Longsword",
		'owner' => 'dimitri',
	];

	const HRESVELG_TREATISE = [
		'slug' => 'hresvelg_treatise',
		'name' => "Hresvelg Treatise",
		'owner' => 'hubert',
	];

	const FOLDING_RAZOR = [
		'slug' => 'folding_razor',
		'name' => "Folding Razor",
		'owner' => 'hubert',
	];
}
