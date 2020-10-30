<?php

namespace App\Exercise;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class Three
{
    /**
     * Our football team finished the championship. The result of each match look like "x:y". Results of all matches are recorded in the collection.
     * For example: ["3:1", "2:2", "0:1", ...]
     * Write a function that takes such collection and counts the points of our team in the championship. Rules for counting points for each match:
     * if x>y - 3 points
     * if x<y - 0 point
     * if x=y - 1 point
     * Notes:
     * There are 10 matches in the championship
     * 0 <= x <= 4
     * 0 <= y <= 4
     */

    private const GAME_SEPARATOR    = ':';
    private const POINTS_MATCH_WIN  = 3;
    private const POINTS_MATCH_TIE  = 1;
    private const POINTS_MATCH_LOSE = 0;

    public function execute($games)
    {
        return $this->calculate_team_points($games);
    }

    private function calculate_team_points($games)
    {
        $points = 0;

        foreach ($games as $game) {
            $match = Three::split_match_result($game);

            if ($match != null) {
                $x = $match["in_home"];
                $y = $match["away_from_home"];

                if ($x > $y) {
                    $points += Three::POINTS_MATCH_WIN;
                } else if ($x == $y) {
                    $points += Three::POINTS_MATCH_TIE;
                } else {
                    $points += Three::POINTS_MATCH_LOSE;
                }
            }else
                continue;
        }
        return $points;
    }


    private static function split_match_result($match)
    {
        if (Three::is_match_valid($match)) {
            return array("in_home" => $match[0], "away_from_home" => $match[2]);
        } else
            return null;
    }

    private static function is_match_valid($match)
    {
        if (strpos($match, Three::GAME_SEPARATOR) && strlen($match) >= 3) {
            if ($match[0] >= 0 && $match[0] <= 4 && $match[2] >= 0 && $match[2] <= 4)
                return true;
        }
        return false;
    }
}
