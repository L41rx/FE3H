<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\Character;

$character_html = "";
foreach (Character::all() as $c)
    $character_html .= Character::render($c['slug']);
?>

<html>
<head><style>
        .characters {
            display: flex;
            flex-wrap: wrap;
        }

        .character {
            width: 310px;
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
        .character.lions img { box-shadow: 0 0 0 3px #1a2872; }

        .character.deer {
            border: 5px solid yellow;
            background: beige;
        }
        .character.deer img { box-shadow: 0 0 0 3px yellow; }

        .character.unaffiliated {
            border: 5px solid #154c2c;
            background: #bbd0c4;
        }
        .character.unaffiliated img { box-shadow: 0 0 0 3px #154c2c; }

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
    <?php echo $character_html; ?>
</div>

<script>


</script>
</body>
</html>
