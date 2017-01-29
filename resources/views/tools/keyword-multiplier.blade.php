@extends('layouts.tool_view')

@section('tool_header')
    Keyword Multiplier - multiply keywords written in the textbox.
@endsection

@section('tool_body')

    <form method="POST">
        <div class="row">
            <div class="col-xs-2 col-xs-offset-2">
                <input type="checkbox" id="broad"
                       name="options[]" value="broad" onclick="multiplyWords()"
                        {{ isset($options) ? (isset($options['broad']) ? "checked" : "") : "checked" }}>
                Broad<br>
            </div>
            <div class="col-xs-2">
                <input type="checkbox" id="phrase"
                       name="options[]" value="phrase" onclick="multiplyWords()"
                        {{ isset($options['phrase']) ? "checked" : "" }}> Phrase<br>
            </div>
            <div class="col-xs-2">
                <input type="checkbox" id="exact"
                       name="options[]" value="exact" onclick="multiplyWords()"
                        {{ isset($options['exact']) ? "checked" : "" }}> Exact<br>
            </div>
            <div class="col-xs-3">
                <input type="checkbox" id="bmm"
                       name="options[]" value="bmm" onclick="multiplyWords()"
                        {{ isset($options['bmm']) ? "checked" : "" }}> Broad Match Modifier<br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <textarea class="form-control" id="words1" name="words1" rows="15"
                          placeholder="First group of keywords here.">{{ isset($data[0]) ? $data[0] : "" }}</textarea>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" id="words2" name="words2" rows="15"
                          placeholder="Second group of keywords here.">{{ isset($data[1]) ? $data[1] : "" }}</textarea>
            </div>
            <div class="col-md-2">
                <textarea class="form-control" id="words3" name="words3" rows="15"
                          placeholder="Third group of keywords here.">{{ isset($data[2]) ? $data[2] : "" }}</textarea>
            </div>
            <div class="col-md-2">
                <textarea class="form-control" id="words4" name="words4" rows="15"
                          placeholder="Fourth group of keywords here.">{{ isset($data[3]) ? $data[3] : "" }}</textarea>
            </div>
            <div class="col-md-2">
                <textarea class="form-control" id="words5" name="words5" rows="15"
                          placeholder="Fifth group of keywords here.">{{ isset($data[4]) ? $data[4] : "" }}</textarea>
            </div>
        </div>

        <div class="text-center row" style="margin-bottom: 5vh;">
            <br>
            <button class="btn btn-primary" type="submit" id="gonder">Multiply!</button>
        </div>

    </form>


    @if(isset($multipliedResult))
        <div class="text-center row" style="margin-bottom: 5vh;">
            <div class="col-md-10 col-md-offset-1">
                <br>
                <p id="variable">These are your multiplied words!</p>
                <textarea class="form-control" id="words" name="words"
                          rows=10>{{ trim($multipliedResult) }}
                </textarea>
                <br>
            </div>
        </div>
    @endif


@endsection

@section('tool_footer')
    Keyword Multiplier is a free tool that generates combinations of the word written in the
    text boxes for different match operators.
@endsection