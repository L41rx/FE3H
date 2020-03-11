<?php


namespace L41rx\FE3H\Enumerations;


class Character extends \L41rx\FE3H\Enumeration
{
    // just JSON it and inject that lol
    private static function injectSelf($enum)
    {
        return "id=\"{$enum['slug']}\" data-character=\"".htmlentities(json_encode($enum), ENT_QUOTES, 'UTF-8')."\"";
    }

    public static function render($slug)
    {
        $c = self::get($slug);

        // optionals/defaults
        $gender = Character::get($slug, 'gender', true);// gender
        if (isset($c['affiliation']))                   // affiliation
            $affiliation = Affiliation::render($c['affiliation']['slug']);
        else
            $affiliation = "<span title=\"This character appears to be unaffiliated\">Unaffiliated</span>";
        // image
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
        }                                               // lost items
        $lost_items = "<p>This character seems to keep good track of their items.</p>";
        if (isset($c['lost_items']) && count($c['lost_items']) > 0) {
            $lost_items = "<p>Lost items: ";
            if (count($c['lost_items']) > 0) {
                $lost_items_html_arr = []; // lol
                foreach ($c['lost_items'] as $lost_item)
                    array_push($lost_items_html_arr, LostItem::render($lost_item['slug']));
                $lost_items .= implode(', ', $lost_items_html_arr).'</p>';
            }
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
        $description = isset($c['description']) ? $c['description'] : "This character prefers to keep an air of mystery about them.";


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

        $inject_self = self::injectSelf($c);
        return <<<HMTL
            <character class="character" $inject_self>
                <info_block>
                    <img src="{$img}" />
                    <name>{$c['name']}</name><br />
                    <span style="position: absolute; top: 14px; right: 0;">
                        <affiliation>{$affiliation}</affiliation> |
                        <gender>{$gender}</gender> |
                        <certification>{$cert}</certification>
                    </span>
                    <description>{$description}</description>
                </info_block>
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
                
                {$lost_items}
            </character>
        HMTL;
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
        ],
        'description' => "Born to Jeralt and Sitri on the 20th of the Horsebow Moon 1159, Byleth lost their mother shortly after their birth. She was buried at Garreg Mach Monastery. Some time after her death, Jeralt left the Knights of Seiros, taking his newborn child with him to travel Fódlan, becoming a mercenary in the process and starting his own mercenary company.",
        'lost_items' => [  ]
    ];

    const EDELGARD = [
        'slug' => 'edelgard',
        'name' => 'Edelgard',
        'gender' => 'f',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'crests' => [
            Crest::MINOR_CREST_OF_SEIROS
        ],
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::REASON,
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
        ],
        'description' => 'Edelgard was born the ninth child of Emperor Ionius IX of the Adrestian Empire. In Imperial Year 1171, Edelgard was taken to Faerghus by her uncle, Lord Arundel, and she quickly befriended her maternal stepbrother Dimitri. When she returned to the Empire in 1174, he gave her a dagger as a parting gift. At some point in her childhood, she and all ten of her siblings were imprisoned by a conspiracy of nobles including Arundel, Duke Aegir, and Lord von Vestra, with Ionius IX helpless to stop them. The siblings were subjected to horrific experimentation in order to implant them with the Crest of Flames, and ultimately Edelgard was the sole survivor and successful test subject. Developing a hatred of the Crest system that had dominated Fódlan for a millennium, Edelgard swore to destroy the Crests and the Church of Seiros which upheld their power by any means necessary and unite Fódlan under the Adrestian banner to create world peace.',
        'lost_items' => [ LostItem::WHITE_GLOVE, LostItem::EASTERN_PORCELAIN, LostItem::TIME_WORN_QUILL_PEN ]
    ];


    // Lions dudes
    const DIMITRI = [
        'slug' => 'dimitri',
        'name' => 'Dimitri',
        'gender' => 'm',
        'affiliation' => Affiliation::BLUE_LIONS,
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
        'initial_combat_arts' => [ CombatArt::TEMPEST_LANCE ],
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
        ],
        'description' => 'Dimitri is the crown prince of the Holy Kingdom of Faerghus. In Imperial Year 1171, Dimitri\'s maternal stepsister Princess Edelgard of the Adrestian Empire came to Faerghus with her uncle, Lord Arundel, and the two became fast friends. When she returned to the Empire in 1174, he gave her a dagger as a parting gift. In 1176, he was the sole survivor of the Tragedy of Duscur, in which his father King Lambert and many of his knights and friends were murdered, allegedly by assassins from the Duscur region. This incident permanently warped the young prince, leaving him with a deep-seated grudge against the perpetrators and a hidden capacity for extreme violence, although he always suspected that the people of Duscur had been scapegoated. In the aftermath of the Tragedy, he saved a young Duscur commoner named Dedue from being lynched, leading him to develop an extremely strong sense of loyalty towards Dimitri.',
        'lost_items' => [ LostItem::BLACK_LEATHER_GLOVES, LostItem::TRAINING_LOGBOOK, LostItem::DULLED_LONGSWORD ]
    ];

    // deer dudes
    // Lions dudes
    const CLAUDE = [
        'slug' => 'claude',
        'name' => 'Claude',
        'gender' => 'm',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'crests' => [
            Crest::MINOR_CREST_OF_RIEGAN
        ],
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::AXE,
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
        ],
        'description' => 'Claude was born the son of the king of Almyra and a noble from Leicester. As a child, he often found himself discriminated against due to his Fódlan heritage. When he left Almyra for Leicester, he was again discriminated against due to his Almyran heritage. This led him to develop a desire to end Fódlan\'s long-standing isolationism in an effort to bring about a new world where everyone accepts everyone else. He was named heir to House Riegen in Imperial Year 1179 and enrolled at the Officers Academy at Garreg Mach Monastery the following year along with several people from his kingdom. During a training exercise with Princess Edelgard von Hresvelg of Adrestia and Prince Dimitri Alexandre Blaiddyd of Faerghus, he was attacked by bandits hired by an individual calling themselves the Flame Emperor, but was rescued by the mercenaries Byleth and Jeralt. Byleth was offered a teaching position at the Academy as a reward, and their choice of which house to lead would have far-reaching consequences for all of Fódlan.',
        'lost_items' => [ LostItem::LEATHER_BOW_SHEATH, LostItem::MILD_STOMACH_POISON, LostItem::BOARD_GAME_PIECE ]
    ];


    const HUBERT = [
        'slug' => "hubert",
        'name' => "Hubert",
        'gender' => 'm',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::LANCE,
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
        'description' => 'Hubert is the eldest son of Marquess Vestra and has served Edelgard since his youth.',
        'lost_items' => [ LostItem::NOXIOUS_HANDKERCHIEF, LostItem::HRESVELG_TREATISE, LostItem::FOLDING_RAZOR ]
    ];

    const FERDINAND = [
        'slug' => "ferdinand",
        'name' => "Ferdinand",
        'gender' => 'm',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'crests' => [
            Crest::MINOR_CREST_OF_CICHOL
        ],
        'starting_certification' => Certification::NOBLE,
        'budding_talent' => Skill::HEAVY_ARMOR,
        'unique_ability' => Ability::CONFIDENCE,
        'base_stats' => [
            Stat::HIT_POINTS['slug'] => 28, Stat::LUCK['slug']       => 6,
            Stat::STRENGTH['slug']   => 8, Stat::DEFENSE['slug']     => 6,
            Stat::MAGIC['slug']      => 5,  Stat::RESISTANCE['slug'] => 2,
            Stat::DEXTERITY['slug']  => 6,  Stat::CHARM['slug']      => 7,
            Stat::SPEED['slug']      => 8
        ],
        'stat_growth' => [
            Stat::HIT_POINTS['slug'] => 50, Stat::LUCK['slug']       => 40,
            Stat::STRENGTH['slug']   => 45, Stat::DEFENSE['slug']    => 35,
            Stat::MAGIC['slug']      => 20, Stat::RESISTANCE['slug'] => 20,
            Stat::DEXTERITY['slug']  => 40, Stat::CHARM['slug']      => 40,
            Stat::SPEED['slug']      => 50
        ],

        'max_stats' => [
            Stat::HIT_POINTS['slug'] => 93, Stat::LUCK['slug']       => 56,
            Stat::STRENGTH['slug']   => 64, Stat::DEFENSE['slug']    => 49,
            Stat::MAGIC['slug']      => 40, Stat::RESISTANCE['slug'] => 36,
            Stat::DEXTERITY['slug']  => 56, Stat::CHARM['slug']      => 57,
            Stat::SPEED['slug']      => 70
        ],
        'initial_proficiency' => [
            Skill::SWORD['slug']     => SkillRank::EPLUS,
            Skill::LANCE['slug']     => SkillRank::D,
            Skill::AXE['slug']       => SkillRank::EPLUS,
            Skill::RIDING['slug']    => SkillRank::D
        ],
        'strong_skills' => [ Skill::SWORD, Skill::AXE, Skill::LANCE, Skill::RIDING ],
        'initial_abilities' => [
            Ability::SWORD_PROWESS_LV_1,
            Ability::LANCE_PROWESS_LV1,
            Ability::AXE_PROWESS_LV1
        ],
        'initial_combat_arts' => [ CombatArt::TEMPEST_LANCE ],
        'tracks' => [
            Skill::FAITH['slug'] => [
                SkillRank::D['slug']     => Magic::HEAL,
                SkillRank::DPLUS['slug'] => Magic::NOSFERATU,
                SkillRank::C['slug']     => Magic::WARD,
                SkillRank::B['slug']     => Magic::RESTORE
            ],
            Skill::REASON['slug'] => [
                SkillRank::D['slug']     => Magic::THUNDER,
                SkillRank::DPLUS['slug'] => Magic::FIRE,
                SkillRank::C['slug']     => Magic::THORON,
                SkillRank::B['slug']     => Magic::BOLGANONE
            ]
        ],
        'recruitment' => [
            'default'                => [Stat::DEXTERITY['slug'] => 10, Skill::HEAVY_ARMOR['slug'] => SkillRank::C],
            SkillRank::C['slug']     => [Stat::DEXTERITY['slug'] => 8,  Skill::HEAVY_ARMOR['slug'] => SkillRank::C],
            SkillRank::CPLUS['slug'] => [Stat::DEXTERITY['slug'] => 6,  Skill::HEAVY_ARMOR['slug'] => SkillRank::DPLUS],
            SkillRank::B['slug']     => [Stat::DEXTERITY['slug'] => 4,  Skill::HEAVY_ARMOR['slug'] => SkillRank::DPLUS],
            SkillRank::BPLUS['slug'] => [Stat::DEXTERITY['slug'] => 2,  Skill::HEAVY_ARMOR['slug'] => SkillRank::EPLUS],
            SkillRank::A['slug']     => []
        ],
        'description' => 'Ferdinand is the eldest son of the Aegir Dukedom, the family that passes down the position of prime minister for the Adrestia Empire. Ferdinand\'s father, Duke Aegir, striped the power of Emperor, basically making him a puppet politician. Because of this Ferdinand tried to become the opposite of his father, by becoming the pinnacle of nobility, and to stand up for the commoners. He enrolls in the Officers Academy at the Garreg Mach Monastery, joining the Black Eagles.',
        'lost_items' => [ LostItem::BAG_OF_TEA_LEAVES, LostItem::AGRICULTURAL_SURVEY, LostItem::MAINTENANCE_OIL ]
    ];

    const LINHARDT = [
        'slug' => "linhardt",
        'name' => "Linhardt",
        'gender' => 'm',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'description' => 'Linhardt is the son of the Earl of Hevring.',
        'lost_items' => [ LostItem::FEATHER_PILLOW, LostItem::THE_SAINTS_REVEALED, LostItem::ANIMATED_BAIT ]
    ];

    const CASPAR = [
        'slug' => "caspar",
        'name' => "Caspar",
        'gender' => 'm',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'description' => 'Caspar is the second son of Count Bergliez. Since he is not inheriting his father\'s title, he has decided to make a name for himself at the Officers Academy.',
        'lost_items' => [ LostItem::TATTERED_OVERCOAT, LostItem::THUNDERBRAND_REPLICA, LostItem::GROUNDING_CHARM ]
    ];

    const BERNADETTA = [
        'slug' => "bernadetta",
        'name' => "Bernadetta",
        'gender' => 'f',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'description' => 'Bernadetta is the only daughter of the Varley Dukedom. Her greedy father only ever saw her as "bait for a rich husband". To "train [her] to be a good wife", he tied her to a chair for hours and taught her to be submissive and obedient. He also told her not to go near commoners, much less befriend them. However, Bernadetta ignored this advice and befriended a young commoner boy. When her father found out, the boy was found beaten half to death. Years later, Bernadetta\'s mother had a servant stuff Bernadetta into a sack and shipped her to the Officers Academy, already having developed social anxiety and locking herself in her room when not attending class or eating meals.',
        'lost_items' => [ LostItem::NEEDLE_AND_THREAD, LostItem::STILL_LIFE_PICTURE, LostItem::HEDGEHOG_CASE ]
    ];

    const DOROTHEA = [
        'slug' => "dorothea",
        'name' => "Dorothea",
        'gender' => 'f',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'description' => 'Dorothea was born as a commoner in the Adrestian Empire. Both her parents died when she was a child, leaving her an orphan to beg in the streets. She would sometimes sing alone. ',
        'lost_items' => [ LostItem::SILVER_BROOCH, LostItem::SONGSTRESS_POSTER, LostItem::LOVELY_COMB ]
    ];

    const PETRA = [
        'slug' => "petra",
        'name' => "Petra",
        'gender' => 'f',
        'affiliation' => Affiliation::BLACK_EAGLES,
        'description' => 'Petra is a native of Brigid, a kingdom situated on a group of islands off the coast of the Adrestian Empire. As Brigid is subservient to Adrestia, Petra serves as its representative at the Officers Academy.',
        'lost_items' => [ LostItem::EXOTIC_FLOWER, LostItem::SMALL_TANNED_HIDE, LostItem::ANNOTATED_DICTIONARY ]
    ];

    const DEDUE = [
        'slug' => "dedue",
        'name' => "Dedue",
        'gender' => 'm',
        'affiliation' => Affiliation::BLUE_LIONS,
        'description' => 'Dedue was born an ordinary commoner from the nation of Duscur. After the Tragedy of Duscur, where King Lambert of Faerghus was assassinated during peace talks with Duscur, Kingdom forces invaded and genocided Duscur in retribution for his death. Dedue was personally rescued from lynching by Lambert\'s son Dimitri, became one of the few survivors of the massacre, and developed an intense personal loyalty to the young prince. In 1180, Dedue and Dimitri enrolled in the Officer\'s Academy at Garreg Mach Monastery and became members of the Blue Lions house. Throughout 1180, he studies and fights alongside the Blue Lions. When Edelgard declares war on the Church of Seiros, he fights on the Church\'s side, but is defeated. Afterwards, he and Dimitri return to Faerghus.',
        'lost_items' => [ LostItem::GARDENING_SHEARS, LostItem::IRON_COOKING_POT ]
    ];

    const FELIX = [
        'slug' => "felix",
        'name' => "Felix",
        'gender' => 'm',
        'affiliation' => Affiliation::BLUE_LIONS,
        'description' => 'Felix is the eldest surviving son of the house of Duke Fraldarius, and is Dimitri\'s childhood friend. Felix had an older brother named Glenn, who died in battle while protecting Dimitri during the Tragedy of Duscur. Felix interpreted his father\'s remark that Glenn "died like a true knight" regarding the honor in his brother\'s death as detached, so he developed a resentment towards his father and nobility in general, and became disillusioned with concept of chivalry.',
        'lost_items' => [ LostItem::SWORD_BELT_FRAGMENT, LostItem::BLACK_IRON_SPUR, LostItem::TOOTHED_DAGGER ]
    ];

    const ASHE = [
        'slug' => "ashe",
        'name' => "Ashe",
        'gender' => 'm',
        'affiliation' => Affiliation::BLUE_LIONS,
        'description' => 'Ashe is the adoptive son of Lord Lonato of Gaspard. Lonato does not inform him of his plans to rebel against the Church of Seiros.',
        'lost_items' => [ LostItem::BUNDLE_OF_HERBS, LostItem::EVIL_REPELLING_AMULET, LostItem::MOON_KNIGHTS_TALE ]
    ];

    const SYLVAIN = [
        'slug' => "sylvain",
        'name' => "Sylvain",
        'gender' => 'm',
        'affiliation' => Affiliation::BLUE_LIONS,
        'description' => 'Sylvain is a son of the house of Margrave Gautier. He has an elder brother who was disinherited due to not having a crest.',
        'lost_items' => [ LostItem::UNUSED_LIPSTICK, LostItem::CRUMPLED_LOVE_LETTER, LostItem::THE_HISTORY_OF_SRENG ]
    ];

    const MERCEDES = [
        'slug' => "mercedes",
        'name' => "Mercedes",
        'gender' => 'f',
        'affiliation' => Affiliation::BLUE_LIONS,
        'description' => 'Mercedes is a former member of a noble family who grew up as a commoner in Faerghus. She was once enrolled in the Mage School of the kingdom\'s capital.',
        'lost_items' => [ LostItem::HOW_TO_BAKE_SWEETS, LostItem::FRUIT_PRESERVES, LostItem::BOOK_OF_GHOST_STORIES ]
    ];

    const ANNETTE = [
        'slug' => "annette",
        'name' => "Annette",
        'gender' => 'f',
        'affiliation' => Affiliation::BLUE_LIONS,
        'description' => 'Annette is the niece of Baron Dominic and a graduate of the Mage Academy in Faerghus. She is good friends with Mercedes, and refers to her as "Mercie" while Mercedes calls her "Annie".',
        'lost_items' => [ LostItem::SCHOOL_OF_SORCERY_BOOK, LostItem::UNFINISHED_SCORE, LostItem::WAX_DIPTYCH ]
    ];

    const INGRID = [
        'slug' => "ingrid",
        'name' => "Ingrid",
        'gender' => 'f',
        'affiliation' => Affiliation::BLUE_LIONS,
        'description' => 'Ingrid is the daughter of Count Galatea and a childhood friend of Dimitri, Felix, and Sylvain. She was previously betrothed to Glenn, Felix\'s elder brother, but Glenn died in the Tragedy of Duscur.',
        'lost_items' => [ LostItem::CURRY_COMB, LostItem::JOUSTING_ALMANAC, LostItem::PEGASUS_HORSESHOES ]
    ];

    const LORENZ = [
        'slug' => "lorenz",
        'name' => "Lorenz",
        'gender' => 'm',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'lost_items' => [ LostItem::ARTIFICIAL_FLOWER, LostItem::A_TREATSIE_ON_ETIQUITTE, LostItem::SILK_HANDKERCHIEF ]
    ];

    const RAPHAEL = [
        'slug' => "raphael",
        'name' => "Raphael",
        'gender' => 'm',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'description' => 'Raphael is the son of a family of merchants. His parents passed away in an unfortunate accident.',
        'lost_items' => [ LostItem::WOODEN_BUTTON, LostItem::BURLAP_SACK_OF_ROCKS, LostItem::BIG_SPOON ]
    ];

    const IGNATZ = [
        'slug' => "ignatz",
        'name' => "Ignatz",
        'gender' => 'm',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'description' => 'Ignatz is the second son of a merchant family in Leicester. Since his brother is inheriting the family business, he has decided to attend the Officers Academy and become a knight, with his parents\' blessing.',
        'lost_items' => [ LostItem::ART_BOOK, LostItem::BLUE_STONE, LostItem::LETTER_TO_THE_GODDESS ]
    ];

    const LYSITHEA = [
        'slug' => "lysithea",
        'name' => "Lysithea",
        'gender' => 'f',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'description' => 'Lysithea is the eldest daughter of the house of Count Ordelia and a prodigy in magic. As a punishment to her house for having part in a revolution against the Empire, those who slither in the dark were sent by the Empire to experiment on a young Lysithea and other children from her house. The goal of this experiment was to implant two Crests into a single person. She was the only survivor and success of the experiment, which resulted in her having white hair and a drastically shortened lifespan. To bring peace to her parents, she rushed her studies to enter the Officers Academy early, and graduate to save her house. According to herself, she was given 5 years, maximum, to live.',
        'lost_items' => [ LostItem::ENCYCLOPEDIA_OF_SWEETS, LostItem::PRINCESS_DOLL, LostItem::NEW_BOTTLE_OF_PERFUME ]
    ];

    const MARIANNE = [
        'slug' => "marianne",
        'name' => "Marianne",
        'gender' => 'f',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'description' => 'Marianne was born in a family descended from Maurice, who bore a cursed Crest. Her father told her to stay away from people as she had a curse that would turn her into a beast at night, and that her Crest brought misfortune to everyone she interacted with. As such, Marianne chose to stay away from people and preferred to talk to animals, particularly birds and horses. Sometime later in her life, she was adopted by Margrave Edmund, a Lord  of the Alliance, who raised her as his daughter. She then enrolled at the Officers Academy at Garreg Mach and her adoptive father forbid her from leaving the monastery for too long so as too protect her while he looked for a rich noble to marry her.',
        'lost_items' => [ LostItem::CONFESSIONAL_LETTER, LostItem::HOW_TO_BE_TIDY, LostItem::BAG_OF_SEEDS ]
    ];

    const HILDA = [
        'slug' => "hilda",
        'name' => "Hilda",
        'gender' => 'f',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'description' => 'Hilda is the daughter of Duke Goneril.  She has an older brother, Holst, who is known to be a great warrior.  Hilda is quite lazy, asking to not be put into battle or passing her chores off to others.  Despite this, she is a gifted artisan, making all sorts of fashionable accessories.  She can acquire the relic of House Goneril, the axe Freikugel.',
        'lost_items' => [ LostItem::USED_BOTTLE_OF_PERFUME, LostItem::SPOTLESS_BANDAGE, LostItem::HANDMADE_HAIR_CLIP ]
    ];

    const LEONIE = [
        'slug' => "leonie",
        'name' => "Leonie",
        'gender' => 'f',
        'affiliation' => Affiliation::GOLDEN_DEER,
        'description' => 'Leonie is a hunter\'s daughter from the village of Sauin within the Leicester Alliance. When she was a child, her village hired mercenaries to defend themselves. This was Jeralt\'s mercenary group. Leonie saw Jeralt as someone that defended those who couldn\'t defend themselves, and asked him to be his apprentice. He taught her a few things before leaving the village, with the promise that they would reunite. To become a mercenary and be like Jeralt, she borrowed money from her village and enrolled in the Officers Academy.',
        'lost_items' => [ LostItem::HAND_DRAWN_MAP, LostItem::CRUDE_ARROWHEADS, LostItem::FUR_SCARF ]
    ];

    const JERALT = [
        'slug' => "jeralt",
        'name' => "Jeralt",
        'gender' => 'm',
        'description' => 'Little is known about Jeralt before he became the leader of the Knights of Seiros. Marrying a nun at the monastery, he later used a fire to fake their child\'s death and disappeared with them.',
        'lost_items' => [ LostItem::WOODEN_FLASK ]
    ];

    const RHEA = [
        'slug' => "rhea",
        'name' => "Rhea",
        'gender' => 'f',
        'affiliation' => Affiliation::CHURCH_OF_SEIROS,
        'description' => 'Rhea was born as the child of Sothis from her blood, among others, and together they lived at Zanado. The King of Liberation, Nemesis, who had stolen her mother\'s remains and made the Sword of the Creator with them, invaded Zanado with his army and killed all of the goddess\' children, save Rhea. Thirsty for revenge, she took up the name Seiros, gathered soldiers from Fódlan, and led an attack against Nemesis and the 10 Elites. During her conflict with Nemesis, she helped Wilhelm Paul Hresvelg found the Adrestian Empire. At the Tailtean Plains, she killed Nemesis. Afterwards, she founded the Church of Seiros. Her draconic form ultimately came to be known as a legendary figure called the Immaculate One. Over the course of the next millennium, Seiros attempted to create a vessel capable of hosting Sothis\' consciousness so she could resurrect her by planting Sothis\' Crest Stone within their bodies, but all of her efforts ended in failure. By the Imperial Year 1159, she had become the Archbishop of the Church of Seiros under the name Rhea. Her twelfth failed vessel fell in love with the captain of the Knights of Seiros, Jeralt, and had a child named Byleth. However, the child was stillborn, and Rhea transferred Sothis\' Crest Stone to Byleth and saved them at the cost of the mother. Byleth was unnaturally silent and had no heartbeat, leading the terrified Jeralt to fake the child\'s death and flee Garreg Mach Monastery.',
        'lost_items' => [ LostItem::ELEGANT_HAIR_CLIP, LostItem::SEIROS_SCRIPTURES, LostItem::FADED_STAR_CHART ]
    ];

    const SETETH = [
        'slug' => "seteth",
        'name' => "Seteth",
        'gender' => 'm',
        'affiliation' => Affiliation::CHURCH_OF_SEIROS,
        'description' => 'Seteth, born Cichol, was one of the Children of the Goddess that lived in Zanado. After surviving the massacre perpetuated by Nemesis and those who slither in the dark, he, along with his daughter Cethleann, joined forces with Seiros as one of the legendary four saints. Cethleann was badly injured in the battle with Nemesis and fell into a coma for several centuries, so Cichol went into hiding in order to protect her. Eventually, in the 1100s, he came to Garreg Mach Monastery and became an administrator for the Church of Seiros under the alias Seteth, eventually becoming the Church\'s second-in-command under Seiros, now going by the name Rhea. In 1179, Cethleann woke from her coma and took up residence at the monastery under the alias Flayn.',
        'lost_items' => [ LostItem::UNFINISHED_FABLE, LostItem::OLD_FISHING_ROD, LostItem::SNAPPED_WRITING_QUILL ]
    ];

    const FLAYN = [
        'slug' => "flayn",
        'name' => "Flayn",
        'gender' => 'f',
        'affiliation' => Affiliation::CHURCH_OF_SEIROS,
        'description' => 'Flayn, born Cethleann, was one of the Nabateans living in Zanado alongside her father Cichol and the goddess Sothis. When the human bandit Nemesis massacred the Nabateans to create the Heroes\' Relics, Cethleann took up arms against him and fought him in battle. Cethleann was grievously injured fighting Nemesis, and spent the next several centuries in a coma. She awoke in 1179, by which point Cichol had become a high-ranking administrator for the Church of Seiros under the alias Seteth. Cethleann took the alias Flayn and took up residence at Garreg Mach Monastery, pretending to be Seteth\'s younger sister.',
        'lost_items' => [ LostItem::ANTIQUE_CLASP, LostItem::OLD_MAP_OF_ENBARR, LostItem::DUSTY_BOOK_OF_FABLES ]
    ];

    const HANNEMAN = [
        'slug' => "hanneman",
        'name' => "Hanneman",
        'gender' => 'm',
        'description' => 'Hanneman became an authority on Crestology in the empire, although he resigned after his sister died. A year later, he became a professor at the Officers Academy, where he continues his Crest research.',
        'lost_items' => [ LostItem::SKETCH_OF_A_SIGIL, LostItem::HAMMER_AND_CHISEL, LostItem::LENS_CLOTH ]
    ];

    const MANUELA = [
        'slug' => "manuela",
        'name' => "Manuela",
        'gender' => 'f',
        'description' => 'Before working at the Monastery, Manuela was a member of the Mittlefrank Opera Company. She came to be known as the "Divine Songstress" in the imperial capital. During this time, she met and inspired Dorothea She eventually left the Opera and became a professor and doctor at the Officers Academy.',
        'lost_items' => [ LostItem::WELLNESS_HERBS, LostItem::CLEAN_DUSTING_CLOTH, LostItem::LIGHT_PURPLE_VEIL ]
    ];

    const GILBERT = [
        'slug' => "gilbert",
        'name' => "Gilbert",
        'gender' => 'm',
        'affiliation' => Affiliation::CHURCH_OF_SEIROS,
        'description' => 'Gilbert was born Gustave Eddie Dominic, brother of Baron Dominic of the Holy Kingdom of Faerghus. He was originally a common soldier before being personally knighted by King Lambert and assigned to act as a combat instructor for both him and his son Dimitri. When the Tragedy of Duscur occurred, he personally saved Dimitri\'s life, but was far too late to save Lambert. Descending into self-loathing as a result of his failure, Gustave abandoned his wife and daughter Annette to travel to Garreg Mach Monastery, where he joined the Knights of Seiros under the name Gilbert.',
        'lost_items' => [ LostItem::SILVER_NECKLACE, LostItem::CARVING_HAMMER, LostItem::NOSELESS_PUPPET ]
    ];

    const ALOIS = [
        'slug' => "alois",
        'name' => "Alois",
        'gender' => 'm',
        'affiliation' => Affiliation::CHURCH_OF_SEIROS,
        'description' => 'Alois is a member of the Knights of Seiros. He recommends Byleth become a teacher at the Officers Academy after they save some students from a bandit attack.',
        'lost_items' => [ LostItem::MYSTERIOUS_NOTEBOOK, LostItem::FOREIGN_GOLD_COIN, LostItem::INTRODUCTION_TO_MAGIC ]
    ];

    const CATHERINE = [
        'slug' => "catherine",
        'name' => "Catherine",
        'gender' => 'f',
        'affiliation' => Affiliation::CHURCH_OF_SEIROS,
        'description' => 'Catherine is an alumnus of the Officers Academy and a Knight of Seiros. She wields the divine sword Thunderbrand.',
        'lost_items' => [ LostItem::BADGE_OF_GRADUATION, LostItem::LETTER_TO_RHEA, LostItem::WEATHERED_CLOAK ]
    ];

    const SHAMIR = [
        'slug' => "shamir",
        'name' => "Shamir",
        'gender' => 'f',
        'description' => 'Shamir is a master archer and former mercenary who joined the Knights of Seiros to repay a debt to Archbishop Rhea.',
        'lost_items' => [ LostItem::BUNDLE_OF_DRY_HEMP, LostItem::CENTIPEDE_PICTURE, LostItem::ANIMAL_BONE_DICE ]
    ];

    const CYRIL = [
        'slug' => "cyril",
        'name' => "Cyril",
        'gender' => 'm',
        'affiliation' => Affiliation::CHURCH_OF_SEIROS,
        'description' => 'Cyril is a war orphan in service to Archbishop Rhea, and one of few people that have a close relationship with her. He has been taking archery lessons from Shamir. He is still bitter towards the King of Almyra for ignoring his plight as a child. He unofficially joins Byleth\'s class, as he is too young to officially be a student, after they halt the raid on the Cathedral. He joins with the intention of helping Byleth protect Rhea. ',
        'lost_items' => [ LostItem::PORTRAIT_OF_RHEA, LostItem::WELL_USED_HATCHET, LostItem::OLD_CLEANING_CLOTH ]
    ];

    const JERITZA = [
        'slug' => "jeritza",
        'name' => "Jeritza",
        'gender' => 'm',
        'affiliation' => Affiliation::ADRESTIA,
        'description' => 'Jeritza was born Emile von Bartels, heir to House Bartels of Adrestia. His mother was a commoner who married his father for financial security for her daughter Mercedes, but his father was only interested in her Crest and banished the two as soon as Emile was born. When Emile was eight years old, his mother and sister absconded to Faerghus; Emile remained behind, fearing that his father would hunt them down and kill both of them if they fled with his true-born heir. Eventually, Emile\'s father tracked the two down and decided that since Emile\'s mother was past the age of bearing children, he would marry Mercedes to have more children with the Crest of Lamine. Emile snapped and massacred House Bartels, and because of this incident developed a homicidal split personality known as the Death Knight. In the aftermath, Princess Edelgard von Hresvelg discovered him, arranged for him to be adopted into the Hrym family under the name Jeritza, and took him into her service in order to make use of his skills for her plans to overthrow the Church of Seiros. Eventually, with the recommendation of Lord Arundel, Jeritza took a post as a fencing instructor at the Officers Academy at Garreg Mach Monastery.',
        'lost_items' => [  ]
    ];

    const ANNA = [
        'slug' => "anna",
        'name' => "Anna",
        'gender' => 'f',
        'lost_items' => [ LostItem::SECRET_LEDGER, LostItem::BALANCE_SCALE ]
    ];

    const YURI = [
        'slug' => "yuri",
        'name' => "Yuri",
        'gender' => 'f',
        'description' => 'Yuri was once a student of the Officer\'s Academy, but was expelled from the school under unknown circumstances and moved to Abyss.',
        'lost_items' => [ LostItem::MAKEUP_BRUSH ]
    ];

    const BALTHUS = [
        'slug' => "balthus",
        'name' => "Balthus",
        'description' => 'Balthus was once a noble of the Leicester Alliance, until unknown circumstances led to him becoming a fugitive.',
        'lost_items' => [ LostItem::STIFF_HAND_WRAP ]
    ];

    const CONSTANCE = [
        'slug' => "constance",
        'name' => "Constance",
        'description' => 'Constance is a survivor of House Nuvelle of the Adrestian Empire.',
        'lost_items' => [ LostItem::NIMBUS_CHARM, LostItem::REPELLENT_POWDER ]
    ];

    const HAPI = [
        'slug' => "hapi",
        'name' => "Hapi",
        'lost_items' => [ LostItem::SHINY_STRIATED_PEBBLE, LostItem::BASKET_OF_BERRIES ]
    ];

}
