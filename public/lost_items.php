<?php

use L41rx\FE3H\Enumerations\Character;
use L41rx\FE3H\Enumerations\Affiliation;
use L41rx\FE3H\Enumerations\LostItem;
use L41rx\FE3H\Enumerations\Moon;

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

        .nametag.highlight, .moontag.highlight {
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
    <?php
        $characters = Character::all();
        $unique_characters = [];
        foreach ($characters as $c) {
            $unique_characters[strtoupper($c['name'][0])] = true;
        }
        ksort($unique_characters);
    ?>
    <h2>Lost items by character</h2>
    <p>
        Skip to - <?php foreach ($unique_characters as $c => $bool) { echo "<a href=\"#alpha-{$c}\">{$c}</a> "; } ?>
    </p>
    <?php
        ksort($characters);
        foreach ($characters as $c) {
            if (count($c['lost_items']) > 0) {
                $affiliation = isset($c['affiliation']) ? Affiliation::get($c['affiliation']['slug'], 'name') : Affiliation::default('name');
                if ($unique_characters[strtoupper($c['name'][0])]) {
                    $alpha = strtoupper($c['name'][0]);
                    $unique_characters[strtoupper($c['name'][0])] = false;
                    echo "<p class='nametag' data-character='{$c['slug']}' id=\"alpha-{$alpha}\"><strong>{$c['name']}</strong> <small>{$affiliation}</small></p>";
                } else
                    echo "<p class='nametag' data-character='{$c['slug']}'><strong>{$c['name']}</strong> <small>{$affiliation}</small></p>";
                $lis = $c['lost_items'];
                $lost_items = [];
                foreach($lis as $li)
                    $lost_items[$li['slug']] = $li;

                ksort($lost_items);
                echo "<ul>";
                foreach ($lost_items as $li) { 
                    $moon_name = Moon::derive($li, 'name');
                    $item_location = LostItem::get($li['slug'], 'location', true);
                    echo "<li class='item' data-item='{$li['slug']}'>".LostItem::render($li['slug'])." <small>({$moon_name}, {$item_location})</small></li>";
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
                $moon_name = Moon::derive($li, 'name');
                $item_location = LostItem::get($li['slug'], 'location', true);
                echo "<li class='item' data-item='{$li['slug']}' data-character='{$li['owner']['slug']}'>".LostItem::render($li['slug'])." <small>({$li['owner']['name']}, {$moon_name}, {$item_location})</small></li>";
            }
        ?>
    </ul>
</div>
<div id="moon" style="display: none;">
    <h2>Lost items by moon acquired</h2>
    <?php
        $moons = Moon::all();
        usort($moons, function($a, $b) { return $a['order'] - $b['order']; });
        $moons_by_index = [];
        foreach ($moons as $moon)
            $moons_by_index[$moon['slug']] = [];

        foreach ($all_lost_items as $li) {
            if (isset($li['moon']) && !is_null($li['moon'])) {
                if (isset($li['moon']['slug']))
                    $moons_by_index[$li['moon']['slug']][$li['slug']] = $li;
                else if (isset($li['moon'][0]['slug']))
                    foreach ($li['moon'] as $zz_moon) 
                        $moons_by_index[$zz_moon['slug']][$li['slug']] = $li;
            }
        }

        foreach ($moons_by_index as $moon_slug => $moon_by_index) {
            ksort($moon_by_index);
            $moon_name = Moon::get($moon_slug, 'name');
            echo "<p class='moontag' data-moon='{$moon_slug}'><strong>{$moon_name}</strong></p>";
            echo "<ul>";
            foreach ($moon_by_index as $li) {
                $moon_name = Moon::derive($li, 'name');
                $item_location = LostItem::get($li['slug'], 'location', true);
                echo "<li class='item' data-item='{$li['slug']}' data-character='{$li['owner']['slug']}'>".LostItem::render($li['slug'])." <small>({$li['owner']['name']}, {$item_location})</small></li>";
            }
            echo "</ul>";
        }
    ?>
</div>


<?php
    foreach ($all_lost_items as $key => $ali) {
        if (!isset($ali['moon']['slug']) && isset($ali['moon'][0]['slug'])) {
            $all_lost_items[$key]['moon']['name'] = "";
            $all_lost_items[$key]['moon']['slug'] = "";
            foreach ($ali['moon'] as $moon) {
                $all_lost_items[$key]['moon']['name'] .= $moon['name'].', ';
                $all_lost_items[$key]['moon']['slug'] .= $moon['slug'].', ';
            }
            $all_lost_items[$key]['moon']['name'] = rtrim($all_lost_items[$key]['moon']['name'], ', ');
            $all_lost_items[$key]['moon']['slug'] = rtrim($all_lost_items[$key]['moon']['slug'], ', ');
        }
    }
?>
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
        var q = document.getElementById('search').value;
        // un-highlight all
        var all_items = document.querySelectorAll('[data-item]');
        var all_chars = document.querySelectorAll('[data-character]');
        var all_moons = document.querySelectorAll('[data-moon]');
        for (var j = 0; j < all_items.length; j++) {
            all_items[j].classList.remove("highlight");
        }
        for (var j = 0; j < all_chars.length; j++) {
            all_chars[j].classList.remove("highlight");
        }
        for (var j = 0; j < all_moons.length; j++) {
            all_moons[j].classList.remove("highlight");
        }

        if (q !== '') {
            // Find matches
            var matches = [];
            Object.keys(lost_items).forEach(function (key) {
                var l = lost_items[key];

                if (l.name.includes(q))
                    matches.push(l);
                else if (l.slug.includes(q))
                    matches.push(l);
                else if (l.owner.name.includes(q))
                    matches.push(l);
                else if (typeof(l.moon) !== 'undefined' && l.moon.name.includes(q))
                    matches.push(l);
            });

            matches.forEach(function (item, key) {
                var some_items = document.querySelectorAll("[data-item='" + item.slug + "']");
                for (var k = 0; k < some_items.length; k++) {
                    some_items[k].classList.add("highlight");
                }

                if (item.owner.name.includes(q)) {
                    var some_chars = document.querySelectorAll("[data-character='" + item.owner.slug + "']");
                    for (var k = 0; k < some_chars.length; k++) {
                        some_chars[k].classList.add("highlight");
                    }
                }

                if (typeof(item.moon) !== 'undefined' && item.moon.name.includes(q)) {
                    var some_moons = document.querySelectorAll("[data-moon='" + item.moon.slug + "']");
                    for (var k = 0; k < some_moons.length; k++) {
                        some_moons[k].classList.add("highlight");
                    }
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
        var elems = [];
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("item"));
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("nametag"));
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("moontag"));

        for (var i = 0; i < elems.length; i++) {
            elem = elems[i];
            elem.classList.add("toggle");
        }

        toggled = true;
    }

    function toggleOff() {
        var elems = [];
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("item"));
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("nametag"));
        elems = Array.prototype.concat.apply(elems, document.getElementsByClassName("moontag"));

        for (var i = 0; i < elems.length; i++) {
            elem = elems[i];
            elem.classList.remove("toggle");
        }
        toggled = false;
    }
</script>
</body>
</html>

