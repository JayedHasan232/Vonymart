<?php

namespace App\Jhelper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use App;
use Auth;
use Carbon\Carbon;

class Repogen extends Controller
{
  static function readingTime( $data = '' )
  {
    $tripTags = strip_tags( $data );
    $totalWords = str_word_count( $tripTags );
    $avgRead = 275;
    $timeToRead = $totalWords / $avgRead;
    $roundedTime = round( $timeToRead, 2 );
    return $roundedTime;
  }
}
