<?php

namespace App\Models\Poll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollAttendance extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'poll_id', 'poll_option_id', 'status'];
}
