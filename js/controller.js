var contest = $("#contest").val();
var question = $("#question").val();
var type = $("#type").val();
var varvtitle;
var graphArray;
var setUrl="";

function render() {
	//$("#content").empty();
	contest = $("#contest").val();
	question = $("#question").val();
	type = $("#type").val();
	//alert(contest+" "+question+" "+type);
	graphArray = [
	['Year', 'A', 'G'],
	['11',  0000,      0010],
	['51',  0001,      0111]
	]
	if(contest && !question && !type) {

		$('#question').show();
		$('#type').show();
		vartitle=contest;
		setUrl=contest;
		all(contest);
	}
	else if(contest && question && !type) {

		setUrl=contest+'/problems/'+question;
		oneQuestion(contest,question);
	}
	else if(contest && question && type){

		vartitle=contest+' > '+question+' > ';
		if(type=='star')
			vartitle = vartitle+'Star';
		else
			vartitle = vartitle+'Language';
		vartitle = vartitle+' Based';
		setUrl=contest+'/problems/'+question;
		single(contest,question,type);
	}
	else if(contest && !question && type) {

		setUrl=contest;
		oneType(contest,type);
	}
	else {
		//alert("Invalid Selection");
	}
	$('#url').html(function() {return '<a href="https://www.codechef.com/'+setUrl+'" target="_blank">Link to Codechef:<br> www.codechef.com/'+setUrl+'</a>';});
	google.charts.load('current', {'packages':['corechart','line']});
	google.charts.setOnLoadCallback(drawChart);
}

function zeros(dimensions) {
	var array = [];
	for (var i = 0; i < dimensions[0]; ++i) {
		array.push(dimensions.length == 1 ? 0 : zeros(dimensions.slice(1)));
	}
	return array;
}
	
