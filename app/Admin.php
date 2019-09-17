<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    protected $guarded = [];

    public function myrole()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function adoption()
    {
        return $this->hasMany(Adoption::class, 'id_admin');
    }

}
