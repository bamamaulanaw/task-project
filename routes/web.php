<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Halaman Utama
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Simpan Tugas
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Tandai Selesai (Update)
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Hapus Tugas
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
?>