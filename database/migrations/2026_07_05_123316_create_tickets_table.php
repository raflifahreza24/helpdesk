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
      Schema::create('tickets', function (Blueprint $table) {
         $table->id();
         $table->string('ticket_number', 30)->unique();
         $table->unsignedBigInteger('id_category');
         $table->unsignedBigInteger('id_departement');
         $table->unsignedBigInteger('created_by');
         $table->unsignedBigInteger('assigned_to')->nullable();
         $table->string('title');
         $table->text('description');
         $table->enum('priority', ['low', 'medium', 'high', 'urgent']);
         $table->enum('status', ['open', 'assigned', 'in_progress', 'waiting_user', 'resolved', 'closed']);
         $table->timestamp('assigned_at')->nullable();
         $table->timestamp('resolved_at')->nullable();
         $table->timestamp('closed_at')->nullable();
         $table->timestamps();
         $table->softDeletes();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('tickets');
   }
};
