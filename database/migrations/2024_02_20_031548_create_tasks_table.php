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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->nullable();
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->foreignId('assigned_to')->nullable()->references('id')->on('users');
            $table->foreignId('assigned_by')->nullable()->references('id')->on('users');
            $table->string('deadline_date')->nullable();
            $table->string('priority')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('task_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained()->onDelete('cascade');
            $table->string('comment', 200);
            $table->foreignId('user_id');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('task_comments');
    }
};
