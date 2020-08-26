<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AracMarka extends Model
{
    protected $table = 'arac_marka';
    public $timestamps = false;
    public function AracModel()
    {
         return $this->hasOne('App\AracModel','marka_id','id');
    }

}
