<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lastActivity = $request->session()->get('last_activity');
        if ($lastActivity && Carbon::parse($lastActivity)->diffInMinutes(now()) >= 5) {
            $request->session()->forget('todos');
        }

        $request->session()->put('last_activity', now());

        $todos = $request->session()->get('todos', []);

        return view('todo', compact('todos'));
    
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
                $todos = $request->session()->get('todos', []);
        
                array_unshift($todos, $request->input('list'));
        
                $request->session()->put('todos', $todos);
                $request->session()->put('last_activity', now());
        
                return redirect()->route('todo.index');
    }

}
