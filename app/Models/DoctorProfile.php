<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DoctorProfile extends Model
{
    use HasFactory;
    protected $fillable = ['cv', 'photo', 'address', 'telephone', 'services'];

    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class);
    }
}
