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
        Schema::table('permission_role', function (Blueprint $table) {
            
            $table->foreign('permission_id','fk_permission_to_permission_role')->references('id')->on('permission_role')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('role_id','fk_role_id_to_role')->references('id')->on('role')->onUpdate('cascade')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('fk_permission_to_permission_role');
            $table->dropForeign('fk_role_id_to_role');
        });
    }
};
