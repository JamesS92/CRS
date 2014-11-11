function SiteReportUserAction() {
}

SiteReportUserAction.prototype = {
    
     
    init:function () { //default function
    	    
     
    },
    selectUser:function()
    {
    	    console.info ($('#user-grid').yiiGridView('getSelection')); 
    } 
    

     
}
