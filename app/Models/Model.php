<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Belongsto;

class Model extends EloquentModel
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'maker_id',
    ];
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function maker(): BelongsTo
    {
        return $this->belongsTo(Maker::class);
    }
}