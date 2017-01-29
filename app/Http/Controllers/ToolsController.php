<?php

namespace App\Http\Controllers;

class ToolsController extends Controller {
    public function Alphabetizer(){
        return view('tools.alphabetizer');
    }

    public function MailExtractor(){
        return view('tools.mail-extractor');
    }

    public function WordCounter(){
        return view('tools.word-counter');
    }

    public function KeywordMultiplier() {

    }
}
