<?php

namespace App\Models;

use App\Models\Poll\PollAttendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'status',
        'user_id',
    ];

    public function options()
    {
        return $this->hasMany(PollOption::class)->with('attendences');
    }

}
