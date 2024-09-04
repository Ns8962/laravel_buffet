<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'table_id',
        'name_id',
        'name_menu',
        'comment',
        'qr_cord',
        'created_at',
        'updated_at',
        'count_menu',
        'status'
    ];
}
