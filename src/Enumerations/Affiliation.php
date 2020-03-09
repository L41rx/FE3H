<?php


namespace L41rx\FE3H\Enumerations;


use L41rx\FE3H\Enumeration;

class Affiliation extends Enumeration
{
    public static function default(string $property) {
        switch ($property) {
            case 'name':
                return "Unaffiliated";
                break;
            case 'slug':
                return 'unaffiliated';
                break;
            case 'type':
                return 'Organization';
                break;
        }

        return parent::default($property);
    }

    const BLACK_EAGLES = [
        'slug' => 'eagles',
        'name' => 'Black Eagles',
        'type' => 'House',
        'description' => 'The Black Eagles house at the monastery holds students affiliated to the Adrestian empire'
    ];

    const GOLDEN_DEER = [
        'slug' => 'deer',
        'name' => 'Golden Deer',
        'type' => 'House',
        'description' => 'The Golden Deer house at the monastery holds students affiliated to the Leicester Alliance'
    ];

    const BLUE_LIONS = [
        'slug' => 'lions',
        'name' => 'Blue Lions',
        'type' => 'House',
        'description' => 'The Blue Lions house at the monastery holds students affiliated to the Holy Kingdom of Faerghus'
    ];

    const CHURCH_OF_SEIROS = [
        'slug' => 'church',
        'name' => 'Church of Seiros',
        'type' => 'Religious organization',
        'description' => 'The church of Seiros is led by Archbishop monastery. They operate the Garreg Marech monastery and the holy knights of Seiros.'
    ];

    const ADRESTIA = [
        'slug' => 'adrestia',
        'name' => 'The Adrestian Empire',
        'type' => 'Empire',
        'description' => 'The Adrestian empire occupies the south of Fodlan. It\'s capital is Enbarr.'
    ];
}