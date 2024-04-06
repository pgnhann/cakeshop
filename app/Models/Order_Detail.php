<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable=[
        'Order_Detail_Id',
        'Order_Id',
        'Pd_Id',
        'Pd_Name',
        'Quantity',
        'Prm_Id',
        'Prm_Disc',
        'Org_Price_P',
        'AfterPrm_Price_P',
        'AfterPrm_Total',

    ];
   
}

