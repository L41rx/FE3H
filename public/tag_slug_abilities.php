<?php

$json = file_get_contents("abilities.json");

$json = json_decode($json, true);

$slugs = [];
foreach ($json as $i => $a) {
    $slug = strtolower($a['name']);
    $slug = str_replace(" ", "_", $slug);
    $slug = str_replace("'", "", $slug);
    $slug = str_replace(".", "", $slug);
    $slug = str_replace("+", "_+", $slug);
    $slug = str_replace("__", "_", $slug);

    if (in_array($slug, $slugs))
        die("Slug exists: ".$slug);

    $json[$i]['slug'] = $slug;
    array_push($slugs, $slug);

    // set some tags
    $characters = ["Byleth","Edelgard","Dimitri","Claude","Bernadetta","Annette","Hilda","Caspar","Ashe","Ignatz","Dorothea","Dedue","Leonie","Ferdinand","Felix","Lorenz","Hubert","Ingrid","Lysithea","Linhardt","Mercedes","Marianne","Petra","Sylvain","Raphael","Rhea","Alois","Catherine","Cyril","Flayn","Gilbert","Hanneman","Jeralt","Jeritza","Manuela","Seteth","Shamir","Tomas","Yuri","Hapi","Constance","Balthus"];
    $classes = ["Commoner","Noble","Myrmidon","Soldier","Fighter","Monk","Lord","Mercenary","Thief","Cavalier","Pegasus Knight","Brigand","Armored Knight","Archer","Brawler","Mage","Dark Mage","Priest","Swordmaster","Hero","Assassin","Paladin","Warrior","Fortress Knight","Wyvern Rider","Sniper","Grappler","Warlock","Dark Bishop","Bishop","Mortal Savant","Falcon Knight","War Master","Wyvern Lord","Great Knight","Bow Knight","Gremory","Dark Knight","Holy Knight","Armored Lord","High Lord","Wyvern Master","Emperor","Great Lord","Barbarossa","Dancer","Enlightened One","War monk", "War cleric","Valkyrie"];
    $skills = ["Swords","Lances","Axes","Bows","Brawl","Reason","Faith","Authority","Heavy Armor","Riding","Flying"];

    $tags = [
        'be unit' => 'Unit passive',
        'active class' => 'Class passive',
        'reach skill level' => 'Skill proficiency',
        'master a class' => 'Class mastery'
    ];

    foreach ($characters as $c)
        $tags[strtolower($c)] = $c;
    foreach ($classes as $c)
        $tags[strtolower($c)] = $c;
    foreach ($skills as $s)
        $tags[strtolower($s)] = $s;

    $json[$i]['tags'] = [];
    foreach ($tags as $search => $tag) {
        if (strpos(strtolower($json[$i]['description']), strtolower($search)) !== false)
            array_push($json[$i]['tags'], $tag);

        if (strpos(strtolower($json[$i]['acquisition']), strtolower($search)) !== false && !in_array($tag, $json[$i]['tags']))
            array_push($json[$i]['tags'], $tag);
    }
}
$json = json_encode($json);
file_put_contents( "abilities2.json", $json);
