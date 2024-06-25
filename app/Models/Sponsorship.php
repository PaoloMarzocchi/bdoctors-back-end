<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;

class Sponsorship extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'period', 'price', 'slug'];

    /**
     * The doctordetails that belong to the Sponsorship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctorProfiles(): BelongsToMany
    {
        return $this->belongsToMany(DoctorProfile::class);
    }

    public function timeRemaining($startDate)
    {
        // Get the expiration date
        $expiryDate = $startDate->addHours($this->period);

        // Get the remaining time in seconds
        // $secondsRemaining = $expiryDate->diffInSeconds(Carbon::now());
        $diff = $expiryDate->diff(Carbon::now());

        // return max(0, $secondsRemaining);
        return [
            'hours' => $diff->h,
            'minutes' => $diff->i,
            'seconds' => $diff->s,
        ];
    }
}


/* 

## CUMULATIVE TIME ##

- When an User add one more Sponsorship , in pivot-table (doctor_profile_sponsorship) the column "expirationData" will have added the time of the selected sponsorship (ex. "2005-07-18 00:00:00" + 24 hours)

## PAYMENT ##

- Using the library/framework Braintree, select the payment method, insert and test fake card to pay the selected Sponsorship

*/