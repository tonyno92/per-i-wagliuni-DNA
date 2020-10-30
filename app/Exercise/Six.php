<?php

namespace App\Exercise;

use Illuminate\Support\Facades\DB;

class Six
{
    /*
     * Find first N occurrence of a fibonacci sequence
     *  n = 0 => ()
     *  n = 1 => (0)
     *  n = 7 => (0, 1, 1, 2, 3, 5, 8)
     *  n = 9 => (0, 1, 1, 2, 3, 5, 8, 13, 21)
     */

    public function execute($n)
    {
        return Six::fibonacci($n);
    }

    private static function fibonacci($n)
    {
        $array = [];

        for ($i = 0; $i < $n; $i++) {
            if ($i == 0)
                $array[0] = 0;
            else if ($i == 1)
                $array[1] = 1;
            else
                $array[] = $array[$i - 1] + $array[$i - 2];
        }

        print_r($array);
        return $array;
    }

}
