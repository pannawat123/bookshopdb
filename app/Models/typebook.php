<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typebook extends Model
{
    use HasFactory;

    protected $table = 'typebook';
    
    public function book()
    {
        return $this->hasMany('App\Models\book');
    }
}
