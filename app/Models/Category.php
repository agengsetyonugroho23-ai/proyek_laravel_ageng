<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['nama'];
    public function incomingLetters(): HasMany
    {
        return $this->hashMany(IncomingLetter::class);
    }
    public function outcomingLetters(): HasMany
    {
        return $this->hashMany(OutcomingLetter::class);
    }
}