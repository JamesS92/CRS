function SiteReportUsagesumreportAction() {
}

SiteReportUsagesumreportAction.prototype = {
    
    
    init:function () { //default function
    	    
     
    },
    renderReport:function()
    {
    	    $.jqplot.config.enablePlugins = true;
    	    var formData = $('#usagesumReport').serialize(); 
    	    var interval;
    	    var ylabel;
    	    var target = document.getElementById("report_canvas");
    	    var spinner = new Spinner().spin(target);
    	    
    	    $.post("/report/ajaxUsagesumReport",formData).done(
    	    	    	function(returnData){
    	    	    		returnData = jQuery.parseJSON( returnData );
    	    	    		if (returnData.error){
    	    	    			alert('fields not full'); 
    	    	    			spinner.stop();
    	    	    		}
    	    	   
    	    	    		
    	    	    		 var usage1 = [];
    	    	    		 var usage2 = [];
    	    	    		 var usage3 = [];
    	    	    		 var usage4 = [];

    	    	    		 var beginTime = returnData.data[0].beginTime * 1000;
    	    	    		 var endTime = returnData.data[0].endTime * 1000;
    	    	    		 
    	    	    		 interval = returnData.data[0].interval;
    	    	    		 ylabel = returnData.data[0].category;
		   
    	    	    		for (i = 0; i < returnData.data.length; i++) {
    	    	    			var date = new Date(returnData.data[i].start_time) * 1000;
            usage1.push([date, returnData.data[i].usage_total_1]);
            usage2.push([date, returnData.data[i].usage_total_2]);
            usage3.push([date, returnData.data[i].usage_total_3]);
            usage4.push([date, returnData.data[i].usage_total_4]);
        }
        var xlabel = returnData.data.length;
        var maxY = returnData.data[0].maxY * 1.2;
        
        var pointSize = 400/xlabel;
        if (pointSize > 10) pointSize = 10;
        if (pointSize < 5) pointSize = 5;
        $('#report_canvas').empty();
        var plot1 = $.jqplot ('report_canvas', [usage1, usage2, usage3, usage4], {
            		    axes: {
            		    	    xaxis: {
            		    	    	    label: "time (" + xlabel + ")",
            		    	    	    min: beginTime,
            		    	    	    max: endTime,
            		    	    	    renderer:$.jqplot.DateAxisRenderer,
            		    	    	    tickRenderer: $.jqplot.AxisTickRenderer,
            		    	    	    tickOptions: 
            		    	    	    {
            		    	    	    	    formatString:  '%d/%m/%y'
            		    	    	    }
            		    	    	    
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
            		    	     	     size: pointSize
            		    	     }
            		    },
            		    highlighter: {
					show: true,
					sizeAdjust: 7.5
				      },
				      
				      cursor: {
					show: true,
					showTooltip: false,
					zoom: true,
					dblClickReset: true
				      }
            		    	     	     
           });
    	    	    	
    	    spinner.stop();
        
    	     });
    	    function myClickHandler(ev, gridpos, datapos, neighbor, plot) {
    	    	    if (neighbor != null){
    	    	    	    var detailsForm = {returnTime:neighbor.data[0], qID:neighbor.seriesIndex, returnInterval:interval, chosenCategory:ylabel};
    	    	    	     var spinner = new Spinner().spin(target);
    	    	    	     
    	    	    	     document.getElementById("detailsTable").innerHTML = "";
    	    	    	     
    	    	    	     var table = document.getElementById("detailsTable");
    	    	    	     var row = table.insertRow(0);
    	    	    	     var cell1 = row.insertCell(0);
    	    	    	     var cell2 = row.insertCell(1);
    	    	    	     var cell3 = row.insertCell(2);
    	    	    	     var cell4 = row.insertCell(3);
    	    	    	     var cell5 = row.insertCell(4);
    	    	    	     var cell6 = row.insertCell(5);
    	    	    	     var cell7 = row.insertCell(6);
    	    	    	     var cell8 = row.insertCell(7);
    	    	    	     var cell9 = row.insertCell(8);
    	    	    	     var cell10 = row.insertCell(9);
    	    	    	     
    	    	    	     cell1.innerHTML = "Job No";
    	    	    	     cell2.innerHTML = "Job Name";
    	    	    	     cell3.innerHTML = "Username";
    	    	    	     cell4.innerHTML = "Queue Name";
    	    	    	     cell5.innerHTML = "Start Time";
    	    	    	     cell6.innerHTML = "CPU Usage";
    	    	    	     cell7.innerHTML = "IO Usage";
    	    	    	     cell8.innerHTML = "Memory Usage";
    	    	    	     cell9.innerHTML = "MaxVMem Usage";
    	    	    	     cell10.innerHTML = "Wait Time";
    	    	    	     

    	    	    	    $.post("/report/ajaxUsagedetailsReport",detailsForm).done(
    	    	    	function(returnData){
    	    	    		returnData = jQuery.parseJSON( returnData );
    	    	    		if (returnData.error){
    	    	    			alert('fields not full'); 
    	    	    			spinner.stop();
    	    	    		}
    	    	    			
    	    	    		for (i = 0; i < returnData.data.length; i++) {
    	    	    			var row = table.insertRow(i+1);
    	    	    			var cell1 = row.insertCell(0);
    	    	    			var cell2 = row.insertCell(1);
					var cell3 = row.insertCell(2);
					var cell4 = row.insertCell(3);
					var cell5 = row.insertCell(4);
					var cell6 = row.insertCell(5);
					var cell7 = row.insertCell(6);
					var cell8 = row.insertCell(7);
					var cell9 = row.insertCell(8);
					var cell10 = row.insertCell(9);
					cell1.innerHTML = returnData.data[i].id;
    	    	    	     		cell2.innerHTML = returnData.data[i].job_name;
    	    	    	     		cell3.innerHTML = returnData.data[i].username;
    	    	    	     		cell4.innerHTML = returnData.data[i].queue_name;
    	    	    	     		cell5.innerHTML = returnData.data[i].min_time;
    	    	    	     		cell6.innerHTML = returnData.data[i].cpu_sum;
    	    	    	     		cell7.innerHTML = returnData.data[i].io_sum;
    	    	    	     		cell8.innerHTML = returnData.data[i].memory_sum;
    	    	    	     		cell9.innerHTML = returnData.data[i].maxvmem_sum;
    	    	    	     		cell10.innerHTML = returnData.data[i].wait_time;
    	    	    		}
    	    	    			
    	    	    		spinner.stop();
    	    	    	});
    	    	    }
    	    	    
    	    }
     	    
    	    $("#report_canvas").unbind('jqplotClick');
    	    $("#report_canvas").bind('jqplotClick', myClickHandler);

    } 
    

     
}
