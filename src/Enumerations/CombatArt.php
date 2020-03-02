<?php


namespace L41rx\FE3H\Enumerations;


class CombatArt extends \L41rx\FE3H\Enumeration
{

    public static function default(string $property) {
        switch ($property) {
            case 'min_range':
            case 'max_range':
                return 1;
                break;
        }

        return parent::default();
    }

    // Axe arts
    const SMASH = [
        'slug' => 'smash',
        'name' => 'Smash',
        'effect' => 'Unit makes a solid axe attack with high crit (+3 Mt/Atk, +20 Hit, +20 Crit, 1 Range)'
    ];



    // Other Combat Arts
    const SWAP = [
        'slug' => 'swap',
        'name' => 'Swap',
        'effect' => 'Unit swaps places with an adjacent ally'
    ];

    const REPOSITION = [
        'slug' => 'reposition',
        'name' => 'Reposition',
        'effect' => 'Unit moves an adjacent ally to opposite free adjacent space'
    ];

    const SHOVE = [
        'slug' => 'shove',
        'name' => 'Shove',
        'effect' => 'Unit whacks an adjacent ally and send them flying one space over'
    ];

    const DRAW_BACK = [
        'slug' => 'draw_back',
        'name' => 'Draw Back',
        'effect' => 'Unit moves one space away from an adjacent ally and pulls them along'
    ];

}
