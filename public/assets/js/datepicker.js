// This will contain all the date picker related functions

+function ($) {
  'use strict';

  $(document).ready(function() {
  	//alert("Hi");
    // assuming the controls you want to attach the plugin to
    // have the "datepicker" class set
    $('input.datepicker').Zebra_DatePicker();
    console.log(book.disabledDates); 
    //function dateMan(disDates,startDate,endDate)
    //{
    /*
    	$('#startDateBook').Zebra_DatePicker({
		  	direction: [1,30],
		  	disabled_dates: [book.disabledDates],
		  	onSelect:function(formatted,yyyymmdd,jsobj,input_ref) {
		  		$('#endDateBook').Zebra_DatePicker({
				  	direction: [yyyymmdd,30],
				  	disabled_dates: [book.disableDates]
				  });
		  	}
		});
    //}

    	$('#startDateLog').Zebra_DatePicker({
		  	direction: [1,30],
		  	disabled_dates: [],
		  	onSelect:function(formatted,yyyymmdd,jsobj,input_ref) {
		  		$('#endDateLog').Zebra_DatePicker({
				  	direction: [yyyymmdd,30],
				  	disabled_dates: ['* * * 0,6']
				  });

		  	}
		});

});
*/
}(jQuery);