<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use App\Models\DoctorProfile;
use App\Models\Message;
use App\Models\Review;
use App\Models\Vote;
use App\Http\Requests\StoreStatisticRequest;
use App\Http\Requests\UpdateStatisticRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Conteggio dei voti per tipo (da 1 a 5)
        $user = Auth::user();
        $doctorProfile = $user->doctorProfile;
        $votes = $user->doctorProfile->votes;

        $voteCounts = [0, 0, 0, 0, 0];

        foreach ($votes as $vote) {
            $voteCounts[$vote->vote - 1]++;
        }

        // Inizializza Carbon per il calcolo dei mesi
        $currentDate = Carbon::now()->subYear();
        $endDate = Carbon::now();

        // Recupera i voti ricevuti durante l'ultimo anno
        $doctorProfile = DoctorProfile::find($doctorProfile->id);

        $votes = $doctorProfile->votes()
            ->wherePivot('created_at', '>=', Carbon::now()->subYear())
            ->get();
        // Conteggio dei voti per mese
        $votesCounts = [];

        while ($currentDate <= $endDate) {
            // Utilizza il formato 'Y-m' per rappresentare il mese nel formato desiderato
            $votesCounts[$currentDate->format('Y-m')] = 0;
            $currentDate->addMonth(); // Avanza al mese successivo
        }

        foreach ($votes as $vote) {
            $voteMonthYear = Carbon::parse($vote->pivot->created_at)->format('Y-m');
            if (isset($votesCounts[$voteMonthYear])) {
                $votesCounts[$voteMonthYear]++;
            }
        }
        // Ordina l'array per chiave (mese/anno) per avere i dati in ordine cronologico
        ksort($votesCounts);

        // Prepara i dati per il grafico a colonne
        $voteLabels = array_keys($votesCounts);
        $voteData = array_values($votesCounts);

        $user = Auth::user();
        $doctorProfile = DoctorProfile::where('user_id', $user->id)->first();

        if (!$doctorProfile) {
            abort(404, 'Doctor profile not found');
        }

        // Inizializza Carbon per il calcolo dei mesi
        $currentDate = Carbon::now()->subYear();
        $endDate = Carbon::now();

        // Recupera i messaggi ricevuti durante l'ultimo anno
        $messages = Message::where('doctor_profile_id', $doctorProfile->id)
            ->where('created_at', '>=', Carbon::now()->subYear())
            ->get();

        // Recupera le recensioni ricevute durante l'ultimo anno
        $reviews = Review::where('doctor_profile_id', $doctorProfile->id)
            ->where('created_at', '>=', Carbon::now()->subYear())
            ->get();

        // Inizializza un array per conteggiare i messaggi per mese
        $messageCounts = [];

        // Inizializza un array per conteggiare le recensioni per mese
        $reviewCounts = [];

        while ($currentDate <= $endDate) {
            // Utilizza il formato 'Y-m' per rappresentare il mese nel formato desiderato
            $messageCounts[$currentDate->format('Y-m')] = 0;
            $reviewCounts[$currentDate->format('Y-m')] = 0;
            $currentDate->addMonth(); // Avanza al mese successivo
        }

        // Conta i messaggi per mese
        foreach ($messages as $message) {
            $messageMonthYear = Carbon::parse($message->created_at)->format('Y-m');
            if (isset($messageCounts[$messageMonthYear])) {
                $messageCounts[$messageMonthYear]++;
            }
        }

        // Conta le recensioni per mese
        foreach ($reviews as $review) {
            $reviewMonthYear = Carbon::parse($review->created_at)->format('Y-m');
            if (isset($reviewCounts[$reviewMonthYear])) {
                $reviewCounts[$reviewMonthYear]++;
            }
        }

        // Ordina l'array per chiave (mese/anno) per avere i dati in ordine cronologico
        ksort($messageCounts);

        // Ordina l'array per chiave (mese/anno) per avere i dati in ordine cronologico
        ksort($reviewCounts);

        // Prepara i dati per il grafico a colonne
        $messageLabels = array_keys($messageCounts);
        $messageData = array_values($messageCounts);

        // Prepara i dati per il grafico a colonne
        $reviewLabels = array_keys($reviewCounts);
        $reviewData = array_values($reviewCounts);

        return view('admin.statistics.index', compact('votes', 'doctorProfile', 'voteCounts', 'voteLabels', 'voteData', 'messageLabels', 'messageData', 'reviewLabels', 'reviewData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatisticRequest $request, Statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        //
    }
}
