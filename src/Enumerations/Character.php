<?php


namespace L41rx\FE3H\Enumerations;


class Character extends \L41rx\FE3H\Enumeration
{
    public static function default(string $property) {
        /*switch ($property) {
            case 'wtv':
                return [];
                break;
        }*/

        return parent::default();
    }

    // Waifu squad
    const EDELGARD = [
        'slug' => 'edelgard',
        'name' => 'Edelgard',
        'gender' => 'f',
        'house' => House::BLACK_EAGLES,
        'crests' => [
            Crest::MINOR_CREST_OF_SEIROS
        ],
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::REASON,
        'lost_items' => ['Eastern Porcelain', 'White Glove', 'Time-worn Quill Pen'],
        'unique_ability' => Ability::IMPERIAL_LINEAGE,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 29,
            Stat::STRENGTH['slug']   => 13,
            Stat::MAGIC['slug']      => 6,
            Stat::DEXTERITY['slug']  => 5,
            Stat::SPEED['slug']      => 8,
            Stat::LUCK['slug']       => 5,
            Stat::DEFENSE['slug']    => 6,
            Stat::RESISTANCE['slug'] => 4,
            Stat::CHARM['slug']      => 10
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 40,
            Stat::STRENGTH['slug']   => 55,
            Stat::MAGIC['slug']      => 45,
            Stat::DEXTERITY['slug']  => 45,
            Stat::SPEED['slug']      => 40,
            Stat::LUCK['slug']       => 30,
            Stat::DEFENSE['slug']    => 35,
            Stat::RESISTANCE['slug'] => 35,
            Stat::CHARM['slug']      => 60
        ],
        'max_statis' => [
            Stat::HIT_POINTS['slug'] => 81,
            Stat::STRENGTH['slug']   => 81,
            Stat::MAGIC['slug']      => 72,
            Stat::DEXTERITY['slug']  => 61,
            Stat::SPEED['slug']      => 57,
            Stat::LUCK['slug']       => 42,
            Stat::DEFENSE['slug']    => 61,
            Stat::RESISTANCE['slug'] => 47,
            Stat::CHARM['slug']      => 85
        ],
        'initial_proficiency' => [
            Skill::SWORD['slug']       => SkillRank::EPLUS,
            Skill::AXE['slug']         => SkillRank::D,
            Skill::AUTHORITY['slug']   => SkillRank::D,
            Skill::HEAVY_ARMOR['slug'] => SkillRank::D
        ],
        'strong_skills' => [ Skill::SWORD, Skill::AXE, Skill::AUTHORITY, Skill::HEAVY_ARMOR ],
        'weak_skills'   => [ Skill::BOW, Skill::FAITH ],
        'initial_abilities' => [ 
            Ability::SWORD_PROWESS_LV_1,
            Ability::AXE_PROWESS_LV2,
            Ability::AUTHORITY_PROWESS_LV1
        ],
        'initial_combat_arts' => [ CombatArt::SMASH ],
        /*'magic_track' => [
            'faith' => [
                SkillRank::D['slug'] => Magic::HEAL,
                ... etc
            ], 'reason' => [
                SkillRank::D['slug'] => Magic::FIRE
            ]
        ] TODO magic enum*/
        
    ];
}