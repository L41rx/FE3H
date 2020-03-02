<?php

namespace L41rx\FE3H\Enumerations;

use L41rx\FE3H\Enumeration;

class Ability extends Enumeration
{
    public static function render($slug) {
        $ability = self::get($slug);
        $html = <<<HMTL
            <span style="text-decoration: underline;" title="{$ability['description']}">
                {$ability['name']}
            </span>
        HMTL;
        return $html;
    }

    const PROFESSORS_GUIDANCE = [
        'slug' => 'professors_guidance',
        'name' => "Professor's Guidance",
        'description' => "+20% Experience Gained to user and adjacent all",
        'acquisition' => "Be unit Byleth",
        'tags' => ['Unit passive', 'Byleth']
    ];

    const PROFESSORS_GUIDANCE_PLUS = [
        'slug' => 'professors_guidance_plus',
        'name' => "Professor's Guidance+",
        'description' => "+20% Experience Gained to user and adjacent ally, +2 Damage Deal",
        'acquisition' => "Be unit Byleth (Chapter 10 Battle)",
        'tags' => ['Unit passive', 'Byleth']
    ];

    const IMPERIAL_LINEAGE = [
        'slug' => 'imperial_lineage',
        'name' => "Imperial Lineage",
        'description' => "+20% Experience Gained",
        'acquisition' => "Be unit Edelgard",
        'tags' => ['Unit passive', 'Edelgard']
    ];

    const IMPERIAL_LINEAGE_PLUS = [
        'slug' => 'imperial_lineage_plus',
        'name' => "Imperial Lineage+",
        'description' => "+20% Experience Gained, If unit takes no action except Wait, grants Res +4 for 1 turn",
        'acquisition' => "Be unit Edelgard (post-timeskip)",
        'tags' => ['Unit passive', 'Edelgard']
    ];

    const ROYAL_LINEAGE = [
        'slug' => 'royal_lineage',
        'name' => "Royal Lineage",
        'description' => "+20% Experience Gaine",
        'acquisition' => "Be unit Dimitri",
        'tags' => ['Unit passive', 'Dimitri']
    ];

    const ROYAL_LINEAGE_PLUS = [
        'slug' => 'royal_lineage_plus',
        'name' => "Royal Lineage+",
        'description' => "+20% Experience Gained, Grants Avo +20 while unit is at full HP",
        'acquisition' => "Be unit Dimitri (post-timeskip)",
        'tags' => ['Unit passive', 'Dimitri']
    ];

    const LEICESTER_LINEAGE = [
        'slug' => 'leicester_lineage',
        'name' => "Leicester Lineage",
        'description' => "+20% Experience Gaine",
        'acquisition' => "Be unit Claude",
        'tags' => ['Unit passive', 'Claude']
    ];

    const LEICESTER_LINEAGE_PLUS = [
        'slug' => 'leicester_lineage_plus',
        'name' => "Leicester Lineage+",
        'description' => "+20% Experience Gained, grants unit effects of Pas",
        'acquisition' => "Be unit Claude (post-timeskip)",
        'tags' => ['Unit passive', 'Claude']
    ];

    const OFFICER_DUTY = [
        'slug' => 'officer_duty',
        'name' => "Officer Duty",
        'description' => "Boosts Gambit Might by 5",
        'acquisition' => "Be unit Hubert",
        'tags' => ['Unit passive', 'Hubert']
    ];

    const SONGSTRESS = [
        'slug' => 'songstress',
        'name' => "Songstress",
        'description' => "At the start of each turn, restores adjacent allies’ HP by 10%",
        'acquisition' => "Be unit Dorothea",
        'tags' => ['Unit passive', 'Dorothea']
    ];

    const CONFIDENCE = [
        'slug' => 'confidence',
        'name' => "Confidence",
        'description' => "When HP is full, unit gains +15 Hit and Avoi",
        'acquisition' => "Be unit Ferdinand",
        'tags' => ['Unit passive', 'Ferdinand']
    ];

    const PERSECUTION_COMPLEX = [
        'slug' => 'persecution_complex',
        'name' => "Persecution Complex",
        'description' => "When HP is not full, unit gains +5 Damag",
        'acquisition' => "Be unit Bernadetta",
        'tags' => ['Unit passive', 'Bernadetta']
    ];

    const BORN_FIGHTER = [
        'slug' => 'born_fighter',
        'name' => "Born Fighter",
        'description' => "Adjacent foes receive Avoid -10 during combat",
        'acquisition' => "Be unit Caspar",
        'tags' => ['Unit passive', 'Caspar']
    ];

    const CATNAP = [
        'slug' => 'catnap',
        'name' => "Catnap",
        'description' => "If unit waits without performing an action, restores 10% HP",
        'acquisition' => "Be unit Linhardt",
        'tags' => ['Unit passive', 'Linhardt']
    ];

    const HUNTERS_BOON = [
        'slug' => 'hunters_boon',
        'name' => "Hunter's Boon",
        'description' => "When foe has less than 50% HP, Critical rate +2",
        'acquisition' => "Be unit Petra",
        'tags' => ['Unit passive', 'Petra']
    ];

    const LIVE_TO_SERVE = [
        'slug' => 'live_to_serve',
        'name' => "Live to Serve",
        'description' => "When healing allies with White Magic, unit is healed by the same amoun",
        'acquisition' => "Be unit Mercedes",
        'tags' => ['Unit passive', 'Mercedes']
    ];

    const STAUNCH_SHIELD = [
        'slug' => 'staunch_shield',
        'name' => "Staunch Shield",
        'description' => "If user waits without acting, Defense +4 for one turn",
        'acquisition' => "Be unit Dedue",
        'tags' => ['Unit passive', 'Dedue']
    ];

    const LONE_WOLF = [
        'slug' => 'lone_wolf',
        'name' => "Lone Wolf",
        'description' => "When a Battalion is not deployed or when battalion health is zero, damage dealt +",
        'acquisition' => "Be unit Felix",
        'tags' => ['Unit passive', 'Felix']
    ];

    const LOCKPICK = [
        'slug' => 'lockpick',
        'name' => "Lockpick",
        'description' => "Unit can open locks and chests without key",
        'acquisition' => "Be unit Ashe",
        'tags' => ['Unit passive', 'Ashe']
    ];

    const PERSEVERANCE = [
        'slug' => 'perseverance',
        'name' => "Perseverance",
        'description' => "When Rally command is used on ally, grants Strength +4",
        'acquisition' => "Be unit Annette",
        'tags' => ['Unit passive', 'Annette']
    ];

    const PHILANDERER = [
        'slug' => 'philanderer',
        'name' => "Philanderer",
        'description' => "When adjacent to a female ally, damage dealt to foe +2, damage received from foe -2",
        'acquisition' => "Be unit Sylvain",
        'tags' => ['Unit passive', 'Sylvain']
    ];

    const LADY_KNIGHT = [
        'slug' => 'lady_knight',
        'name' => "Lady Knight",
        'description' => "When using a Gambit, Might +3 and Hit Rate +5",
        'acquisition' => "Be unit Ingrid",
        'tags' => ['Unit passive', 'Ingrid']
    ];

    const DISTINGUISHED_HOUSE = [
        'slug' => 'distinguished_house',
        'name' => "Distinguished House",
        'description' => "When a battalion is deployed, damage dealt +",
        'acquisition' => "Be unit Lorenz",
        'tags' => ['Unit passive', 'Lorenz']
    ];

    const ADVOCATE = [
        'slug' => 'advocate',
        'name' => "Advocate",
        'description' => "When an adjacent male ally enters battle, ally’s damage dealt +",
        'acquisition' => "Be unit Hilda",
        'tags' => ['Unit passive', 'Hilda']
    ];

    const GOODY_BASKET = [
        'slug' => 'goody_basket',
        'name' => "Goody Basket",
        'description' => "At the start of a turn, unit has Luck% chance of regaining 10% of H",
        'acquisition' => "Be unit Raphael",
        'tags' => ['Unit passive', 'Raphael']
    ];

    const MASTERMIND = [
        'slug' => 'mastermind',
        'name' => "Mastermind",
        'description' => "Unit gains 2x skill EXP from comba",
        'acquisition' => "Be unit Lysithea",
        'tags' => ['Unit passive', 'Lysithea']
    ];

    const WATCHFUL_EYE = [
        'slug' => 'watchful_eye',
        'name' => "Watchful Eye",
        'description' => "Hit rate +20",
        'acquisition' => "Be unit Ignatz",
        'tags' => ['Unit passive', 'Ignatz']
    ];

    const ANIMAL_FRIEND = [
        'slug' => 'animal_friend',
        'name' => "Animal Friend",
        'description' => "When adjacent to a horseback or flying ally, restores 20% HP at the start of the turn",
        'acquisition' => "Be unit Marianne",
        'tags' => ['Unit passive', 'Marianne', 'Flying']
    ];

