<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model {
    public $timestamps = false;
    protected $fillable = [
        'user_id','email','password','apikey', 'nisn'
    ];

    protected $hidden =['remember_token','password']; 
    public static $rules = [
        // Validation rules
        "email" => "required",
        "password" => "required",
        "nisn" => "required"
    ];

    // Relationships

}
