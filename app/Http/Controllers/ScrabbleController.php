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
        return view('input');
    }

    /**
    * GET
    * /search
    */

    public function input(Request $request) {

        // declare array and variables used below

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

        $enterWord = $request->input('enterWord');
        $enterWord = strtolower($enterWord);
        $bonus = $request->input('bonus', null);
        $extra = $request->input('extra', null);

        $i;
        $letter;
        $sum = 0;
        $alertType;
        $output = " "; // variable used uniquely in extraBonus function to display message

        // add value of the individual tiles
        // result is the total sum of tiles without extra points added

        if($request->has('enterWord')) {

            $this->validate($request, [
            'enterWord' => 'required|alpha|max:7',
            ]);

            foreach ($scrabbleTiles as $scrabbleLetter => $scrabbleNumber) {
                for ($i = 0; $i < strlen($enterWord); $i++) {
                    $letter = $enterWord[$i];
                    if (strstr($letter, $scrabbleLetter )) {
                        $sum = $sum += $scrabbleNumber;
            		    } else {
            		}
                }
            } // end foreach loop
        } // end if statement

        // add bonus double or triple word score

        if($request->has('bonus')) {
            if ($bonus == 'double') {
                $sum = $sum * 2;
            } else if ($bonus == 'triple') {
                $sum = $sum * 3;
            } else {
            }
        } // end if statement

        // add 50 extra 'bingo' points if box is checked

        if($request->has('extra')) {

            $this->validate($request, [
            'enterWord' => 'required|max:7|min:7',
            ]);

            $sum = $sum + 50;
            $alertType = "alert-success";
            $output = "AWESOME SCORE!";
        } else {
            $alertType = "success";
            $output = "GOOD JOB!";
        }

        // return values to the 'input' view

        return view('scrabble.input')->with([
        'enterWord' => $enterWord,
        'bonus' => $bonus,
        'extra' => $request->has('extra'), // checked or not; if it is returns true (see view)
        'sum' => $sum,
        'output' => $output,
        ]);

    } // end input method

} // end ScrabbleController class