    const RIVALRY = [
        'slug' => 'rivalry',
        'name' => "Rivalry",
        'description' => "When adjacent to a male ally, damage dealt to foe +2, damage received from foe -2",
        'acquisition' => "Be unit Leonie",
        'tags' => ['Unit passive', 'Leonie']
    ];

    const INFIRMARY_MASTER = [
        'slug' => 'infirmary_master',
        'name' => "Infirmary Master",
        'description' => "Adjacent allies gain Crit Avoid +10 during comba",
        'acquisition' => "Be unit Manuela",
        'tags' => ['Unit passive', 'Manuela']
    ];

    const CREST_SCHOLAR = [
        'slug' => 'crest_scholar',
        'name' => "Crest Scholar",
        'description' => "Use Rally to grant Mag +4 to an all",
        'acquisition' => "Be unit Hanneman",
        'tags' => ['Unit passive', 'Hanneman']
    ];

    const FIGHTING_SPIRIT = [
        'slug' => 'fighting_spirit',
        'name' => "Fighting Spirit",
        'description' => "Unit takes 5 less damage when no battalion is assigned or when battalion endurance is 0",
        'acquisition' => "Be unit Catherine",
        'tags' => ['Unit passive', 'Catherine']
    ];

    const COMPASSION = [
        'slug' => 'compassion',
        'name' => "Compassion",
        'description' => "Use Rally to grant Lck +8 to an ally",
        'acquisition' => "Be unit Alois",
        'tags' => ['Unit passive', 'Alois']
    ];

    const GUARDIAN = [
        'slug' => 'guardian',
        'name' => "Guardian",
        'description' => "Adjacent female allies deal 3 extra damage during comba",
        'acquisition' => "Be unit Seteth",
        'tags' => ['Unit passive', 'Seteth']
    ];

    const LILYS_POISE = [
        'slug' => 'lilys_poise',
        'name' => "Lily's Poise",
        'description' => "Adjacent allies take 3 less damage during combat",
        'acquisition' => "Be unit Flayn",
        'tags' => ['Unit passive', 'Flayn']
    ];

    const VETERAN_KNIGHT = [
        'slug' => 'veteran_knight',
        'name' => "Veteran Knight",
        'description' => "Unit takes 2 less damage while in formation with a battalion",
        'acquisition' => "Be unit Gilbert",
        'tags' => ['Unit passive', 'Gilbert']
    ];

    const SURVIVAL_INSTINCT = [
        'slug' => 'survival_instinct',
        'name' => "Survival Instinct",
        'description' => "If unit initiates combat and defeats foe, grants Str/Mag/Dex/Spd +4 for one turn",
        'acquisition' => "Be unit Shamir",
        'tags' => ['Unit passive', 'Shamir']
    ];

    const APTITUDE = [
        'slug' => 'aptitude',
        'name' => "Aptitude",
        'description' => "Makes each stat 20% more likely to increase on level up",
        'acquisition' => "Be unit Cyril",
        'tags' => ['Unit passive', 'Cyril']
    ];

    const MURDEROUS_INTENT = [
        'slug' => 'murderous_intent',
        'name' => "Murderous Intent",
        'description' => "If unit initiates combat, grants Hit +20 during combat",
        'acquisition' => "Be unit Death Knight",
        'tags' => ['Unit passive']
    ];

    const BUSINESS_PROSPERITY = [
        'slug' => 'business_prosperity',
        'name' => "Business Prosperity",
        'description' => "Grants Lck +5",
        'acquisition' => "Be unit Anna",
        'tags' => ['Unit passive']
    ];

    const HONORABLE_SPIRIT = [
        'slug' => 'honorable_spirit',
        'name' => "Honorable Spirit",
        'description' => "If unit is not near an ally, grants Atk +3 when in combat with a foe one space away",
        'acquisition' => "Be unit Yuri",
        'tags' => ['Unit passive', 'Yuri']
    ];

    const CIRCADIAN_BEAT = [
        'slug' => 'circadian_beat',
        'name' => "Circadian Beat",
        'description' => "Grants Str/Mag +3 when indoors and Def/Res +3 when outdoors",
        'acquisition' => "Be unit Constance",
        'tags' => ['Unit passive', 'Constance']
    ];

    const KING_OF_GRAPPLING = [
        'slug' => 'king_of_grappling',
        'name' => "King of Grappling",
        'description' => "Grants Str/Def +6 when HP ≤ 50%",
        'acquisition' => "Be unit Balthus",
        'tags' => ['Unit passive', 'Balthus']
    ];

    const MONSTROUS_APPEAL = [
        'slug' => 'monstrous_appeal',
        'name' => "Monstrous Appeal",
        'description' => "Makes all attacks effective against monsters and makes it easier for monsters to target unit",
        'acquisition' => "Be unit Hapi",
        'tags' => ['Unit passive', 'Hapi']
    ];

    const BLADE_BREAKER = [
        'slug' => 'blade_breaker',
        'name' => "Blade Breaker",
        'description' => "If unit damages foe, foe suffers Str/Def -6 for 1 turn after combat",
        'acquisition' => "Be unit Jeralt",
        'tags' => ['Unit passive', 'Jeralt']
    ];

    const SACRED_POWER = [
        'slug' => 'sacred_power',
        'name' => "Sacred Power",
        'description' => "Adjacent allies deal 3 extra damage and take 3 less damage during combat",
        'acquisition' => "Be unit Rhea. Or, master a class: Enlightened One",
        'tags' => ['Unit passive', 'Class mastery', 'Rhea', 'Enlightened One']
    ];

    const AGARTHAN_TECHNOLOGY = [
        'slug' => 'agarthan_technology',
        'name' => "Agarthan Technology",
        'description' => "Adjacent foes deal 3 less damage during combat",
        'acquisition' => "Be unit Solon, Kronya, Thales, Cornelia",
        'tags' => ['Unit passive', 'Solon', 'Kronya', 'Thales', 'Cornelia']
    ];

    const MIGHTY_KING_OF_LEGEND = [
        'slug' => 'mighty_king_of_legend',
        'name' => "Mighty King of Legend",
        'description' => "Negates 1 attack per turn and grants +3 to all stats per member of Ten Elites present",
        'acquisition' => "Be unit Nemesis",
        'tags' => ['Unit passive', 'Nemesis']
    ];

    const TEN_ELITES = [
		'slug' => 'ten_elites',
		'name' => "10 Elites",
		'description' => "Grants power to the Mighty King of Legend.",
		'acquisition' => "Be unit Blaiddyd, Riegan, Lamine, Goneril, Charon, Fraldarius, Gloucester, Dominic, Gautier, Daphnel",
		'tags' => ['Unit passive', 'Blaiddyd', 'Riegan', 'Lamine', 'Goneril', 'Charon', 'Fraldarius', 'Gloucester', 'Dominic', 'Gautier', 'Daphnel']
	];

	const CHARM = [
        'slug' => 'charm',
        'name' => "Charm",
        'description' => "When allies adjacent to unit enter combat, allies gain +3 Damage.",
        'acquisition' => "Make active class in list: Lord, Armored Lord, High Lord, Wyvern Master, Emperor, Great Lord, Barbarossa",
        'tags' => ['Class passive', 'Lord', 'Armored Lord', 'High Lord', 'Wyvern Master', 'Emperor', 'Great Lord', 'Barbarossa']
    ];

	const CANTO = [
        'slug' => 'canto',
        'name' => "Canto",
        'description' => "After performing an action, user can use their leftover movement.",
        'acquisition' => "Make active class in list: Cavalier, Pegasus Knight, Paladin, Wyvern Rider, Wyvern Master, Death Knight, Dark Flier, Valkyrie, Falcon Knight, Wyvern Lord, Great Knight, Bow Knight, Dark Knight, Holy Knight, Barbarossa",
        'tags' => ['Class passive', 'Lord', 'Cavalier', 'Pegasus Knight', 'Paladin', 'Wyvern Rider', 'Falcon Knight', 'Wyvern Lord', 'Great Knight', 'Bow Knight', 'Dark Knight', 'Holy Knight', 'Wyvern Master', 'Barbarossa', 'Valkyrie']
    ];

	const UNARMED_COMBAT = [
        'slug' => 'unarmed_combat',
        'name' => "Unarmed Combat",
        'description' => "User can fight without a weapon equipped.",
        'acquisition' => "Make active class in list: Brawler, Grappler, War Monk, War Cleric. Or, master a class: Brawler",
        'tags' => ['Class passive', 'Class mastery', 'Monk', 'Brawler', 'Grappler', 'War monk', 'War cleric', 'Brawl']
    ];

