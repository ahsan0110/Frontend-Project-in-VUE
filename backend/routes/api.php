<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\PageController;
use App\Http\Controllers\MetaTagController;
use App\Http\Controllers\PageMetaController;
use App\Http\Controllers\AuthController;


Route::apiResource('pages', PageController::class);

Route::get('/pages/{pageId}/meta-tags', [MetaTagController::class, 'index']);
Route::post('/meta-tags', [MetaTagController::class, 'store']);
Route::put('/meta-tags/{id}', [MetaTagController::class, 'update']);
Route::delete('/meta-tags/{id}', [MetaTagController::class, 'destroy']);

Route::get('/pages-with-meta', [PageMetaController::class, 'index']);

Route::post('/admin/login', [AuthController::class, 'login']);

// Protected admin routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/logout', [AuthController::class, 'logout']);

    Route::get('/admin/pages', function(Request $request) {
        $user = $request->user();
        if (!$user->is_admin) return response()->json(['message' => 'Unauthorized'], 403);

        return \App\Models\Page::all();
    });
});