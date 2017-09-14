<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('course__courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your fields
            $table->decimal('price', 10, 2)->nullable();
            $table->smallInteger('capacity');
            $table->string('age', 10);

            $table->time('start_hour');
            $table->time('end_hour');
            $table->date('start_at');
            $table->date('end_at');

            $table->smallInteger('status')->default(1);

            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('course__locations')->onDelete('SET NULL');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('course__categories')->onDelete('CASCADE');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('course__courses');
        Schema::enableForeignKeyConstraints();
    }
}
