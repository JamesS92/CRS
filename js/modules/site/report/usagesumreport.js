function SiteReportUsagesumreportAction() {
}

SiteReportUsagesumreportAction.prototype = {
    
    
    init:function () { //default function
    	    
     
    },
    renderReport:function()
    {
    	    var formData = $('#usagesumReport').serialize(); 
    	    
    	    $.post("/report/ajaxUsagesumReport",formData).done(
    	    	    	function(returnData){
    	    	    		returnData = jQuery.parseJSON( returnData );
    	    	    		if (returnData.error)
    	    	    			alert('fields not full'); 
    	    	    		
    	    	   
    	    	    		
    	    	    		 var usage1 = [];
    	    	    		 var usage2 = [];
    	    	    		 var usage3 = [];
    	    	    		 var usage4 = [];

    	    	    		 var beginTime = returnData.data[0].beginTime;
    	    	    		 var endTime = returnData.data[0].endTime;

		   
    	    	    		for (i = 0; i < returnData.data.length; i++) {
    	    	    			var date = new Date(returnData.data[i].start_time);
            usage1.push([date, returnData.data[i].usage_total_1]);
            usage2.push([date, returnData.data[i].usage_total_2]);
            usage3.push([date, returnData.data[i].usage_total_3]);
            usage4.push([date, returnData.data[i].usage_total_4]);
        }
        var xlabel = returnData.data.length;
        var ylabel = returnData.data[0].category;
        var maxY = returnData.data[0].maxY * 1.2;

        $('#report_canvas').empty();
        var plot1 = $.jqplot ('report_canvas', [usage1, usage2, usage3, usage4], {
            		    axes: {
            		    	    xaxis: {
            		    	    	    label: "time (" + xlabel + ")",
            		    	    	    min: beginTime,
            		    	    	    max: endTime
            		    	    	    /*renderer:$.jqplot.DateAxisRenderer,
            		    	    	    tickRenderer: $.jqplot.AxisTickRenderer,
            		    	    	    tickOptions: 
            		    	    	    {
            		    	    	    	    formatString:  '%Y-%m-%d'
            		    	    	    }*/
            		    	    	    
            		     	    },
            		     	    yaxis: {
            		     	    	    label: ylabel,
            		     	    	    min: 0,
            		     	    	    max: maxY
            		     	    }
            		    },
            		    
            		    seriesDefaults: {
            		    	    showLine: true,
            		    	     markerOptions: {
            		    	     	     lineWidth: 0.5,
            		    	     	     size: 3
            		    	     }
            		    }
            		    	     	     
           });
    	    	    	
    	    
        
    	     });
  
    } 
    

     
}
