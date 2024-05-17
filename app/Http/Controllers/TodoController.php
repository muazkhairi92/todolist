<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $todos = $request->session()->get('todos', []);

        return view('todo', compact('todos'));    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
                $todos = $request->session()->get('todos', []);
        
                array_unshift($todos, $request->input('list'));
        
                $request->session()->put('todos', $todos);
        
                return redirect()->route('todo.index');
    }

}
