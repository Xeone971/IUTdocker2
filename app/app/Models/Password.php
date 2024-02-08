<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    protected $fillable = ['site', 'login', 'password', 'user_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function passwords(){
        return $this->belongsTo(Password::class);
    }
}
