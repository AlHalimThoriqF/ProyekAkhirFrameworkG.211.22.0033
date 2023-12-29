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
        Schema::create('dosen',function(Blueprint $table) {

            $table->string('id_dosen',10)->primary();
            $table->string('nama_dosen',30);
            $table->string('foto_dosen');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('email_dosen',40);
            $table->string('alamat_dosen',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::drop('dosen');
    }
};
