<?php

namespace App;

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
        'name', 'email', 'password',
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
     * Returns the user links.
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017   erik.cat
     * @return Collection
     */
    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
