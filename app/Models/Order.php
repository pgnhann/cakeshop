<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable=[
        'Order_Detail_Id',
        'Order_Id',
        'Pd_Id',
        'Pd_Name',
        'Quantity',
        'Prm_Id',
        'Prm_Disc',
        'Org_Price/P',
        'AfterPrm_Price/P',
        'AfterPrm_Total',

    ];
   
}

