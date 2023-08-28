<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySet extends Model
{
    protected $fillable = ['user_id', 'name', 'criteria_ids'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function criteria()
    {
        return $this->belongsToMany(Criteria::class);
    }
}