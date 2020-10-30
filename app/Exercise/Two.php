<?php

namespace App\Exercise;

use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Psy\Exception\TypeErrorException;

class Two
{
    /*
     * Implement the function unique_in_order which takes as argument a sequence and returns a list of items without any elements with the same value next to each other and preserving the original order of elements.
     * For example:
     * execute("AAAABBBCCDAABBB") == {'A', 'B', 'C', 'D', 'A', 'B'}
     * execute("ABBCcAD")         == {'A', 'B', 'C', 'c', 'A', 'D'}
     * execute([1,2,2,3,3])       == {1,2,3}
     */

    public function execute($iterable)
    {

        switch (gettype($iterable)) {
            case "string":
                return $this->unique_in_order_from_string($iterable);
            case "array":
                return $this->unique_in_order_from_array($iterable);
            default:
                return null;
        }
    }

    private function unique_in_order_from_string($iterable)
    {
        $array_unique = array();

        if (strlen($iterable) > 0) {
            $array_splitted  = str_split($iterable);

            $previus_char = null;

            foreach ($array_splitted as $current_char) {
                if ($current_char != $previus_char) {
                    $array_unique[] = $current_char;
                }

                $previus_char = $current_char;
            }
        }
        print_r($array_unique);
        return $array_unique;
    }

    private function unique_in_order_from_array($iterable)
    {
        $array_unique = array();

        if (sizeof($iterable) > 0) {

            $previus_char = null;

            foreach ($iterable as $current_char) {
                if ($current_char != $previus_char)
                    $array_unique[] = $current_char;

                $previus_char = $current_char;
            }
        }
        
        print_r($array_unique);
        return $array_unique;
    }
}
