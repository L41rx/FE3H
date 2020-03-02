<?php


namespace L41rx\FE3H\Enumerations;


use L41rx\FE3H\Enumeration;

class CertificationTier extends Enumeration
{
    const TRAINEE = [
        'slug' => 'trainee',
        'name' => 'Trainee',
        'default_seal' => null,
        'min_level' => null
    ];

    const BEGINNER = [
        'slug' => 'beginner',
        'name' => 'Beginner',
        'default_seal' => 'Beginner Seal',
        'required_level' => 5
    ];

    const INTERMEDIATE = [
        'slug' => 'intermediate',
        'name' => 'Intermediate',
        'default_seal' => 'Intermediate Seal',
        'required_level' => 10
    ];

    const ADVANCED = [
        'slug' => 'advanced',
        'name' => 'Advanced',
        'default_seal' => 'Advanced Seal',
        'required_level' => 20
    ];

    const MASTER = [
        'slug' => 'master',
        'name' => 'Master',
        'default_seal' => 'Master Seal',
        'required_level' => 30
    ];

    const UNIQUE = [
        'slug' => 'unique',
        'name' => 'Unique',
        'default_seal' => null,
        'required_level' => null
    ];
}
