<?php


namespace L41rx\FE3H\Enumerations;


class Certification extends \L41rx\FE3H\Enumeration
{
    public static function default(string $property) {
        switch ($property) {
            case 'requiremed_proficiency':
            case 'proficiency':
            case 'base_stats':
            case 'stat_growth_bonus':
            case 'stat_bonus':
                return [];
                break;
            case 'magical':
                return false;
                break;
        }

        return parent::default();
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
}

