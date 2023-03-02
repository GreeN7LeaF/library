<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPhieumuontraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phieumuontra', function (Blueprint $table) {
            $table->foreign(['matt'], 'phieumuontra_ibfk_2')->references(['id'])->on('users');
            $table->foreign(['madg'], 'phieumuontra_ibfk_1')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phieumuontra', function (Blueprint $table) {
            $table->dropForeign('phieumuontra_ibfk_2');
            $table->dropForeign('phieumuontra_ibfk_1');
        });
    }
}
