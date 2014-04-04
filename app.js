/* * Module dependencies */
var express = require('express')
  , stylus = require('stylus')
  , nib = require('nib')
  , util = require('./util.js')
;

var app = express();
function compile(str, path) {
  return stylus(str)
    .set('filename', path)
    .use(nib())
}

app.set('views', __dirname + '/views')
app.set('view engine', 'jade')
app.use(express.logger('dev'))
app.use(stylus.middleware(
  { src: __dirname + '/public'
  , compile: compile
  }
))
app.use(express.static(__dirname + '/public'))

app.listen(3000);
console.log("Listening on 3000");
var requestParams = new Object();
requestParams.host = "localhost";
requestParams.port = "8080"	;
requestParams.endpoint = "/openrdf-sesame/repositories/divisionpage?query="	;
requestParams.query = "CONSTRUCT { ?s ?p ?o } where { ?s ?p ?o }"	;
requestParams.uris = new Array();
requestParams.uris = [   {  useRegEx: "true" , uriString: "^" + 'http://lod.isi.edu/person/id/' + "[0-9]" , 
							createObject: function(results, globalData,parsedJSON){
								globalData.people = results;
								globalData.professors = new Array();
								globalData.researchers = new Array();
								globalData.graduateStudents = new Array();
								globalData.alumni = new Array();
								
								// build different objects based on type of Position 
								for(var i=0; i < globalData.people.length ; i++ ){
									var pos = globalData.people[i]['http://vivoweb.org/ontology/core#personInPosition'];
									var posType = pos[1].value;
									switch (posType) {
									case 'http://lod.isi.edu/position/Professor':
										  globalData.professors.push(globalData.people[i]);	
										  break;
									
									case 'http://lod.isi.edu/position/Researcher':
										  globalData.researchers.push(globalData.people[i]);	
										  break;
									
									case 'http://lod.isi.edu/position/GraduateStudent':
										  globalData.graduateStudents.push(globalData.people[i]);	
										  break;
									
									case 'http://lod.isi.edu/position/Alumni':
										  globalData.alumni.push(globalData.people[i]);	
										  break;	  
									}
								}
								
								// sort on display order
								util.sort(globalData.professors, 'http://vivoweb.org/ontology/core#preferredDisplayOrder' );
								util.sort(globalData.researchers, 'http://vivoweb.org/ontology/core#preferredDisplayOrder' );
								util.sort(globalData.graduateStudents, 'http://vivoweb.org/ontology/core#preferredDisplayOrder' );
								util.sort(globalData.alumni, 'http://vivoweb.org/ontology/core#preferredDisplayOrder' );
							}
						 }

];
requestParams.jadePageName = 'index'; 
app.get('/', function (req, res) {
	util.getJSON(requestParams,res)
})
