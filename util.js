var async = require('async')
  , http = require('http')


module.exports = {
		
getJSON : function(requestParameters,res){
	var pagedata = new Object();
	var data = '';
	async.series([
	              function(callback){
	              //1. Get all the triples from the endpoint
	          		var encodedquerystring = encodeURIComponent(requestParameters.query);
	          		var options = {
	        		    host: requestParameters.host,
	        		    port: requestParameters.port,
	        		    path: requestParameters.endpoint +encodedquerystring,
	        	        headers: {
	        	            'Content-Type': 'application/x-www-form-urlencoded',
	        	            'Accept': 'application/rdf+json',
	        	        }
	        		  };
	    		
	          		var req = http.get(options, function(res) {
	        	    res.on('data', function (chunk) {
	        	      data += chunk;
	        	    });
	        	    res.on('end', function () {
	        	    	//console.log(data);
	        	    	callback(); //the current task is finished, go onto the next task.
	        	    });
	        	  }).on('error', function(e) {
	        	    console.log("Got error: " + e.message);
	        	  });
	              },
	              
	              function(callback) {
	              //2. Construct data to be rendered by jade
	            	  var parsedJSON = JSON.parse(data);
	            	  pagedata.alltriples = parsedJSON;
	            	  requestParameters.uris.forEach(function(entry){
	            		  	if(entry.useRegEx){
	            		  		var a = new Array();
	            		  		var re = new RegExp(entry.uriString);
	            		        for (key in parsedJSON){
	            		        	if (re.test(key)) {
	            		        		var results = parsedJSON[key];
	            		        		a.push(results);
	            		        	}
	            		        }
	            		      entry.createObject(a,pagedata,parsedJSON);  		
	            		  	} // regEx if condition ends
	            		  	else {
	            		  		// for conditions where regEx is not required.
	            		  	}
	                  	});
	            	  callback();
	              }
	              
	], function(){
		//3. render the page.
		/*for(var i=0; i<pagedata.graduateStudents.length ; i++ ){
			console.log(pagedata.graduateStudents[i]['http://xmlns.com/foaf/0.1/firstName'][0].value);
		}*/
		res.render(requestParameters.jadePageName,pagedata);
	});
	
} ,

sort: function(object,sortCriteria){
		object.sort(function(a,b){
		   var displayValueA = a[sortCriteria][0].value;
		   var displayValueB = b[sortCriteria][0].value;
		   return displayValueA - displayValueB; //ascending
		});
}
,
sortData: function(results,globalData,parsedJSON, sortCriteria,object){
		
		var sortedArray = new Array();
		globalData[object]= new Array();
		var counter = 0;
		for (var i = 0; i < results.length; i++) {
			 var uri = results[i].value;
			 var date = parsedJSON[uri][sortCriteria];
			 if(date){
				 sortedArray[counter] = new Object();
				 sortedArray[counter].uri = uri;
				 sortedArray[counter].date = date[0].value;
				 counter++;
			 }	 
		 }

		sortedArray.sort(function(a,b){
			 var dateA=new Date(a.date), dateB=new Date(b.date)
			 return dateA - dateB; //ascending
		 });

		 for (var i = 0; i < sortedArray.length; i++) {
				globalData[object].push(sortedArray[i].uri);
		}
	}
};
