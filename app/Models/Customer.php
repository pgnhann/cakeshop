<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $primaryKey = 'phone';

    protected $fillable = [
        'name',
        'phone',
        'sex',
        'date',
        'email',
        'address',
        'district',
        'province_city',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'phone', 'phone');
    }
}
