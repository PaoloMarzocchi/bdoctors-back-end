<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DoctorProfile extends Model
{
    use HasFactory;
    protected $fillable = ['surname', 'slug', 'cv', 'photo', 'address', 'telephone', 'services', 'user_id'];

    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The sponsorships that belong to the DoctorProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sponsorships(): BelongsToMany
    {
        return $this->belongsToMany(Sponsorship::class);
    }
}
