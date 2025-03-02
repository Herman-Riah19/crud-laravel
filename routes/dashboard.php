<?php
use App\Http\Controllers\DashbordController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashbordController::class, "index"])->name('dashboard');
    Route::post('/dashboard', [DashbordController::class, "create"])->name("post.create");
    Route::get('/dashboard/categorie', [DashbordController::class, "createCategorie"])->name('dashboard.categorie');
    Route::post('/dashboard/categorie', [DashbordController::class, "saveCategorie"])->name('categorie.create');
});