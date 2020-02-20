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
<p>Make Character</p>
<form id="make-character" method="POST" action="/to_json_character.php">
	<!-- name -->
	<div class="trait">
		<label for="character-name">Name</label>
		<input required type="text" id="character-name" name="character-name" />
	</div>

    <!-- slug, dbs urls -->
    <div class="trait">
        <label for="slug">Slug</label>
        <input required type="text" id="slug" name="slug" />
    </div>

	<!-- gender -->
	<div class="trait">
		<label for="gender">Gender</label>
		<label for="guy">♂</label>
		<input required type="radio" name="gender" id="guy" value="m" />
		<label for="gal">♀</label>
		<input type="radio" name="gender" id="gal" value="f" />
	</div>

	<!-- house -->
	<div class="trait">
		<label for="house">House</label>
		<label for="house-lions">Lions</label>
		<input required type="radio" name="house" id="lions" value="Lions" />
		<label for="eagles">Eagles</label>
		<input type="radio" name="house" id="eagles" value="Eagles" />
		<label for="deer">Deer</label>
		<input type="radio" name="house" id="deer" value="Deer" />
	</div>

	<!-- start class -->
	<div class="trait">
		<label for="start-class">Starting class</label>
		<label for="noble">Noble</label>
		<input required type="radio" name="start-class" id="noble" value="Noble" />
		<label for="commoner">Commoner</label>
		<input type="radio" name="start-class" id="commoner" value="Commoner" />
	</div>

	<hr />

	<!-- base stats -->
	<div class="trait">
		<label for="base-stats">Base stats</label>
		<?php
			foreach (\L41rx\FE3H\Enumerations\Stat::all() as $stat) {
				$html = <<<HMTL
				<div class="stat">
					<label for="base-stat-{$stat['slug']}">{$stat['slug']}</label>
					<input required type="num" min="0" name="base-stat-{$stat['slug']}" id="base-stat-{$stat['slug']}" />
				</div>
				HMTL;
				echo $html;
			}
		?>
	</div>

	<!-- base growth percents -->
	<div class="trait">
		<label for="stat-growth">Base stat growth</label>
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
		<label for="max-stats">Max stats</label>
		<?php
			foreach (\L41rx\FE3H\Enumerations\Stat::all() as $stat) {
				$html = <<<HMTL
				<input required type="num" name="max-stat-{$stat['slug']}" id="max-stat-{$stat['slug']}" />
				HMTL;
				echo $html;
			}
		?>
	</div>

	<hr />

	<!-- skill strengths -->
	<div class="trait">
		<label for="strengths">Skill strengths</label>
		<?php
			foreach (\L41rx\FE3H\Enumerations\Skill::all() as $skill) {
				$html = <<<HMTL
				<div class="stat">
					<label for="skill-strength-{$skill['slug']}">{$skill['slug']}</label>
					<input type="checkbox" name="skill-strength-{$skill['slug']}" id="skill-strength-{$skill['slug']}" />
				</div>
				HMTL;
				echo $html;
			}
		?>
	</div>

	<!-- skill weaknesses -->
	<div class="trait">
		<label for="weaknesses">Skill weaknesses</label>
		<?php
			foreach (\L41rx\FE3H\Enumerations\Skill::all() as $skill) {
				$html = <<<HMTL
				<input type="checkbox" name="skill-weak-{$skill['slug']}" id="skill-weak-{$skill['slug']}" />
				HMTL;
				echo $html;
			}
		?>
	</div>

	<!-- talent -->
	<div class="trait">
		<label for="talent">Budding talent</label>
		<?php
			foreach (\L41rx\FE3H\Enumerations\Skill::all() as $skill) {
				$html = <<<HMTL
				<input type="radio" name="talent" id="talent-{$skill['slug']}" />
				HMTL;
				echo $html;
			}
		?>
	</div>

	<hr />

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
