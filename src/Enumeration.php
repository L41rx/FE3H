<?php


namespace L41rx\FE3H;


use Exception;
use L41rx\FE3H\Traits\ConvertsCamel;

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
    use ConvertsCamel;

    public static function all() {
        $reflect = new \ReflectionClass(static::class);
    	return $reflect->getConstants();
    }

    /**
     * Get an enumerated value. Rudimentary overriding using defaults.
     * toto make $slug_or_array => if array, assume enum const. use insteaf of get by slug
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

    /**
     * Automagic first index from class static name. Check if dot separated value exists. return it. If not, send to default
     * 
     * @param Enumeration $enum
     * @param string $index
     * 
     * @return mixed
     */
    public function derive(array $enum, string $index_string_dot_separated)
    {
        // try going all the way!
        $maybe_enum = explode('\\', static::class);
        $maybe_enum = self::decamelize($maybe_enum[count($maybe_enum) - 1]);
        $indices = [$maybe_enum];
        foreach (explode('.', $index_string_dot_separated) as $zz)
            array_push($indices, $zz);
        $e = $enum;
        $count = 1;
        foreach ($indices as $in) {
            if (!isset($e[$in])) // $e is no longer important. Maybe affiliation, and the remaining indices.
                break;

            if ($count === count($indices)) // natural finish of the for loop would exit here
                return $e[$in];

            $count++;
            $e = $e[$in];
            $maybe_enum = $in;
        }

        // Well.. it broke ! lets start the default chain.
        for ($i = 0; $i < $count - 1; $i++)
            array_shift($indices);
        $index_dot_string = implode('.', $indices);
        $maybe_enum = self::camelize($maybe_enum);

        if (strpos($maybe_enum, '\\') !== false) {} // lol 3am
        else {
            $namespace = explode('\\', static::class);
            unset($namespace[count($namespace) - 1]);
            $namespace = implode('\\', $namespace);
            $maybe_enum = $namespace.'\\'.$maybe_enum;
        }

        if (!class_exists($maybe_enum)) {
            trigger_error("Riding the derive chain and tried to access unknown enumeration, '{$maybe_enum}'. Do you know this guy?", E_USER_NOTICE);
            return null; // semi-tru default
        }

        return ($maybe_enum)::default($index_dot_string);
    }


    public static function render($slug)
    {
        $enum = static::class;
        $constant = $enum::get($slug);
        if (!isset($constant['name']))
            throw new Exception("Tried to use the default render without setting a name... really..");

        $attempt_props = ['description', 'effect', 'type'];

        $title = null;
        foreach ($attempt_props as $prop)
            if (isset($constant[$prop])) {
                $title = $constant[$prop];
                break;
            }

        if (!is_null($title) && is_string($title))
            $html = "<span title=\"{$title}\">{$constant['name']}</span>";
        else
            $html = "{$constant['name']}";
        
        return $html;
    }


    /**
     * 
     * lol this works with derive.
     * 
     */
    public static function default(string $property) {
        $indices = explode('.', $property);
        if (count($indices) === 1)
            return null; // tru default

        $maybe_enum = array_shift($indices);
        $maybe_enum = self::camelize($maybe_enum);

        if (strpos($maybe_enum, '\\') !== false) {} // lol 3am
        else {
            $namespace = explode('\\', static::class);
            unset($namespace[count($namespace) - 1]);
            $namespace = implode('\\', $namespace);
            $maybe_enum = $namespace.'\\'.$maybe_enum;
        }

        if (!class_exists($maybe_enum)) {
            trigger_error("Riding the default chain and tried to access unknown enumeration, '{$maybe_enum}'. Do you know this guy?", E_USER_NOTICE);
            return null; // semi-tru default
        }

        return ($maybe_enum)::default(implode('.', $indices));
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
