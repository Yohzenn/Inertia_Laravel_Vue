<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(2);
    return Inertia::render('Home');
})->name('home');

/* Route::get('/about', function () {
    return inertia('About', ['user' => 'Mike']);
});  Pareil en dessous */

Route::inertia('/about', 'About', [ 'user' => 'Mike'])->name('about');
