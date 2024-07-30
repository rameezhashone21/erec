<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultsTable extends Migration
{
  /**
   * The database connection that should be used by the migration.
   *
   * @var string
   */
  protected $connection = 'mysql2';

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('exam_results', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('job_application_id')->nullable();
      $table->unsignedBigInteger('condidate_id')->nullable();
      $table->unsignedBigInteger('exam_id')->nullable();
      $table->bigInteger('total_marks')->nullable();
      $table->bigInteger('obtained_marks')->nullable();
      $table->bigInteger('perentage')->nullable();
      $table->enum('status', ['pass', 'fail'])->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('exam_results');
  }
}
