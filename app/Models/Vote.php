<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['vote'];

    /**
     * The doctordetails that belong to the Sponsorship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctorProfiles(): BelongsToMany
    {
        return $this->belongsToMany(DoctorProfile::class);
    }
}
