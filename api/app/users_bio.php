<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class users_bio extends Model {
    public $timestamps = false;

    protected $fillable = [
        'nisn','email','nama','jenis_kelamin','tgl_lahir','tmpat_lahir','alamat' ,'ortu_id' ,'ijazah_id' 
    ];
    public static $rules = [
        'nisn' => "required",
        'email' => "required",
        'nama' => "required",
        'jenis_kelamin' => "required",
        'tgl_lahir' => "required",
        'tmpat_lahir' => "required",
        'alamat' => "required",
    ];

    // Relationships

}
