<?php


namespace L41rx\FE3H\Enumerations;


class Crest extends \L41rx\FE3H\Enumeration
{
	public static function render($slug) {
        $crest = self::get($slug);
        $html = <<<HMTL
            <span style="text-decoration: underline;" title="{$crest['effect']}">
                {$crest['name']}
            </span>
        HMTL;
        return $html;
    }

    const MINOR_CREST_OF_SEIROS = [
        'slug' => 'minor_crest_of_seiros',
        'name' => 'Minor Crest of Seiros',
        'effect' => 'Sometimes raises Might when using combat arts'
    ];
}
