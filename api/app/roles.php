<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model {
    public $timestamps = false;
    protected $fillable = ['nama'];

    public static $rules = [
        // Validation 
        "nama" => "required"
    ];

    // Relationships
    public function role_users()
	{
		return $this->belongsToMany("App\user_roles");
	}
}