	const FIRE = [
        'slug' => 'fire',
        'name' => "Fire",
        'description' => "Enables the use of Fire. If already learned, doubles the number of uses.",
        'acquisition' => "Make active class in list: Mage",
        'tags' => ['Class passive', 'Mage']
    ];

	const MIASMA = [
        'slug' => 'miasma',
        'name' => "Miasma Δ",
        'description' => "Enables the use of Miasma Δ. If already learned, doubles the number of uses.",
        'acquisition' => "Make active class in list: Dark Mage, Dark Bishop",
        'tags' => ['Class passive', 'Dark Mage', 'Dark Bishop']
    ];

	const HEARTSEEKER = [
        'slug' => 'heartseeker',
        'name' => "Heartseeker",
        'description' => "Reduces Avoid of adjacent foes by 20.",
        'acquisition' => "Make active class in list: Dark Mage, Dark Bishop",
        'tags' => ['Class passive', 'Dark Mage', 'Dark Bishop']
    ];

	const STEAL = [
        'slug' => 'steal',
        'name' => "Steal",
        'description' => "Unit can steal non-weapon items from enemies with lower Spd than self.",
        'acquisition' => "Make active class in list: Thief. Or, master a class: Thief",
        'tags' => ['Class passive', 'Class mastery', 'Thief']
    ];

	const LOCKTOUCH = [
        'slug' => 'locktouch',
        'name' => "Locktouch",
        'description' => "Unit can open locks and chests without keys.",
        'acquisition' => "Make active class in list: Thief, Assassin, Trickster",
        'tags' => ['Class passive', 'Thief', 'Assassin']
    ];

	const AVOID_PLUS10 = [
        'slug' => 'avoid_plus10',
        'name' => "Avoid +10",
        'description' => "Increases Avoid by 10.",
        'acquisition' => "Make active class in list: Pegasus Knight, Falcon Knight, Wyvern Lord",
        'tags' => ['Class passive', 'Lord', 'Pegasus Knight', 'Falcon Knight', 'Wyvern Lord']
    ];

	const BOWRANGE_PLUS1 = [
        'slug' => 'bowrange_plus1',
        'name' => "Bowrange +1",
        'description' => "Increases range of Bows by 1.",
        'acquisition' => "Make active class in list: Archer, Sniper",
        'tags' => ['Class passive', 'Archer', 'Sniper', 'Bows']
    ];

	const BOWRANGE_PLUS2 = [
        'slug' => 'bowrange_plus2',
        'name' => "Bowrange +2",
        'description' => "Increases range of Bows by 2.",
        'acquisition' => "Make active class in list: Bow Knight",
        'tags' => ['Class passive', 'Bow Knight', 'Bows']
    ];

	const HEAL = [
        'slug' => 'heal',
        'name' => "Heal",
        'description' => "Unit can use Heal. If it has already been learnt, the number of times it can be used is doubled.",
        'acquisition' => "Make active class in list: Priest, War Monk, War Cleric",
        'tags' => ['Class passive', 'Monk', 'Priest', 'War monk', 'War cleric']
    ];

	const WHITE_MAGIC_HEAL_PLUS5 = [
        'slug' => 'white_magic_heal_plus5',
        'name' => "White Magic Heal +5",
        'description' => "White Magic heals +5 more HP.",
        'acquisition' => "Make active class in list: Priest",
        'tags' => ['Class passive', 'Priest']
    ];

	const WHITE_MAGIC_HEAL_PLUS10 = [
        'slug' => 'white_magic_heal_plus10',
        'name' => "White Magic Heal +10",
        'description' => "White Magic heals +10 more HP.",
        'acquisition' => "Make active class in list: Bishop",
        'tags' => ['Class passive', 'Bishop']
    ];

	const SWORDFAIRE = [
        'slug' => 'swordfaire',
        'name' => "Swordfaire",
        'description' => "Might +5 when a sword is equipped.",
        'acquisition' => "Make active class in list: Hero, Swordmaster, Assassin, Mortal Savant, Enlightened One, or, reach skill level S+ in swords",
        'tags' => ['Class passive', 'Skill proficiency', 'Swordmaster', 'Hero', 'Assassin', 'Mortal Savant', 'Enlightened One', 'Swords']
    ];

	const AXEFAIRE = [
        'slug' => 'axefaire',
        'name' => "Axefaire",
        'description' => "Might +5 when an axe is equipped.",
        'acquisition' => "Make active class in list: Fortress Knight, Warrior, Wyvern Rider, Armored Lord, Wyvern Lord, Great Knight, War Master, Emperor. Or, reach skill level S+ in axes",
        'tags' => ['Class passive', 'Skill proficiency', 'Lord', 'Warrior', 'Fortress Knight', 'Wyvern Rider', 'War Master', 'Wyvern Lord', 'Great Knight', 'Armored Lord', 'Emperor', 'Axes']
    ];

	const LANCEFAIRE = [
        'slug' => 'lancefaire',
        'name' => "Lancefaire",
        'description' => "Might +5 when a lance is equipped.",
        'acquisition' => "Make active class in list: Paladin, High Lord, Falcon Knight, Great Knight, Great Lord",
        'tags' => ['Class passive', 'Lord', 'Paladin', 'Falcon Knight', 'Great Knight', 'High Lord', 'Great Lord']
    ];

	const BOWFAIRE = [
        'slug' => 'bowfaire',
        'name' => "Bowfaire",
        'description' => "Might +5 when a bow is equipped.",
        'acquisition' => "Make active class in list: Sniper, Wyvern Master, Bow Knight, Barbarossa. Or, reach skill level S+ in bows",
        'tags' => ['Class passive', 'Skill proficiency', 'Sniper', 'Bow Knight', 'Wyvern Master', 'Barbarossa', 'Bows']
    ];

	const FISTFAIRE = [
        'slug' => 'fistfaire',
        'name' => "Fistfaire",
        'description' => "Might +5 when a gauntlet is equipped.",
        'acquisition' => "Make active class in list: Grappler, War Monk, War Cleric, War Master. Or, reach skill level S+ in brawl",
        'tags' => ['Class passive', 'Skill proficiency', 'Monk', 'Grappler', 'War Master', 'War monk', 'War cleric', 'Brawl']
    ];

	const BLACK_TOMEFAIRE = [
        'slug' => 'black_tomefaire',
        'name' => "Black Tomefaire",
        'description' => "Might +5 when Black Magic is equipped.",
        'acquisition' => "Make active class in list: Warlock, Dark Knight, Dark Flier, Mortal Savant. Or reach skill level S+ in reason as anyone but Edelgard, Hubert, Lysithea, and Jeritza",
        'tags' => ['Class passive', 'Skill proficiency', 'Edelgard', 'Hubert', 'Lysithea', 'Jeritza', 'Warlock', 'Mortal Savant', 'Dark Knight', 'Reason']
    ];

	const DARK_TOMEFAIRE = [
        'slug' => 'dark_tomefaire',
        'name' => "Dark Tomefaire",
        'description' => "Might +5 when Dark Magic is equipped.",
        'acquisition' => "Make active class in list: Dark Knight. Or reach skill level S+ in reason as Edelgard, Hubert, Lysithea, or Jeritza",
        'tags' => ['Class passive', 'Skill proficiency', 'Edelgard', 'Hubert', 'Lysithea', 'Jeritza', 'Dark Knight', 'Reason']
    ];

	const WHITE_TOMEFAIRE = [
        'slug' => 'white_tomefaire',
        'name' => "White Tomefaire",
        'description' => "Might +5 when White Magic is equipped.",
        'acquisition' => "Make active class in list: Holy Knight. Or reach skill level S+ in faith",
        'tags' => ['Class passive', 'Skill proficiency', 'Holy Knight', 'Faith']
    ];

	const VANTAGE = [
        'slug' => 'vantage',
        'name' => "Vantage",
        'description' => "Always attack first when under 50% HP.﻿",
        'acquisition' => "Make active class in list: Hero. Or, master a class: Mercenary",
        'tags' => ['Class passive', 'Class mastery', 'Mercenary', 'Hero']
    ];

	const WEIGHT_MINUS_5 = [
        'slug' => 'weight_minus_5',
        'name' => "Weight -5",
        'description' => "The combined weight of equipment is reduced by 5.",
        'acquisition' => "Make active class in list: Fortress Knight. Or reach skill level A+ in heavy armor",
        'tags' => ['Class passive', 'Skill proficiency', 'Fortress Knight', 'Heavy Armor']
    ];

	const TERRAIN_RESISTANCE = [
        'slug' => 'terrain_resistance',
        'name' => "Terrain Resistance",
        'description' => "Unit does not receive terrain damage.",
        'acquisition' => "Make active class in list: Paladin, Bishop, Holy Knight, Enlightened One",
        'tags' => ['Class passive', 'Paladin', 'Bishop', 'Holy Knight', 'Enlightened One']
    ];

