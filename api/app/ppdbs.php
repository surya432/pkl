<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ppdbs extends Model {
    public $timestamps = false;

    protected $fillable = [
        'no_daftar','nisn','id_thn_ajaran','','id_minat','id_ijazah'
    ];

    protected $dates = [
        
    ];

    public static $rules = [
        // Validation rules
        'no_daftar'=> "required",
        'nisn'=> "required",
        'id_thn_ajaran'=> "required",
        'id_minat'=> "required",
        'id_ijazah'=> "required"
    ];

    // Relationships

}
