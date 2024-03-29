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
    Schema::table('posts', function (Blueprint $table) {
      if (DB::getDriverName() !== 'sqlite') {
        $table->dropForeign('posts_rating_id_foreign');
      }
      $table->dropColumn('rating_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('posts', function (Blueprint $table) {
      $table->unsignedBigInteger('rating_id')->nullable();
      $table->foreign('rating_id')->references('id')->on('ratings');
    });
  }
};
