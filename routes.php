<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return 'LeAPI v0.49 @ ' . now()->toDateTimeString();
});
