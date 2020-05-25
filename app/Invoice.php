<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }
    public function invoicedetails()
    {
        return $this->hasMany('App\Invoicedetail');
    }
}
