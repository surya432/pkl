<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpdbsTable extends Migration
{

    public function up()
    {
        Schema::create('ppdbs', function(Blueprint $table) {
            $table->string('no_daftar',150)->primary();
            $table->string('nisn');
            $table->string('id_nilai')->nullable();
            $table->string('id_minat')->nullable();
            $table->string('id_thn_ajaran')->nullable();
            $table->unsignedInteger('id_ijazah')->nullable();
            $table->foreign('id_ijazah')->references('id')->on('ijazah')->onDelete('cascade');
            // Schema declaration
            // Constraints declaration
        });
        Schema::create('nilai_ppdbs', function(Blueprint $table) {
            $table->increments('id_nilai');
            $table->string('matpel')->nullable();
            $table->string('nilai')->nullable();
            // Schema declaration
            // Constraints declaration
        });
        Schema::create('thn_ajarans', function(Blueprint $table) {
            $table->increments('id_thn_ajaran');
            $table->string('thn_ajaran')->nullable();
            $table->string('status')->nullable();
            // Schema declaration
            // Constraints declaration
        });
        Schema::create('minats', function(Blueprint $table) {
            $table->increments('id_minat');
            $table->integer('minat_1');
            $table->integer('minat_2');
            // Schema declaration
            // Constraints declaration
        });
        Schema::create('jurusan', function(Blueprint $table) {
            $table->increments('id_jurusan');
            $table->string('nama_jurusan');
            // Schema declaration
            // Constraints declaration
        });
        
    }

    public function down()
    {
        Schema::drop('ppdbs');
        Schema::drop('jurusan');
        Schema::drop('minats');
        Schema::drop('nilai_ppdbs');
        Schema::drop('thn_ajarans');
    }
}
