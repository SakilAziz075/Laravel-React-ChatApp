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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longText('message')->nullable();    //while sending a img the text will be NULL
            $table->foreignId('sender_id')->constrained('users');
            $table->foreignId('receiver_id')->nullable()->constrained('users');
            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->foreignId('conversation_id')->nullable()->constrained('conversations');     // Conversation_id will be NULL if we are sending messages in a group

            $table->timestamps();
        });


        //modifying the schema of existing tables 

        Schema::table('groups', function (Blueprint $table) {
            $table->foreignId('last_message_id')->nullable()->constrained('messages');
        });
        
        Schema::table('conversations', function (Blueprint $table) {
            $table->foreignId('last_message_id')->nullable()->constrained('messages');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
