<?php
require_once __DIR__.'/../vendor/autoload.php';
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

        .character img {
            width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }



        
        .character.deer   img { box-shadow: 0 0 0 3px yellow; }
        



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
                echo "<li>".\L41rx\FE3H\Enumerations\Crest::render($crest['slug'])."</li>";
            echo "</ul>";
            echo "<hr />";
            echo "<p>Budding talent: {$c['budding_talent']['name']}</p>";
            echo "<hr />";
            echo "<p>Lost items:</p><ul>";
            foreach ($c['lost_items'] as $lost_item)
                echo "<li>{$lost_item}</li>";
            echo "</ul>";
            echo "<hr />";
            echo "<p>Unique ability: ".\L41rx\FE3H\Enumerations\Ability::render($c['unique_ability']['slug'])."</p>";

            echo "</div>";
        }
    ?>
</div>

<script>


</script>
</body>
</html>
