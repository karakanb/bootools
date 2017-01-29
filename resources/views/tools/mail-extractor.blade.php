@extends('layouts.tool_view')

@section('tool_header')
    E-mail Extractor - extract e-mail addresses from any given text.
@endsection

@section('tool_body')

    <div class="text-center row">
        <div class="col-md-10 col-md-offset-1">
            <textarea class="form-control" id="comments" name="comments"
                      rows=10 placeholder="Paste your text here to extract e-mails."></textarea>
        </div>
    </div>
    <br>
    <div class="text-center row" style="margin-bottom: 5vh;">
        <div class="col-md-10 col-md-offset-1">
            <div class="checkbox">
                <label>
                    <input type="checkbox" onclick="extractEmails()" id="isUnique"> Only unique mails
                </label>
            </div>
            <button class="btn btn-primary" type="submit" id="gonder">Extract</button>
            <p id="variable">Your extracted e-mails will appear below!</p>
            <textarea class="form-control" id="emails" name="emails"
                      rows=10 cols=100 placeholder="Your extracted e-mails will appear here."></textarea>
        </div>
    </div>
@endsection

@section('tool_footer')
    Mail Extractor is a free tool that extracts mail addresses from a given mail address.
@endsection

@section('script')
    <script>
        function filterMails(text) {
            return text.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi);
        }

        $('#gonder').click(function (a) {
            a.preventDefault();
            extractEmails();
        });

        function extractEmails() {
            var emails = $('#comments').val();
            emails = filterMails(emails);

            if ($('#isUnique').is(":checked")) {
                emails = uniq(emails);
            }

            var length = emails.length;
            emails = emails.join('\n');

            $("#emails").val(emails);
            $("#variable").html(length + " e-mails have been extracted!");
        }

        function uniq(a) {
            return a.sort().filter(function (item, pos, ary) {
                return !pos || item != ary[pos - 1];
            })
        }
    </script>
@endsection
