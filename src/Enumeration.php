<?php


namespace L41rx\FE3H;


use Exception;

abstract class Enumeration
{
    public static function all() {
        $reflect = new \ReflectionClass(static::class);
    	return $reflect->getConstants();
    }

    /**
     * @param string $str
     * @return mixed
     * @throws Exception
     */
    public static function getFromSlug(string $str) {
        $all = self::all();
        foreach ($all as $a) {
            if ($a['slug'] === $str)
                return $a;
        }
        throw new Exception("Couldnt find enumeration $str by slug in ".static::class);
    }
}
