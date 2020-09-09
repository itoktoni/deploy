<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::match(['POST', 'GET'],'/deploy', function(Request $request){
    // $githubPayload = $request->getContent();
    // $githubHash = $request->header('X-Hub-Signature');

    // $localToken = config('app.deploy_secret');
    // $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);

    // if (hash_equals($githubHash, $localHash)) {
        // $root_path = base_path();
        // $process = new Process(['git pull origin master']);
        // $process->run(function ($type, $buffer) {
        //     echo $buffer;
        // });
    // }

    exec('git pull origin master');
});
