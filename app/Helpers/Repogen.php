<?php

namespace App\Jhelper;

use App\Http\Controllers\Controller;

class Repogen extends Controller
{
    public static function readingTime($data = '')
    {
        $tripTags = strip_tags($data);
        $totalWords = str_word_count($tripTags);
        $avgRead = 275;
        $timeToRead = $totalWords / $avgRead;
        $roundedTime = round($timeToRead, 2);

        return $roundedTime;
    }
}
