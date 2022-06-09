<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class Todocontroller extends Controller
{
    public function index()
    {
        $items = Todolist::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $form = $request->all();
        Todolist::create($form);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id' ,$_POST['id'])->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Todolist::find($_POST['id'])->delete();
        return redirect('/');
    }

    
}
