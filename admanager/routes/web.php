<?php

use App\Http\Controllers\EntriesController;
use App\Http\Controllers\printPdf;
use App\Http\Livewire\Admin\AdminIndex;
use App\Models\Alert;

use Illuminate\Support\Facades\Route;
use MattDaneshvar\Survey\Models\Survey;

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
    return view('auth.login');
});

Route::middleware(['auth','admin'])->prefix('admin')->as('admin.')->group(function() {
    // Route::get('/',AdminIndex::class)->name('index');
    Route::get('/user',\App\Http\Livewire\Admin\User\UserIndex::class)->name('user.index')->can('viewAny', \App\Models\User::class);
    Route::get('/roles',\App\Http\Livewire\Admin\Role\RoleIndex::class)->name('role.index')->can('viewAny', \App\Models\Role::class);
    Route::get('/media',\App\Http\Livewire\Admin\Menu\MenuIndex::class)->name('menu.index')->can('viewAny', \App\Models\Menu::class);
    Route::get('/clients',\App\Http\Livewire\Admin\Client\ClientIndex::class)->name('client.index')->can('viewAny', \App\Models\Client::class);
    Route::get('/campagnes',\App\Http\Livewire\Admin\Campagne\CapmagneIndex::class)->name('campagne.index')->can('viewAny', \App\Models\Campagne::class);
    Route::get('/bannieres',\App\Http\Livewire\Admin\Banniere\BanniereIndex::class)->name('banniere.index')->can('viewAny', \App\Models\Banniere::class);
    Route::get('/printPDF/{itemId}', [printPdf::class, 'printPdf'])->name('printPDF');

});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
