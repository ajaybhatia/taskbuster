<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'name',
    	'description'
    ];

    /**
     * Belongs to User
     */
    public function user()
    {
    	$this->belongsTo(User::class);
    }
}
