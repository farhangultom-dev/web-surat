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
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()
            ->index('fk_pengajuan_surat_to_users');
            $table->foreignId('layanan_id')->nullable()
            ->index('fk_pengajuan_surat_to_layanan');
            $table->foreignId('id_berkas_pendukung')->nullable()
            ->index('fk_pengajuan_surat_to_berkas_pendukung');
            $table->timestamp('tanggal_pengajuan')->nullable();
            $table->longText('file_pendukung')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surat');
    }
};
