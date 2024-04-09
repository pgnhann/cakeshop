<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Detail_Count extends Model
{
    use HasFactory;
    protected $table = 'detail_count';
    public $timestamps = false;
    protected $fillable=[
        'count'
    ];
   
}

