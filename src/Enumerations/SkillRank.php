<?php
namespace L41rx\FE3H\Enumerations;
use L41rx\FE3H\Enumeration;

class SkillRank extends Enumeration
{
    public static function render($skill_slug, $rank = null)
    {
        $skill = Skill::get($skill_slug);
        $html = <<<HMTL
            [ {$rank['name']} ]: {$skill['name']}
        HMTL;    
        return $html;
    }

    public static function renderMagicTrack($skill_slug, $rank_slug, $magic)
    {
        $skill = Skill::get($skill_slug);
        $rank = self::get($rank_slug);

        $skill_rank_render = self::render($skill_slug, $rank);
        $magic_render = Magic::render($magic['slug']);

        $html = <<<HTML
            {$skill_rank_render} -> {$magic_render}
        HTML;
        return $html;
    }

    const E = [
        'slug' => 'e',
        'name' => 'E'
    ];

    const EPLUS = [
        'slug' => 'e+',
        'name' => 'E+'
    ];

    const D = [
        'slug' => 'd',
        'name' => 'D'
    ];

    const DPLUS = [
        'slug' => 'd+',
        'name' => 'D+'
    ];

    const C = [
        'slug' => 'c',
        'name' => 'C'
    ];

    const CPLUS = [
        'slug' => 'c+',
        'name' => 'C+'
    ];

    const B = [
        'slug' => 'b',
        'name' => 'B'
    ];

    const BPLUS = [
        'slug' => 'b+',
        'name' => 'B+'
    ];

    const A = [
        'slug' => 'a',
        'name' => 'A'
    ];

    const APLUS = [
        'slug' => 'a',
        'name' => 'A'
    ];

    const S = [
        'slug' => 's',
        'name' => 'S+'
    ];
}
