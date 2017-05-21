<?php

namespace Tikematic\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'language', 'password', 'superuser',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns user's full name.
     *
     * @return string
     */
    public function full_name() {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Password hashing mutator.
     *
     * @return void
     */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get events the user is associated with.
     *
     * @return belongsToMany
     */
    public function events() {
        return $this->belongsToMany('Tikematic\Models\Event');
    }

    /**
     * Get user's tickets.
     *
     * @return belongsToMany
     */
    public function tickets() {
        return $this->belongsToMany('Tikematic\Models\Ticket', 'user_ticket');
    }

    /**
     * Get user's transactions.
     *
     * @return belongsToMany
     */
    public function transactions() {
        return $this->hasMany('Tikematic\Models\Transaction');
    }
}