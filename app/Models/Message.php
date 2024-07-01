<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_profile_id', 'sender_first_name', 'sender_last_name', 'email', 'message_text',];



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
