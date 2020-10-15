<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $guarded = [];

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class, 'executor_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function isCustomer()
    {
        return $this->role == Role::CUSTOMER;
    }

    public function isExecutor()
    {
        return $this->role == Role::EXECUTOR;
    }
}
