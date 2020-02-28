<?php
require_once __DIR__.'/../vendor/autoload.php';
?>

<html>
<head><style>
        .abilities {
            display: flex;
            flex-wrap: wrap;
        }

        .ability {
            max-width: 250px;
            border: 1px solid black;
            padding: 20px;
            margin: 10px;
        }

    </style></head>
<body>


<div class="abilities">
    <?php
        $abilities = \L41rx\FE3H\Enumerations\Ability::all();
        foreach ($abilities as $a) {
            echo "<div class='ability'>";
            echo "<p><strong>{$a['name']}</strong></p>";
            echo "<p>{$a['acquisition']}</p>";
            echo "<p>{$a['description']}</p>";
            echo "</div>";
        }
    ?>
</div>

<script>


</script>
</body>
</html>
