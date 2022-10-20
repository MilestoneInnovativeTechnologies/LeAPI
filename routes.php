<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\Milestone\LeAPI\Controllers\APIController::class,'index']);
/*Route::get('/',function(){
    return 'LeAPI v0.49 @ ' . now()->toDateTimeString();
});*/
