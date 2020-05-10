<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function members()
    {
        return $this->hasMany('App\User', 'organization_id', 'id');
    }
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'organization_id', 'id');
    }
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
