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
    	    	    });
		    
  
    } 
    

     
}
