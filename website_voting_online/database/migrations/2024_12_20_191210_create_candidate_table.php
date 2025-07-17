<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('ketua'); // Ketua
            $table->string('calon_ketua')->nullable();
            $table->text('latar_belakang_ketua')->nullable(); // Latar belakang Ketua
            $table->text('visi_ketua')->nullable(); // Visi Ketua
            $table->text('misi_ketua')->nullable(); // Misi Ketua
            $table->string('wakil_ketua'); // Wakil Ketua
            $table->string('calon_wakil_ketua')->nullable();
            $table->text('latar_belakang_wakil_ketua')->nullable(); // Latar belakang Wakil Ketua
            $table->text('visi_wakil_ketua')->nullable(); // Visi Wakil Ketua
            $table->text('misi_wakil_ketua')->nullable(); // Misi Wakil Ketua
            $table->string('profile_image_ketua')->nullable();
            $table->string('profile_image_wakil_ketua')->nullable();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
