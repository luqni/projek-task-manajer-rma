<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'card_id',
        'is_done',
        'order_key'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
