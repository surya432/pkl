<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class thn_ajarans extends Model {
    public $timestamps = false;
    protected $table='thn_ajarans';
    protected $fillable = ['thn_ajaran','status'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
