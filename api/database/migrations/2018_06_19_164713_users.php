<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('email',150)->unique();
            $table->string('password');
            $table->string('nisn',150)->unique();
            $table->string('apikey');
            $table->rememberToken();
        });
        
        Schema::create('ortu_bios', function (Blueprint $table) {
            $table->bigIncrements('ortu_id');
            $table->string('nama_ayah')->nullable();
            $table->string('perkerjaan_ayah')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('tlpn_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('perkerjaan_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('tlpn_ibu')->nullable();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('role_id');
            $table->string('nama',150)->unique();
        });
        Schema::create('ijazah', function (Blueprint $table) {
            $table->increments('ijazah_id');
            $table->string('ijazah')->nullable();
            $table->string('skhun')->nullable();
        });
        Schema::create('users_bios', function (Blueprint $table) {
            $table->string('nisn',150)->primary();
            $table->string('nama');
            $table->string('email');
            $table->string('jenis_kelamin');
            $table->string('tgl_lahir');
            $table->string('tmpat_lahir');
            $table->string('alamat')->nullable();;
            $table->unsignedInteger('ortu_id')->nullable();;
            $table->foreign('ortu_id')->references('id')->on('ortu_bio')->onDelete('cascade');
        });
        
        Schema::create('role_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('role_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('role_users');
        Schema::dropIfExists('users_bios');
        Schema::dropIfExists('ijazah');
        Schema::dropIfExists('ortu_bios');
        Schema::dropIfExists('roles');
    }
}
