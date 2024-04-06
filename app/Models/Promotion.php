<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $fillable=[
        'Prm_Id',
        'Prm_Name',
        'Prm_Desc',
        'Prm_Disc',
        'Prm_StDate',
        'Prm_EnDate',
        'Prm_ReLated'
    ];
    
}

