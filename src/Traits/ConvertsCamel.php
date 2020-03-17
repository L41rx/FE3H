<?php
namespace L41rx\FE3H\Traits;

trait ConvertsCamel {
    function decamelize($string) { return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string)); }
    function camelize($string)   { return str_replace('_', '', ucwords($string, '_'));}
}
