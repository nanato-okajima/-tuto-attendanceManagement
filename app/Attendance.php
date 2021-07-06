<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'name',
        'email',
        'body',
        'flagged_at',
        'updated_at',
    ];

    /**
     * [QueryScope] 通報済みユーザの除外
     *
     * @param $query
     * @return mixed
     */
    public function scopeIgnoreFlagged($query)
    {
        return $query->where('flagged_at', null);
    }
}
