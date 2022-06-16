<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','content'];

    public static $rules = array(
        'content' => 'required|max:20'
    );

    public function user(){ 
        return $this->belongsTo('App\Models\User');
    }
}
