function SiteReportQueuereportAction() {
}

SiteReportQueuereportAction.prototype = {
    
    
    init:function () { //default function
    	    
     
    },
    renderReport:function()
    {
    	    var formData = $('#queueReport').serialize(); 
    	    
    	    $.post("/report/ajaxQueueReport",formData).done(
    	    	    	function(returnData){
    	    	    		returnData = jQuery.parseJSON( returnData );
    	    	    		if (returnData.error)
    	    	    			alert('An error occured'); 
    	    	    		
    	    	   
    	    	    		
    	    	    		 var cpu = [];

		   
    	    	    		for (i = 0; i < returnData.data.length; i++) {
            // Save the data to the relevant array. Note how date at the zeroth position (i.e. x-axis) is common for both demand and supply arrays.
            cpu.push([returnData.data[i].start_time, returnData.data[i].cpu_sum]);
        }

        var plot1 = $.jqplot ('report_canvas', [cpu]);
    	    	    	
    	    
    	     });
  
    } 
    

     
}
