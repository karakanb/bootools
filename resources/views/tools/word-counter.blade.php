@extends('layouts.tool_view')

@section('tool_header')
    Word Counter - analyze your texts easily.
@endsection

@section('tool_body')

    <div class="text-center row">
        <div class="col-md-10 col-md-offset-1">
            <textarea class="form-control" id="comments" name="comments"
                      rows=10 placeholder="Paste your text here to extract e-mails."></textarea>
        </div>
    </div>
    <br>
    <div class="row" style="margin-bottom: 5vh;">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-center">
                <button class="btn btn-primary" type="submit" id="gonder">Extract</button>
                <p>Your analysis result will appear below!</p>
            </div>
            <table class="table table-hover table-responsive table-bordered" id="analyze-result" style="display: none;">
                <thead>
                <th>Analyzed Value</th>
                <th>Count</th>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('tool_footer')
    Word Counter is a simple tool that allows you to analyze your text, get the character, word, line and sentence counts easily.
@endsection

@section('script')
    <script>
        function seperatorWords(text) {
            return text.split(/[\s,]+/).length;
        }
        function seperatorLines(text) {
            return text.split('\n').length;
        }
        function seperatorChars(text) {
            return text.split('').length;
        }
        function seperatorSentence(text) {
            return text.replace(/([.?!])\s*(?=[A-Z])/g, "$1|").split("|").length;
        }

        $('#gonder').click(function (a) {
            a.preventDefault();
            analyzeText();
        });

        function analyzeText() {
            var input = $('#comments').val();
            var words = seperatorWords(input);
            var lines = seperatorLines(input);
            var chars = seperatorChars(input);
            var sentences = seperatorSentence(input);
            var table = document.getElementById("analyze-result");
            var tableBody = table.getElementsByTagName('tbody')[0];

            tableBody.parentNode.removeChild(tableBody);
            tableBody = document.createElement('tbody');

            var tableData = {
                "<b>Number of words</b>": words,
                "<b>Number of characters</b>": chars,
                "<b>Number of characters without space character</b>": chars - words + 1,
                "<b>Number of lines</b>": lines,
                "<b>Number of sentences</b>": sentences
            };

            Object.keys(tableData).reverse().forEach(function (key) {
                insertData(tableBody, key, tableData[key]);
            });

            table.appendChild(tableBody);
            table.style.display = "table";
        }

        function insertData(table, firstCell, secondCell) {
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = firstCell;
            cell2.innerHTML = secondCell;
        }

    </script>
@endsection
