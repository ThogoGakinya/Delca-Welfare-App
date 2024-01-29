<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
   public function membercontributions()
   {
       return $this->hasMany('App\Admin\MemberContribution');
   }
}
