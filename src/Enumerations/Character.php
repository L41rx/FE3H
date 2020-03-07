<?php


namespace L41rx\FE3H\Enumerations;


class Character extends \L41rx\FE3H\Enumeration
{
    public static function render($slug)
    {
        $c = self::get($slug);

        // optionals/defaults
        $gender = Character::get($slug, 'gender', true);// gender
        if (isset($c['house'])) {                       // house
            $house_name = $c['house']['name'];
            $house_slug = $c['house']['slug'];
        } else {
            $house_name = House::default('name');
            $house_slug = House::default('slug');
        }                                               // image
        if (file_exists(__DIR__.'/../../public/img/character/'.$c['slug'].'.png'))
            $img = "/img/character/{$c['slug']}.png";
        else
            $img = "/img/character/{$gender}_default.png";
        if (isset($c['crests'])) {                      // crests
            $crests = "<ul>";
            foreach ($c['crests'] as $crest)
                $crests .= "<li>".Crest::render($crest['slug'])."</li>";
            $crests .= "</ul>";
        } else {
            $crests = "<ul><li>none</li></ul>";
        }
        if (isset($c['lost_items'])) {                  // lost items
            $lost_items = "<p>Lost items:</p><ul>";
            foreach ($c['lost_items'] as $lost_item)
                $lost_items .= "<li>{$lost_item}</li>";
            $lost_items .= "</ul>";
        } else {
            $lost_items = "";
        }
        if (isset($c['unique_ability']))                // unique abilities
            $unique_ability = Ability::render($c['unique_ability']['slug']);
        else
            $unique_ability = "none";
        if (isset($c['initial_combat_arts'])) {         // initial CBs
            $combat_arts = "<ul>";
            foreach ($c['initial_combat_arts'] as $cb)
                $combat_arts .= "<li>".CombatArt::render($cb['slug'])."</li>";
            $combat_arts .= "</ul>";
        } else {
            $combat_arts = "<ul><li>none</li></ul>";
        }
        // cert, talent
        $cert = isset($c['starting_certification']) ? Certification::render($c['starting_certification']['slug']) : 'N/A';
        $talent = isset($c['budding_talent']) ? Skill::render($c['budding_talent']['slug']) : "N/A";


        // tracks
        $tracks = "";
        if (isset($c['tracks']))
            foreach ($c['tracks'] as $skill_slug => $track) {
                $skill_name = Skill::get($skill_slug, 'name');
                $tracks .= "<p>{$skill_name} reward track:</p><ul>";
                foreach ($track as $rank_slug => $reward)
                    $tracks .= "<li>".SkillRank::renderRewardTrackLine($skill_slug, $rank_slug, $reward)."</li>";
                $tracks .= "</ul>";
            }



        // necessary pre-renders
        $base_stats = isset($c['base_stats']) ? Stat::renderSheet($c['base_stats']) : "";
        $stat_growth = isset($c['stat_growth']) ? Stat::renderSheet($c['stat_growth'], true) : "";
        $max_stats = isset($c['max_stats']) ? Stat::renderSheet($c['max_stats']) : "";
        $initial_profiencies = "";
        if (isset($c['initial_profiencies']))
            foreach ($c['initial_proficiency'] as $skill_slug => $rank)
                $initial_profiencies .= "<li>".SkillRank::render($skill_slug, $rank)."</li>";
        else
            $initial_profiencies = "<li>none</li>";
        $strong_skills = "";
        if (isset($c['strong_skills']))
            foreach ($c['strong_skills'] as $skill)
                $strong_skills .= "<li>".Skill::render($skill['slug'])."</li>";
        else
            $strong_skills = "<li>none</li>";
        $weak_skills = "";
        if (isset($c['weak_skills']))
            foreach ($c['weak_skills'] as $skill)
                $weak_skills .= "<li>".Skill::render($skill['slug'])."</li>";
        else
            $weak_skills = "<li>none</li>";

        $html = <<<HMTL
            <div class="character {$house_slug}">
                <img src="{$img}" />
                <p style="text-align: center;"><strong>{$c['name']}</strong></p>
                <p style='text-align: center;'>{$house_name} | {$gender} | {$cert}</p>
                <!--<hr />
                <p>Crests:</p>
                {$crests}
                <hr />
                <p>Budding talent: {$talent}</p>
                <p style='text-align: right;'>Base stats</p>
                {$base_stats}
                <p style='text-align: right;'>Stat growth</p>
                {$stat_growth}
                <p style='text-align: right;'>Max stats</p>
                {$max_stats}
                <hr />
                {$lost_items}
                <hr />
                <p>Unique ability: {$unique_ability}</p>
                <hr />
                <p>Initial proficiencies:</p>
                <ul>
                    {$initial_profiencies}
                </ul>
                <p>Strong skills:</p>
                <ul>
                    {$strong_skills}
                </ul>
                <p>Weak skills:</p>
                <ul>
                    {$weak_skills}
                </ul>
                <hr />
                <p>Initial combat arts:</p>
                {$combat_arts}
                <hr />
                {$tracks}-->
            </div>
        HMTL;
        return $html;
    }

