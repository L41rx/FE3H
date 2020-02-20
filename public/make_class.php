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

        form select {
            border: 1px solid black;
            width: 46px;
            padding: 4px;
            margin: 0 2px;
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
<p>Make Class</p>
<form id="make-character" method="POST" action="/to_json_class.php">
    <!-- full name -->
    <div class="trait">
        <label for="class-name">Name</label>
        <input required type="text" id="class-name" name="class-name" />
    </div>

    <!-- slug, dbs urls -->
    <div class="trait">
        <label for="slug">Slug</label>
        <input required type="text" id="slug" name="slug" />
    </div>

    <!-- short, stylized name -->
    <div class="trait">
        <label for="short-name">Name</label>
        <input required type="text" id="short-name" name="short-name" />
    </div>

    <!-- tier -->
    <div class="trait">
        <label for="tier">Tier</label>

        <label for="trainee">Trainee</label>
        <input required type="radio" name="tier" id="trainee" value="trainee" />

        <label for="beginner">Beginner</label>
        <input type="radio" name="tier" id="beginner" value="beginner" />

        <label for="intermediate">Intermediate</label>
        <input type="radio" name="tier" id="intermediate" value="intermediate" />

        <label for="advanced">Advanced</label>
        <input type="radio" name="tier" id="advanced" value="advanced" />

        <label for="master">Master</label>
        <input type="radio" name="tier" id="master" value="master" />

        <label for="unique">Unique</label>
        <input type="radio" name="tier" id="unique" value="unique" />
    </div>

    <hr />





    <!-- min stats -->
    <div class="trait">
        <label for="base-stats" title="Units are boosted to this stat level upon certification">Minimum stats</label>
        <?php
        foreach (\L41rx\FE3H\Enumerations\Stat::all() as $stat) {
            $html = <<<HMTL
				<div class="stat">
					<label for="min-stat-{$stat['slug']}">{$stat['slug']}</label>
					<input required type="num" min="0" name="min-stat-{$stat['slug']}" id="min-stat-{$stat['slug']}" />
				</div>
				HMTL;
            echo $html;
        }
        ?>
    </div>

    <!-- growth modifiers -->
    <div class="trait">
        <label for="stat-growth">Growth modifiers</label>
        <?php
        foreach (\L41rx\FE3H\Enumerations\Stat::all() as $stat) {
            $html = <<<HMTL
				<input required type="num" name="stat-growth-{$stat['slug']}" id="stat-growth-{$stat['slug']}" />
				HMTL;
            echo $html;
        }
        ?>
    </div>

    <!-- units ultimate max value for each skill -->
    <div class="trait">
        <label for="stat-bonus">Stat modifiers</label>
        <?php
        foreach (\L41rx\FE3H\Enumerations\Stat::all() as $stat) {
            $html = <<<HMTL
				<input required type="num" name="stat-bonus-{$stat['slug']}" id="stat-bonus-{$stat['slug']}" />
				HMTL;
            echo $html;
        }
        ?>
    </div>

    <hr />

    <!-- skill strengths -->
    <div class="trait">
        <label for="proficiency">Skill proficiency</label>
        <?php
        foreach (\L41rx\FE3H\Enumerations\Skill::all() as $skill) {
            $html = <<<HMTL
				<div class="stat">
					<label for="skill-proficiency-{$skill['slug']}">{$skill['slug']}</label>
					<input type="checkbox" name="skill-proficiency-{$skill['slug']}" id="skill-proficiency-{$skill['slug']}" />
				</div>
				HMTL;
            echo $html;
        }
        ?>
    </div>

    <div class="trait">
        <label for="requirements">Certification<br>requirements</label>
        <?php
        $skill_level_option_html = "";
        foreach (['E', 'E+', 'D', 'D+', 'C', 'C+', 'B', 'B+', 'A', 'A+', 'S'] as $lvl)
            $skill_level_option_html .= "<option>$lvl</option>";

        foreach (\L41rx\FE3H\Enumerations\Skill::all() as $skill) {
            $html = <<<HMTL
				<div class="stat">
					<select name="skill-requirement-{$skill['slug']}" id="skill-requirement-{$skill['slug']}">{$skill_level_option_html}</select>
				</div>
				HMTL;
            echo $html;
        }
        ?>
    </div>

    <!-- any other notes -->
    <div class="trait">
        <label for="notes">Other notes</label>
        <textarea id="notes" name="notes"></textarea>
    </div>

    <input type="submit" value="Export JSON" />
</form>




<script>


</script>
</body>
</html>
