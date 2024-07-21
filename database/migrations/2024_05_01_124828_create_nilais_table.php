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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('bi_iv_sm_1')->nullable();
            $table->integer('ipa_iv_sm_1')->nullable();
            $table->integer('mt_iv_sm_1')->nullable();
            $table->integer('bi_iv_sm_2')->nullable();
            $table->integer('ipa_iv_sm_2')->nullable();
            $table->integer('mt_iv_sm_2')->nullable();
            $table->integer('bi_v_sm_1')->nullable();
            $table->integer('ipa_v_sm_1')->nullable();
            $table->integer('mt_v_sm_1')->nullable();
            $table->integer('bi_v_sm_2')->nullable();
            $table->integer('ipa_v_sm_2')->nullable();
            $table->integer('mt_v_sm_2')->nullable();
            $table->integer('bi_vi_sm_1')->nullable();
            $table->integer('ipa_vi_sm_1')->nullable();
            $table->integer('mt_vi_sm_1')->nullable();
            $table->integer('bi_un')->nullable();
            $table->integer('ipa_un')->nullable();
            $table->integer('mt_un')->nullable();
            $table->text('skhun')->nullable();
            $table->string('jenis_prestasi')->nullable();
            $table->string('nama_prestasi')->nullable();
            $table->text('bukti_prestasi')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
