<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'amount',
      'time',
      'order_id',
      'user_platform_id',
      'block1_id',
      'block2_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function userPlatform()
    {
        return $this->belongsTo(UserPlatform::class);
    }

    public function firstBlock()
    {
        return $this->belongsTo(Block::class , 'block1_id');
    }

    public function SecondBlock()
    {
        return $this->belongsTo(Block::class , 'block2_id');
    }
}
