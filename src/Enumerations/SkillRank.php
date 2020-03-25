<?php
namespace L41rx\FE3H\Enumerations;
use L41rx\FE3H\Enumeration;

class SkillRank extends Enumeration
{
    public static function render($skill_slug, $rank = null)
    {
        $skill = Skill::get($skill_slug);
        $title = SkillRank::buildTitleString($rank);
        $html = <<<HMTL
            [ <span title="{$title}">{$rank['name']}</span> ]: {$skill['name']}
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

    private static function buildTitleString($skill_rank)
    {
        $whacks = 2;
        $tutors = 10;

        $str =  "It takes a cumulative {$skill_rank['cumulative_xp']} xp to reach rank {$skill_rank['name']} from jack. ";
        $str .= "Your unit would need to use the skill around ";
        $str .= $skill_rank['cumulative_xp'] / $whacks . " times, or undergo around ";
        $str .= $skill_rank['cumulative_xp'] / $tutors . " private tutoring sessions with Byleth.";
        return $str;
    }


    const E = [
        'slug' => 'e',
        'name' => 'E',
        'xp' => 40,
        'cumulative_xp' => 0
    ];

    const EPLUS = [
        'slug' => 'e_plus',
        'name' => 'E+',
        'xp' => 60,
        'cumulative_xp' => 40
    ];

    const D = [
        'slug' => 'd',
        'name' => 'D',
        'xp' => 80,
        'cumulative_xp' => 100
    ];

    const DPLUS = [
        'slug' => 'd_plus',
        'name' => 'D+',
        'xp' => 120,
        'cumulative_xp' => 180
    ];

    const C = [
        'slug' => 'c',
        'name' => 'C',
        'xp' => 160,
        'cumulative_xp' => 300
    ];

    const CPLUS = [
        'slug' => 'c_plus',
        'name' => 'C+',
        'xp' => 220,
        'cumulative_xp' => 460
    ];

    const B = [
        'slug' => 'b',
        'name' => 'B',
        'xp' => 280,
        'cumulative_xp' => 680
    ];

    const BPLUS = [
        'slug' => 'b_plus',
        'name' => 'B+',
        'xp' => 360,             // i.e. it takes 360 xp to rank up from BPLUS to A
        'cumulative_xp' => 960   // i.e. it takes 1320 xp to rank up from E (0 xp) to BPLUS.
    ];

    const A = [
        'slug' => 'a',
        'name' => 'A',
        'xp' => 440,
        'cumulative_xp' => 1320
    ];

    const APLUS = [
        'slug' => 'a_plus',
        'name' => 'A+',
        'xp' => 760,
        'cumulative_xp' => 1760
    ];

    const S = [
        'slug' => 's',
        'name' => 'S',
        'xp' => 1080,
        'cumulative_xp' => 2520
    ];

    const SPLUS = [
        'slug' => 's_plus',
        'name' => 'S+',
        'cumulative_xp' => 3600
    ];
}
