function SiteReportUserAction() {
}

SiteReportUserAction.prototype = {
    
     
    init:function () { //default function
    	    
     
    },
    selectUser:function()
    {
    	    ($('#user-grid').yiiGridView('getSelection')); 
    	    $.fn.yiiGridView.update('user-grid', {
    	    data: $(this).serialize()});
    	   
    } 
    

     
}
