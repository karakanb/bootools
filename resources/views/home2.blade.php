<html>
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Best Alphabetizer Ever! - Online Alphabetical Order Tool</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <style type="text/css" media="all">

        @media (min-width: 768px) {
            .desktop-only {
                display: block !important;
            }
        }

        @media (max-width: 768px) {
            .mobile-only {
                display: block !important;
            }

            .desktop-only {
                display: none !important;
            }
        }

        .sol2, .sag2 {
            float: left;
            width: 20%

        }

        .orta {

        }

        .myRadio {
            padding: 0.15em 0.3em;
            border-radius: 4px;
            display: inline-block;
            color: #D3D0D3;
            margin-bottom: 0;
        }

        .myButton {
            width: 8em;
            height: 2em;
            -moz-box-shadow: inset 0px 39px 0px -24px #0C9A4E;
            -webkit-box-shadow: inset 0px 39px 0px -24px #0C9A4E;
            box-shadow: inset 0px 39px 0px -24px #0C9A4E;
            background-color: #0C9A4E;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            border: 4px solid #0C9A4E;
            display: inline-block;
            cursor: pointer;
            color: #D3D0D3;
            font-family: Calibri;
            font-weight: bold;
            font-size: 30px;
            padding: 6px 15px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #0C9A4E;
        }

        .myButton:hover {
            background-color: #0C9A4E;
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }

        textarea {
            margin: 0 5% 0 5%;
            width: 70%;
            height: 30%;
            background-color: #FFFFFF;
            color: #423543;
        }

        #yazi {
            display: inline-block;
            font-size: 45px;
        }

        #header {
            padding-top: 2%;
        }

        .sol {
            display: inline-block;
            left: 0;
            width: 40%;
        }

        .sag {
            display: inline-block;
        --> right: 0;
            width: 60%;
        }

        #myfoot {
            margin-top: 10px;
            font-size: 12px;

        }
    </style>
</head>

<body>
<div id="header">
    <img src="images/alphabetizer_logo_disi.png" alt="Mail Extractor" style="width:50%">
    <br/>
    <p>Paste your words into the text box and get them alphabetically sorted!</p>
    <br>
    <div>
        <form style="margin:0">
            <textarea id="comments" name="comments" rows=10 cols=50></textarea>
        </form>
        <div style="margin:1em" id="align">
            <form>
                <div class="myRadio">
                    <input class="myRadio" type="radio" name="ordertype" value="a" onclick="sortString()" checked>Ascending
                </div>
                <div class="myRadio">
                    <input class="myRadio" type="radio" name="ordertype" value="d" onclick="sortString()">Descending
                </div>
            </form>
            <form>
                <div class="myRadio">
                    <input class="myRadio" type="radio" name="ordertype2" value="w" onclick="sortString()" checked>Word
                    Ordering
                </div>
                <div class="myRadio">
                    <input class="myRadio" type="radio" name="ordertype2" value="l" onclick="sortString()">Line Ordering
                </div>
            </form>
            <button class="myButton" type="submit" id="gonder">Alphabetize!</button>
        </div>
        <p id="variable">These are your alphabetized words!</p>
        <br/>
        <form>
            <textarea id="words" name="words" rows=10 cols=50></textarea>
        </form>
        <div id="myfoot">

            <p>Alphabetizer Tool is a tool that you can parse and alphabetize your words easily.<br/> Paste your
                plain text and download all of your alphabetized words as listed free. </p>
            <br/>
            <br/>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]>
<script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
</body>
</html>