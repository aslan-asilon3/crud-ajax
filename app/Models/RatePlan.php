<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatePlan extends Model
{
    use HasFactory;

    protected $table = 'rate_plans';

    public $primaryKey = 'id';

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable =
    [
        'id',
        'cancellation_id',
        'rate_name',
        'def_meal_available',
        'def_bookable',
        'def_minimum_stay',
        'base_rate',
        'extrabed_rate',

    ];

    public function room_rate_plans()
    {
        return $this->hasMany('App\Models\Room\RoomRatePlan','rate_id' ,'id' );
    }

    public function cancellations()
    {
        return $this->hasMany('App\Models\Cancellation\CancellationPolicy', 'id', 'cancellation_id');
    }

    public function types()
    {
        return $this->hasMany('App\Models\Room\Type', 'id', 'cancellation_id');
    }

    public function room_type()
    {
        return $this->belongsTo('App\Models\Room\Type', 'id','room_id');
    }
}
