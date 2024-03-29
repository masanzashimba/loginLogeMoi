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
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');

            // Ajoutez une contrainte de clé étrangère si nécessaire
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
             // Supprimez la contrainte de clé étrangère
             $table->dropForeign(['user_id']);

             // Supprimez la colonne user_id
             $table->dropColumn('user_id');
            //
        });
    }
};
