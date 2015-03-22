<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model {

    protected $guarded = [];

    protected $table = 'notes';

    public function notebooks()
    {
        return $this->belongsTo('App\Notebook');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
