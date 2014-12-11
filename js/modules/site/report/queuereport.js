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
    	    	    		 var io = [];
    	    	    		 var memory = [];
    	    	    		 var maxVMem = [];
    	    	    		 var beginTime = returnData.data[0].beginTime;
    	    	    		 var endTime = returnData.data[0].endTime;

		   
    	    	    		for (i = 0; i < returnData.data.length; i++) {
            // Save the data to the relevant array. Note how date at the zeroth position (i.e. x-axis) is common for both demand and supply arrays.
            cpu.push([returnData.data[i].start_time, returnData.data[i].cpu_sum]);
            io.push([returnData.data[i].start_time, returnData.data[i].io_sum]);
            memory.push([returnData.data[i].start_time, returnData.data[i].memory_sum]);
            maxVMem.push([returnData.data[i].start_time, returnData.data[i].maxVMem_sum]);
            
        }
        var xlabel = returnData.data.length;

        $('#report_canvas').empty();
        var plot1 = $.jqplot ('report_canvas', [cpu, io, memory, maxVMem], {
            		    axes: {
            		    	    xaxis: {
            		    	    	    label: xlabel + " Jobs",
            		    	    	    min: beginTime,
            		    	    	    max: endTime
            		     	    },
            		     	    yaxis: {
            		     	    	    min: 0,
            		     	    	    max: 1
            		     	    }
            		    },
            		    
            		    seriesDefaults: {
            		    	    showLine: false,
            		    	     markerOptions: {
            		    	     	     lineWidth: 0.5,
            		    	     	     size: 3
            		    	     }
            		    }
            		    	     	     
           });
    	    	    	
    	    
        
    	     });
  
    } 
    

     
}
