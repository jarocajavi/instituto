<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('group_student', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->primary(['group_id', 'student_id']);
        });

        Schema::create('group_subject', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained()->cascadeOnDelete();
            $table->primary(['group_id', 'subject_id']);
        });

        Schema::create('project_student', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->primary(['project_id', 'student_id']);
        });

        Schema::create('task_student', function (Blueprint $table) {
            $table->foreignId('task_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->boolean('completed')->default(false);
            $table->primary(['task_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_student');
        Schema::dropIfExists('project_student');
        Schema::dropIfExists('group_subject');
        Schema::dropIfExists('group_student');
    }
};
