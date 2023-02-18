<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $guarded = ['roles'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function stars()
    {
        return $this->belongsToMany(Star::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }
}