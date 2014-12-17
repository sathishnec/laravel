<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnualLeaveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annualLeave', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->date('start_date');
			$table->date('end_date');
			$table->decimal('total_days',3,1);
			$table->decimal('remaining_days',3,1);
			$table->decimal('sick_leave_days',3,1);
			$table->integer('added_by');
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
		Schema::drop('annualLeave');
	}

}
