<?php


namespace L41rx\FE3H\Enumerations;


class Character extends \L41rx\FE3H\Enumeration
{
    public static function default(string $property) {
        switch ($property) {
            case 'lost_items':
                return [];
                break;
        }

        return parent::default($property);
    }

    const BYLETH = [
        'slug' => "byleth",
        'name' => "Byleth",
        'gender' => 'x',
        'house' => null,
        'crests' => [
            Crest::MINOR_CREST_OF_SEIROS
        ],
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::REASON,
        'lost_items' => ['Eastern Porcelain', 'White Glove', 'Time-worn Quill Pen'],
        'unique_ability' => Ability::IMPERIAL_LINEAGE,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 29, Stat::LUCK['slug']       => 5,
            Stat::STRENGTH['slug']   => 13, Stat::DEFENSE['slug']    => 6,
            Stat::MAGIC['slug']      => 6,  Stat::RESISTANCE['slug'] => 4,
            Stat::DEXTERITY['slug']  => 5,  Stat::CHARM['slug']      => 10,
            Stat::SPEED['slug']      => 8
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 40, Stat::LUCK['slug']       => 30,
            Stat::STRENGTH['slug']   => 55, Stat::DEFENSE['slug']    => 35,
            Stat::MAGIC['slug']      => 45, Stat::RESISTANCE['slug'] => 35,
            Stat::DEXTERITY['slug']  => 45, Stat::CHARM['slug']      => 60,
            Stat::SPEED['slug']      => 40
        ],
        'max_stats' => [
            Stat::HIT_POINTS['slug'] => 81, Stat::LUCK['slug']       => 42,
            Stat::STRENGTH['slug']   => 81, Stat::DEFENSE['slug']    => 61,
            Stat::MAGIC['slug']      => 72, Stat::RESISTANCE['slug'] => 47,
            Stat::DEXTERITY['slug']  => 61, Stat::CHARM['slug']      => 85,
            Stat::SPEED['slug']      => 57
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
        'initial_combat_arts' => [ CombatArt::AXE_SMASH ],
        'magic_track' => [
            'faith' => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::B['slug']     => Magic::SERAPHIM
            ], 'reason' => [
                SkillRank::D['slug']     => Magic::FIRE,
                SkillRank::C['slug']     => Magic::BOLGANONE,
                SkillRank::B['slug']     => Magic::LUNA,
                SkillRank::A['slug']     => Magic::HADES
            ]
        ]
    ];

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
            Stat::HIT_POINTS['slug'] => 29, Stat::LUCK['slug']       => 5,
            Stat::STRENGTH['slug']   => 13, Stat::DEFENSE['slug']    => 6,
            Stat::MAGIC['slug']      => 6,  Stat::RESISTANCE['slug'] => 4,
            Stat::DEXTERITY['slug']  => 5,  Stat::CHARM['slug']      => 10,
            Stat::SPEED['slug']      => 8
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 40, Stat::LUCK['slug']       => 30,
            Stat::STRENGTH['slug']   => 55, Stat::DEFENSE['slug']    => 35,
            Stat::MAGIC['slug']      => 45, Stat::RESISTANCE['slug'] => 35,
            Stat::DEXTERITY['slug']  => 45, Stat::CHARM['slug']      => 60,
            Stat::SPEED['slug']      => 40
        ],
        'max_stats' => [
            Stat::HIT_POINTS['slug'] => 81, Stat::LUCK['slug']       => 42,
            Stat::STRENGTH['slug']   => 81, Stat::DEFENSE['slug']    => 61,
            Stat::MAGIC['slug']      => 72, Stat::RESISTANCE['slug'] => 47,
            Stat::DEXTERITY['slug']  => 61, Stat::CHARM['slug']      => 85,
            Stat::SPEED['slug']      => 57
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
        'initial_combat_arts' => [ CombatArt::AXE_SMASH ],
        'magic_track' => [
            'faith' => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::B['slug']     => Magic::SERAPHIM
            ], 'reason' => [
                SkillRank::D['slug']     => Magic::FIRE,
                SkillRank::C['slug']     => Magic::BOLGANONE,
                SkillRank::B['slug']     => Magic::LUNA,
                SkillRank::A['slug']     => Magic::HADES
            ]
        ]
    ];


    // Lions dudes
    const DIMITRI = [
        'slug' => 'dimitri',
        'name' => 'Dimitri',
        'gender' => 'm',
        'house' => House::BLUE_LIONS,
        'crests' => [
            Crest::MINOR_CREST_OF_BLAIDDYD
        ],
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::RIDING,
        'lost_items' => ['Black Leather Gloves', 'Training Logbook', 'Dulled Longsword'],
        'unique_ability' => Ability::ROYAL_LINEAGE,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 28, Stat::LUCK['slug']       => 5,
            Stat::STRENGTH['slug']   => 12, Stat::DEFENSE['slug']    => 7,
            Stat::MAGIC['slug']      => 4,  Stat::RESISTANCE['slug'] => 4,
            Stat::DEXTERITY['slug']  => 7,  Stat::CHARM['slug']      => 9,
            Stat::SPEED['slug']      => 7
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 55, Stat::LUCK['slug']       => 25,
            Stat::STRENGTH['slug']   => 60, Stat::DEFENSE['slug']    => 40,
            Stat::MAGIC['slug']      => 20, Stat::RESISTANCE['slug'] => 20,
            Stat::DEXTERITY['slug']  => 50, Stat::CHARM['slug']      => 55,
            Stat::SPEED['slug']      => 50
        ],
        'max_stats' => [
            Stat::HIT_POINTS['slug'] => 99, Stat::LUCK['slug']       => 42,
            Stat::STRENGTH['slug']   => 87, Stat::DEFENSE['slug']    => 57,
            Stat::MAGIC['slug']      => 38, Stat::RESISTANCE['slug'] => 36,
            Stat::DEXTERITY['slug']  => 69, Stat::CHARM['slug']      => 77,
            Stat::SPEED['slug']      => 69
        ],
        'initial_proficiency' => [
            Skill::SWORD['slug']     => SkillRank::EPLUS,
            Skill::LANCE['slug']     => SkillRank::DPLUS,
            Skill::AUTHORITY['slug'] => SkillRank::D,
            Skill::RIDING['slug']    => SkillRank::D
        ],
        'strong_skills' => [ Skill::SWORD, Skill::LANCE, Skill::AUTHORITY ],
        'weak_skills'   => [ Skill::AXE, Skill::REASON ],
        'initial_abilities' => [ 
            Ability::SWORD_PROWESS_LV_1,
            Ability::LANCE_PROWESS_LV2,
            Ability::AUTHORITY_PROWESS_LV1
        ],
        'initial_combat_arts' => [ CombatArt::LANCE_SMASH ],
        'magic_track' => [
            'faith' => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::A['slug']     => Magic::AURA
            ], 'reason' => [
                SkillRank::D['slug']     => Magic::THUNDER,
                SkillRank::C['slug']     => Magic::THORON
            ]
        ]
    ];


    // deer dudes
    // Lions dudes
    const CLAUDE = [
        'slug' => 'claude',
        'name' => 'Claude',
        'gender' => 'm',
        'house' => House::GOLDEN_DEER,
        'crests' => [
            Crest::MINOR_CREST_OF_RIEGAN
        ],
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::AXE,
        'lost_items' => ['Mild Stomach Poison', 'Tactical Game Piece'],
        'unique_ability' => Ability::LEICESTER_LINEAGE,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 26, Stat::LUCK['slug']       => 7,
            Stat::STRENGTH['slug']   => 11, Stat::DEFENSE['slug']    => 6,
            Stat::MAGIC['slug']      => 5,  Stat::RESISTANCE['slug'] => 4,
            Stat::DEXTERITY['slug']  => 8,  Stat::CHARM['slug']      => 8,
            Stat::SPEED['slug']      => 8
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 35, Stat::LUCK['slug']       => 45,
            Stat::STRENGTH['slug']   => 40, Stat::DEFENSE['slug']    => 30,
            Stat::MAGIC['slug']      => 25, Stat::RESISTANCE['slug'] => 25,
            Stat::DEXTERITY['slug']  => 60, Stat::CHARM['slug']      => 55,
            Stat::SPEED['slug']      => 55
        ],
        'max_stats' => [
            Stat::HIT_POINTS['slug'] => 71, Stat::LUCK['slug']       => 63,
            Stat::STRENGTH['slug']   => 61, Stat::DEFENSE['slug']    => 50,
            Stat::MAGIC['slug']      => 40, Stat::RESISTANCE['slug'] => 42,
            Stat::DEXTERITY['slug']  => 89, Stat::CHARM['slug']      => 76,
            Stat::SPEED['slug']      => 76
        ],
        'initial_proficiency' => [
            Skill::SWORD['slug']     => SkillRank::EPLUS,
            Skill::BOW['slug']       => SkillRank::D,
            Skill::AUTHORITY['slug'] => SkillRank::D,
            Skill::RIDING['slug']    => SkillRank::EPLUS,
            Skill::FLYING['slug']    => SkillRank::EPLUS
        ],
        'strong_skills' => [ Skill::SWORD, Skill::BOW, Skill::AUTHORITY, Skill::RIDING, Skill::FLYING ],
        'weak_skills'   => [ Skill::AXE, Skill::REASON ],
        'initial_abilities' => [ 
            Ability::SWORD_PROWESS_LV_1,
            Ability::BOW_PROWESS_LV2,
            Ability::AUTHORITY_PROWESS_LV1
        ],
        'initial_combat_arts' => [ CombatArt::CURVED_SHOT ],
        'magic_track' => [
            'faith' => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::A['slug']     => Magic::SILENCE
            ], 'reason' => [
                SkillRank::D['slug']     => Magic::WIND,
                SkillRank::C['slug']     => Magic::SAGITTAE,
                SkillRank::B['slug']     => Magic::CUTTING_GALE,
                SkillRank::A['slug']     => Magic::EXCALIBUR
            ]
        ]
    ];

    const HUBERT = [
        'slug' => "hubert",
        'name' => "Hubert"
    ];

    const FERDINAND = [
        'slug' => "ferdinand",
        'name' => "Ferdinand"
    ];

    const LINHARDT = [
        'slug' => "linhardt",
        'name' => "Linhardt"
    ];

    const CASPAR = [
        'slug' => "caspar",
        'name' => "Caspar"
    ];

    const BERNADETTA = [
        'slug' => "bernadetta",
        'name' => "Bernadetta"
    ];

    const DOROTHEA = [
        'slug' => "dorothea",
        'name' => "Dorothea"
    ];

    const PETRA = [
        'slug' => "petra",
        'name' => "Petra"
    ];

    const DEDUE = [
        'slug' => "dedue",
        'name' => "Dedue"
    ];

    const FELIX = [
        'slug' => "felix",
        'name' => "Felix"
    ];

    const ASHE = [
        'slug' => "ashe",
        'name' => "Ashe"
    ];

    const SYLVAIN = [
        'slug' => "sylvain",
        'name' => "Sylvain"
    ];

    const MERCEDES = [
        'slug' => "mercedes",
        'name' => "Mercedes"
    ];

    const ANNETTE = [
        'slug' => "annette",
        'name' => "Annette"
    ];

    const INGRID = [
        'slug' => "ingrid",
        'name' => "Ingrid"
    ];

    const LORENZ = [
        'slug' => "lorenz",
        'name' => "Lorenz"
    ];

    const RAPHAEL = [
        'slug' => "raphael",
        'name' => "Raphael"
    ];

    const IGNATZ = [
        'slug' => "ignatz",
        'name' => "Ignatz"
    ];

    const LYSITHEA = [
        'slug' => "lysithea",
        'name' => "Lysithea"
    ];

    const MARIANNE = [
        'slug' => "marianne",
        'name' => "Marianne"
    ];

    const HILDA = [
        'slug' => "hilda",
        'name' => "Hilda"
    ];

    const LEONIE = [
        'slug' => "leonie",
        'name' => "Leonie"
    ];

    const RHEA = [
        'slug' => "rhea",
        'name' => "Rhea"
    ];

    const SETETH = [
        'slug' => "seteth",
        'name' => "Seteth"
    ];

    const FLAYN = [
        'slug' => "flayn",
        'name' => "Flayn"
    ];

    const HANNEMAN = [
        'slug' => "hanneman",
        'name' => "Hanneman"
    ];

    const MANUELA = [
        'slug' => "manuela",
        'name' => "Manuela"
    ];

    const GILBERT = [
        'slug' => "gilbert",
        'name' => "Gilbert"
    ];

    const ALOIS = [
        'slug' => "alois",
        'name' => "Alois"
    ];

    const CATHERINE = [
        'slug' => "catherine",
        'name' => "Catherine"
    ];

    const SHAMIR = [
        'slug' => "shamir",
        'name' => "Shamir"
    ];

    const CYRIL = [
        'slug' => "cyril",
        'name' => "Cyril"
    ];

    const JERITZA = [
        'slug' => "jeritza",
        'name' => "Jeritza"
    ];

    const ANNA = [
        'slug' => "anna",
        'name' => "Anna"
    ];

    const YURI = [
        'slug' => "yuri",
        'name' => "Yuri"
    ];

    const BALTHUS = [
        'slug' => "balthus",
        'name' => "Balthus"
    ];

    const CONSTANCE = [
        'slug' => "constance",
        'name' => "Constance"
    ];

    const HAPI = [
        'slug' => "hapi",
        'name' => "Hapi"
    ];

}