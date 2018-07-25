<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class role_users extends Model {

    protected $fillable = ['user_id','role_id'];
    public $timestamps = false;
    
    protected $hidden = ['id'];
    public static $rules = [
        "user_id" => "required",
        "role_id" => "required"
    ];

    // Relationships

}
