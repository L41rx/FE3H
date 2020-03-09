<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\Character;

$character_html = "";
foreach (Character::all() as $c)
    $character_html .= Character::render($c['slug']);
?>

<html>
    <head>
        <link rel="stylesheet" href="/css/character.css">
        <style>
            .characters {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
            }
        </style>
    </head>
    
    <body>
        <div class="characters">
            <?php echo $character_html; ?>
        </div>

    <script>
        window.onload = function() {
            var characters = {};
            var dom_chars = document.getElementsByTagName('character');
            for (var i = 0; i < dom_chars.length; i++) {
                var character = JSON.parse(dom_chars[i].dataset.character);
                characters[character['slug']] = character;
                characters[character['slug']]['node'] = dom_chars[i];
            }
            console.log("Loaded characters into JSON", characters);
            window.characters = characters;
        };
    </script>
    </body>
</html>