	const BLACK_MAGIC_USES_x2 = [
        'slug' => 'black_magic_uses_x2',
        'name' => "Black Magic Uses x2",
        'description' => "Doubles the number of uses of Black Magic spells.",
        'acquisition' => "Make active class in list: Warlock, Gremory",
        'tags' => ['Class passive', 'Warlock', 'Gremory']
    ];

	const DARK_MAGIC_USES_x2 = [
        'slug' => 'dark_magic_uses_x2',
        'name' => "Dark Magic Uses x2",
        'description' => "Doubles the number of uses of Dark Magic spells.",
        'acquisition' => "Make active class in list: Gremory",
        'tags' => ['Class passive', 'Gremory']
    ];

	const WHITE_MAGIC_USES_x2 = [
        'slug' => 'white_magic_uses_x2',
        'name' => "White Magic Uses x2",
        'description' => "Doubles the number of uses of White Magic spells.",
        'acquisition' => "Make active class in list: Bishop, Gremory",
        'tags' => ['Class passive', 'Bishop', 'Gremory']
    ];

	const SWORD_CRITICAL_PLUS10 = [
        'slug' => 'sword_critical_plus10',
        'name' => "Sword Critical +10",
        'description' => "Critical +10 when equipped with a sword.",
        'acquisition' => "Make active class in list: Swordmaster",
        'tags' => ['Class passive', 'Swordmaster']
    ];

	const STEALTH = [
        'slug' => 'stealth',
        'name' => "Stealth",
        'description' => "Unit is less likely to be targeted by enemies.",
        'acquisition' => "Make active class in list: Assassin, Trickster",
        'tags' => ['Class passive', 'Assassin']
    ];

	const AXE_CRITICAL_PLUS10 = [
        'slug' => 'axe_critical_plus10',
        'name' => "Axe Critical +10",
        'description' => "Critical +10 when equipped with an axe.",
        'acquisition' => "Make active class in list: Warrior",
        'tags' => ['Class passive', 'Warrior']
    ];

	const CRITICAL_PLUS20 = [
        'slug' => 'critical_plus20',
        'name' => "Critical +20",
        'description' => "Critical +20",
        'acquisition' => "Make active class in list: War Master",
        'tags' => ['Class passive', 'War Master']
    ];

	const FIENDISH_BLOW = [
        'slug' => 'fiendish_blow',
        'name' => "Fiendish Blow",
        'description' => "Mag +6 when initiating attack.",
        'acquisition' => "Make active class in list: Dark Bishop. Or, master a class: Mage",
        'tags' => ['Class passive', 'Class mastery', 'Mage', 'Dark Bishop']
    ];

	const LUCKY_SEVEN = [
        'slug' => 'lucky_seven',
        'name' => "Lucky Seven",
        'description' => "Each turn, grants +5 to one of the following stats: Str, Mag, Spd, Def, Res, Hit or Avo.",
        'acquisition' => "Make active class in list: Trickster",
        'tags' => ['Class passive']
    ];

	const TRANSMUTE = [
        'slug' => 'transmute',
        'name' => "Transmute",
        'description' => "If unit is hit with a magic attack during enemy phase, grants +3 to all stats until next player phase ends.",
        'acquisition' => "Make active class in list: Dark Flier. Or, master a class: Dark Flier",
        'tags' => ['Class passive', 'Class mastery']
    ];

	const BLACK_MAGIC_RANGE_PLUS1 = [
        'slug' => 'black_magic_range_plus1',
        'name' => "Black Magic Range +1",
        'description' => "Increases black magic range by 1.",
        'acquisition' => "Make active class in list: Valkyrie. Or reach skill level S in reason as anyone but Edelgard, Hubert, Lysithea, and Jeritza",
        'tags' => ['Class passive', 'Skill proficiency', 'Edelgard', 'Hubert', 'Lysithea', 'Jeritza', 'Reason', 'Valkyrie']
    ];

	const DARK_MAGIC_RANGE_PLUS1 = [
        'slug' => 'dark_magic_range_plus1',
        'name' => "Dark Magic Range +1",
        'description' => "Increases dark magic range by 1.",
        'acquisition' => "Make active class in list: Valkyrie. Or reach skill level S in reason as Edelgard, Hubert, Lysithea, or Jeritza",
        'tags' => ['Class passive', 'Skill proficiency', 'Edelgard', 'Hubert', 'Lysithea', 'Jeritza', 'Reason', 'Valkyrie']
    ];

	const SWORD_PROWESS_LV_1 = [
        'slug' => 'sword_prowess_lv_1',
        'name' => "Sword Prowess Lv 1",
        'description' => "Grants Hit +5, Avoid +7 and Critical Evade +5 when equipped with Sword",
        'acquisition' => "Reach skill level E+ in swords",
        'tags' => ['Skill proficiency', 'Swords']
    ];

	const SWORD_PROWESS_LV_2 = [
        'slug' => 'sword_prowess_lv_2',
        'name' => "Sword Prowess Lv 2",
        'description' => "Grants Hit +6, Avoid +10 and Critical Evade +6 when equipped with Sword",
        'acquisition' => "Reach skill level D+ in swords",
        'tags' => ['Skill proficiency', 'Swords']
    ];

	const SWORD_PROWESS_LV_3 = [
        'slug' => 'sword_prowess_lv_3',
        'name' => "Sword Prowess Lv 3",
        'description' => "Grants Hit +7, Avoid +13 and Critical Evade +7 when equipped with Sword",
        'acquisition' => "Reach skill level C+ in swords",
        'tags' => ['Skill proficiency', 'Swords']
    ];

	const AXEBREAKER = [
        'slug' => 'axebreaker',
        'name' => "Axebreaker",
        'description' => "Grants Hit/Avo +20 when using a sword against axe users.",
        'acquisition' => "Reach skill level B in swords",
        'tags' => ['Skill proficiency', 'Swords']
    ];

	const SWORD_PROWESS_LV_4 = [
        'slug' => 'sword_prowess_lv_4',
        'name' => "Sword Prowess Lv 4",
        'description' => "Grants Hit +8, Avoid +16 and Critical Evade +8 when equipped with Sword",
        'acquisition' => "Reach skill level B+ in swords",
        'tags' => ['Skill proficiency', 'Swords']
    ];

	const SWORD_PROWESS_LV_5 = [
        'slug' => 'sword_prowess_lv_5',
        'name' => "Sword Prowess Lv 5",
        'description' => "Grants Hit +10, Avoid +20 and Critical Evade +10 when equipped with Sword",
        'acquisition' => "Reach skill level A+ in swords",
        'tags' => ['Skill proficiency', 'Swords']
    ];

	const SWORD_CRIT_PLUS10 = [
        'slug' => 'sword_crit_plus10',
        'name' => "Sword Crit +10",
        'description' => "Grants Crit +10 when using a sword.",
        'acquisition' => "Reach skill level S in swords",
        'tags' => ['Skill proficiency', 'Swords']
    ];

	const LANCE_PROWESS_LV1 = [
        'slug' => 'lance_prowess_lv1',
        'name' => "Lance Prowess Lv.1",
        'description' => "Grants Hit +6, Avoid +6 and Critical Evade +5 when equipped with Lance",
        'acquisition' => "Reach skill level E+ in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const LANCE_PROWESS_LV2 = [
        'slug' => 'lance_prowess_lv2',
        'name' => "Lance Prowess Lv.2",
        'description' => "Grants Hit +8, Avoid +8 and Critical Evade +6 when equipped with Lance",
        'acquisition' => "Reach skill level D+ in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const LANCE_PROWESS_LV3 = [
        'slug' => 'lance_prowess_lv3',
        'name' => "Lance Prowess Lv.3",
        'description' => "Grants Hit +10, Avoid +10 and Critical Evade +7 when equipped with Lance",
        'acquisition' => "Reach skill level C+ in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const SWORDBREAKER = [
        'slug' => 'swordbreaker',
        'name' => "Swordbreaker",
        'description' => "Grants Hit/Avo +20 when using a lance against sword users.",
        'acquisition' => "Reach skill level B in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const LANCE_PROWESS_LV4 = [
        'slug' => 'lance_prowess_lv4',
        'name' => "Lance Prowess Lv.4",
        'description' => "Grants Hit +12, Avoid +12 and Critical Evade +8 when equipped with Lance",
        'acquisition' => "Reach skill level B+ in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const LANCE_PROWESS_LV5 = [
        'slug' => 'lance_prowess_lv5',
        'name' => "Lance Prowess Lv.5",
        'description' => "Grants Hit +15, Avoid +15 and Critical Evade +10 when equipped with Lance",
        'acquisition' => "Reach skill level A+ in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const LANCE_CRITICAL_PLUS10 = [
        'slug' => 'lance_critical_plus10',
        'name' => "Lance Critical +10",
        'description' => "Grants Crit +10 when using a lance.",
        'acquisition' => "Reach skill level S in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const LANCEFAIRE_ = [
        'slug' => 'lancefaire_',
        'name' => "Lancefaire ",
        'description' => "Might +5 when a lance is equipped.",
        'acquisition' => "Reach skill level S+ in lances",
        'tags' => ['Skill proficiency', 'Lances']
    ];

