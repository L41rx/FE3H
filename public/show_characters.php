<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\Crest;
use \L41rx\FE3H\Enumerations\Stat;
use \L41rx\FE3H\Enumerations\Ability;
use \L41rx\FE3H\Enumerations\CombatArt;
use \L41rx\FE3H\Enumerations\SkillRank;
use \L41rx\FE3H\Enumerations\Skill;

$characters = \L41rx\FE3H\Enumerations\Character::all();

?>

<html>
<head><style>
        .characters {
            display: flex;
            flex-wrap: wrap;
        }

        .character {
            width: 250px;
            padding: 20px;
            margin: 10px;
        }

        .character.eagles {
            border: 5px solid #9e1629;
            background: #ebd8ff;
        }
        .character.eagles img { box-shadow: 0 0 0 3px #9e1629; }

        .character.lions {
            border: 5px solid #1a2872;
            background: #dddfe2;
        }
        .character.lions  img { box-shadow: 0 0 0 3px #1a2872; }

        .character.deer {
            border: 5px solid yellow;
            background: beige;
        }
        .character.deer   img { box-shadow: 0 0 0 3px yellow; }

        .character img {
            width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }

        [title] {
            cursor: help;
            text-decoration: underline;
        }

        p {
            margin: 0;
        }

        ul, ol {
            margin: 0;
        }

    </style></head>
<body>


<div class="characters">
    <?php
        foreach ($characters as $c) {
            echo "<div class='character {$c['house']['slug']}'>";

            echo "<img src='/img/character/{$c['slug']}.png' />";
            echo "<p style='text-align: center;'><strong>{$c['name']}</strong></p>";
            echo "<p style='text-align: center;'>{$c['house']['name']} | {$c['gender']} | {$c['starting_certification']['name']}</p>";
            echo "<hr />";
            echo "<p>Crests:</p><ul>";
            foreach ($c['crests'] as $crest)
                echo "<li>".Crest::render($crest['slug'])."</li>";
            echo "</ul>";
            echo "<hr />";
            echo "<p>Budding talent: {$c['budding_talent']['name']}</p>";
            echo "<hr />";
            echo "<p style='text-align: right;'>Base stats</p>";
            echo Stat::renderSheet($c['base_stats']);
            echo "<p style='text-align: right;'>Stat growth</p>";
            echo Stat::renderSheet($c['stat_growth'], true);
            echo "<p style='text-align: right;'>Max stats</p>";
            echo Stat::renderSheet($c['max_stats']);
            echo "<hr />";
            echo "<p>Lost items:</p><ul>";
            foreach ($c['lost_items'] as $lost_item)
                echo "<li>{$lost_item}</li>";
            echo "</ul>";
            echo "<hr />";
            echo "<p>Unique ability: ".Ability::render($c['unique_ability']['slug'])."</p>";
            echo "<hr />";
            echo "<p>Initial proficiencies:</p><ul>";
            foreach ($c['initial_proficiency'] as $skill_slug => $rank)
                echo "<li>".SkillRank::render($skill_slug, $rank)."</li>";
            echo "</ul>";
            echo "<p>Strong skills:</p><ul>";
            foreach ($c['strong_skills'] as $skill)
                echo "<li>".Skill::render($skill['slug'])."</li>";
            echo "</ul>";
            echo "<p>Weak skills:</p><ul>";
            foreach ($c['weak_skills'] as $skill)
                echo "<li>".Skill::render($skill['slug'])."</li>";
            echo "</ul>";
            echo "<hr />";
            echo "<p>Initial combat arts:</p><ul>";
            foreach ($c['initial_combat_arts'] as $cb)
                echo "<li>".CombatArt::render($cb['slug'])."</li>";
            echo "</ul>";
            echo "<hr />";
            echo "<p>Faith magic track:</p><ul>";
            foreach ($c['magic_track']['faith'] as $rank_slug => $magic)
                echo "<li>".SkillRank::renderMagicTrack('faith', $rank_slug, $magic)."</li>";
            echo "</ul>";
            echo "<p>Reason magic track:</p><ul>";
            foreach ($c['magic_track']['reason'] as $rank_slug => $magic)
                echo "<li>".SkillRank::renderMagicTrack('reason', $rank_slug, $magic)."</li>";
            echo "</ul>";
            echo "</div>";
        }
    ?>
</div>

<script>


</script>
</body>
</html>
