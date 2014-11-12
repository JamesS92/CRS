$.app = {
    page:undefined,
    mc:undefined, 
    init:function () {
        if ($.app.page !== undefined) {
            if (!$.app.page.delayed) // Flag, in case you don't need to load file on start
                $.app.page.init.call($.app.page);
        }

    },
    inString: function (haystack,needle,start){    
    	    		var oStr = new String(haystack);
    	    		return oStr.indexOf(needle,start);
    } 
    
}; 
