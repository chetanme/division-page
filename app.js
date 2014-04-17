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
								globalData.peopleUris = results;
								globalData.professorsUris = new Array();
								globalData.researchersUris = new Array();
								globalData.graduateStudentsUris = new Array();
								globalData.alumniUris = new Array();
								
								// build different objects based on type of Position 
								for(var i=0; i < globalData.peopleUris.length ; i++ ){
									var peopleUri = globalData.peopleUris[i];
									var pos = globalData.alltriples[peopleUri]['http://vivoweb.org/ontology/core#personInPosition'];
									//console.log("^^^^^^^^^^^^^^^^^^^^^^^");
									//console.log(pos);
									var posType = pos[0].value;
									switch (posType) {
									case 'http://lod.isi.edu/position_type/Professor':
										  globalData.professorsUris.push(peopleUri);	
										  break;
									
									case 'http://lod.isi.edu/position_type/Researcher':
										  globalData.researchersUris.push(peopleUri);	
										  break;
									
									case 'http://lod.isi.edu/position_type/GraduateStudent':
										  globalData.graduateStudentsUris.push(peopleUri);	
										  break;
									
									case 'http://lod.isi.edu/position_type/Alumni':
										  globalData.alumniUris.push(peopleUri);	
										  break;	  
									}
								}
								
								util.sort(globalData.researchersUris,globalData,parsedJSON,'http://vivoweb.org/ontology/core#preferredDisplayOrder','sortedResearchersUris');
								util.sort(globalData.professorsUris,globalData,parsedJSON,'http://vivoweb.org/ontology/core#preferredDisplayOrder','sortedProfessorsUris');
								util.sort(globalData.graduateStudentsUris,globalData,parsedJSON,'http://vivoweb.org/ontology/core#preferredDisplayOrder','sortedGraduateStudentsUris');
								util.sort(globalData.alumniUris,globalData,parsedJSON,'http://vivoweb.org/ontology/core#preferredDisplayOrder','sortedAlumniUris');
								
							}
						 }

];
requestParams.jadePageName = 'index'; 
app.get('/', function (req, res) {
	util.getJSON(requestParams,res)
})
