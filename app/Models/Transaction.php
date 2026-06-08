<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'masuk' => 'datetime',
        'keluar' => 'datetime',
    ];

    public function location() : BelongsTo {
        return $this->belongsTo(Location::class, 'id_lokasi');
    }
    public function vehicleType() : BelongsTo {
        return $this->belongsTo(VehicleType::class, 'id_jenis');
    }
}
