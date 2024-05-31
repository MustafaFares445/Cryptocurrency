<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
      'hash',
      'previous_hash',
      'data',
      'block_id',
      'miner_id',
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function miner()
    {
        return $this->belongsTo(Miner::class);
    }
}
