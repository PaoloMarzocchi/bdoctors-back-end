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
            "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
            "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"
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
}
