<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\MetaTagController;

Route::apiResource('pages', PageController::class);

Route::get('/pages/{pageId}/meta-tags', [MetaTagController::class, 'index']);
Route::post('/meta-tags', [MetaTagController::class, 'store']);
Route::put('/meta-tags/{id}', [MetaTagController::class, 'update']);
Route::delete('/meta-tags/{id}', [MetaTagController::class, 'destroy']);

