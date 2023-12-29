<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa',function(Blueprint $table) {
            $table->string('nim',20)->primary();
            $table->string('nama_mhs',30);
            $table->string('foto_mhs');
            $table->integer('umur_mhs');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('email_mhs',40);
            $table->string('alamat_mhs',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::drop('mahasiswa');
    }
};
