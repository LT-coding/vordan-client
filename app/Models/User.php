<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

//    /**
//     * Send the custom password reset notification.
//     *
//     * @param  string  $token
//     * @return void
//     */
//    public function sendPasswordResetNotification($token): void
//    {
//        $this->notify(new CustomResetPasswordNotification($token));
//    }
//
//    /**
//     * Send the custom email verification notification.
//     *
//     * @return void
//     */
//    public function sendEmailVerificationNotification(): void
//    {
//        $this->notify(new CustomVerifyEmailNotification());
//    }

    /**
     *
     * @return Attribute
     */
    protected function registered(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->created_at)->format('d.m.Y')
        );
    }

    /**
     * Check if this user is Account.
     *
     * @return Attribute
     */
    protected function isAccount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->hasRole('account')
        );
    }

    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

//    public function favorites(): HasMany
//    {
//        return $this->hasMany(WishingList::class,'user_id','id');
//    }
//
//    public function orders(): HasMany
//    {
//        return $this->hasMany(Order::class, 'user_id','id')->whereNotIn('status',[Order::CANCELED,Order::NOT_COMPLETED,Order::UNDEFINED])->orderBy('created_at', 'desc');
//    }
}
