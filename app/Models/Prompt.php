<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    protected $fillable = ['user_id', 'content', 'format','is_delete'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
