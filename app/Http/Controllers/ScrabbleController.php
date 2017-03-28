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

        // declare variables used below
        $enterWord = $request->input('enterWord', null);
        $enterWord = strtolower($enterWord);
        $bonus = $request->input('bonus', null);
        $extra = $request->input('extra', null);

        $i;
        $letter;
        $sum = 0;
        $output = " "; // variable used uniquely in extraBonus function to display message

        // add value of the individual tiles
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

        // add bonus double or triple word score

                if($request->has('bonus')) {
                    if ($bonus == 'double') {
                        $sum = $sum * 2;
                    } else if ($bonus == 'triple') {
                        $sum = $sum * 3;
                    } else {
                    }
                }
                dump($sum);

            // add 50 extra 'bingo' points if box is checked

                if($request->has('extra')) {
                    $sum = $sum + 50;
                    $alertType = "alert-success";
                    $output = "NICE SCORE!";
                }
                else {
                    $alertType = "success";
                }

                dump($sum);

        return view('scrabble.input')->with([
        'enterWord' => $enterWord,
        'bonus' => $request->has('bonus'), // checked or not; if it is returns true (see view)
        'extra' => $request->has('extra'), // checked or not; if it is returns true (see view)
        'sum' => $sum,
        'output' => $output
    ]);
}

    /**
    * GET
    * /input
    * Validate input data
    */
    public function store(Request $request) {

        # Validate the request data
        // my notes: start with an empty array
        // key is what we want to validate that points to validation rules
        $this->validate($request, [
          'enterWord' => 'required|alpha',
        ]);

        $enterWord = $request->input('enterWord', null);

        #
        #
        # [...Code will eventually go here to actually save this book to a database...]
        #
        #

        # Redirect the user to the page to view the book
        return redirect('/input');

    }

}
