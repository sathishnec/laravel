<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leaveHistory', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->date('start_date');
			$table->date('end_date');
			$table->enum('am_pm',array('AM','PM',''));
			$table->decimal('no_of_days',3,1);
			$table->integer('authorized_by');
			$table->integer('holiday_chart_added_by');
			$table->integer('leaveStatus_id');
			$table->integer('leaveType_id');
			$table->text('reason');
			$table->enum('user_declared',array(0,1));
			$table->enum('reduce_leave_count',array(0,1));
			$table->enum('dpt_declared',array(0,1));
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
		Schema::drop('leaveHistory');
	}

}
