<?php


namespace L41rx\FE3H\Enumerations;


class Crest extends \L41rx\FE3H\Enumeration
{
    // unique crests for house leaders
    const MINOR_CREST_OF_SEIROS = [
        'slug' => 'minor_crest_of_seiros',
        'name' => 'Minor Crest of Seiros',
        'effect' => 'Sometimes raises Might when using combat arts'
    ];

    const MINOR_CREST_OF_BLAIDDYD = [
        'slug' => 'minor_crest_of_blaiddyd',
        'name' => 'Minor Crest of Blaiddyd',
        'effect' => 'Occasionally doubles Atk and weapon uses for combat arts'
    ];

    const MINOR_CREST_OF_RIEGAN = [
        'slug' => 'minor_crest_of_riegan',
        'name' => 'Minor Crest of Riegan',
        'effect' => 'Sometimes restore HP equal to 30% of damage dealt when using combat arts'
    ];
}
