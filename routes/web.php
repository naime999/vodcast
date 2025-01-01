<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return redirect()->route('login');
});
Auth::routes(['register' => false, 'verify' => true]);


// ---- Frontend Pages
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/vodcast', [App\Http\Controllers\Frontend\VodcastController::class, 'index'])->name('vodcast');
Route::get('/categories', [App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('categories');
Route::get('/search', [App\Http\Controllers\Frontend\SearchController::class, 'index'])->name('search');
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');




// User
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [App\Http\Controllers\User\UserController::class, 'index'])->name('index');

    // ---- Content
    Route::get('/content', [App\Http\Controllers\User\ContentController::class, 'index'])->name('content');
    Route::get('/content/create', [App\Http\Controllers\User\ContentController::class, 'create'])->name('content.create');
    Route::post('/content/store', [App\Http\Controllers\User\ContentController::class, 'store'])->name('content.store');
    Route::get('/content/get', [App\Http\Controllers\User\ContentController::class, 'getData'])->name('content.get');
    Route::get('/content/edit/{id}', [App\Http\Controllers\User\ContentController::class, 'edit'])->name('content.edit');
    Route::post('/content/update', [App\Http\Controllers\User\ContentController::class, 'update'])->name('content.update');
    Route::post('/content/update/individual', [App\Http\Controllers\User\ContentController::class, 'updateIndividual'])->name('content.update.individual');
    Route::get('/content/delete/{id}', [App\Http\Controllers\User\ContentController::class, 'delete'])->name('content.delete');

    // ---- Content Playlist
    Route::get('/content/playlist', [App\Http\Controllers\User\ContentPlaylistController::class, 'index'])->name('content.playlist');
    Route::get('/content/playlist/get', [App\Http\Controllers\User\ContentPlaylistController::class, 'getData'])->name('content.playlist.get');
    Route::post('/content/playlist/store', [App\Http\Controllers\User\ContentPlaylistController::class, 'store'])->name('content.playlist.create');
    Route::post('/content/playlist/edit', [App\Http\Controllers\User\ContentPlaylistController::class, 'edit'])->name('content.playlist.edit');
    Route::post('/content/playlist/update', [App\Http\Controllers\User\ContentPlaylistController::class, 'update'])->name('content.playlist.update');
    Route::post('/content/playlist/update/individual', [App\Http\Controllers\User\ContentPlaylistController::class, 'updateIndividual'])->name('content.playlist.update.individual');
    Route::post('/content/playlist/delete', [App\Http\Controllers\User\ContentPlaylistController::class, 'delete'])->name('content.playlist.delete');
    Route::post('/playlist/add/video', [App\Http\Controllers\User\ContentPlaylistController::class, 'addVideo'])->name('playlist.add.video');
    Route::post('/content/delete/video', [App\Http\Controllers\User\ContentPlaylistController::class, 'deleteVideo'])->name('playlist.video.delete');

    // ---- Youtube Playlist
    Route::get('/youtube/playlist', [App\Http\Controllers\User\YoutubePlaylistController::class, 'index'])->name('youtube.playlist');
    Route::get('/youtube/playlist/get', [App\Http\Controllers\User\YoutubePlaylistController::class, 'getData'])->name('youtube.playlist.get');
    Route::post('/youtube/playlist/store', [App\Http\Controllers\User\YoutubePlaylistController::class, 'store'])->name('youtube.playlist.store');
    Route::post('/youtube/playlist/visibility', [App\Http\Controllers\User\YoutubePlaylistController::class, 'visibility'])->name('youtube.playlist.visibility');
    Route::post('/youtube/playlist/edit', [App\Http\Controllers\User\YoutubePlaylistController::class, 'edit'])->name('youtube.playlist.edit');
    Route::post('/youtube/playlist/update', [App\Http\Controllers\User\YoutubePlaylistController::class, 'update'])->name('youtube.playlist.update');
    Route::post('/youtube/playlist/delete', [App\Http\Controllers\User\YoutubePlaylistController::class, 'delete'])->name('youtube.playlist.delete');


    Route::post('/youtube/get', [YoutubeController::class, 'get'])->name('youtube.get');
    Route::post('/youtube/data', [YoutubeController::class, 'data'])->name('youtube.data');
    Route::post('/youtube/playlist/data', [YoutubeController::class, 'playlistData'])->name('youtube.playlist.data');
    Route::post('/youtube/player', [YoutubeController::class, 'playerData'])->name('youtube.player.data');

});

