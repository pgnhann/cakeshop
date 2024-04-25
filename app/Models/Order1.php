<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Order1 extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = false;
    protected $fillable=[
        'Order_Id',
        'Total',
        'Cus_Name',
        'Cus_Phone',
        'Staff_Id',
        'Recipient_Name',
        'Recipient_Phone',
        'Recipient_Email',
        'Recipient_Province_City',
        'Recipient_District',
        'Recipient_Ward',
        'Recipient_Address',
        'Note',
        'Create_Date',
        'Payment_Code',
        'Is_Paid',
        'Is_Delivered'
    ];
   
}

