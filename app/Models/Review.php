<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use DateTime;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['review_text', 'first_name', 'last_name', 'email', 'doctor_profile_id'];


    public function doctorProfile(): BelongsTo
    {
        return $this->belongsTo(DoctorProfile::class);
    }

    function formattedDate($date)
    {
        // Creare un oggetto DateTime
        $dateObject = new DateTime($date);

        // Mappatura dei mesi
        $monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // Estrarre il giorno, il mese e l'anno
        $day = $dateObject->format('d');
        $month = $monthNames[$dateObject->format('n') - 1];
        $year = $dateObject->format('Y');

        // Cambiare il formato della data in DD-mese-AAAA
        $formattedDate = "$day $month $year";

        // Restituire il risultato
        return $formattedDate;
    }

    function formattedDateWithHour($date)
    {
        // Creare un oggetto DateTime
        $dateObject = new DateTime($date);
        // Mappatura dei mesi
        $monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        // Formattazione della data
        $day = $dateObject->format('d');
        $month = $monthNames[$dateObject->format('n') - 1];
        $year = $dateObject->format('Y');
        $hour = $dateObject->format('H:i');
        // Cambiare il formato della data in DD-mese-AAAA
        $formattedDate = "$day $month $year $hour";
        // Restituire il risultato
        return $formattedDate;
    }
}