    public static function default(string $property) {
        switch ($property) {
            case 'lost_items':
                return [];
                break;
            case 'gender':
                return 'x';
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
            Crest::MAJOR_CREST_OF_FLAMES
        ],
        'starting_certification' => Certification::COMMONER,
        'budding_talent' => Skill::FAITH,
        'unique_ability' => Ability::PROFESSORS_GUIDANCE,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 27, Stat::LUCK['slug']       => 8,
            Stat::STRENGTH['slug']   => 13, Stat::DEFENSE['slug']    => 6,
            Stat::MAGIC['slug']      => 6,  Stat::RESISTANCE['slug'] => 6,
            Stat::DEXTERITY['slug']  => 9,  Stat::CHARM['slug']      => 7,
            Stat::SPEED['slug']      => 8
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 45, Stat::LUCK['slug']       => 45,
            Stat::STRENGTH['slug']   => 45, Stat::DEFENSE['slug']    => 35,
            Stat::MAGIC['slug']      => 35, Stat::RESISTANCE['slug'] => 30,
            Stat::DEXTERITY['slug']  => 45, Stat::CHARM['slug']      => 45,
            Stat::SPEED['slug']      => 45
        ],
        'max_stats' => [
            Stat::HIT_POINTS['slug'] => 88, Stat::LUCK['slug']       => 66,
            Stat::STRENGTH['slug']   => 77, Stat::DEFENSE['slug']    => 55,
            Stat::MAGIC['slug']      => 55, Stat::RESISTANCE['slug'] => 55,
            Stat::DEXTERITY['slug']  => 66, Stat::CHARM['slug']      => 99,
            Stat::SPEED['slug']      => 66
        ],
        'initial_proficiency' => [
            Skill::SWORD['slug']       => SkillRank::DPLUS,
            Skill::BRAWL['slug']       => SkillRank::EPLUS,
            Skill::AUTHORITY['slug']   => SkillRank::D
        ],
        'strong_skills' => [ Skill::SWORD, Skill::BRAWL, Skill::AUTHORITY ],
        'initial_abilities' => [
            Ability::SWORD_PROWESS_LV_2,
            Ability::BRAWLING_PROWESS_LV1,
            Ability::AUTHORITY_PROWESS_LV1
        ],
        'initial_combat_arts' => [ CombatArt::WRATH_STRIKE ],
        'tracks' => [
            Skill::FAITH['slug'] => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::A['slug']     => Magic::AURA
            ], 
            Skill::REASON['slug'] => [
                SkillRank::D['slug']     => Magic::FIRE,
                SkillRank::DPLUS['slug'] => Magic::THUNDER,
                SkillRank::C['slug']     => Magic::BOLGANONE,
                SkillRank::A['slug']     => Magic::RAGNAROK
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
        'tracks' => [
            Skill::FAITH['slug'] => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::B['slug']     => Magic::SERAPHIM
            ], 
            Skill::REASON['slug'] => [
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
        'tracks' => [
            Skill::FAITH['slug'] => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::A['slug']     => Magic::AURA
            ], 
            Skill::REASON['slug'] => [
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
        'tracks' => [
            Skill::FAITH['slug'] => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::A['slug']     => Magic::SILENCE
            ], 
            Skill::REASON['slug'] => [
                SkillRank::D['slug']     => Magic::WIND,
                SkillRank::C['slug']     => Magic::SAGITTAE,
                SkillRank::B['slug']     => Magic::CUTTING_GALE,
                SkillRank::A['slug']     => Magic::EXCALIBUR
            ]
        ]
    ];

    const HUBERT = [
        'slug' => "hubert",
        'name' => "Hubert",
        'gender' => 'm',
        'house' => House::BLACK_EAGLES,
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::LANCE,
        'lost_items' => ["Hresvelg Treatise", "Noxious Handkerchief", "Folding Razor"],
        'unique_ability' => Ability::OFFICER_DUTY,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 22, Stat::LUCK['slug']       => 6,
            Stat::STRENGTH['slug']   => 6,  Stat::DEFENSE['slug']    => 4,
            Stat::MAGIC['slug']      => 12, Stat::RESISTANCE['slug'] => 7,
            Stat::DEXTERITY['slug']  => 6,  Stat::CHARM['slug']      => 6,
            Stat::SPEED['slug']      => 7
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 35, Stat::LUCK['slug']       => 35,
            Stat::STRENGTH['slug']   => 30, Stat::DEFENSE['slug']    => 25,
            Stat::MAGIC['slug']      => 55, Stat::RESISTANCE['slug'] => 40,
            Stat::DEXTERITY['slug']  => 45, Stat::CHARM['slug']      => 35,
            Stat::SPEED['slug']      => 45
        ],
        'max_stats' => [
            Stat::HIT_POINTS['slug'] => 67, Stat::LUCK['slug']       => 51,
            Stat::STRENGTH['slug']   => 43, Stat::DEFENSE['slug']    => 45,
            Stat::MAGIC['slug']      => 80, Stat::RESISTANCE['slug'] => 57,
            Stat::DEXTERITY['slug']  => 62, Stat::CHARM['slug']      => 49,
            Stat::SPEED['slug']      => 63
        ],
        'initial_proficiency' => [
            Skill::BOW['slug']         => SkillRank::EPLUS,
            Skill::REASON['slug']      => SkillRank::D,
            Skill::AUTHORITY['slug']   => SkillRank::EPLUS
        ],
        'strong_skills' => [ Skill::BOW, Skill::REASON, Skill::AUTHORITY, Skill::HEAVY_ARMOR ],
        'weak_skills'   => [ Skill::AXE, Skill::FAITH, Skill::FLYING ],
        'initial_abilities' => [ 
            Ability::BOW_PROWESS_LV1,
            Ability::REASON_PROWESS_LV1,
            Ability::AUTHORITY_PROWESS_LV1
        ],
        'tracks' => [
            Skill::FAITH['slug'] => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER
            ], 
            Skill::REASON['slug'] => [
                SkillRank::D['slug']     => Magic::MIASMA,
                SkillRank::DPLUS['slug'] => Magic::MIRE_B,
                SkillRank::C['slug']     => Magic::BANSHEE,
                SkillRank::B['slug']     => Magic::DEATH,
                SkillRank::A['slug']     => Magic::DARK_SPIKES_T
            ],
            Skill::AUTHORITY['slug'] => [
                SkillRank::D['slug']     => Ability::RALLY_MAGIC,
                SkillRank::C['slug']     => Ability::BATTALION_WRATH,
                SkillRank::CPLUS['slug'] => Ability::RALLY_RESISTANCE,
                SkillRank::A['slug']     => Ability::BATTALION_DESPERATION,
                SkillRank::S['slug']     => Ability::RALLY_SPEED
            ]
        ],
    ];

    const FERDINAND = [
        'slug' => "ferdinand",
        'name' => "Ferdinand",
        'gender' => 'm',
        'house' => House::BLACK_EAGLES,
        'crests' => [
            Crest::MINOR_CREST_OF_CICHOL
        ],
        'starting_certification' => Certification::NOBLE,
        /*'budding_talent' => Skill::REASON,
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
        'tracks' => [
            Skill::FAITH['slug'] => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::RECOVER,
                SkillRank::B['slug']     => Magic::SERAPHIM
            ], 
            Skill::REASON['slug'] => [
                SkillRank::D['slug']     => Magic::FIRE,
                SkillRank::C['slug']     => Magic::BOLGANONE,
                SkillRank::B['slug']     => Magic::LUNA,
                SkillRank::A['slug']     => Magic::HADES
            ]
        ]*/
    ];

    const LINHARDT = [
        'slug' => "linhardt",
        'name' => "Linhardt",
        'gender' => 'm',
        'house' => House::BLACK_EAGLES
    ];

    const CASPAR = [
        'slug' => "caspar",
        'name' => "Caspar",
        'gender' => 'm',
        'house' => House::BLACK_EAGLES
    ];

    const BERNADETTA = [
        'slug' => "bernadetta",
        'name' => "Bernadetta",
        'gender' => 'f',
        'house' => House::BLACK_EAGLES
    ];

    const DOROTHEA = [
        'slug' => "dorothea",
        'name' => "Dorothea",
        'gender' => 'f',
        'house' => House::BLACK_EAGLES
    ];

    const PETRA = [
        'slug' => "petra",
        'name' => "Petra",
        'gender' => 'f',
        'house' => House::BLACK_EAGLES
    ];

    const DEDUE = [
        'slug' => "dedue",
        'name' => "Dedue",
        'gender' => 'm',
        'house' => House::BLUE_LIONS
    ];

    const FELIX = [
        'slug' => "felix",
        'name' => "Felix",
        'gender' => 'm',
        'house' => House::BLUE_LIONS
    ];

    const ASHE = [
        'slug' => "ashe",
        'name' => "Ashe",
        'gender' => 'm',
        'house' => House::BLUE_LIONS
    ];

    const SYLVAIN = [
        'slug' => "sylvain",
        'name' => "Sylvain",
        'gender' => 'm',
        'house' => House::BLUE_LIONS
    ];

    const MERCEDES = [
        'slug' => "mercedes",
        'name' => "Mercedes",
        'gender' => 'f',
        'house' => House::BLUE_LIONS
    ];

    const ANNETTE = [
        'slug' => "annette",
        'name' => "Annette",
        'gender' => 'f',
        'house' => House::BLUE_LIONS
    ];

    const INGRID = [
        'slug' => "ingrid",
        'name' => "Ingrid",
        'gender' => 'f',
        'house' => House::BLUE_LIONS
    ];

    const LORENZ = [
        'slug' => "lorenz",
        'name' => "Lorenz",
        'gender' => 'm',
        'house' => House::GOLDEN_DEER
    ];

    const RAPHAEL = [
        'slug' => "raphael",
        'name' => "Raphael",
        'gender' => 'm',
        'house' => House::GOLDEN_DEER
    ];

    const IGNATZ = [
        'slug' => "ignatz",
        'name' => "Ignatz",
        'gender' => 'm',
        'house' => House::GOLDEN_DEER
    ];

    const LYSITHEA = [
        'slug' => "lysithea",
        'name' => "Lysithea",
        'gender' => 'f',
        'house' => House::GOLDEN_DEER
    ];

    const MARIANNE = [
        'slug' => "marianne",
        'name' => "Marianne",
        'gender' => 'f',
        'house' => House::GOLDEN_DEER
    ];

    const HILDA = [
        'slug' => "hilda",
        'name' => "Hilda",
        'gender' => 'f',
        'house' => House::GOLDEN_DEER
    ];

    const LEONIE = [
        'slug' => "leonie",
        'name' => "Leonie",
        'gender' => 'f',
        'house' => House::GOLDEN_DEER
    ];

    const RHEA = [
        'slug' => "rhea",
        'name' => "Rhea",
        'gender' => 'f'
    ];

    const SETETH = [
        'slug' => "seteth",
        'name' => "Seteth",
        'gender' => 'm'
    ];

    const FLAYN = [
        'slug' => "flayn",
        'name' => "Flayn",
        'gender' => 'f'
    ];

    const HANNEMAN = [
        'slug' => "hanneman",
        'name' => "Hanneman",
        'gender' => 'm'
    ];

    const MANUELA = [
        'slug' => "manuela",
        'name' => "Manuela",
        'gender' => 'f'
    ];

    const GILBERT = [
        'slug' => "gilbert",
        'name' => "Gilbert",
        'gender' => 'm'
    ];

    const ALOIS = [
        'slug' => "alois",
        'name' => "Alois",
        'gender' => 'm'
    ];

    const CATHERINE = [
        'slug' => "catherine",
        'name' => "Catherine",
        'gender' => 'f'
    ];

    const SHAMIR = [
        'slug' => "shamir",
        'name' => "Shamir",
        'gender' => 'f'
    ];

    const CYRIL = [
        'slug' => "cyril",
        'name' => "Cyril",
        'gender' => 'm'
    ];

    const JERITZA = [
        'slug' => "jeritza",
        'name' => "Jeritza",
        'gender' => 'm'
    ];

    const ANNA = [
        'slug' => "anna",
        'name' => "Anna",
        'gender' => 'f'
    ];

    const YURI = [
        'slug' => "yuri",
        'name' => "Yuri",
        'gender' => 'f'
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