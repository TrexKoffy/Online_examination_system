<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('exam_name');
            $table->integer('subject_id');
            $table->string('date');
            $table->string('time');
            $table->integer('attempt')->default(0);
            $table->float('marks', 10, 0)->default(0);
            $table->float('pass_marks', 10, 0)->default(0);
            $table->string('entrance_id');
            $table->integer('plan')->default(0)->comment('0->Free, 1->Paid');
            $table->json('prices')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
