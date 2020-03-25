<?php


namespace L41rx\FE3H\Enumerations;


class Certification extends \L41rx\FE3H\Enumeration
{
    // just JSON it and inject that lol
    private static function injectSelf($enum)
    {
        return "id=\"{$enum['slug']}\" data-certification=\"".htmlentities(json_encode($enum), ENT_QUOTES, 'UTF-8')."\"";
    }

    public static function render($slug)
    {
        $c = self::get($slug);

        $tier = CertificationTier::render($c['tier']['slug']);
        $base_stats = isset($c['base_stats']) ? Stat::renderSheet($c['base_stats']) : "<p><em>(N/A)</em></p>";
        $stat_growth_bonus = isset($c['stat_growth_bonus']) ? Stat::renderSheet($c['stat_growth_bonus']) : "<p><em>(N/A)</em></p>";
        $stat_bonus = isset($c['stat_bonus']) ? Stat::renderSheet($c['stat_bonus']) : "<p><em>(N/A)</em></p>";
        $mastery_reward = [];
        if (isset($c['mastery_reward'])) // lol !!!!
            if (is_array($c['mastery_reward']))
                foreach ($c['mastery_reward'] as $enum)
                    if (isset($enum['effect']))
                        array_push($mastery_reward, CombatArt::render($enum['slug']));
                    else if (isset($enum['acquisition']))
                        array_push($mastery_reward, Ability::render($enum['slug']));
                    else
                        throw new Exception("Tried to detect mastery reward enum type but couldnt when rendering a certification!");
            else
                if (isset($enum['effect']))
                        $mastery_reward = CombatArt::render($enum['slug']);
                    else if (isset($enum['acquisition']))
                        $mastery_reward = Ability::render($enum['slug']);
                    else
                        throw new Exception("Tried to detect mastery reward enum type but couldnt when rendering a certification!");

        else
            $mastery_reward = '<p><em>(N/A)</em></p>';
        if (is_array($mastery_reward))
            $mastery_reward = implode(', ', $mastery_reward);

        $requirements = '';
        if (isset($c['required_proficiency'])) {
            $tmp_array_requirements = $c['required_proficiency']; // srry, need to operate on the array
            if (isset($tmp_array_requirements['method'])) {
                $requirements .= "<method><em><small style=\"vertical-align: bottom;\">({$tmp_array_requirements['method']} requirement can be met)</em></small></method>\n";
                unset($tmp_array_requirements['method']);
            } else {
                $requirements .= "<method><em><small style=\"vertical-align: bottom;\">(All requirements must be met)</em></small></method>\n";
            }

            $trq = [];
            foreach ($tmp_array_requirements as $skill_slug => $skillrank)
                array_push($trq, SkillRank::render($skill_slug, $skillrank));
            
            $requirements = implode(' | ', $trq)." ".$requirements;               

        } else {
            $requirements = '<p>None</p>';
        }

        $inject_self = self::injectSelf($c);
        return <<<HMTL
            <certification class="certification" $inject_self>
                <info_block>
                    <name>{$c['name']}</name><br />
                    <span style="position: absolute; top: 14px; right: 0;">
                        <tier>{$tier}</tier> |
                        <movement>Mv: {$c['movement']}</movement>
                    </span>
                    <p>Base stats</p>
                    <base_stats>{$base_stats}</base_stats>
                    <hr />
                    <p>Stat growth bonus</p>
                    <stat_growth_bonus>{$stat_growth_bonus}</stat_growth_bonus>
                    <hr />
                    <p>Stat bonus</p>
                    <stat_bonus>{$stat_bonus}</stat_bonus>
                    <hr />
                    <p>Requirements(s)</p>
                    <requirements>{$requirements}</requirements>
                    <hr />
                    <p>Mastery reward(s)</p>
                    <mastery_reward>{$mastery_reward}</mastery_reward>
                </info_block>
            </certification>
        HMTL;
    }

    public static function default(string $property) {
        switch ($property) {
            case 'required_proficiency':
            case 'proficiency':
            case 'base_stats':
            case 'stat_growth_bonus':
            case 'stat_bonus':
                return [];
                break;
            case 'magical':
                return false;
                break;
            case 'name':
                return 'The Immaculate One (placeholder name)';
                break;
        }

        return parent::default($property);
    }

    // Trainee
    const COMMONER = [
        'slug' => 'commoner',
        'name' => 'Commoner',
        'tier' => CertificationTier::TRAINEE,
        'movement' => 4,
        'mastery_reward' => [ Ability::HP_PLUS5 ],
        'magical' => true
    ];

    const NOBLE = [
        'slug' => 'noble',
        'name' => 'Noble',
        'tier' => CertificationTier::TRAINEE,
        'movement' => 4,
        'stat_growth_bonus' => [
            Stat::CHARM['slug']      => 5
        ],
        'mastery_reward' => [ Ability::HP_PLUS5 ],
        'magical' => true
    ];

