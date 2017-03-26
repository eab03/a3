@extends('layouts.master')

@section('content')

<form method="GET" action="/input" class="form-horizontal" id="scrabbleForm">
    <div class="form-group text-entry">
        <label for="enterWord" class="control-label">YOUR WORD:</label>
        <p class="form-control-static">Required (1-7 letters only please!)</p>
            <input type="text" class="form-control" id="enterWord" name="enterWord" placeholder="enter your word here!" required="required" maxlength="7" value="{{ $enterWord or '' }}"><br>
    </div><!--close div form-group-->

    <fieldset class="form-group radios">
        <legend>BONUS POINTS</legend>
            <label class="control-label"><input type="radio" class="form-check-input" name="bonus" value="none">&nbsp; None</label><br>
            <label class="control-label"><input type="radio" class="form-check-input" name="bonus" value="double">&nbsp; Double word score</label><br>
            <label class="control-label"><input type="radio" class="form-check-input" name="bonus" value="triple">&nbsp; Triple word score</label>
    </fieldset><!--close div form-group-->

    <fieldset class="form-group checkbox">
        <legend>INCLUDE 50 POINT "BINGO?"</legend>
            <p class="form-control-static">(A word that uses all 7 letters!)</p>
            <label class="control-label"><input type='checkbox' class="form-check-input" name="extra" value="fifty">&nbsp; Add 50 points!</label>
    </fieldset><!--close div form-group-->

        <input type="submit" class="btn btn-primary btn-small" id="calculate_btn" name="calculate" value="calculate">

    </form><!--close form-->


@endsection
