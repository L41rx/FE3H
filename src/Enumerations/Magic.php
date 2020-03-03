<?php
namespace L41rx\FE3H\Enumerations;

use L41rx\FE3H\Enumeration;

class Magic extends Enumeration
{
	const NOSFERATU = [
		'slug' => 'nosferatu',
		'name' => "Nosferatu",
		'mt' => "1",
		'hit' => "80",
		'crit' => "0",
		'range' => "1~2",
		'durability' => "12",
		'weight' => "8",
		'effect' => "Restores HP equal to 50% of damage dealt to enemy.",
		'skill' => Skill::FAITH
	];

	const SERAPHIM = [
		'slug' => 'seraphim',
		'name' => "Seraphim",
		'mt' => "8",
		'hit' => "75",
		'crit' => "5",
		'range' => "1~2",
		'durability' => "8",
		'weight' => "10",
		'effect' => "Effective against Monster enemies.",
		'skill' => Skill::FAITH
	];

	const HEAL = [
		'slug' => 'heal',
		'name' => "Heal",
		'mt' => "8",
		'hit' => "100",
		'crit' => "0",
		'range' => "1",
		'durability' => "10",
		'weight' => null,
		'effect' => "Restores HP for an ally.",
		'skill' => Skill::FAITH
	];

	const TORCH = [
		'slug' => 'torch',
		'name' => "Torch",
		'mt' => null,
		'hit' => null,
		'crit' => null,
		'range' => "1~2",
		'durability' => "10",
		'weight' => null,
		'effect' => "Increases Fog of War vision based on user’s Magic stat.",
		'skill' => Skill::FAITH
	];

	const RECOVER = [
		'slug' => 'recover',
		'name' => "Recover",
		'mt' => "30",
		'hit' => "100",
		'crit' => "0",
		'range' => "1",
		'durability' => "5",
		'weight' => null,
		'effect' => "Restores HP for an ally.",
		'skill' => Skill::FAITH
	];

	const PHYSIC = [
		'slug' => 'physic',
		'name' => "Physic",
		'mt' => "8",
		'hit' => "100",
		'crit' => "0",
		'range' => "1~Mag/A",
		'durability' => "5",
		'weight' => null,
		'effect' => "Restores HP for a distant ally.",
		'skill' => Skill::FAITH
	];

	const RESTORE = [
		'slug' => 'restore',
		'name' => "Restore",
		'mt' => null,
		'hit' => null,
		'crit' => null,
		'range' => "1~Mag/B",
		'durability' => "10",
		'weight' => null,
		'effect' => "Cures status effects on all allies in range.",
		'skill' => Skill::FAITH
	];

	const WARD = [
		'slug' => 'ward',
		'name' => "Ward",
		'mt' => null,
		'hit' => null,
		'crit' => null,
		'range' => "1",
		'durability' => "5",
		'weight' => null,
		'effect' => "Grants Res +7 to an ally. Its effect diminishes with each turn.",
		'skill' => Skill::FAITH
	];

	const AURA = [
		'slug' => 'aura',
		'name' => "Aura",
		'mt' => "12",
		'hit' => "70",
		'crit' => "20",
		'range' => "1~2",
		'durability' => "3",
		'weight' => "12",
		'effect' => "Advanced light attack magic.",
		'skill' => Skill::FAITH
	];

	const SILENCE = [
		'slug' => 'silence',
		'name' => "Silence",
		'mt' => null,
		'hit' => "100",
		'crit' => null,
		'range' => "3~10",
		'durability' => "3",
		'weight' => null,
		'effect' => "Prevents enemy from using magic for 1 turn.",
		'skill' => Skill::FAITH
	];

	const RESCUE = [
		'slug' => 'rescue',
		'name' => "Rescue",
		'mt' => null,
		'hit' => null,
		'crit' => null,
		'range' => "1~Mag/C",
		'durability' => "3",
		'weight' => null,
		'effect' => "Moves an ally to a space next to the user.",
		'skill' => Skill::FAITH
	];

	const WARP = [
		'slug' => 'warp',
		'name' => "Warp",
		'mt' => null,
		'hit' => null,
		'crit' => null,
		'range' => "1~Mag/D",
		'durability' => "1",
		'weight' => null,
		'effect' => "Moves an ally to a specified tile within range.",
		'skill' => Skill::FAITH
	];

	const ABRAXAS = [
		'slug' => 'abraxas',
		'name' => "Abraxas",
		'mt' => "14",
		'hit' => "90",
		'crit' => "5",
		'range' => "1~2",
		'durability' => "2",
		'weight' => "13",
		'effect' => "Advanced light attack magic.",
		'skill' => Skill::FAITH
	];

