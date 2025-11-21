<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentChange extends Model
{
    protected $fillable = [
        'entity_type',
        'entity_id',
        'action',
        'description',
    ];

    public $timestamps = true;
}
