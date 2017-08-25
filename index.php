<?php
include 'init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet /">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<!--Let browser know website is optimized for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Own Css -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<!-- Angular -->
	<!-- Google Charts -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>
<body>
	<header class="top_pad">
		<nav class="dbg">
			<div class="nav-wrapper">
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
				<a href="#" class="brand-logo center">CodeChef</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<li><a href=""></a></li>
				</ul>
			</div>
		</nav>
		<div id="slide-out" class="side-nav fixed z-depth-4">
			<img src="fonts/svg/bar.svg" />
			<label>Contests </label>
			<select class="browser-default" id="contest" onchange="render()">
				<option value="" disabled selected>Choose Contest</option>
				<option value="<?php echo "$contestName"; ?>"><?php echo "$contestName"; ?></option>
			</select>
			<label>Questions </label>
			<select class="browser-default" id="question" onchange="render()">
				<option value="" disabled selected>Choose Question</option>
				<option value="" class="red-text">clear</option>	
				<?php
				foreach ($contestQuestions as $prob) { 
					echo "<option value='$prob'>$prob</option>";
				}
				?>
			</select>
			<label>Types </label>
			<select class="browser-default" id="type" onchange="render()">
				<option value="" disabled selected>Choose Type</option>
				<option value="" class="red-text">clear</option>
				<option value="star">Star</option>
				<option value="lang">Language</option>
			</select>
		</div>

	</header>
	<main>
		<div class="container">
			<div class="row">
				<h3 class="center-align">Submission Trends</h3>
				<span id="url"></span>
				<div id="content">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend enim non metus malesuada, a ullamcorper velit luctus. Vestibulum quis blandit ex. Vivamus ut malesuada risus, vel hendrerit mi. Nunc elit nibh, dictum sit amet nisi ac, sollicitudin faucibus felis. Curabitur mattis dui et molestie imperdiet. Morbi ultricies diam at malesuada accumsan. Praesent in risus a tellus feugiat sodales vitae et nisi.</p>

					<p>Fusce non finibus erat, vitae hendrerit est. Ut vestibulum blandit libero. Curabitur at dignissim turpis. Donec sed orci hendrerit, convallis diam euismod, vestibulum arcu. Maecenas eleifend commodo felis, et volutpat metus dignissim vitae. Vestibulum non lectus non sapien faucibus finibus. Morbi dictum, nisl a blandit blandit, diam nibh dignissim urna, sit amet placerat quam velit egestas erat.</p>

					<p>Maecenas viverra mauris sit amet orci vehicula, sed placerat libero dictum. Suspendisse egestas orci nisl, vel tincidunt est sollicitudin quis. Sed commodo tempus lacinia. Etiam eu maximus ligula. Ut sit amet ornare purus, in placerat magna. Fusce et faucibus sem. Nullam at purus cursus ex interdum fermentum. Maecenas posuere nulla et consectetur rhoncus. Phasellus eu ante vel arcu facilisis vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut mattis finibus lorem congue auctor. Quisque suscipit sed sapien ac molestie.</p>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
	</footer>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<!-- <script type="text/javascript" src="js/angular.min.js"></script> -->
	<script type="text/javascript">
		$(".button-collapse").sideNav();
	</script>
	<script type="text/javascript">
		//google.charts.load('current', {'packages':['corechart']});
		//google.charts.load('current', {'packages':['corechart']});google.charts.setOnLoadCallback(drawChart);graphArray = [['Year', 'Sales', 'Expenses'],['2004',  1000,      400],['2005',  1170,      460],['2006',  660,       1120],['2007',  1030,      540]]
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
				all(contest);
				$('#question').show();
				$('#type').show();
				vartitle=contest;
				setUrl=contest;
			}
			else if(contest && question && !type) {
				oneQuestion(contest,question);
				setUrl=contest+'/problems/'+question;
			}
			else if(contest && question && type){
				single(contest,question,type);
				vartitle=contest+' > '+question+' > ';
				if(type=='star')
					vartitle = vartitle+'Star';
				else
					vartitle = vartitle+'Language';
				vartitle = vartitle+' Based';
				setUrl=contest+'/problems/'+question;
			}
			else if(contest && !question && type) {
				oneType(contest,type);
				setUrl=contest;
			}
			else {
				//alert("Invalid Selection");
			}
			$('#url').html(function() {return '<a href="https://www.codechef.com/'+setUrl+'" target="_blank">Link to Codechef:<br> www.codechef.com/'+setUrl+'</a>';});
			google.charts.load('current', {'packages':['corechart']});
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
			var ar=<?php echo json_encode($contestQuestions); ?>;
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
				//height: ht,
				//width: wd
			};

			var chart = new google.visualization.LineChart(document.getElementById('content'));

			chart.draw(data, options);
		}
		$(window).resize(function(){
			drawChart();
		});
	</script>
</body>
</html>