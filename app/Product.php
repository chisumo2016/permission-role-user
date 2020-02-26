<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
     * The attribute that are mass assignable
     */

    /**
     * @var array
     */
    protected  $fillable =[
        'name','details'
    ];
}