	const FORTIFY = [
		'slug' => 'fortify',
		'name' => "Fortify",
		'mt' => "15",
		'hit' => "100",
		'crit' => "0",
		'range' => "1~Mag/B",
		'durability' => "2",
		'weight' => null,
		'effect' => "Advanced light magic. Restores HP for all allies in range based on Mag.",
		'skill' => Skill::FAITH
	];

	const FIRE = [
		'slug' => 'fire',
		'name' => "Fire",
		'mt' => "3",
		'hit' => "90",
		'crit' => "0",
		'range' => "1~2",
		'durability' => "10",
		'weight' => "3",
		'effect' => "Basic fire magic.",
		'skill' => Skill::REASON
	];

	const THUNDER = [
		'slug' => 'thunder',
		'name' => "Thunder",
		'mt' => "4",
		'hit' => "80",
		'crit' => "5",
		'range' => "1~2",
		'durability' => "8",
		'weight' => "4",
		'effect' => "Basic lighting magic.",
		'skill' => Skill::REASON
	];

	const WIND = [
		'slug' => 'wind',
		'name' => "Wind",
		'mt' => "2",
		'hit' => "100",
		'crit' => "10",
		'range' => "1~2",
		'durability' => "12",
		'weight' => "2",
		'effect' => "Basic wind magic.",
		'skill' => Skill::REASON
	];

	const BLIZZARD = [
		'slug' => 'blizzard',
		'name' => "Blizzard",
		'mt' => "3",
		'hit' => "70",
		'crit' => "15",
		'range' => "1~2",
		'durability' => "10",
		'weight' => "4",
		'effect' => "Basic ice magic.",
		'skill' => Skill::REASON
	];

	const MIASMA = [
		'slug' => 'miasma',
		'name' => "Miasma Δ",
		'mt' => "5",
		'hit' => "80",
		'crit' => "0",
		'range' => "1~2",
		'durability' => "10",
		'weight' => "5",
		'effect' => "Basic dark magic.",
		'skill' => Skill::REASON
	];

	const MIRE_B = [
		'slug' => 'mire_b',
		'name' => "Mire Β",
		'mt' => "3",
		'hit' => "60",
		'crit' => "0",
		'range' => "1~3",
		'durability' => "8",
		'weight' => "5",
		'effect' => "Basic dark magic. Inflicts Def -5 to foe for 1 turn.",
		'skill' => Skill::REASON
	];

	const SWARM_Z = [
		'slug' => 'swarm_z',
		'name' => "Swarm Ζ",
		'mt' => "4",
		'hit' => "70",
		'crit' => "0",
		'range' => "1~2",
		'durability' => "8",
		'weight' => "4",
		'effect' => "Basic dark magic. Inflicts Spd -5 to foe for 1 turn.",
		'skill' => Skill::REASON
	];

	const BOLGANONE = [
		'slug' => 'bolganone',
		'name' => "Bolganone",
		'mt' => "8",
		'hit' => "85",
		'crit' => "0",
		'range' => "1~2",
		'durability' => "5",
		'weight' => "3",
		'effect' => "Advanced fire magic.",
		'skill' => Skill::REASON
	];

	const THORON = [
		'slug' => 'thoron',
		'name' => "Thoron",
		'mt' => "9",
		'hit' => "75",
		'crit' => "10",
		'range' => "1~3",
		'durability' => "4",
		'weight' => "7",
		'effect' => "Advanced thunder magic.",
		'skill' => Skill::REASON
	];

	const CUTTING_GALE = [
		'slug' => 'cutting_gale',
		'name' => "Cutting Gale",
		'mt' => "7",
		'hit' => "95",
		'crit' => "10",
		'range' => "1~2",
		'durability' => "6",
		'weight' => "5",
		'effect' => "Advanced wind magic.",
		'skill' => Skill::REASON
	];

	const SAGITTAE = [
		'slug' => 'sagittae',
		'name' => "Sagittae",
		'mt' => "7",
		'hit' => "90",
		'crit' => "5",
		'range' => "1~2",
		'durability' => "10",
		'weight' => "6",
		'effect' => "Magic arrows with a high hit, it shoots waves of arrows at a selected enemy target.",
		'skill' => Skill::REASON
	];

	const BANSHEE = [
		'slug' => 'banshee',
		'name' => "Banshee",
		'mt' => "9",
		'hit' => "75",
		'crit' => "5",
		'range' => "1~2",
		'durability' => "5",
		'weight' => "9",
		'effect' => "Intermediate dark magic. Inflicts reduced Mov to foe for 1 turn.",
		'skill' => Skill::REASON
	];

