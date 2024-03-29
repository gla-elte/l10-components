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
    Schema::table('ratings', function (Blueprint $table) {
      if (DB::getDriverName() !== 'sqlite') {
        $table->dropForeign('ratings_post_id_foreign');
      }
      $table->foreign('post_id')->references('id')->on('posts')->cascadeOnUpdate()->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('ratings', function (Blueprint $table) {
      if (DB::getDriverName() !== 'sqlite') {
        $table->dropForeign('ratings_post_id_foreign');
      }
      $table->foreign('post_id')->references('id')->on('posts')->restrictOnUpdate()->restrictOnDelete();
    });
  }
};
