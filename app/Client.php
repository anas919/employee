<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function media(){
        return $this->belongsTo('App\Media');
    }
    public function avatar(){
        return  $this->media ? $this->media->reference : substr($this->name, 0, 2) ;
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
}
