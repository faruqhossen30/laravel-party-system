<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pollaccess extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','poll_id'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
