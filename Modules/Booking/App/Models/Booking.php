<?php

namespace Modules\Booking\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Package\App\Models\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Booking\Database\factories\BookingFactory;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'package_id',
        'booking_date',
        'number_of_people',
        'info_data', 
        'info_data.firstname',
        'info_data.lastname',
        'info_data.email',
        'info_data.phone_number',
        'info_data.address',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