function getQuestions(contest) {
	//alert("Getting Qns for - "+contest);
	var ar=["CODG1701","CODG1702","CODG1703","CODG1704","CODG1705"];
	return ar;
}
function all(contest) {
	//alert(contest + " all contest Data");
	var ar=getQuestions(contest);
	var numberOfQuestion = ar.length;
	var dataAr={};
	var tempAr=[];
	tempAr.push('Time');
	for(var i=0;i<numberOfQuestion;i++) {
		var question=ar[i];
		tempAr.push(question);
		var path=contest+'/'+question+'/'+'starData.json';
		$.ajax({
			url: path,
			dataType: 'json',
			async: false,
			success: function(json) {
				for (stamps in json["time"]) {
					var len=json["time"][stamps].length;
					var sum=0;
					if(!dataAr.hasOwnProperty(stamps))
						dataAr[stamps]={};
					for(var j=0;j<len;j++) {
						sum=sum+(json["time"][stamps][j]);
					}
					dataAr[stamps][question]=sum;

				}
			}
		});
	}
	//console.log(dataAr);
	graphArray=[];
	graphArray.push(tempAr);
	console.log(graphArray);
	for(stamps in dataAr) {
		tempAr=[];
		var epoch = new Date( stamps*1000 );
		tempAr.push(stamps);
		for(var i=0;i<numberOfQuestion;i++) {
			var question=ar[i];
			if(!dataAr[stamps].hasOwnProperty(question))
				tempAr.push(0);
			else
				tempAr.push(dataAr[stamps][question]);
		}
		graphArray.push(tempAr);
	}
	return;
}
function oneQuestion(contest,question) {
	//alert(contest + question + "Question + Contest");
	var ar=getQuestions(contest);
	var dataAr={};
	var tempAr=[];
	tempAr.push('Time');
	tempAr.push(question);
	var path=contest+'/'+question+'/'+'starData.json';
	$.ajax({
		url: path,
		dataType: 'json',
		async: false,
		success: function(json) {
			for (stamps in json["time"]) {
				var len=json["time"][stamps].length;
				var sum=0;
				if(!dataAr.hasOwnProperty(stamps))
					dataAr[stamps]={};
				for(var j=0;j<len;j++) {
					sum=sum+(json["time"][stamps][j]);
				}
				dataAr[stamps][question]=sum;

			}
		}
	});
	//console.log(dataAr);
	graphArray=[];
	graphArray.push(tempAr);
	console.log(graphArray);
	for(stamps in dataAr) {
		tempAr=[];
		var epoch = new Date( stamps*1000 );
		tempAr.push(stamps);
		if(!dataAr[stamps].hasOwnProperty(question))
			tempAr.push(0);
		else
			tempAr.push(dataAr[stamps][question]);
		graphArray.push(tempAr);
	}
	return;
}
function single(contest,question,type) {
	var path=contest+'/'+question+'/'+type+'Data.json';
	//alert(contest + " all contest Data");
	var xArr={};
	var dataAr={};
	var tempAr=[];
	tempAr.push('Time');
	//tempAr.push(question);
	$.ajax({
		url: path,
		dataType: 'json',
		async: false,
		success: function(json) {
			for (stamps in json["time"]) {
				var len=json["time"][stamps].length;
				var sum=0;
				if(!dataAr.hasOwnProperty(stamps))
					dataAr[stamps]={};
				if(type=='star') {
					for(var j=0;j<len;j++) {
						if(!xArr.hasOwnProperty(j))
							xArr[j]=j+'★';
						sum=sum+(json["time"][stamps][j]);
						dataAr[stamps][j]=json["time"][stamps][j];
					}
				}
				else if(type=='lang') {
					for(uages in json["time"][stamps]) {
						if(!xArr.hasOwnProperty(uages))
							xArr[uages]=uages;
						sum=sum+(json["time"][stamps][uages]);
						dataAr[stamps][uages]=json["time"][stamps][uages];
					}
				}
				dataAr[stamps][question]=sum;

			}
		}
	});
	console.log(xArr);
	console.log(dataAr);
	graphArray=[];
	for (xVal in xArr) {
		tempAr.push(xArr[xVal]);
	}
	graphArray.push(tempAr);
	console.log(graphArray);
	for(stamps in dataAr) {
		tempAr=[];
		tempAr.push(stamps);
		//if(!dataAr[stamps].hasOwnProperty(question))
		//	tempAr.push(0);
		//else
		//	tempAr.push(dataAr[stamps][question]);
		var epoch = new Date( stamps*1000 );
		for (xVal in xArr) {
			if(!dataAr[stamps].hasOwnProperty(xVal))
				tempAr.push(0);
			else
				tempAr.push(dataAr[stamps][xVal]);
		}
		graphArray.push(tempAr);
	}
	return;
}
function oneType(contest,type) {
	//alert(contest + type + " contest and type");
	var ar=getQuestions(contest);
	var numberOfQuestion = ar.length;
	var xArr={};
	var dataAr={};
	var tempAr=[];
	tempAr.push('Time');
	for(var i=0;i<numberOfQuestion;i++) {
		var question=ar[i];
		//alert(contest + question + type + " contest and type");
		var path=contest+'/'+question+'/'+type+'Data.json';
		$.ajax({
			url: path,
			dataType: 'json',
			async: false,
			success: function(json) {
				for (stamps in json["time"]) {
					var len=json["time"][stamps].length;
					var sum=0;
					if(!dataAr.hasOwnProperty(stamps))
						dataAr[stamps]={};
					if(type=='star') {
						for(var j=0;j<len;j++) {
							if(!xArr.hasOwnProperty(j))
								xArr[j]=j+'★';
							sum=sum+(json["time"][stamps][j]);
							if(!dataAr[stamps][j]) {
								dataAr[stamps][j]=0;
								//alert(stamps+" "+j+"\n");
							}
							dataAr[stamps][j]=dataAr[stamps][j]+(json["time"][stamps][j]);
						}
					}
					else if(type=='lang') {
						for(uages in json["time"][stamps]) {
							if(!xArr.hasOwnProperty(uages))
								xArr[uages]=uages;
							sum=sum+(json["time"][stamps][uages]);
							if(!dataAr[stamps][uages]) {
								dataAr[stamps][uages]=0;
								//alert(stamps+" "+j+"\n");
							}
							dataAr[stamps][uages]=dataAr[stamps][uages]+(json["time"][stamps][uages]);
						}
					}
					dataAr[stamps][question]=sum;

				}
			}
		});
	}
	console.log(xArr);
	console.log(dataAr);
	graphArray=[];
	for (xVal in xArr) {
		tempAr.push(xArr[xVal]);
	}
	graphArray.push(tempAr);
	console.log(graphArray);
	for(stamps in dataAr) {
		tempAr=[];
		tempAr.push(stamps);
		//if(!dataAr[stamps].hasOwnProperty(question))
		//	tempAr.push(0);
		//else
		//	tempAr.push(dataAr[stamps][question]);
		var epoch = new Date( stamps*1000 );
		for (xVal in xArr) {
			if(!dataAr[stamps].hasOwnProperty(xVal))
				tempAr.push(0);
			else
				tempAr.push(dataAr[stamps][xVal]);
		}
		graphArray.push(tempAr);
	}
	return;
}
function drawChart() {
	var data = google.visualization.arrayToDataTable(graphArray);
	//var wd=$('#content').width();
	//var ht=$('.row').height();
	var options = {
		title: vartitle,
		curveType: 'function',
	    vAxis: {title: "# of Submissions"},
	    hAxis: {title: "Time Interval"}
		//height: ht,
		//width: wd
	};

	var chart = new google.charts.Line(document.getElementById('content'));

	chart.draw(data, google.charts.Line.convertOptions(options));
}
$(window).resize(function(){
	if(graphArray) {
		drawChart();
	}
});
