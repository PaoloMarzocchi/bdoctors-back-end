<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class DoctorProfile extends Model
{
    use HasFactory;
    protected $fillable = ['cv', 'photo', 'address', 'telephone', 'services', 'user_id'];

    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
