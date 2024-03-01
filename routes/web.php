<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Contact;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionCOn;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\Admin\AdminIndex;
use App\Http\Livewire\Admin\Alert\AlertIndex;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use MattDaneshvar\Survey\Models\Survey;
use Jenssegers\Agent\Agent;
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




Route::middleware(['auth','admin'])->prefix('admin')->as('admin.')->group(function() {
    // Route::get('/',AdminIndex::class);
    Route::get('/user',\App\Http\Livewire\Admin\User\UserIndex::class)->name('user.index')->can('viewAny', \App\Models\User::class);
    Route::get('/category',\App\Http\Livewire\Admin\Category\CategoryIndex::class)->name('category.index')->can('viewAny', \App\Models\Category::class);
    Route::get('/roles',\App\Http\Livewire\Admin\Role\RoleIndex::class)->name('role.index')->can('viewAny', \App\Models\Role::class);
    Route::get('/inscrits',\App\Http\Livewire\Admin\Inscrit\InscritIndex::class)->name('inscrit.index')->can('viewAny', \App\Models\Inscrit::class);
    Route::get('/posts',\App\Http\Livewire\Admin\Post\PostIndex::class)->name('post.index')->can('viewAny', \App\Models\Post::class);
    Route::get('/posts/create',\App\Http\Livewire\Admin\Post\PostCreate::class)->name('post.create')->can('create', \App\Models\Post::class);
    Route::get('/posts/update/{id}',\App\Http\Livewire\Admin\Post\PostUpdate::class)->name('post.update')->can('viewAny', \App\Models\Post::class);
    Route::get('/media',\App\Http\Livewire\Admin\Menu\MenuIndex::class)->name('menu.index')->can('viewAny', \App\Models\Menu::class);
    Route::get('/surveys',\App\Http\Livewire\Admin\Survey\SurveyIndex::class)->name('survey.index')->can('viewAny', Survey::class);
    Route::get('/alert',\App\Http\Livewire\Admin\Alert\AlertIndex::class)->name('alert.index')->can('viewAny', Alert::class);
    Route::get('/api-football',\App\Http\Livewire\Admin\Api\ApiIndex::class)->name('football.index');
    Route::get('/newsletter',\App\Http\Livewire\Admin\Newsletter\NewsletterIndex::class)->name('newsletter.index');
    Route::get('/BotolaPro',\App\Http\Livewire\Admin\Botola\BotolaIndex::class)->name('botolapro.index');

});
Route::get('/newsletter',[NewsletterController::class,'index'])->name('newsletter.index');
Route::get('/alert',[AlertController::class,'index'])->name('alert.index');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/contactez-nous', [Contact::class, 'index'])->name('contact.index');
Route::post('/contactez-nous', [Contact::class, 'sendEmail'])->name('contact.sendEmail');
Route::get('/inscription-newsletter', [InscriptionController::class, 'index'])->name('inscription.index');
Route::post('/inscription-newsletter', [InscriptionController::class, 'store'])->name('inscription.store');
// Route::get('/hello',[EntriesController::class,'create'])->name('entries.create');
Route::post('/sondage',[EntriesController::class,'store'])->name('entries.store');
Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'store']);
Route::get('/{category}', [CategoryController::class, 'index']);
Route::post('/search', [SearchController::class, 'index'])->name('search');





Route::prefix('sport')->group(function () {
    Route::get('/{category}/{slug}', [PostController::class, 'index']);
});

// Route::post('/banner/{id}/click', function ($id) {
//     $banner = DB::connection('second_mysql')
//         ->table('bannieres')
//         ->where('id', $id)
//         ->first();

//     DB::connection('second_mysql')
//         ->table('bannieres')
//         ->where('id', $id)
//         ->increment('nb_total_click');

//     return redirect()->away($banner->lien);
// })->name('banner.click');
// Route::post('/banner/{id}/click', function ($id) {
//     $banner = DB::connection('second_mysql')->table('bannieres')->where('id', $id)->first();

//     DB::connection('second_mysql')->table('bannieres')->where('id', $id)->increment('nb_total_click');

//     $ip_address = request()->ip();
//     $user_agent = request()->header('User-Agent');

//     $unique_click = DB::connection('second_mysql')
//         ->table('banner_unique_clicks')
//         ->where('banner_id', $id)
//         ->where('ip_address', $ip_address)
//         ->where('user_agent', $user_agent)
//         ->first();

//     if (!$unique_click) {
//         DB::connection('second_mysql')
//             ->table('banner_unique_clicks')
//             ->insert([
//                 'banner_id' => $id,
//                 'ip_address' => $ip_address,
//                 'user_agent' => $user_agent,
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);

//         DB::connection('second_mysql')
//             ->table('bannieres')
//             ->where('id', $id)
//             ->increment('nb_unique_click');
//     }

//     return redirect()->away($banner->lien);
// })->name('banner.click');
Route::post('/banner/{id}/click', function ($id) {
    $banner = DB::connection('second_mysql')->table('bannieres')->where('id', $id)->first();

    DB::connection('second_mysql')->table('bannieres')->where('id', $id)->increment('nb_total_click');

    $ip_address = request()->ip();
    $agent = new Agent();

    // Determine the device type
    $deviceType = $agent->deviceType();

    $unique_click = DB::connection('second_mysql')
        ->table('banner_unique_clicks')
        ->where('banner_id', $id)
        ->where('ip_address', $ip_address)
        ->where('user_agent', $deviceType)
        ->first();

    if (!$unique_click) {
        DB::connection('second_mysql')
            ->table('banner_unique_clicks')
            ->insert([
                'banner_id' => $id,
                'ip_address' => $ip_address,
                'user_agent' => $deviceType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::connection('second_mysql')
            ->table('bannieres')
            ->where('id', $id)
            ->increment('nb_unique_click');
    }

    return redirect()->away($banner->lien);
})->name('banner.click');
Route::post('/banner/{id}/view', function ($id) {
    $banner = DB::connection('second_mysql')->table('bannieres')->where('id', $id)->first();

    $ip_address = request()->ip();
    $agent = new Agent();

    // Determine the device type
    $deviceType = $agent->deviceType();

    $unique_view = DB::connection('second_mysql')
        ->table('banner_unique_views')
        ->where('banner_id', $id)
        ->where('ip_address', $ip_address)
        ->where('user_agent', $deviceType)
        ->first();

    if (!$unique_view) {
        DB::connection('second_mysql')
            ->table('banner_unique_views')
            ->insert([
                'banner_id' => $id,
                'ip_address' => $ip_address,
                'user_agent' => $deviceType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::connection('second_mysql')
            ->table('bannieres')
            ->where('id', $id)
            ->increment('nb_unique_vues');
    }

    DB::connection('second_mysql')
        ->table('bannieres')
        ->where('id', $id)
        ->increment('nb_total_vues');

    return response()->json(['success' => true]);
})->name('banner.view');












