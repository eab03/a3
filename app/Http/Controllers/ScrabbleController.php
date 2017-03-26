<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrabbleController extends Controller
{
    /**
    * GET
    * /
    */
    public function __invoke() {
        return view('welcome');
    }

    /**
    * GET
    * /search
    */
    public function input(Request $request) {

        $scrabbleTiles = [
            'a' => 1,
            'b' => 3,
            'c' => 3,
            'd' => 2,
            'e' => 1,
            'f' => 4,
            'g' => 2,
            'h' => 4,
            'i' => 1,
            'j' => 8,
            'k' => 5,
            'l' => 1,
            'm' => 3,
            'n' => 1,
            'o' => 1,
            'p' => 3,
            'q' => 10,
            'r' => 1,
            's' => 1,
            't' => 1,
            'u' => 1,
            'v' => 4,
            'w' => 1,
            'x' => 8,
            'y' => 4,
            'z' => 10
        ];

        // declare variables used in functions below

        $i;
        $letter;
        $sum = 0;
        $output; // variable used uniquely in extraBonus function to display message
        $enterWord = $request->input('enterWord', null);
        $enterWord = strtolower($enterWord);
        $bonus = $request->input('bonus', null);
        $extra = $request->input('extra', null);

        // function to add together the value of the individual tiles
        // result is the total sum of tiles without extra points added


                foreach ($scrabbleTiles as $scrabbleLetter => $scrabbleNumber) {
                    for ($i = 0; $i < strlen($enterWord); $i++) {
                        $letter = $enterWord[$i];
                        if (strstr($letter, $scrabbleLetter )) {
                            $sum = $sum += $scrabbleNumber;
            		    } else {
            		    }
                    }
                }

                dump($enterWord);
                dump($sum);

                if ($bonus == 'double') {
                    $sum = $sum * 2;
                } else if ($bonus == 'triple') {
                    $sum = $sum * 3;
                } else {
                }

                //if($request->has('double')) {
                //    $sum = $sum * 2;
                //} else if($request->has('triple')) {
                //    $sum = $sum * 3;
                //} else {
                //}
                dump($sum);

                if($extra == 'fifty') {
                    $sum = $sum + 50;
                }
                else {
                }

                dump($sum);

        return view('scrabble.input');
    }

}
