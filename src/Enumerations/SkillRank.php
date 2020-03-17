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
        'name' => 'E',
        'xp' => 40
    ];

    const EPLUS = [
        'slug' => 'e_plus',
        'name' => 'E+',
        'xp' => 60
    ];

    const D = [
        'slug' => 'd',
        'name' => 'D',
        'xp' => 80
    ];

    const DPLUS = [
        'slug' => 'd_plus',
        'name' => 'D+',
        'xp' => 120
    ];

    const C = [
        'slug' => 'c',
        'name' => 'C',
        'xp' => 160
    ];

    const CPLUS = [
        'slug' => 'c_plus',
        'name' => 'C+',
        'xp' => 220
    ];

    const B = [
        'slug' => 'b',
        'name' => 'B',
        'xp' => 280
    ];

    const BPLUS = [
        'slug' => 'b_plus',
        'name' => 'B+',
        'xp' => 360             // i.e. it takes 360 to rank up from BPLUS to A
    ];

    const A = [
        'slug' => 'a',
        'name' => 'A',
        'xp' => 440
    ];

    const APLUS = [
        'slug' => 'a_plus',
        'name' => 'A+',
        'xp' => 760
    ];

    const S = [
        'slug' => 's',
        'name' => 'S',
        'xp' => 1080
    ];

    const SPLUS = [
        'slug' => 's_plus',
        'name' => 'S+'
    ];
}
