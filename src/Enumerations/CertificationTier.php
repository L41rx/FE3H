<?php


namespace L41rx\FE3H\Enumerations;


use L41rx\FE3H\Enumeration;

class CertificationTier extends Enumeration
{
    const TRAINEE = [
        'slug' => 'trainee',
        'name' => 'Trainee'
    ];

    const BEGINNER = [
        'slug' => 'beginner',
        'name' => 'Beginner'
    ];

    const INTERMEDIATE = [
        'slug' => 'intermediate',
        'name' => 'Intermediate'
    ];

    const ADVANCED = [
        'slug' => 'advanced',
        'name' => 'Advanced'
    ];

    const MASTER = [
        'slug' => 'master',
        'name' => 'Master'
    ];

    const UNIQUE = [
        'slug' => 'unique',
        'name' => 'Unique'
    ];
}
