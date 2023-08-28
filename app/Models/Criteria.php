<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = ['name', 'category'];

    public function prompts()
    {
        return $this->belongsToMany(Prompt::class);
    }
    protected $table = 'criteria';
}