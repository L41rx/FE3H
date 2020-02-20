<?php


namespace L41rx\FE3H;


abstract class Enumeration
{
    public static function all() {
        $reflect = new \ReflectionClass(static::class);
    	return $reflect->getConstants();
    }
}
