<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Todocontroller extends Controller
{
    public function index()
    {
        $items = Todolist::all();
        $user = auth()->user();
        return view('index', compact('items', 'user'));
    }
    public function create(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $todo = new Todolist;
        $todo->content = $request->content;
        $todo->user_id= auth()->user()->id;
        $todo->save();
        return redirect('/todo');
    }
    public function update(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id' ,$request->id)->update($form);
        return redirect('/todo');
    }
    public function delete(Request $request)
    {
        Todolist::find($_POST['id'])->delete();
        return redirect('/todo');
    }

}
