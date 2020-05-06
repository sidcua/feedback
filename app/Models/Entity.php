<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = [
        'entity', 'under', 'status',
    ];

    protected $primaryKey = "entityID";
    protected $table = "entities";
}
