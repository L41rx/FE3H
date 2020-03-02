<?php


namespace L41rx\FE3H;


use Exception;

/**
 * Make enumerated classes like:
 * 
 * const TRAINEE = [
 *     'slug' => 'trainee',
 *     'name' => 'Trainee'
 * ];
 * 
 * You can omit slug and get will still work, as long as the constant name is toupper(slug)
 */
abstract class Enumeration
{
    public static function all() {
        $reflect = new \ReflectionClass(static::class);
    	return $reflect->getConstants();
    }

    /**
     * Get an enumerated value. Rudimentary overriding using defaults.
     * 
     * @param string $slug Name of constant/slug to find
     * @param string|null $property if not null, return this prop
     * @param bool|bool $use_defaults 
     * @return type
     */
    public static function get(string $slug, string $property = null, bool $use_defaults = false) 
    {
        $constants = (static::class)::all();
        $maybe_constant_name = strtoupper($slug);

        $entity = null;
        if (isset($constants[$maybe_constant_name])) {
            $entity = $constants[$maybe_constant_name];
            if (is_null($property))
                return $entity;
        } else {
            foreach ($constants as $constant) {
                if (isset($constant['slug']) && $constant['slug'] === $slug) {
                    $entity = $constant;

                    if (is_null($property))
                        return $entity;

                    break;
                }
            }
        }

        if (is_null($entity))
            throw new \Exception("Tried to get enumerated entity {$slug} in ".static::class.", but could not find it.");

        // can assume entity is found, and property is not null (i.e. return the property, not the entity)
        // its not obvious lol.

        if (!isset($entity[$property])) {

            if (!($use_defaults))
                throw new \Exception("Tried to get property {$property} from enumerated entity {$slug} in ".static::class.", but could not find it.");
            else
                return (static::class)::default($property);
        }
    
        return $entity[$property];
    }


    public static function render($slug)
    {
        $enum = static::class;
        $constant = $enum::get($slug);
        if (!isset($constant['name']))
            throw new Exception("Tried to use the default render without setting a name... really..");

        $attempt_props = ['description', 'effect'];

        $title = null;
        foreach ($attempt_props as $prop)
            if (isset($constant[$prop]))
                $title = $constant[$prop];

        if (!is_null($title) && is_string($title))
            $html = <<<HMTL
                <span title="{$title}">
                    {$constant['name']}
                </span>
            HMTL;
        else
            $html = <<<HMTL
                {$constant['name']}
            HMTL;
        
        return $html;
    }



    public static function default(string $property) {
        return null;
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