// Admin
Route::middleware('auth')->prefix('super-admin')->name('super-admin.')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [App\Http\Controllers\Admin\AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [App\Http\Controllers\Admin\AdminController::class, 'updateStatus'])->name('status');

    // Roles
    Route::resource('roles', App\Http\Controllers\RolesController::class);
    // Permissions
    Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
    // Profile Routes
    Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
        Route::get('/', [App\Http\Controllers\Admin\ProfileController::class, 'getProfile'])->name('detail');
        Route::post('/update', [App\Http\Controllers\Admin\ProfileController::class, 'updateProfile'])->name('update');
        Route::post('/change-password', [App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('change-password');
    });

    // // ------------- Client Routes
    // Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    // Route::get('/clients/get', [ClientController::class, 'getClients'])->name('clients.get');
    // Route::post('/client/create', [ClientController::class, 'create'])->name('client.create');
    // Route::get('/client/get', [ClientController::class, 'getClient'])->name('client.get');
    // Route::post('/client/update', [ClientController::class, 'updateClient'])->name('client.update');
    // Route::post('/client/delete', [ClientController::class, 'deleteClient'])->name('client.delete');

    // // ------------- Proposal Routes
    // Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals');
    // Route::get('/proposals/get', [ProposalController::class, 'getData'])->name('proposals.get');
    // Route::get('/section/get', [ProposalController::class, 'getSection'])->name('section.get');
    // Route::post('/section/add', [ProposalController::class, 'addSection'])->name('section.add');
    // Route::post('/section/update', [ProposalController::class, 'updateSection'])->name('section.update');
    // Route::post('/section/delete', [ProposalController::class, 'deleteSection'])->name('section.delete');
    // Route::post('/signature/get', [ProposalController::class, 'getSignature'])->name('signature.get');
    // Route::post('/signature/save', [ProposalController::class, 'saveSignature'])->name('signature.save');
    // Route::post('/proposal/create', [ProposalController::class, 'create'])->name('proposal.create');
    // Route::get('/proposal/show/{slug}', [ProposalController::class, 'showProposal'])->name('proposal.show');
    // Route::get('/proposal/load/{slug}', [ProposalController::class, 'loadData'])->name('proposal.load');
    // Route::post('/proposal/update', [ProposalController::class, 'updateData'])->name('proposal.update');
    // Route::post('/proposal/delete', [ProposalController::class, 'deleteData'])->name('proposal.delete');
    // Route::post('/proposal/send', [ProposalController::class, 'sendProposal'])->name('proposal.send');
    // Route::post('/proposal/save/temp', [ProposalController::class, 'saveTempProposal'])->name('proposal.save.template');

    // // ------------- Template
    // Route::get('/templates', [TemplateController::class, 'index'])->name('template');
    // Route::post('/templates/get', [TemplateController::class, 'getTemplates'])->name('template.get');
    // Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    // Route::get('/categories/get', [CategoryController::class, 'getData'])->name('categories.get');
    // Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
    // Route::get('/category/get', [CategoryController::class, 'getCategory'])->name('category.get');
    // Route::post('/category/update', [CategoryController::class, 'updateCategory'])->name('category.update');
    // Route::post('/category/delete', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    // Route::post('/proposal/duplicate', [TemplateController::class, 'duplicate'])->name('proposal.duplicate');


    Route::get('/import-users', [App\Http\Controllers\Admin\AdminController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [App\Http\Controllers\Admin\AdminController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [App\Http\Controllers\Admin\AdminController::class, 'export'])->name('export');

    // send email
    Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');

});

