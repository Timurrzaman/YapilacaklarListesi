<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    /**
     * Zamanı geçmiş görevleri siler ve kalanları listeler.
     */
    public function index()
    {
        // Zamanı geçmiş görevleri otomatik olarak sil
        Auth::user()->tasks()->where('due_at', '<', now())->delete();

        // Sadece giriş yapmış kullanıcının kalan görevlerini listele
        $tasks = Auth::user()->tasks()->latest()->get();
        
        return view('todolist', ['tasks' => $tasks]);
    }

    /**
     * Yeni bir görevi giriş yapmış kullanıcıya atayarak kaydeder.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_title' => 'required|max:255',
            'due_at' => 'nullable|date',
        ]);

        $request->user()->tasks()->create([
            'title' => $validated['task_title'],
            'due_at' => $validated['due_at'],
        ]);

        return redirect()->route('todolist.index');
    }

    /**
     * Belirtilen görevi veritabanından siler.
     */
    public function destroy(Task $task)
    {
        // Görevin giriş yapmış kullanıcıya ait olup olmadığını kontrol et (Yetkilendirme)
        // Bu, başka bir kullanıcının sizin görevinizi silmesini engeller.
        if (Auth::id() !== $task->user_id) {
            abort(403, 'Bu işlem için yetkiniz yok.');
        }

        $task->delete();

        return redirect()->route('todolist.index');
    }
}

