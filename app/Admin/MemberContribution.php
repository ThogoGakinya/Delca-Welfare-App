<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MemberContribution extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
