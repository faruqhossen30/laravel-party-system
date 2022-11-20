<?php

namespace App\Models;

use App\Models\Poll\PollAttendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use HasFactory;
    protected $fillable=[
        'poll_id',
        'user_id',
        'option',
        'count',
    ];
    public function attendences()
    {
        return $this->hasMany(PollAttendance::class,'id');
    }
}
