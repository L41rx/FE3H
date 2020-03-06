<?php

namespace L41rx\FE3H\Enumerations;

use L41rx\FE3H\Enumeration;
use L41rx\FE3H\Enumerations\CrestType;
use L41rx\FE3H\Enumerations\CrestSize;

class Crest extends Enumeration
{
    public static function render($slug)
    {
        $constant = self::get($slug);
        $title = CrestType::get($constant['crest_type']['slug'], 'effect');;

        $html = <<<HMTL
            <span title="{$title}">
                {$constant['crest_size']['name']} {$constant['crest_type']['name']}
            </span>
        HMTL;

        return $html;
    }

    const MAJOR_CREST_OF_FLAMES = [
        'slug' => 'major_crest_of_flames',
        'crest_type' => CrestType::CREST_OF_FLAMES,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_FLAMES = [
        'slug' => 'minor_crest_of_flames',
        'crest_type' => CrestType::CREST_OF_FLAMES,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_SEIROS = [
        'slug' => 'major_crest_of_seiros',
        'crest_type' => CrestType::CREST_OF_SEIROS,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_SEIROS = [
        'slug' => 'minor_crest_of_seiros',
        'crest_type' => CrestType::CREST_OF_SEIROS,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_BLAIDDYD = [
        'slug' => 'major_crest_of_blaiddyd',
        'crest_type' => CrestType::CREST_OF_BLAIDDYD,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_BLAIDDYD = [
        'slug' => 'minor_crest_of_blaiddyd',
        'crest_type' => CrestType::CREST_OF_BLAIDDYD,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_FRALDARIUS = [
        'slug' => 'major_crest_of_fraldarius',
        'crest_type' => CrestType::CREST_OF_FRALDARIUS,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_FRALDARIUS = [
        'slug' => 'minor_crest_of_fraldarius',
        'crest_type' => CrestType::CREST_OF_FRALDARIUS,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_LAMINE = [
        'slug' => 'major_crest_of_lamine',
        'crest_type' => CrestType::CREST_OF_LAMINE,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_LAMINE = [
        'slug' => 'minor_crest_of_lamine',
        'crest_type' => CrestType::CREST_OF_LAMINE,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_GAUTIER = [
        'slug' => 'major_crest_of_gautier',
        'crest_type' => CrestType::CREST_OF_GAUTIER,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_GAUTIER = [
        'slug' => 'minor_crest_of_gautier',
        'crest_type' => CrestType::CREST_OF_GAUTIER,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_DOMINIC = [
        'slug' => 'major_crest_of_dominic',
        'crest_type' => CrestType::CREST_OF_DOMINIC,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_DOMINIC = [
        'slug' => 'minor_crest_of_dominic',
        'crest_type' => CrestType::CREST_OF_DOMINIC,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_DAPHNEL = [
        'slug' => 'major_crest_of_daphnel',
        'crest_type' => CrestType::CREST_OF_DAPHNEL,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_DAPHNEL = [
        'slug' => 'minor_crest_of_daphnel',
        'crest_type' => CrestType::CREST_OF_DAPHNEL,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_RIEGAN = [
        'slug' => 'major_crest_of_riegan',
        'crest_type' => CrestType::CREST_OF_RIEGAN,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_RIEGAN = [
        'slug' => 'minor_crest_of_riegan',
        'crest_type' => CrestType::CREST_OF_RIEGAN,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_GLOUCESTER = [
        'slug' => 'major_crest_of_gloucester',
        'crest_type' => CrestType::CREST_OF_GLOUCESTER,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_GLOUCESTER = [
        'slug' => 'minor_crest_of_gloucester',
        'crest_type' => CrestType::CREST_OF_GLOUCESTER,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_GONERIL = [
        'slug' => 'major_crest_of_goneril',
        'crest_type' => CrestType::CREST_OF_GONERIL,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_GONERIL = [
        'slug' => 'minor_crest_of_goneril',
        'crest_type' => CrestType::CREST_OF_GONERIL,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_CHARON = [
        'slug' => 'major_crest_of_charon',
        'crest_type' => CrestType::CREST_OF_CHARON,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_CHARON = [
        'slug' => 'minor_crest_of_charon',
        'crest_type' => CrestType::CREST_OF_CHARON,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_MACUIL = [
        'slug' => 'major_crest_of_macuil',
        'crest_type' => CrestType::CREST_OF_MACUIL,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_MACUIL = [
        'slug' => 'minor_crest_of_macuil',
        'crest_type' => CrestType::CREST_OF_MACUIL,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_CICHOL = [
        'slug' => 'major_crest_of_cichol',
        'crest_type' => CrestType::CREST_OF_CICHOL,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_CICHOL = [
        'slug' => 'minor_crest_of_cichol',
        'crest_type' => CrestType::CREST_OF_CICHOL,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_INDECH = [
        'slug' => 'major_crest_of_indech',
        'crest_type' => CrestType::CREST_OF_INDECH,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_INDECH = [
        'slug' => 'minor_crest_of_indech',
        'crest_type' => CrestType::CREST_OF_INDECH,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_CETHLEANN = [
        'slug' => 'major_crest_of_cethleann',
        'crest_type' => CrestType::CREST_OF_CETHLEANN,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_CETHLEANN = [
        'slug' => 'minor_crest_of_cethleann',
        'crest_type' => CrestType::CREST_OF_CETHLEANN,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_MAURICE = [
        'slug' => 'major_crest_of_maurice',
        'crest_type' => CrestType::CREST_OF_MAURICE,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_MAURICE = [
        'slug' => 'minor_crest_of_maurice',
        'crest_type' => CrestType::CREST_OF_MAURICE,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_TIMOTHEOS = [
        'slug' => 'major_crest_of_timotheos',
        'crest_type' => CrestType::CREST_OF_TIMOTHEOS,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_TIMOTHEOS = [
        'slug' => 'minor_crest_of_timotheos',
        'crest_type' => CrestType::CREST_OF_TIMOTHEOS,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_NOA = [
        'slug' => 'major_crest_of_noa',
        'crest_type' => CrestType::CREST_OF_NOA,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_NOA = [
        'slug' => 'minor_crest_of_noa',
        'crest_type' => CrestType::CREST_OF_NOA,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_ERNEST = [
        'slug' => 'major_crest_of_ernest',
        'crest_type' => CrestType::CREST_OF_ERNEST,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_ERNEST = [
        'slug' => 'minor_crest_of_ernest',
        'crest_type' => CrestType::CREST_OF_ERNEST,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_CHEVALIER = [
        'slug' => 'major_crest_of_chevalier',
        'crest_type' => CrestType::CREST_OF_CHEVALIER,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_CHEVALIER = [
        'slug' => 'minor_crest_of_chevalier',
        'crest_type' => CrestType::CREST_OF_CHEVALIER,
        'crest_size' => CrestSize::MINOR
    ];

    const MAJOR_CREST_OF_AUBIN = [
        'slug' => 'major_crest_of_aubin',
        'crest_type' => CrestType::CREST_OF_AUBIN,
        'crest_size' => CrestSize::MAJOR
    ];

    const MINOR_CREST_OF_AUBIN = [
        'slug' => 'minor_crest_of_aubin',
        'crest_type' => CrestType::CREST_OF_AUBIN,
        'crest_size' => CrestSize::MINOR
    ];

}
