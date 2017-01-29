@extends('layouts.tool_view')

@section('tool_header')
    Alphabetizer - alphabetically sort given text
@endsection

@section('tool_body')
    <div class="text-center row">
        <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="comments" name="comments"
                                          rows=10 placeholder="Paste your text to be sorted here."></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="myRadio col-xs-5 col-xs-offset-1 col-md-4 col-md-offset-3">
            <input class="myRadio" type="radio" name="ordertype" value="a"
                   onclick="sortString()" checked>Ascending
        </div>
        <div class="myRadio col-xs-6 col-md-4">
            <input class="myRadio" type="radio" name="ordertype" value="d"
                   onclick="sortString()">Descending
        </div>
    </div>
    <div class="row">
        <div class="myRadio col-xs-5 col-xs-offset-1 col-md-4 col-md-offset-3">
            <input class="myRadio" type="radio" name="ordertype2" value="w"
                   onclick="sortString()" checked>Word
            Ordering
        </div>
        <div class="myRadio col-xs-6 col-md-4">
            <input class="myRadio" type="radio" name="ordertype2" value="l"
                   onclick="sortString()">Line Ordering
        </div>
    </div>
    <br>
    <div class="text-center row" style="margin-bottom: 5vh;">
        <div class="col-md-10 col-md-offset-1">
            <button class="btn btn-primary" type="submit" id="gonder">Alphabetize!</button>
            <p id="variable">These are your alphabetized words!</p>
            <textarea class="form-control" id="words" name="words"
                      rows=10 cols=100 placeholder="Your sorted text will appear here."></textarea>
        </div>
    </div>
@endsection

@section('tool_footer')
    Alphabetizer is a free tool that sorts given strings line by line or word by word.
@endsection

@section('script')
    <script>
        function seperatorWords(text) {
            return text.split(/[\s,]+/);
        }
        function seperatorLines(text) {
            return text.split('\n');
        }

        $('#gonder').click(function (a) {
            a.preventDefault();
            sortString();
        });

        function sortString() {
            var order = document.querySelector('input[name="ordertype"]:checked').value;
            var wordsOrLines = document.querySelector('input[name="ordertype2"]:checked').value;
            var input = $('#comments').val();
            if (wordsOrLines == 'w') {
                var strArray = seperatorWords(input);
            } else {
                var strArray = seperatorLines(input);
            }

            strArray = strArray.sort(function (valueA, valueB) {
                var valueALowerCase = valueA.toLowerCase();
                var valueBLowerCase = valueB.toLowerCase();

                if (valueALowerCase < valueBLowerCase) {
                    return -1;
                } else if (valueALowerCase > valueBLowerCase) {
                    return 1;
                } else { //valueALowerCase === valueBLowerCase
                    if (valueA < valueB) {
                        return -1;
                    } else if (valueA > valueB) {
                        return 1;
                    } else {
                        return 0;
                    }
                }
            });
            if (order == 'd') {
                strArray = strArray.reverse();
            }
            var length = strArray.length;
            strArray = strArray.join('\n');
            $("#words").val(strArray)
            $("#variable").html(length + " words have been alphabetized!");
        }
    </script>
@endsection
