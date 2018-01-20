<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
	protected $table = 'user_exams';
    protected $fillable = ['exam_id', 'user_id', 'status'];
}
