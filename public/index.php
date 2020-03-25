<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\SkillRank;

use L41rx\FE3H\Enumerations\Moon;
$skill_ranks = SkillRank::all();
foreach ($skill_ranks as $skill_rank)
	echo $skill_rank['cumulative_xp'] - $skill_rank['xp']."<br />";





