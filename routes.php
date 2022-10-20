<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\Milestone\LeAPI\Controllers\APIController::class,'index']);
