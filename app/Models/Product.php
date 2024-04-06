<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable=[
        'Pd_Id',
        'Pd_Category',
        'Pd_Name',
        'Pd_Material',
        'Pd_Price',
        'Pd_Sold',
        'Pd_Image'
    ];
   
}

