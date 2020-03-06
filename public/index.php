<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\Crest;
use \L41rx\FE3H\Enumerations\Stat;
use \L41rx\FE3H\Enumerations\Ability;
use \L41rx\FE3H\Enumerations\CombatArt;
use \L41rx\FE3H\Enumerations\SkillRank;
use \L41rx\FE3H\Enumerations\Skill;

$characters = \L41rx\FE3H\Enumerations\Character::all();

var_dump($characters);

?>