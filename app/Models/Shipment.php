<?php

namespace App\Models;

use App\Observers\ShipmentObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Shipment extends Model
{
    protected $table = 'shipment';

    use HasFactory;

    const STATUS_IN_PROGRESS = 'started';
    const STATUS_UNASSIGNED = 'unassigned';
    const STATUS_COMPLETED = 'completed';
    const STATUS_PROBLEM = 'problem';

    const ALLOWED_STATUSES = [
        self::STATUS_IN_PROGRESS,
        self::STATUS_UNASSIGNED,
        self::STATUS_COMPLETED,
        self::STATUS_PROBLEM,
    ];
    protected $fillable = [
        'title',
        'from_city',
        'from_country',
        'to_city',
        'to_country',
        'price',
        'status',
        'user_id',
        'details',
        'client_id'
    ];

    public static function booted()
    {
        Shipment::observe(ShipmentObserver::class);
    }

    public function setStatusAttribute($value)
    {
        // Proveri da li je status dozvoljen
        if (!in_array($value, self::ALLOWED_STATUSES)) {
            throw new \Exception("Invalid status value: $value");
        }

        // Ako je status validan, postavi ga
        $this->attributes['status'] = $value;
    }
    public function documents()
    {
        return $this->hasMany(ShipmentDocuments::class, 'shipment_id', 'id');
    }

    public function scopeUnassignedShipment($query)
    {
        return $query->where('status', Shipment::STATUS_UNASSIGNED);
    }
}

