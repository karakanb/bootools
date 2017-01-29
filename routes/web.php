<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'HomeController@index');
$app->get('/alphabetizer', [ 'as' => 'alphabetizer', 'uses' => 'ToolsController@Alphabetizer']);
$app->get('/mail-extractor',[ 'as' => 'mail-extractor', 'uses' => 'ToolsController@MailExtractor']);
$app->get('/word-counter',[ 'as' => 'word-counter', 'uses' => 'ToolsController@WordCounter']);
$app->get('/keyword-multiplier',[ 'as' => 'keyword-multiplier', 'uses' => 'ToolsController@KeywordMultiplier']);
$app->post('/keyword-multiplier',[ 'as' => 'keyword-multiplier-post', 'uses' => 'ToolsController@PostKeywordMultiplier']);
$app->get('/url-status-checker',[ 'as' => 'url-status-checker', 'uses' => 'ToolsController@StatusChecker']);
$app->post('/url-status-checker',[ 'as' => 'url-status-checker-post', 'uses' => 'ToolsController@StatusChecker']);
