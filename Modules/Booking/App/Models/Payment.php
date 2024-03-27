<?php

namespace Modules\Booking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Booking\Database\factories\PaymentFactory;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'package_id',
        'booking_id',
        'amount',
        'payment_status',
    ];
    
    protected static function newFactory(): PaymentFactory
    {
        //return PaymentFactory::new();
    }
}
