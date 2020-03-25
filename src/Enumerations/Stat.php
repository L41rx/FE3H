<?php


namespace L41rx\FE3H\Enumerations;


class Stat extends \L41rx\FE3H\Enumeration
{
    const HIT_POINTS = [
        'slug' => 'hp',
        'name' => 'Hit Points',
        'description' => 'Health! How much damage a unit takes before perishing'
    ];

    const STRENGTH = [
        'slug' => 'str',
        'name' => 'Strength',
        'description' => 'How hard a unit hits things! Strength adds Mt/Atk for melee attacks (?)'
    ];

    const MAGIC = [
        'slug' => 'mag',
        'name' => 'Magic',
        'description' => 'Like strength but for the brain! Magic adds Mt/Atk for magic attacks (?)'
    ];

    const DEXTERITY = [
        'slug' => 'dex',
        'name' => 'Dexterity',
        'description' => 'Affects avoid and hit chances'
    ];

    const SPEED = [
        'slug' => 'spd',
        'name' => 'Speed',
        'description' => 'If your speed is 4 > your opponents you get to hit twice'
    ];

    const LUCK = [
        'slug' => 'lck',
        'name' => 'Luck',
        'description' => 'Lots of things ;)'
    ];

    const DEFENSE = [
        'slug' => 'def',
        'name' => 'Defence',
        'description' => 'Subtract incoming physical damage by this'
    ];

    const RESISTANCE = [
        'slug' => 'res',
        'name' => 'Resistance',
        'description' => 'Subtract incoming magic damage by this'
    ];

    const CHARM = [
        'slug' => 'cha',
        'name' => 'Charm',
        'description' => 'Used in gambits'
    ];

    // handy :)
    public static function renderSheet($slug_sheet, $use_percent = false)
    {
        $html = "<div style='display: flex; flex-wrap: wrap;'>";
        $sum = 0;

        $percent_maybe = $use_percent ? '<small>%</small>' : '';
        foreach ($slug_sheet as $slug => $value) {
            $html .= "<p style='width: 50%; margin: 0;'>";
            $html .= "<small>".self::render($slug)."</small><span style='float: right; margin-right: 15px;'>{$value}{$percent_maybe}</span>";
            $html .= "</p>";
            $sum += $value;
        }
        $html .= "<p style='width: 50%; margin: 0; font-style: italic;'><small>sum</small><small style='float: right; margin-right: 15px;'>{$sum}{$percent_maybe}</small></p>";
        $html .= "</div>";

        return $html;
    }
}
