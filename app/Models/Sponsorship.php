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

    public function timeRemaining()
    {
        $createdAt = $this->created_at; // Assume che created_at sia un oggetto Carbon

        // Calcola la data di scadenza aggiungendo le ore di durata della sponsorship
        $expiryDate = $createdAt->copy()->addHours($this->period);

        // Calcola il tempo rimanente
        $diff = $expiryDate->diff(Carbon::now());

        return [
            'hours' => $diff->h,
            'minutes' => $diff->i,
            'seconds' => $diff->s,
            'total_seconds' => $expiryDate->diffInSeconds(Carbon::now())
        ];
    }
}


/* 

## CUMULATIVE TIME ##

- When an User add one more Sponsorship , in pivot-table (doctor_profile_sponsorship) the column "expirationData" will have added the time of the selected sponsorship (ex. "2005-07-18 00:00:00" + 24 hours)

## PAYMENT ##

- Using the library/framework Braintree, select the payment method, insert and test fake card to pay the selected Sponsorship

*/