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
        Schema::create('mata_kuliah',function(Blueprint $table) {

            $table->string('kode_makul',10)->primary();
            $table->string('nama_makul',25);
            $table->string('dosen_pengampu',30);
            $table->enum('prasyarat',['Ya','Tidak']);
            $table->integer('sks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::drop('mata_kuliah');
    }
};
