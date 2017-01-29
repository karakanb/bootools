@extends('layouts.tool_view')

@section('tool_header')
    BooTools, free and easy-to-use advertising and SEO tools for everybody.
@endsection

@section('tool_body')
    <div class="row">
        <a href="{{ route('alphabetizer') }}">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-title">
                        <span class="card-title">Alphabetizer</span>
                    </div>
                    <div class="card-content">
                        <p>Alphabetically sort any string, either line by line or word by word, blazingly fast.</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('mail-extractor') }}">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-title">
                        <span class="card-title">Mail Extractor</span>
                    </div>
                    <div class="card-content">
                        <p>Extract mail addresses from any text, just paste what you have and let it extract.</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <a href="{{ route('word-counter') }}">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-title">
                        <span class="card-title">Word Counter</span>
                    </div>
                    <div class="card-content">
                        <p>Analyze any text by counting the characters, words, lines and sentences. Great for SEO.</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('keyword-multiplier') }}">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-title">
                        <span class="card-title">Keyword Multiplier</span>
                    </div>
                    <div class="card-content">
                        <p>Multiply sets of words and create new keywords with different query match types.</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <a href="{{ route('url-status-checker') }}">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-title">
                        <span class="card-title">HTTP Status Checker</span>
                    </div>
                    <div class="card-content">
                        <p>Check the HTTP status of any URL, with redirection URLs and export options to Excel, CSV, PDF and many others.</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <br>
@endsection

@section('tool_footer')
    BooTools is a simple service that offers free tools to digital marketers and SEO specialists.<br>
    All of the tools are built with
    <div class="small"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></div> by <a
            href="http://boosmart.com">BooSmart</a> team.
@endsection

