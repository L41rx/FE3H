<?php


namespace L41rx\FE3H\Enumerations;


use L41rx\FE3H\Enumeration;

class House extends Enumeration
{
    public static function default(string $property) {
        switch ($property) {
            case 'name':
                return "Unaffiliated";
                break;
            case 'slug':
                return 'unaffiliated';
                break;
        }

        return parent::default($property);
    }

    const BLACK_EAGLES = [
        'slug' => 'eagles',
        'name' => 'Black Eagles'
    ];

    const GOLDEN_DEER = [
        'slug' => 'deer',
        'name' => 'Golden Deer'
    ];

    const BLUE_LIONS = [
        'slug' => 'lions',
        'name' => 'Blue Lions'
    ];
}