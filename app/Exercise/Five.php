<?php

namespace App\Exercise;

use Illuminate\Support\Facades\DB;

class Five
{
    /*
     * Write a function that accepts two arguments and generates a sequence containing the integers from the first argument to the second inclusive.
     * Example:
     *  (0, 0) => (0)
     *  (3, 5) => (3, 4, 5)
     *  (2, 9) => (2, 3, 4, 5, 6, 7, 8, 9)
     *  (8, 2) => (-1)
     */

    public function execute($m, $n)
    {
        $array_seq = array();

        if (Five::is_valid($m, $n)) {
            do {
                $array_seq[] = $m;
            } while (++$m <= $n);
        } else
            $array_seq[] = -1;


        print_r($array_seq);

        return $array_seq;
        /*print_r(Five::recurse(1,5));
        return Five::recurse(1,5);*/
    }

    private static function recurse($m, $n)
    {
        if ($m > $n)
            return -1;
        else if ($m == $n)
            return $n;
        else
            return array(Five::recurse($m + 1, $n));
    }

    private static function is_valid($m, $n)
    {
        return $m <= $n;
    }
}