	const AXE_PROWESS_LV1 = [
        'slug' => 'axe_prowess_lv1',
        'name' => "Axe Prowess Lv.1",
        'description' => "Grants Hit +7, Avoid +5 and Critical Evade +5 when equipped with Axe",
        'acquisition' => "Reach skill level E+ in axes",
        'tags' => ['Skill proficiency', 'Axes']
    ];

	const AXE_PROWESS_LV2 = [
        'slug' => 'axe_prowess_lv2',
        'name' => "Axe Prowess Lv.2",
        'description' => "Grants Hit +10, Avoid +6 and Critical Evade +6 when equipped with Axe",
        'acquisition' => "Reach skill level D+ in axes",
        'tags' => ['Skill proficiency', 'Axes']
    ];

	const AXE_PROWESS_LV3 = [
        'slug' => 'axe_prowess_lv3',
        'name' => "Axe Prowess Lv.3",
        'description' => "Grants Hit +13, Avoid +7 and Critical Evade +7 when equipped with Axe",
        'acquisition' => "Reach skill level C+ in axes",
        'tags' => ['Skill proficiency', 'Axes']
    ];

	const LANCEBREAKER = [
        'slug' => 'lancebreaker',
        'name' => "Lancebreaker",
        'description' => "Grants Hit/Avo +20 when using an axe against lance users.",
        'acquisition' => "Reach skill level B in axes",
        'tags' => ['Skill proficiency', 'Axes']
    ];

	const AXE_PROWESS_LV4 = [
        'slug' => 'axe_prowess_lv4',
        'name' => "Axe Prowess Lv.4",
        'description' => "Grants Hit +16, Avoid +8 and Critical Evade +8 when equipped with Axe",
        'acquisition' => "Reach skill level B+ in axes",
        'tags' => ['Skill proficiency', 'Axes']
    ];

	const AXE_PROWESS_LV5_ = [
        'slug' => 'axe_prowess_lv5_',
        'name' => "Axe Prowess Lv.5 ",
        'description' => "rants Hit +20, Avoid +10 and Critical Evade +10 when equipped with Axe",
        'acquisition' => "Reach skill level A+ in axes",
        'tags' => ['Skill proficiency', 'Axes']
    ];

	const AXE_CRIT_PLUS10 = [
        'slug' => 'axe_crit_plus10',
        'name' => "Axe Crit +10",
        'description' => "Grants Crit +10 when using an axe.",
        'acquisition' => "Reach skill level S in axes",
        'tags' => ['Skill proficiency', 'Axes']
    ];

	const BOW_PROWESS_LV1 = [
        'slug' => 'bow_prowess_lv1',
        'name' => "Bow Prowess Lv.1",
        'description' => "Grants Hit +6, Avoid +6 and Critical Evade +5 when equipped with Bow",
        'acquisition' => "Reach skill level E+ in bows",
        'tags' => ['Skill proficiency', 'Bows']
    ];

	const BOW_PROWESS_LV2 = [
        'slug' => 'bow_prowess_lv2',
        'name' => "Bow Prowess Lv.2",
        'description' => "Grants Hit +8, Avoid +8 and Critical Evade +6 when equipped with Bow",
        'acquisition' => "Reach skill level D+ in bows",
        'tags' => ['Skill proficiency', 'Bows']
    ];

	const CLOSE_COUNTER = [
        'slug' => 'close_counter',
        'name' => "Close Counter",
        'description' => "Allows unit to counterattack adjacent foes.",
        'acquisition' => "Reach skill level C in bows",
        'tags' => ['Skill proficiency', 'Bows']
    ];

	const BOW_PROWESS_LV3 = [
        'slug' => 'bow_prowess_lv3',
        'name' => "Bow Prowess Lv.3",
        'description' => "Grants Hit +10, Avoid +10 and Critical Evade +7 when equipped with Bow",
        'acquisition' => "Reach skill level C+ in bows",
        'tags' => ['Skill proficiency', 'Bows']
    ];

	const BOW_PROWESS_LV4 = [
        'slug' => 'bow_prowess_lv4',
        'name' => "Bow Prowess Lv.4",
        'description' => "Grants Hit +12, Avoid +12 and Critical Evade +8 when equipped with Bow",
        'acquisition' => "Reach skill level B+ in bows",
        'tags' => ['Skill proficiency', 'Bows']
    ];

	const BOW_PROWESS_LV5 = [
        'slug' => 'bow_prowess_lv5',
        'name' => "Bow Prowess Lv.5",
        'description' => "Grants Hit +15, Avoid +15 and Critical Evade +10 when equipped with Bow",
        'acquisition' => "Reach skill level A+ in bows",
        'tags' => ['Skill proficiency', 'Bows']
    ];

	const BOW_CRITICAL_PLUS10 = [
        'slug' => 'bow_critical_plus10',
        'name' => "Bow Critical +10",
        'description' => "Grants Crit +10 when using a bow.",
        'acquisition' => "Reach skill level S in bows",
        'tags' => ['Skill proficiency', 'Bows']
    ];

	const BRAWLING_PROWESS_LV1 = [
        'slug' => 'brawling_prowess_lv1',
        'name' => "Brawling Prowess Lv.1",
        'description' => "Grants Hit +5, Avoid +7 and Critical Evade +5 when brawling.",
        'acquisition' => "Reach skill level E+ in brawl",
        'tags' => ['Skill proficiency', 'Brawl']
    ];

	const BRAWLING_PROWESS_LV2 = [
        'slug' => 'brawling_prowess_lv2',
        'name' => "Brawling Prowess Lv.2",
        'description' => "Grants Hit +6, Avoid +10 and Critical Evade +6 when brawling",
        'acquisition' => "Reach skill level D+ in brawl",
        'tags' => ['Skill proficiency', 'Brawl']
    ];

	const BRAWLING_PROWESS_LV3 = [
        'slug' => 'brawling_prowess_lv3',
        'name' => "Brawling Prowess Lv.3",
        'description' => "Grants Hit +7, Avoid +13 and Critical Evade +7 when brawling",
        'acquisition' => "Reach skill level C+ in brawl",
        'tags' => ['Skill proficiency', 'Brawl']
    ];

	const BRAWLING_PROWESS_LV4 = [
        'slug' => 'brawling_prowess_lv4',
        'name' => "Brawling Prowess Lv.4",
        'description' => "Grants Hit +8, Avoid +16 and Critical Evade +8 when brawling",
        'acquisition' => "Reach skill level B+ in brawl",
        'tags' => ['Skill proficiency', 'Brawl']
    ];

	const BRAWLING_PROWESS_LV5 = [
        'slug' => 'brawling_prowess_lv5',
        'name' => "Brawling Prowess Lv.5",
        'description' => "Grants Hit +10, Avoid +20 and Critical Evade +10 when brawling",
        'acquisition' => "Reach skill level A+ in brawl",
        'tags' => ['Skill proficiency', 'Brawl']
    ];

	const BRAWL_CRITICAL_PLUS10 = [
        'slug' => 'brawl_critical_plus10',
        'name' => "Brawl Critical +10",
        'description' => "Grants Crit +10 when brawling.",
        'acquisition' => "Reach skill level S in brawl",
        'tags' => ['Skill proficiency', 'Brawl']
    ];

	const REASON_PROWESS_LV1 = [
        'slug' => 'reason_prowess_lv1',
        'name' => "Reason Prowess Lv.1",
        'description' => "Grants Hit +7, Avoid +5 and Critical Evade +5 when equipped with Reason Magic",
        'acquisition' => "Reach skill level E+ in reason",
        'tags' => ['Skill proficiency', 'Reason']
    ];

	const REASON_PROWESS_LV2 = [
        'slug' => 'reason_prowess_lv2',
        'name' => "Reason Prowess Lv.2",
        'description' => "Grants Hit +10, Avoid +6 and Critical Evade +6 when equipped with Reason Magic",
        'acquisition' => "Reach skill level D+ in reason",
        'tags' => ['Skill proficiency', 'Reason']
    ];

	const REASON_PROWESS_LV3 = [
        'slug' => 'reason_prowess_lv3',
        'name' => "Reason Prowess Lv.3",
        'description' => "Grants Hit +13, Avoid +7 and Critical Evade +7 when equipped with Reason Magic",
        'acquisition' => "Reach skill level C+ in reason",
        'tags' => ['Skill proficiency', 'Reason']
    ];

