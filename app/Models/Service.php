<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service',
    ];

    protected $primaryKey = "serviceID";
    protected $table = "services";

    public function entity() {
        return $this->belongsTo('App\Models\Entity', 'entityID', 'entityID');
    }
}