    // Beginner
    const MYRMIDON = [
        'slug' => 'myrmidon',
        'name' => 'Myrmidon',
        'tier' => CertificationTier::BEGINNER,
        'movement' => 4,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 20,
            Stat::STRENGTH['slug']   => 7,
            Stat::MAGIC['slug']      => 3,
            Stat::DEXTERITY['slug']  => 6,
            Stat::SPEED['slug']      => 6,
            Stat::LUCK['slug']       => 4,
            Stat::DEFENSE['slug']    => 5,
            Stat::RESISTANCE['slug'] => 2,
        ],
        'stat_growth_bonus' => [
            Stat::HIT_POINTS['slug'] => 10,
            Stat::SPEED['slug']      => 5,
            Stat::RESISTANCE['slug'] => -5,
            Stat::CHARM['slug']      => 5
        ],
        'stat_bonus' => [
            Stat::SPEED['slug']      => 1,
        ],
        'proficiency_xp_bonus' => [
            Skill::SWORD['slug']     => 1
        ],
        'required_proficiency' => [
            Skill::SWORD['slug']     => SkillRank::D
        ],
        'mastery_reward' => [
            CombatArt::SWAP,
            Ability::SPEED_PLUS2
        ]
    ];

    const SOLDIER = [
        'slug' => 'soldier',
        'name' => 'Soldier',
        'tier' => CertificationTier::BEGINNER,
        'movement' => 4,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 20,
            Stat::STRENGTH['slug']   => 8,
            Stat::MAGIC['slug']      => 3,
            Stat::DEXTERITY['slug']  => 6,
            Stat::SPEED['slug']      => 6,
            Stat::LUCK['slug']       => 4,
            Stat::DEFENSE['slug']    => 5,
            Stat::RESISTANCE['slug'] => 2,
        ],
        'stat_growth_bonus' => [
            Stat::HIT_POINTS['slug'] => 10,
            Stat::DEXTERITY['slug']  => 5,
            Stat::RESISTANCE['slug'] => -5,
            Stat::CHARM['slug']      => 5
        ],
        'stat_bonus' => [
            Stat::DEXTERITY['slug']  => 1,
        ],
        'proficiency_xp_bonus' => [
            Skill::LANCE['slug'] => 1
        ],
        'required_proficiency' => [
            Skill::LANCE['slug'] => SkillRank::D
        ],
        'mastery_reward' => [
            CombatArt::REPOSITION,
            Ability::DEFENSE_PLUS2
        ]
    ];

    const FIGHTER = [
        'slug' => 'fighter',
        'name' => 'Fighter',
        'tier' => CertificationTier::BEGINNER,
        'movement' => 4,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 20,
            Stat::STRENGTH['slug']   => 8,
            Stat::MAGIC['slug']      => 3,
            Stat::DEXTERITY['slug']  => 6,
            Stat::SPEED['slug']      => 6,
            Stat::LUCK['slug']       => 4,
            Stat::DEFENSE['slug']    => 5,
            Stat::RESISTANCE['slug'] => 2,
        ],
        'stat_growth_bonus' => [
            Stat::HIT_POINTS['slug'] => 10,
            Stat::STRENGTH['slug']   => 5,
            Stat::RESISTANCE['slug'] => -5,
            Stat::CHARM['slug']      => 5
        ],
        'stat_bonus' => [
            Stat::STRENGTH['slug']   => 1,
        ],
        'proficiency_xp_bonus' => [
            Skill::AXE['slug']       => 1,
            Skill::BOW['slug']       => 1,
            Skill::BRAWL['slug']     => 1
        ],
        'required_proficiency' => [
            'method' => 'any',
            Skill::AXE['slug']   => SkillRank::D,
            Skill::BOW['slug']   => SkillRank::D,
            Skill::BRAWL['slug'] => SkillRank::D
        ],
        'mastery_reward' => [
            CombatArt::SHOVE,
            Ability::STRENGTH_PLUS2
        ]
    ];

    const MONK = [
        'slug' => 'monk',
        'name' => 'Monk',
        'tier' => CertificationTier::BEGINNER,
        'movement' => 4,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 20,
            Stat::STRENGTH['slug']   => 4,
            Stat::MAGIC['slug']      => 8,
            Stat::DEXTERITY['slug']  => 6,
            Stat::SPEED['slug']      => 6,
            Stat::LUCK['slug']       => 4,
            Stat::DEFENSE['slug']    => 3,
            Stat::RESISTANCE['slug'] => 4,
        ],
        'stat_growth_bonus' => [
            Stat::HIT_POINTS['slug'] => 5,
            Stat::RESISTANCE['slug'] => 5,
            Stat::CHARM['slug']      => 5
        ],
        'stat_bonus' => [
            Stat::RESISTANCE['slug'] => 1,
        ],
        'proficiency_xp_bonus' => [
            Skill::REASON['slug']    => 1,
            Skill::FAITH['slug']     => 1
        ],
        'required_proficiency' => [
            'method' => 'any',
            Skill::REASON['slug'] => SkillRank::D,
            Skill::FAITH['slug']  => SkillRank::D
        ],
        'mastery_reward' => [
            CombatArt::DRAW_BACK,
            Ability::MAGIC_PLUS2
        ],
        'magical' => true
    ];

    const LORD = [
        'slug' => "lord",
        'name' => "Lord",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 4,
        'required_proficiency' => [
            Skill::SWORD['slug'] => SkillRank::DPLUS,
            Skill::AUTHORITY['slug'] => SkillRank::C
        ],
        'ability' => [
            Ability::CHARM
        ],
        'master_reward' => [
            Ability::RESISTANCE_PLUS2,
            CombatArt::SUBDUE
        ]
    ];

    const MERCENARY = [
        'slug' => "mercenary",
        'name' => "Mercenary",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 5,
        'required_proficiency' => [
            Skill::SWORD['slug'] => SkillRank::C
        ],
        'master_reward' => [
            Ability::VANTAGE
        ]
    ];

    const THIEF = [
        'slug' => "thief",
        'name' => "Thief",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 5,
        'required_proficiency' => [
            Skill::SWORD['slug'] => SkillRank::C
        ],
        'ability' => [
            Ability::STEAL,
            Ability::LOCKTOUCH
        ],
        'master_reward' => [
            Ability::STEAL
        ]
    ];

    const ARMORED = [
        'slug' => "armored",
        'name' => "Armored Knight",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 4,
        'required_proficiency' => [
            Skill::AXE['slug'] => SkillRank::C,
            Skill::HEAVY_ARMOR['slug'] => SkillRank::D
        ],
        'master_reward' => [
            Ability::ARMORED_BLOW
        ]
    ];

    const CAVALIER = [
        'slug' => "cavalier",
        'name' => "Cavalier",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 7,
        'required_proficiency' => [
            Skill::LANCE['slug'] => SkillRank::C,
            Skill::RIDING['slug'] => SkillRank::D
        ],
        'ability' => [
            Ability::CANTO
        ],
        'master_reward' => [
            Ability::DESPERATION
        ]
    ];

    const BRIGAND = [
        'slug' => "brigand",
        'name' => "Brigand",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 5,
        'required_proficiency' => [
            Skill::AXE['slug'] => SkillRank::C
        ],
        'master_reward' => [
            Ability::DEATH_BLOW
        ]
    ];

    const ARCHER = [
        'slug' => "archer",
        'name' => "Archer",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 5,
        'required_proficiency' => [
            Skill::BOW['slug'] => SkillRank::C
        ],
        'ability' => [
            Ability::BOWRANGE_PLUS1
        ],
        'master_reward' => [
            Ability::HIT_PLUS20
        ]
    ];

    const BRAWLER = [
        'slug' => "brawler",
        'name' => "Brawler",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 5,
        'required_proficiency' => [
            Skill::BRAWL['slug'] => SkillRank::C
        ],
        'ability' => [
            Ability::UNARMED_COMBAT
        ],
        'master_reward' => [
            Ability::UNARMED_COMBAT
        ],
        'notes' => "Must be male."
    ];

    const MAGE = [
        'slug' => "mage",
        'name' => "Mage",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 4,
        'required_proficiency' => [
            Skill::REASON['slug'] => SkillRank::C
        ],
        'ability' => [
            Ability::FIRE
        ],
        'master_reward' => [
            Ability::FIENDISH_BLOW
        ]
    ];

    const DARK_MAGE = [
        'slug' => "dark_mage",
        'name' => "Dark Mage",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 4,
        'required_proficiency' => [
            Skill::REASON['slug'] => SkillRank::C
        ],
        'ability' => [
            Ability::MIASMA,
            Ability::HEARTSEEKER
        ],
        'master_reward' => [
            Ability::POISON_STRIKE
        ],
        'notes' => 'Must be male. Need Dark Seal'
    ];

    const PRIEST = [
        'slug' => "priest",
        'name' => "Priest",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 4,
        'required_proficiency' => [
            Skill::FAITH['slug'] => SkillRank::C
        ],
        'ability' => [
            Ability::HEAL,
            Ability::WHITE_MAGIC_HEAL_PLUS5
        ],
        'master_reward' => [
            Ability::MIRACLE
        ]
    ];

    const PEGASUS_KNIGHT = [
        'slug' => "pegasus_knight",
        'name' => "Pegasus Knight",
        'tier' => CertificationTier::INTERMEDIATE,
        'movement' => 6,
        'required_proficiency' => [
            Skill::LANCE['slug'] => SkillRank::C,
            Skill::FLYING['slug'] => SkillRank::D
        ],
        'ability' => [
            Ability::CANTO,
            Ability::AVOID_PLUS10
        ],
        'master_reward' => [
            Ability::DARTING_BLOW,
            CombatArt::TRIANGLE_ATTACK
        ],
        'notes' => 'Must be female'
    ];

}

