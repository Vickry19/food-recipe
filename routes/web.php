<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return redirect('/recipes');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {

    if (
        $request->email == 'admin@gmail.com' &&
        $request->password == 'admin123'
    ) {

        Session::put('admin', true);

        return redirect('/admin');
    }

    return back()->with('error', 'Email atau password salah');
});

Route::get('/logout', function () {

    Session::forget('admin');

    return redirect('/');

});

Route::get('/admin',
    [RecipeController::class, 'admin'])
    ->middleware('admin')
    ->name('recipes.admin');

Route::resource('recipes', RecipeController::class);