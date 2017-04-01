@extends('layouts.master')

@section('content')

<form method="GET" action="/" class="form-horizontal" id="scrabbleForm">
    <div class="form-group text-entry">
        <label for="enterWord" class="control-label">YOUR WORD:</label>
        <p class="form-control-static">Required (1-7 letters only please!)</p>
            <input type="text" class="form-control" id="enterWord" name="enterWord" placeholder="enter your word here!" 
            value="@if($errors->get('enterWord')) {{ old('enterWord')}} @else{{ $enterWord }}@endif"><br>

        <div class="error">
            @if($errors->get('enterWord'))
                <ul>
                    @foreach($errors->get('enterWord') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div><!--close div error-->

    </div><!--close div form-group-->

    <fieldset class="form-group radios">
        <legend>BONUS POINTS</legend>
            <label class="control-label"><input type="radio" class="form-check-input" name="bonus" value="none" {{ ($bonus == 'none') ? 'checked': '' }} >&nbsp; None</label><br>
            <label class="control-label"><input type="radio" class="form-check-input" name="bonus" value="double" {{ ($bonus == 'double') ? 'checked': '' }}>&nbsp; Double word score</label><br>
            <label class="control-label"><input type="radio" class="form-check-input" name="bonus" value="triple" {{ ($bonus == 'triple') ? 'checked': '' }}>&nbsp; Triple word score</label>
    </fieldset><!--close div form-group-->

    <fieldset class="form-group checkbox">
        <legend>INCLUDE 50 POINT "BINGO?"</legend>
            <p class="form-control-static">(A word that uses all 7 letters!)</p>
            <label class="control-label"><input type='checkbox' class="form-check-input" name="extra" value="fifty" {{ ($extra) ? 'CHECKED' : '' }}>&nbsp; Add 50 points!</label>

    </fieldset><!--close div form-group-->

        <input type="submit" class="btn btn-primary btn-small" id="calculate_btn" name="calculate" value="calculate">

        @if($enterWord!= null and !$errors->get('enterWord'))
            <div class="alert alert-success" role="alert">
                <p><strong>{{ $output }}</strong></p>
                <p>Your word <em>"{{ $enterWord }}"</em> is worth <strong>{{ $sum }}</strong> points</p>
            </div> <!--close div alert-->
        @endif

</form><!--close form-->



@endsection
