<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    protected $fillable=[
        'country',
        'zip_code',
        'state',
        'city',
        'street_number',
        'street_name',
        'description',
        'additional_info',
        'adress_1',
        'adress_2',
        'adress_3',
        'type',
        'default',
        'deleted',
        'createdAt',
        'updatedAt'
    ];
    public function companies(){
        return $this-> hasMany()
    }
}
