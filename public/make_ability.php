<?php
require_once __DIR__.'/../vendor/autoload.php';
?>

<html>
<head><style>
        form {
            display: flex;
            flex-direction: column;
            border: 1px solid pink;
            padding: 1rem;
        }

        div.trait {
            display: flex;
            margin-bottom: 5px;
        }

        div.trait > label:first-child {
            min-width: 150px;
            display: flex;
            justify-content: left;
            align-items: flex-end;
        }

        div.stat {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input[type="text"], textarea {
            border: 0;
            border-bottom: 1px solid black;
        }

        input[type="num"] {
            border-radius: 50%;
            width: 20px;
            border: 1px solid black;
            text-align: center;

            margin: 0 15px;
        }

        input[type="checkbox"], input[type="radio"] {
            margin: 0 15px;
        }

        hr {
            width: 100%;
            color: white;
        }

    </style></head>
<body>
<!-- site -->
<p>Make Ability</p>
<form id="make-ability" method="POST" action="/to_json_ability.php">
    <!-- name -->
    <div class="trait">
        <label for="ability-name">Name</label>
        <input required type="text" id="ability-name" name="ability-name" />
    </div>

    <!-- slug, dbs urls -->
    <div class="trait">
        <label for="slug">Slug</label>
        <input required type="text" id="slug" name="slug" />
    </div>

    <!-- description -->
    <div class="trait">
        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <!-- acquisition -->
    <div class="trait">
        <label for="acquisition">How to acquire</label>
        <textarea id="acquisition" name="acquisition"></textarea>
    </div>

    <input type="submit" value="Export JSON" />
</form>




<script>


</script>
</body>
</html>
