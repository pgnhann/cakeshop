<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'phone';

    protected $fillable = [
        'name',
        'phone',
        'sex',
        'date',
        'email',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'phone', 'phone');
    }
}
