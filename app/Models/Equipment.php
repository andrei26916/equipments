<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'type_id', 'sn'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function type()
    {
        return $this->belongsTo(EquipmentType::class);
    }
}
