<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('detail_user', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_detail_user_to_users')
            ->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          
            $table->foreign('type_user_id', 'fk_detail_user_to_type_user')
            ->references('id')->on('type_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_user', function (Blueprint $table) {
            $table->dropForeign('fk_detail_user_to_users');
            $table->dropForeign('fk_detail_user_to_type_user');
        });
    }
};
