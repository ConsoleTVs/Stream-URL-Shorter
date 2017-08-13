<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'browser', 'os', 'lang', 'ip'
    ];

    /**
     * Returns the view link.
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017   erik.cat
     * @return App\Link
     */
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
