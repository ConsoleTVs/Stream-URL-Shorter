<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * Masss assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'slug'
    ];

    /**
     * Returns the link user.
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017   erik.cat
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the full qualified short URL.
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017   erik.cat
     * @return string
     */
    public function shortUrl()
    {
        return route('redirect', ['slug' => $this->slug]);
    }

    /**
     * Return the link views.
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017   erik.cat
     * @return Collection
     */
    public function views()
    {
        return $this->hasMany(View::class);
    }
}
