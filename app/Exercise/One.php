<?php

namespace App\Exercise;

use Illuminate\Support\Facades\DB;

class One
{
    /*
     * Given an array, find the integer that appears an odd number of times.
     * There will always be only one integer that appears an odd number of times.
     */

    public function execute(array $seq)
    {
        $max = -1;
        $oddMax = null;

        foreach ($seq as $value) {

            $cont = 0;
            foreach ($seq as $nestValue) {

                if ($value == $nestValue) {
                    $cont++;
                } else
                    continue;
            }

            if ($cont > $max && $cont % 2 == 1) {
                $max = $cont;
                $oddMax = $value;
            }
        }

        return $oddMax;
    }
}