	const REASON_PROWESS_LV4 = [
        'slug' => 'reason_prowess_lv4',
        'name' => "Reason Prowess Lv.4",
        'description' => "Grants Hit +16, Avoid +8 and Critical Evade +8 when equipped with Reason Magic",
        'acquisition' => "Reach skill level B+ in reason",
        'tags' => ['Skill proficiency', 'Reason']
    ];

	const REASON_PROWESS_LV5 = [
        'slug' => 'reason_prowess_lv5',
        'name' => "Reason Prowess Lv.5",
        'description' => "Grants Hit +20, Avoid +10 and Critical Evade +10 when equipped with Reason Magic",
        'acquisition' => "Reach skill level A+ in reason",
        'tags' => ['Skill proficiency', 'Reason']
    ];

	const FAITH_PROWESS_LV1 = [
        'slug' => 'faith_prowess_lv1',
        'name' => "Faith Prowess Lv.1",
        'description' => "Grants Hit +5, Avoid +7 and Critical Evade +5 when equipped with Faith Magic",
        'acquisition' => "Reach skill level E+ in faith",
        'tags' => ['Skill proficiency', 'Faith']
    ];

	const FAITH_PROWESS_LV2 = [
        'slug' => 'faith_prowess_lv2',
        'name' => "Faith Prowess Lv.2",
        'description' => "Grants Hit +6, Avoid +10 and Critical Evade +6 when equipped with Faith Magic",
        'acquisition' => "Reach skill level D+ in faith",
        'tags' => ['Skill proficiency', 'Faith']
    ];

	const FAITH_PROWESS_LV3 = [
        'slug' => 'faith_prowess_lv3',
        'name' => "Faith Prowess Lv.3",
        'description' => "Grants Hit +7, Avoid +13 and Critical Evade +7 when equipped with Faith Magic",
        'acquisition' => "Reach skill level C+ in faith",
        'tags' => ['Skill proficiency', 'Faith']
    ];

	const FAITH_PROWESS_LV4 = [
        'slug' => 'faith_prowess_lv4',
        'name' => "Faith Prowess Lv.4",
        'description' => "Grants Hit +8, Avoid +16 and Critical Evade +8 when equipped with Faith Magic",
        'acquisition' => "Reach skill level B+ in faith",
        'tags' => ['Skill proficiency', 'Faith']
    ];

	const FAITH_PROWESS_LV5 = [
        'slug' => 'faith_prowess_lv5',
        'name' => "Faith Prowess Lv.5",
        'description' => "Grants Hit +10, Avoid +20 and Critical Evade +10 when equipped with Faith Magic",
        'acquisition' => "Reach skill level A+ in faith",
        'tags' => ['Skill proficiency', 'Faith']
    ];

	const WHITE_MAGIC_RANGE_PLUS1 = [
        'slug' => 'white_magic_range_plus1',
        'name' => "White Magic Range +1",
        'description' => "Increases White Magic range by 1 for attacks that damage foes.",
        'acquisition' => "Reach skill level S in faith",
        'tags' => ['Skill proficiency', 'Faith']
    ];

	const AUTHORITY_PROWESS_LV1 = [
        'slug' => 'authority_prowess_lv1',
        'name' => "Authority Prowess Lv.1",
        'description' => "Grants Mt +2 with gambits.",
        'acquisition' => "Reach skill level E+ in authority",
        'tags' => ['Skill proficiency', 'Authority']
    ];

	const RALLY_MAGIC = [
        'slug' => 'rally_magic',
        'name' => "Rally Magic",
        'description' => "Use Rally to grant Mag +4 to an ally.",
        'acquisition' => "Reach skill level D in authority as Hubert, Ingrid, Constance",
        'tags' => ['Skill proficiency', 'Hubert', 'Ingrid', 'Constance', 'Authority']
    ];

	const RALLY_CHARM = [
        'slug' => 'rally_charm',
        'name' => "Rally Charm",
        'description' => "Use Rally to grant Cha +8 to an ally.",
        'acquisition' => "Reach skill level D as Dorothea, Manuela, or S as Edelgard, Dimitri, Claude in authority",
        'tags' => ['Skill proficiency', 'Edelgard', 'Dimitri', 'Claude', 'Dorothea', 'Manuela', 'Authority']
    ];

	const RALLY_DEXTERITY = [
        'slug' => 'rally_dexterity',
        'name' => "Rally Dexterity",
        'description' => "Use Rally to grant Dex +8 to an ally.",
        'acquisition' => "Reach skill level D as Ferdinand, or C+ as Ignatz in authority",
        'tags' => ['Skill proficiency', 'Ignatz', 'Ferdinand', 'Authority']
    ];

	const RALLY_RESISTANCE = [
        'slug' => 'rally_resistance',
        'name' => "Rally Resistance",
        'description' => "Use Rally to grant Res +4 to an ally.",
        'acquisition' => "Reach skill level D as Annette, C+ as Hubert, or S as Seteth in authority",
        'tags' => ['Skill proficiency', 'Annette', 'Hubert', 'Seteth', 'Authority']
    ];

	const RALLY_STRENGTH = [
        'slug' => 'rally_strength',
        'name' => "Rally Strength",
        'description' => "Use Rally to grant Str +4 to an ally.",
        'acquisition' => "Reach skill level D as Raphael, Alois, or S as Ignatz in authority",
        'tags' => ['Skill proficiency', 'Ignatz', 'Raphael', 'Alois', 'Authority']
    ];

	const RALLY_SPEED = [
        'slug' => 'rally_speed',
        'name' => "Rally Speed",
        'description' => "Use Rally to grant Spd +4 to an ally.",
        'acquisition' => "Reach skill level D as Ignatz, C+ as Annette, or S as Hubert in authority",
        'tags' => ['Skill proficiency', 'Annette', 'Ignatz', 'Hubert', 'Authority']
    ];

	const RALLY_DEFENSE = [
        'slug' => 'rally_defense',
        'name' => "Rally Defense",
        'description' => "Use Rally to grant Def +4 to an ally.",
        'acquisition' => "Reach skill level D in authority as Seteth, Gilbert",
        'tags' => ['Skill proficiency', 'Gilbert', 'Seteth', 'Authority']
    ];

	const RALLY_LUCK = [
        'slug' => 'rally_luck',
        'name' => "Rally Luck",
        'description' => "Use Rally to grant Lck +8 to an ally.",
        'acquisition' => "Reach skill level D in authority as Flayn, Anna",
        'tags' => ['Skill proficiency', 'Flayn', 'Authority']
    ];

	const AUTHORITY_PROWESS_LV2 = [
        'slug' => 'authority_prowess_lv2',
        'name' => "Authority Prowess Lv.2",
        'description' => "Grants Mt +4 with gambits.",
        'acquisition' => "Reach skill level D+ in authority",
        'tags' => ['Skill proficiency', 'Authority']
    ];

	const BATTALION_VANTAGE = [
        'slug' => 'battalion_vantage',
        'name' => "Battalion Vantage",
        'description' => "When foe initiates combat, unit still attacks first if battalion endurance is ≤ 1/3.",
        'acquisition' => "Reach skill level C as Byleth, Edelgard, Felix, Sylvain, Lorenz, Catherine, Anna or A as Dimitri, Ignatz, Yuri in authority",
        'tags' => ['Skill proficiency', 'Byleth', 'Edelgard', 'Dimitri', 'Ignatz', 'Felix', 'Lorenz', 'Sylvain', 'Catherine', 'Yuri', 'Authority']
    ];

	const BATTALION_WRATH_ = [
        'slug' => 'battalion_wrath_',
        'name' => "Battalion Wrath ",
        'description' => "If foe initiates combat while unit’s battalion endurance is ≤ 1/3, grants Crit +50.",
        'acquisition' => "Reach skill level C as Hubert, Bernadetta, Caspar, Petra, Dimitri, Dedue, Hilda, Raphael, Seteth, Alois, Gilbert, or A as Annette, Claude in authority",
        'tags' => ['Skill proficiency', 'Dimitri', 'Claude', 'Bernadetta', 'Annette', 'Hilda', 'Caspar', 'Dedue', 'Hubert', 'Petra', 'Raphael', 'Alois', 'Gilbert', 'Seteth', 'Authority']
    ];

	const BATTALION_DESPERATION = [
        'slug' => 'battalion_desperation',
        'name' => "Battalion Desperation",
        'description' => "If unit initiates combat when battalion endurance is ≤ 1/3, unit’s follow-up attack (if possible) occurs before foe’s counterattack.",
        'acquisition' => "Reach skill level C as Dorothea, Ferdinand, Ashe, Ingrid, Claude, Lysithea, Ignatz, Leonie, Hanneman, Cyril, Shamir, or A as Byleth, Hubert, Seteth in authority",
        'tags' => ['Skill proficiency', 'Byleth', 'Claude', 'Ashe', 'Ignatz', 'Dorothea', 'Leonie', 'Ferdinand', 'Hubert', 'Ingrid', 'Lysithea', 'Cyril', 'Hanneman', 'Seteth', 'Shamir', 'Authority']
    ];

