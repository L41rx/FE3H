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

    public static function renderRewardTrackLine($skill_slug, $rank_slug, $reward)
    {
        $skill = Skill::get($skill_slug);
        $rank = self::get($rank_slug);

        $skill_rank_render = self::render($skill_slug, $rank);

        if (isset($reward['durability']))    // shitty duck typing
            $reward_render = Magic::render($reward['slug']);
        else if (isset($reward['acquisition']))
            $reward_render = Ability::render($reward['slug']);
        else {
            throw new \Exception("Attempted to render reward track for ".print_r($reward, true).", couldnt detect duck type");
        }

        $html = <<<HTML
            {$skill_rank_render} -> {$reward_render}
        HTML;
        return $html;
    }

    const E = [
        'slug' => 'e',
        'name' => 'E'
    ];

    const EPLUS = [
        'slug' => 'e_plus',
        'name' => 'E+'
    ];

    const D = [
        'slug' => 'd',
        'name' => 'D'
    ];

    const DPLUS = [
        'slug' => 'd_plus',
        'name' => 'D+'
    ];

    const C = [
        'slug' => 'c',
        'name' => 'C'
    ];

    const CPLUS = [
        'slug' => 'c_plus',
        'name' => 'C+'
    ];

    const B = [
        'slug' => 'b',
        'name' => 'B'
    ];

    const BPLUS = [
        'slug' => 'b_plus',
        'name' => 'B+'
    ];

    const A = [
        'slug' => 'a',
        'name' => 'A'
    ];

    const APLUS = [
        'slug' => 'a_plus',
        'name' => 'A+'
    ];

    const S = [
        'slug' => 's',
        'name' => 'S'
    ];
}
