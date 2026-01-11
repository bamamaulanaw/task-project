<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // 1. Tampilkan semua tugas
    public function index()
    {
        $tasks = Task::all(); // Ambil semua data
        return view('tasks.index', compact('tasks'));
    }

    // 2. Simpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        Task::create([
            'title' => $request->title
        ]);

        return back(); // Kembali ke halaman sebelumnya
    }

    // 3. Tandai tugas selesai ("Mengerjakan Tugas")
    public function update(Task $task)
    {
        $task->update([
            'is_completed' => true
        ]);

        return back();
    }

    // 4. Hapus tugas (Opsional, untuk bersih-bersih)
    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}