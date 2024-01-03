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
        Schema::create('knjigas', function (Blueprint $table) {
            $table->id();
            $table->string("naziv");
            $table->string("autor_prezime");
            $table->string("autor_ime");
            $table->date("pocetak_citanja");
            $table->date("kraj_citanja")->nullable();
            $table->string("komentar")->nullable();
            $table->integer("ocjena")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knjigas');
    }
};
