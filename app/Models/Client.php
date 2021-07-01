<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'client', 'office', 'sex', 'type', 'institution', 'transaction', 'service', 'responsiveness', 'reliability', 'access', 'communication', 'cost', 'integrity', 'assurance', 'outcome', 
    ];

    protected $primaryKey = "clientID";
    protected $table = "clients";
}
