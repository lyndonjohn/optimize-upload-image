<?php

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', function (Request $request) {
    $request->validate([
        'photo' => 'required|file|image|mimes:jpg,jpeg,png'
    ]);

    // rename photo
    $photo = Str::random(12) . '.jpg';

    // save photo
    Image::make($request->photo)->resize(500, 500)->save('uploads/photos/' . $photo);

    // save photo's name to database
    Photo::create([
        'photo' => $photo
    ]);

    return back()->with('message', 'success!');
});
