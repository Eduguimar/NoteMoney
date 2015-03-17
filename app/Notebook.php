<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model {

    protected $table = 'notebooks';

    protected $guarded = [];

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}