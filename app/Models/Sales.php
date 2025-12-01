<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'name',
        'date',
        'quantity',
        'price'
    ];

    protected function casts(): array
    {
        return [
            'id' => 'string',
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