	const BATTALION_RENEWAL = [
        'slug' => 'battalion_renewal',
        'name' => "Battalion Renewal",
        'description' => "Unit recovers up to 30% of max HP at the start of each turn while battalion endurance is ≤ 1/3.",
        'acquisition' => "Reach skill level C as Linhardt, Mercedes, Annette, Marianne, Manuela, Flayn, or A as Edelgard in authority",
        'tags' => ['Skill proficiency', 'Edelgard', 'Annette', 'Linhardt', 'Mercedes', 'Marianne', 'Flayn', 'Manuela', 'Authority']
    ];

	const AUTHORITY_PROWESS_LV3 = [
        'slug' => 'authority_prowess_lv3',
        'name' => "Authority Prowess Lv.3",
        'description' => "Grants Mt +6 with gambits.",
        'acquisition' => "Reach skill level C+ in authority",
        'tags' => ['Skill proficiency', 'Authority']
    ];

	const MODEL_LEADER = [
        'slug' => 'model_leader',
        'name' => "Model Leader",
        'description' => "Doubles experience earned for battalions.",
        'acquisition' => "Reach skill level C+ as Byleth, Edelgard, Dimitri, Seteth, Claude, Yuri in authority",
        'tags' => ['Skill proficiency', 'Byleth', 'Edelgard', 'Dimitri', 'Claude', 'Seteth', 'Yuri', 'Authority']
    ];

	const DEFENSIVE_TACTICS = [
        'slug' => 'defensive_tactics',
        'name' => "Defensive Tactics",
        'description' => "Battalion endurance takes half damage.",
        'acquisition' => "Reach skill level B in authority",
        'tags' => ['Skill proficiency', 'Authority']
    ];

	const AUTHORITY_PROWESS_LV4 = [
        'slug' => 'authority_prowess_lv4',
        'name' => "Authority Prowess Lv.4",
        'description' => "Grants Mt +8 with gambits.",
        'acquisition' => "Reach skill level B+ in authority",
        'tags' => ['Skill proficiency', 'Authority']
    ];

	const AUTHORITY_PROWESS_LV5_ = [
        'slug' => 'authority_prowess_lv5_',
        'name' => "Authority Prowess Lv.5 ",
        'description' => "Grants Mt +10 with gambits.",
        'acquisition' => "Reach skill level A+ in authority",
        'tags' => ['Skill proficiency', 'Authority']
    ];

	const RALLY_MOVEMENT = [
        'slug' => 'rally_movement',
        'name' => "Rally Movement",
        'description' => "Use Rally to grant Mv +1 to an ally.",
        'acquisition' => "Reach skill level S as Byleth, Annette in authority",
        'tags' => ['Skill proficiency', 'Byleth', 'Annette', 'Authority']
    ];

	const OFFENSIVE_TACTICS = [
        'slug' => 'offensive_tactics',
        'name' => "Offensive Tactics",
        'description' => "Grants Mt +5 and Hit +20 with gambits.",
        'acquisition' => "Reach skill level S+ in authority",
        'tags' => ['Skill proficiency', 'Authority']
    ];

	const WEIGHT_MINUS_3 = [
        'slug' => 'weight_minus_3',
        'name' => "Weight -3",
        'description' => "The combined weight of equipment is reduced by 3.",
        'acquisition' => "Reach skill level C in heavy armor",
        'tags' => ['Skill proficiency', 'Heavy Armor']
    ];

	const ARMORED_EFFECT_NULL = [
        'slug' => 'armored_effect_null',
        'name' => "Armored Effect Null",
        'description' => "Nullifies any extra effectiveness against armored units.",
        'acquisition' => "Reach skill level S+ in heavy armor",
        'tags' => ['Skill proficiency', 'Heavy Armor']
    ];

	const DEXTERITY_PLUS4 = [
        'slug' => 'dexterity_plus4',
        'name' => "Dexterity +4",
        'description' => "Increases Dex by 4.",
        'acquisition' => "Reach skill level C in riding",
        'tags' => ['Skill proficiency', 'Riding']
    ];

	const MOVEMENT_PLUS1 = [
        'slug' => 'movement_plus1',
        'name' => "Movement +1",
        'description' => "Increases Mv by 1.",
        'acquisition' => "Reach skill level A+ in riding",
        'tags' => ['Skill proficiency', 'Riding']
    ];

	const CAVALRY_EFFECT_NULL = [
        'slug' => 'cavalry_effect_null',
        'name' => "Cavalry Effect Null",
        'description' => "Nullifies any extra effectiveness against cavalry units.",
        'acquisition' => "Reach skill level S+ in riding",
        'tags' => ['Skill proficiency', 'Riding']
    ];

	const ALERT_STANCE = [
        'slug' => 'alert_stance',
        'name' => "Alert Stance",
        'description' => "If unit takes no action except Wait, grants Avo +15 for 1 turn.",
        'acquisition' => "Reach skill level B in flying",
        'tags' => ['Skill proficiency', 'Flying']
    ];

	const ALERT_STANCE_PLUS = [
        'slug' => 'alert_stance_plus',
        'name' => "Alert Stance+",
        'description' => "If unit takes no action except Wait, grants Avo +30 for 1 turn.",
        'acquisition' => "Reach skill level A+ in flying",
        'tags' => ['Skill proficiency', 'Flying']
    ];

	const FLYING_EFFECT_NULL = [
        'slug' => 'flying_effect_null',
        'name' => "Flying Effect Null",
        'description' => "Nullifies any extra effectiveness against flying units.",
        'acquisition' => "Reach skill level S+ in flying",
        'tags' => ['Skill proficiency', 'Flying']
    ];

	const HP_PLUS5 = [
        'slug' => 'hp_plus5',
        'name' => "HP +5",
        'description' => "Increases HP by 5",
        'acquisition' => "Master a class: Noble, Commoner",
        'tags' => ['Class mastery', 'Commoner', 'Noble']
    ];

	const SPEED_PLUS2 = [
        'slug' => 'speed_plus2',
        'name' => "Speed +2",
        'description' => "Increases Spd by 2",
        'acquisition' => "Master a class: Myrmidon",
        'tags' => ['Class mastery', 'Myrmidon']
    ];

	const DEFENSE_PLUS2 = [
        'slug' => 'defense_plus2',
        'name' => "Defense +2",
        'description' => "Increases Def by 2",
        'acquisition' => "Master a class: Soldier",
        'tags' => ['Class mastery', 'Soldier']
    ];

	const STRENGTH_PLUS2 = [
        'slug' => 'strength_plus2',
        'name' => "Strength +2",
        'description' => "Increases Str by 2",
        'acquisition' => "Master a class: Fighter",
        'tags' => ['Class mastery', 'Fighter']
    ];

	const MAGIC_PLUS2 = [
        'slug' => 'magic_plus2',
        'name' => "Magic +2",
        'description' => "Increases Mag by 2",
        'acquisition' => "Master a class: Monk",
        'tags' => ['Class mastery', 'Monk']
    ];

	const RESISTANCE_PLUS2 = [
        'slug' => 'resistance_plus2',
        'name' => "Resistance +2",
        'description' => "Increases Res by 2",
        'acquisition' => "Master a class: Lord",
        'tags' => ['Class mastery', 'Lord']
    ];

	const DESPERATION = [
        'slug' => 'desperation',
        'name' => "Desperation",
        'description' => "If unit initiates combat with HP ≤ 50%, unit’s follow-up attack (if possible) occurs before foe’s counterattack.",
        'acquisition' => "Master a class: Cavalier",
        'tags' => ['Class mastery', 'Cavalier']
    ];

	const DARTING_BLOW = [
        'slug' => 'darting_blow',
        'name' => "Darting Blow",
        'description' => "If unit initiates combat, grants AS +6 during combat.",
        'acquisition' => "Master a class: Pegasus Knight",
        'tags' => ['Class mastery', 'Pegasus Knight']
    ];

	const DEATH_BLOW = [
        'slug' => 'death_blow',
        'name' => "Death Blow",
        'description' => "If unit initiates combat, grants Str +6 during combat.",
        'acquisition' => "Master a class: Brigand",
        'tags' => ['Class mastery', 'Brigand']
    ];

	const ARMORED_BLOW = [
        'slug' => 'armored_blow',
        'name' => "Armored Blow",
        'description' => "If unit initiates combat, grants Def +6 during combat.",
        'acquisition' => "Master a class: Armored Knight",
        'tags' => ['Class mastery', 'Armored Knight']
    ];

