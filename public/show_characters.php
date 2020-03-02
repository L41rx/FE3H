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
            max-width: 250px;
            border: 1px solid black;
            padding: 20px;
            margin: 10px;
        }

        .character img {
            width: 100%;
            height: auto;
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
            echo "<div class='character'>";

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