	const DEATH = [
		'slug' => 'death',
		'name' => "Death Γ",
		'mt' => "6",
		'hit' => "70",
		'crit' => "20",
		'range' => "1~3",
		'durability' => "4",
		'weight' => "8",
		'effect' => "Intermediate dark magic. Has a high Crit(Critical) rate.",
		'skill' => Skill::REASON
	];

	const LUNA = [
		'slug' => 'luna',
		'name' => "Luna Λ",
		'mt' => "1",
		'hit' => "65",
		'crit' => "0",
		'range' => "1~2",
		'durability' => "2",
		'weight' => "7",
		'effect' => "Intermediate dark magic. Ignores enemy’s Res(Resistance). Cannot make follow-up attacks.",
		'skill' => Skill::REASON
	];

	const RAGNAROK = [
		'slug' => 'ragnarok',
		'name' => "Ragnarok",
		'mt' => "15",
		'hit' => "80",
		'crit' => "5",
		'range' => "1~2",
		'durability' => "3",
		'weight' => "9",
		'effect' => "The highest tier of fire magic.",
		'skill' => Skill::REASON
	];

	const BOLTING = [
		'slug' => 'bolting',
		'name' => "Bolting",
		'mt' => "12",
		'hit' => "65",
		'crit' => "15",
		'range' => "3~10",
		'durability' => "2",
		'weight' => "18",
		'effect' => "The highest tier of lightning magic. Cannot make follow-up attacks.",
		'skill' => Skill::REASON
	];

	const EXCALIBUR = [
		'slug' => 'excalibur',
		'name' => "Excalibur",
		'mt' => "11",
		'hit' => "100",
		'crit' => "15",
		'range' => "1~2",
		'durability' => "4",
		'weight' => "8",
		'effect' => "The highest tier of wind magic. Effective against Flying foes.",
		'skill' => Skill::REASON
	];

	const FIMBULVETR = [
		'slug' => 'fimbulvetr',
		'name' => "Fimbulvetr",
		'mt' => "12",
		'hit' => "65",
		'crit' => "25",
		'range' => "1~2",
		'durability' => "13",
		'weight' => "10",
		'effect' => "Advanced ice magic.",
		'skill' => Skill::REASON
	];

	const METEOR = [
		'slug' => 'meteor',
		'name' => "Meteor",
		'mt' => "10",
		'hit' => "80",
		'crit' => "0",
		'range' => "3~10",
		'durability' => "1",
		'weight' => "19",
		'effect' => "Magic that also hits targets adjacent to the point of impact. Cannot trigger follow-up attacks.",
		'skill' => Skill::REASON
	];

	const DARK_SPIKES_T = [
		'slug' => 'dark_spikes_t',
		'name' => "Dark Spikes T",
		'mt' => "13",
		'hit' => "80",
		'crit' => "0",
		'range' => "1~2",
		'durability' => "3",
		'weight' => "11",
		'effect' => "Advanced dark magic.",
		'skill' => Skill::REASON
	];

	const BOHR_X = [
		'slug' => 'bohr_x',
		'name' => "Bohr Χ",
		'mt' => "10",
		'hit' => "60",
		'crit' => "0",
		'range' => "3~10",
		'durability' => "3",
		'weight' => "20",
		'effect' => "The highest tier of dark magic. Reduces enemy HP to 1. Cannot trigger follow-up attacks.",
		'skill' => Skill::REASON
	];

	const QUAKE = [
		'slug' => 'quake',
		'name' => "Quake Σ",
		'mt' => "8",
		'hit' => "50",
		'crit' => "0",
		'range' => "All",
		'durability' => "1",
		'weight' => "20",
		'effect' => "The highest tier of dark magic. Damages all units (attacks the entire battlefield) except Flying. Cannot make follow-up attacks.",
		'skill' => Skill::REASON
	];

	const AGNEAS_ARROW = [
		'slug' => 'agneas_arrow',
		'name' => "Agnea’s Arrow",
		'mt' => "16",
		'hit' => "70",
		'crit' => "5",
		'range' => "1~2",
		'durability' => "2",
		'weight' => "13",
		'effect' => "The most powerful form of black magic. A sweltering flame that reduces all to ash.",
		'skill' => Skill::REASON
	];

	const HADES = [
		'slug' => 'hades',
		'name' => "Hades Ω",
		'mt' => "18",
		'hit' => "65",
		'crit' => "10",
		'range' => "1~2",
		'durability' => "2",
		'weight' => "16",
		'effect' => "Advanced dark magic. Calls on the morbid might of the underworld.",
		'skill' => Skill::REASON
	];

}
