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
      $table->dropForeign('ratings_post_id_foreign');
      $table->dropColumn('post_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('ratings', function (Blueprint $table) {
      $table->unsignedBigInteger('post_id')->nullable();
      $table->foreign('post_id')->references('id')->on('posts');
    });
  }
};
