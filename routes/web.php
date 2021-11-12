<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\InfokotaController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [FrontendController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/download', [DownloadController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/halamanutama', [UtamaController::class, 'index']);
Route::get('/destinasi', [DestinasiController::class, 'index']);
Route::get('/infokota', [InfokotaController::class, 'index']);
Route::get('/info', [InfoController::class, 'index']);

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        "title" => "Dashboard"
    ]);
});

Route::get('/chart', function () {
    return view('chart.index');
});



//Route::get('/admin', function () {
//    return view('admin.index', [
//        "title" => "Manajemen Admin"
//    ]);
//});

//Route::get('/user', function () {
//    return view('user.index', [
//        "title" => "Manajemen User"
//   ]);
//});



Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');

Route::middleware('auth:admin')->group(function(){
    Route::get('/admin', function () {
        return view('admin.login', [
        "title" => "Manajemen Admin"
        ]);
    });
});
    


Route::get('/wisata', function () {
    return view('wisata.index', [
        "title" => "Manajemen Tempat Wisata"
    ]);
});

Route::get('/tiket', function () {
    return view('tiket.index', [
        "title" => "Manajemen Tiket"
    ]);
});

Route::get('/hotel', function () {
    return view('hotel.index', [
        "title" => "Manajemen Hotel"
    ]);
});

Route::get('/martikel', function () {
    return view('martikel.index', [
        "title" => "Manajemen Artikel"
    ]);
});

Route::get('/inputartikel', function () {
    return view('martikel.input', [
        "title" => "Input Artikel"
    ]);
});
=======



Route::group(['middleware' => ['auth:user,admin']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            "title"=>"Dashboard"
        ]);
    });
    Route::get('/admin', function () {
        return view('admin.index', [
            "title" => "Manajemen Admin"
        ]);
    });
    Route::get('/chart', function () {
        return view('chart.index', [
        ]);
    });
    Route::get('/user', function () {
        return view('user.index', [
            "title" => "Manajemen User"
        ]);
    });
    Route::get('/wisata', function () {
        return view('wisata.index', [
            "title" => "Manajemen Wisata"
        ]);
    });
    Route::get('/tiket', function () {
        return view('tiket.index', [
            "title" => "Manajemen Tiket"
        ]);
    });
    Route::get('/artikel', function () {
        return view('artikel.index', [
            "title" => "Manajemen artikel"
        ]);
    });
    Route::get('/halamanutama', [UtamaController::class, 'index']);
});

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);

// Route::get('/', function ())

Route::get('/admin','AdminController@index');
Route::get('/tiket','PemesananTiketnewController@index');
Route::get('/wisata','TempatWisataController@index');
Route::get('/artikel','ArtikelController@index');
Route::get('/user','UserDashController@index');
// Route::get('/pemesanantiket/{id}/pemesanantiket','PemesananTiketController@pemesanantiket');
//Route::get('/admins', 'AdminsController@index')->name('admins');

// // Route::get('/admins', 'AdminsController@admins');

// Route::get('/', function(){
//     return view('admin.index');
// })->name('admin.index');

//  Route::get('/admin', function () {
//      return view('admin.index', [
//          "title" => "Manajemen Admin"
//      ]);
//  });
//  Route::get('/dashboard', function () {
//     return view('dashboard.index', [
//         "title" => "Dashboard"
//     ]);
// });
// Route::get('/chart', function () {
//    return view('chart.index');
// });
//  Route::get('/user', function () {
//      return view('user.index', [
//          "title" => "Manajemen User"
//      ]);
//  });

// Route::get('/wisata', function () {
//     return view('wisata.index', [
//         "title" => "Manajemen Tempat Wisata"
//     ]);
// });
// Route::get('/tiket', function () {
//     return view('tiket.index', [
//         "title" => "Manajemen Tiket"
//     ]);
// });
// Route::get('/hotel', function () {
//     return view('hotel.index', [
//         "title" => "Manajemen Hotel"
//     ]);
// });
>>>>>>> update integrasi dashboard admin
