<?php

use L41rx\FE3H\Enumerations\Character;
use L41rx\FE3H\Enumerations\LostItem;

require_once __DIR__.'/../vendor/autoload.php';

$all_lost_items = LostItem::all();
foreach ($all_lost_items as $key => $li) {
    $all_lost_items[$key]['owner'] = Character::get($li['owner']);
}
?>

<html>
<head>
    <style>
        .options li a:hover {
            text-decoration: underline;
            cursor: pointer;
        }

        .options li {
            margin-bottom: 10px;
        }

        li.highlight {
            background: yellow;
            display: list-item;
        }

        .nametag.highlight {
            background: cyan;
            display: block;
        }

        .toggle {
            display: none;
        }
    </style>
</head>
<body>
<h1>Fire Emblem Three Houses Lost Items</h1>
<ul class="options">
    <li><a style="color: pink; background: black;" onclick="show('character')">Order by Character (default)</a></li>
    <li><a style="color: gold; background: black;" onclick="show('alphabet')">Order Alphabetically</a></li>
    <li><a style="color: cyan; background: black;" onclick="show('moon')">Order by Moon acquired</a></li>
</ul>
<label for="search">Search</label> <input id="search" onkeyup="search()" placeholder="Bundle of herbs, Ashe, Horsebow Moon"/> <span><small id="matches">(Press enter)</small></span>
<button id="toggle-highlighted" onclick="toggleH()">Toggle unhighlighted item visibility</button>
<hr />
<div id="character">
    <h2>Lost items by character</h2>
    <?php
        $characters = Character::all();
        ksort($characters);
        foreach ($characters as $c) {
            if (count($c['lost_items']) > 0) {
                echo "<p class='nametag' data-character='{$c['slug']}'><strong>{$c['name']}</strong> <small>{$c['affiliation']['name']}</small></p>";
                $lis = $c['lost_items'];
                $lost_items = [];
                foreach($lis as $li)
                    $lost_items[$li['slug']] = $li;

                ksort($lost_items);
                echo "<ul>";
                foreach ($lost_items as $li) {
                    echo "<li class='item' data-item='{$li['slug']}'>".LostItem::render($li['slug'])." <small>({$li['moon']['name']}, {$li['location']})</small></li>";
                }
                echo "</ul>";
            }
        }
    ?>
</div>
<div id="alphabet" style="display: none;">
    <h2>Alphabetical lost items</h2>
    <ul>
        <?php
            ksort($all_lost_items);
            foreach ($all_lost_items as $li) {
                echo "<li class='item' data-item='{$li['slug']}'>".LostItem::render($li['slug'])." <small>({$li['moon']['name']}, {$li['location']})</small> <small data-character='{$li['owner']['slug']}'></small></li>";
            }
        ?>
    </ul>
</div>
<div id="moon" style="display: none;">
    <h2>Lost items by moon acquired</h2>
</div>


<script>
    var lost_items = <?php echo json_encode($all_lost_items); ?>;
    var sections = ['character', 'alphabet', 'moon'];
    function show(section) {
        for (var i = 0; i < sections.length; i++) {
            document.getElementById(sections[i]).style.display = "none";
        }
        document.getElementById(section).style.display = "block";
    }

    function search() {
        console.log("searching!");
        var q = document.getElementById('search').value;
        // un-highlight all
        var all_items = document.querySelectorAll('[data-item]');
        var all_chars = document.querySelectorAll('[data-character]');
        for (var j = 0; j < all_items.length; j++) {
            all_items[j].classList.remove("highlight");
        }
        for (var j = 0; j < all_chars.length; j++) {
            all_chars[j].classList.remove("highlight");
        }

        if (q !== '') {

            console.log("Search value is", q);

            console.log("Searching these items:", lost_items);

            // Find matches
            var matches = [];
            Object.keys(lost_items).forEach(function (key) {
                var l = lost_items[key];

                // console.log("Checking ", q, "against", l);

                if (l.name.includes(q))
                    matches.push(l);
                else if (l.slug.includes(q))
                    matches.push(l);
                else if (l.owner.name.includes(q))
                    matches.push(l);
            });

            console.log("Found these matches", matches);

            matches.forEach(function (item, key) {
                var some_items = document.querySelectorAll("[data-item='" + item.slug + "']");
                for (var k = 0; k < some_items.length; k++) {
                    some_items[k].classList.add("highlight");
                }

                var some_chars = document.querySelectorAll("[data-character='" + item.owner.slug + "']");
                for (var k = 0; k < some_chars.length; k++) {
                    some_chars[k].classList.add("highlight");
                }
            });
        } else {
            matches = [];
        }

        document.getElementById('matches').innerHTML = "("+matches.length+" matches)";
    }

    var toggled = false;
    function toggleH() {
        if (toggled)
            toggleOff();
        else
            toggleOn();
    }

    function toggleOn() {
        console.log("Toggling highlight visibility on");

        var elems = [];
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("item"));
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("nametag"));

        for (var i = 0; i < elems.length; i++) {
            elem = elems[i];
            elem.classList.add("toggle");
        }

        toggled = true;
    }

    function toggleOff() {
        console.log("Toggling highlight visibility off");

        var elems = [];
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("item"));
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("nametag"));

        for (var i = 0; i < elems.length; i++) {
            elem = elems[i];
            elem.classList.remove("toggle");
        }
        toggled = false;
    }
</script>
</body>
</html>