	const HIT_PLUS20 = [
        'slug' => 'hit_plus20',
        'name' => "Hit +20",
        'description' => "Increases Hit by 20.",
        'acquisition' => "Master a class: Archer",
        'tags' => ['Class mastery', 'Archer']
    ];

	const POISON_STRIKE = [
        'slug' => 'poison_strike',
        'name' => "Poison Strike",
        'description' => "If unit initiates combat, enemy loses up to 20% HP",
        'acquisition' => "Master a class: Dark Mage",
        'tags' => ['Class mastery', 'Dark Mage']
    ];

	const MIRACLE = [
        'slug' => 'miracle',
        'name' => "Miracle",
        'description' => "Luck % chance to survive lethal damage with 1HP if HP is above 1",
        'acquisition' => "Master a class: Priest",
        'tags' => ['Class mastery', 'Priest']
    ];

	const SPECIAL_DANCE = [
        'slug' => 'special_dance',
        'name' => "Special Dance",
        'description' => "Dex/Spd/Luck +4 to target ally when using Dance",
        'acquisition' => "Master a class: Dancer",
        'tags' => ['Class mastery', 'Dancer']
    ];

	const POMP_AND_CIRCUMSTANCE = [
		'slug' => 'pomp_and_circumstance',
		'name' => "Pomp & Circumstance",
		'description' => "Increases Lck/Cha by 4.",
		'acquisition' => "Master a class: Armored Lord, High Lord, Wyvern Master",
		'tags' => ['Class mastery', 'Lord', 'Armored Lord', 'High Lord', 'Wyvern Master']
	];

	const DEFIANT_STRENGTH = [
        'slug' => 'defiant_strength',
        'name' => "Defiant Strength",
        'description' => "Grants Str +8 when HP is ≤ 25%.",
        'acquisition' => "Master a class: Hero",
        'tags' => ['Class mastery', 'Hero']
    ];

	const LETHALITY = [
        'slug' => 'lethality',
        'name' => "Lethality",
        'description' => "Chance to instantly kill a foe when dealing damage. Trigger % = 0.25xDex.",
        'acquisition' => "Master a class: Assassin",
        'tags' => ['Class mastery', 'Assassin']
    ];

	const AEGIS = [
        'slug' => 'aegis',
        'name' => "Aegis",
        'description' => "Chance to reduce bow/magic damage by half. Trigger % = Dex stat.",
        'acquisition' => "Master a class: Paladin",
        'tags' => ['Class mastery', 'Paladin']
    ];

	const WRATH = [
        'slug' => 'wrath',
        'name' => "Wrath",
        'description' => "If foe initiates combat while unit’s HP is ≤ 50%, grants Crit +50.",
        'acquisition' => "Master a class: Warrior",
        'tags' => ['Class mastery', 'Warrior']
    ];

	const PAVISE = [
        'slug' => 'pavise',
        'name' => "Pavise",
        'description' => "Chance to reduce sword/lance/axe/brawling damage by half. Trigger % = Dex stat.",
        'acquisition' => "Master a class: Fortress Knight",
        'tags' => ['Class mastery', 'Fortress Knight', 'Brawl']
    ];

	const SEAL_DEFENSE = [
        'slug' => 'seal_defense',
        'name' => "Seal Defense",
        'description' => "If unit damages foe during combat, foe suffers Def -6 for 1 turn after combat.",
        'acquisition' => "Master a class: Wyvern Rider",
        'tags' => ['Class mastery', 'Wyvern Rider']
    ];

	const TOMEBREAKER = [
        'slug' => 'tomebreaker',
        'name' => "Tomebreaker",
        'description' => "Grants Hit/Avo +20 when brawling against magic users.",
        'acquisition' => "Master a class: Grappler",
        'tags' => ['Class mastery', 'Grappler', 'Brawl']
    ];

	const BOWBREAKER = [
        'slug' => 'bowbreaker',
        'name' => "Bowbreaker",
        'description' => "Grants Hit/Avo +20 when using magic against bow users.",
        'acquisition' => "Master a class: Warlock",
        'tags' => ['Class mastery', 'Warlock']
    ];

	const LIFETAKER = [
        'slug' => 'lifetaker',
        'name' => "Lifetaker",
        'description' => "Unit recovers HP equal to 50% of damage dealt after defeating a foe.",
        'acquisition' => "Master a class: Dark Bishop",
        'tags' => ['Class mastery', 'Dark Bishop']
    ];

	const RENEWAL = [
        'slug' => 'renewal',
        'name' => "Renewal",
        'description' => "Unit recovers up to 20% of max HP at the start of each turn.",
        'acquisition' => "Master a class: Bishop",
        'tags' => ['Class mastery', 'Bishop']
    ];

	const WARDING_BLOW = [
        'slug' => 'warding_blow',
        'name' => "Warding Blow",
        'description' => "If unit initiates combat, grants Res +6 during combat",
        'acquisition' => "Master a class: Mortal Savant",
        'tags' => ['Class mastery', 'Mortal Savant']
    ];

	const DEFIANT_AVOID = [
        'slug' => 'defiant_avoid',
        'name' => "Defiant Avoid",
        'description' => "Grants Avo +30 when HP is ≤ 25%.",
        'acquisition' => "Master a class: Falcon Knight",
        'tags' => ['Class mastery', 'Falcon Knight']
    ];

	const QUICK_RIPOSTE = [
        'slug' => 'quick_riposte',
        'name' => "Quick Riposte",
        'description' => "If foe initiates combat while unit’s HP is ≥ 50%, unit makes guaranteed follow-up attack.",
        'acquisition' => "Master a class: War Master",
        'tags' => ['Class mastery', 'War Master']
    ];

	const DEFIANT_CRITICAL = [
        'slug' => 'defiant_critical',
        'name' => "Defiant Critical",
        'description' => "Grants Crit +50 when HP is ≤ 25%.",
        'acquisition' => "Master a class: Wyvern Lord",
        'tags' => ['Class mastery', 'Lord', 'Wyvern Lord']
    ];

	const DEFIANT_DEFENSE = [
        'slug' => 'defiant_defense',
        'name' => "Defiant Defense",
        'description' => "Grants Def +8 when HP is ≤ 25%.",
        'acquisition' => "Master a class: Great Knight",
        'tags' => ['Class mastery', 'Great Knight']
    ];

	const DEFIANT_SPEED = [
        'slug' => 'defiant_speed',
        'name' => "Defiant Speed",
        'description' => "Grants Spd +8 when HP is ≤ 25%.",
        'acquisition' => "Master a class: Bow Knight",
        'tags' => ['Class mastery', 'Bow Knight']
    ];

	const DEFIANT_MAGIC = [
        'slug' => 'defiant_magic',
        'name' => "Defiant Magic",
        'description' => "Grants Mag +8 when HP is ≤ 25%.",
        'acquisition' => "Master a class: Gremory",
        'tags' => ['Class mastery', 'Gremory']
    ];

	const SEAL_RESISTANCE = [
        'slug' => 'seal_resistance',
        'name' => "Seal Resistance",
        'description' => "If unit damages foe during combat, foe suffers Res -6 for 1 turn after combat.",
        'acquisition' => "Master a class: Dark Knight",
        'tags' => ['Class mastery', 'Dark Knight']
    ];

	const DEFIANT_RESISTANCE = [
        'slug' => 'defiant_resistance',
        'name' => "Defiant Resistance",
        'description' => "Grants Res +8 when HP is ≤ 25%.",
        'acquisition' => "Master a class: Holy Knight",
        'tags' => ['Class mastery', 'Holy Knight']
    ];

	const COUNTERATTACK = [
        'slug' => 'counterattack',
        'name' => "Counterattack",
        'description' => "Counters attacks regardless of enemies' range.",
        'acquisition' => "Master a class: Death Knight",
        'tags' => ['Class mastery']
    ];

	const DUELISTS_BLOW = [
        'slug' => 'duelists_blow',
        'name' => "Duelist's Blow",
        'description' => "If unit initiates combat, grants Avo +20 during combat",
        'acquisition' => "Master a class: Trickster",
        'tags' => ['Class mastery']
    ];

	const BRAWL_AVO_PLUS20 = [
        'slug' => 'brawl_avo_plus20',
        'name' => "Brawl Avo +20",
        'description' => "Grants Avo +20 when brawling.",
        'acquisition' => "Master a class: War Monk, War Cleric",
        'tags' => ['Class mastery', 'Monk', 'War monk', 'War cleric', 'Brawl']
    ];

	const UNCANNY_BLOW = [
        'slug' => 'uncanny_blow',
        'name' => "Uncanny Blow",
        'description' => "If unit initiates combat, grants Hit +30 during combat",
        'acquisition' => "Master a class: Valkyrie",
        'tags' => ['Class mastery', 'Valkyrie']
    ];
}