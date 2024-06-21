<?php

namespace App\Models;

use App\Enums\Country;
use App\Enums\State;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountAddress extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function fullAddress(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->address . '<br> ' . $this->city . ', ' . $this->state . ' ' . $this->zip . ', ' . $this->country);
    }
}
