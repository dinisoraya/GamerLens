<?php

use App\Models\Gejala;
use App\Models\Kecanduan;

// use PDF;
use App\Models\BasisAturan;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RuleShowController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecanduanController;
use App\Http\Controllers\BasisAturanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard/diagnosa', [DiagnosaController::class, 'index'])->middleware('auth');
// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/riwayat', RiwayatController::class)->middleware('auth');
Route::resource('/dashboard/kecanduan', KecanduanController::class)->middleware('admin');
Route::resource('/dashboard/gejala', GejalaController::class)->middleware('admin');
Route::resource('/dashboard/basis-aturan', BasisAturanController::class)->middleware('admin');
Route::resource('/dashboard/pengguna', PenggunaController::class)->middleware('admin');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/signup', [LoginController::class, 'signup']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('dashboard/basis-aturan/data/{kecanduan:id}', [RuleShowController::class, 'index']);

Route::post('/kirimcf', [DiagnosaController::class, 'cfclean']);
Route::get('/dashboard/hasil', function () {
    return view('dashboard.diagnosa.hasil', [

    ]);
})->middleware('auth');

Route::get('/dashboard/diagnosa2', function (BasisAturan $rule, Kecanduan $kecanduan, Gejala $gejala) {
    return view('dashboard.user.index', [
        'rules' => $rule->orderBy('gejala_id')->get(),
        'kecanduan' => $kecanduan->get(),
        'gejala' => $gejala->orderBy('id', 'asc')->get(),
        // 'gejala' => $gejala->inRandomOrder(10)->get(),
    ]);
})->middleware('auth');
// Route::get('/dashboard/cetak', function (BasisAturan $rule, Kecanduan $kecanduan, Gejala $gejala) {
//     return view('dashboard.user.cetak', [
//         'rules' => $rule->orderBy('gejala_id')->get(),
//         'kecanduan' => $kecanduan->get(),
//         'gejala' => $gejala->orderBy('id', 'asc')->get(),
//         // 'gejala' => $gejala->inRandomOrder(10)->get(),
//     ]);
// })->middleware('auth');

Route::get('/dashboard/cetak/{id}', function ($id) {
    $riwayat = RiwayatDiagnosa::with(['user', 'kecanduan'])->find($id);
    if (Auth::user()->level != 'admin') {
        if (Auth::user()->id !== $riwayat->id_pengguna) {
            return abort(403);
        }
    }
    
    return View('dashboard.user.cetak', compact('riwayat'));


})->middleware('auth');