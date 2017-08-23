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
				<option value="AUG17">AUG17</option>
			</select>
			<label>Questions </label>
			<select class="browser-default" id="question" onchange="render()">
				<option value="" disabled selected>Choose Question</option>
				<option value="CHEFFA">CHEFFA</option>
				<option value="CHEFMOVR">CHEFMOVR</option>
				<option value="GCAC">GCAC</option>
				<option value="HILLJUMP">HILLJUMP</option>
				<option value="MATDW">MATDW</option>
				<option value="PALINGAM">PALINGAM</option>
				<option value="RAINBOWA">RAINBOWA</option>
				<option value="STRINGRA">STRINGRA</option>
				<option value="WALKBT">WALKBT</option>
			</select>
			<label>Types </label>
			<select class="browser-default" id="type" onchange="render()">
				<option value="" disabled selected>Choose Type</option>
				<option value="star">Star</option>
				<option value="lang">Language</option>
			</select>
		</div>

	</header>
	<main>
		<div class="container">
			<div class="row">
				<h3 class="center-align">Submission Trends</h3>

				<div id="content">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend enim non metus malesuada, a ullamcorper velit luctus. Vestibulum quis blandit ex. Vivamus ut malesuada risus, vel hendrerit mi. Nunc elit nibh, dictum sit amet nisi ac, sollicitudin faucibus felis. Curabitur mattis dui et molestie imperdiet. Morbi ultricies diam at malesuada accumsan. Praesent in risus a tellus feugiat sodales vitae et nisi.</p>

					<p>Fusce non finibus erat, vitae hendrerit est. Ut vestibulum blandit libero. Curabitur at dignissim turpis. Donec sed orci hendrerit, convallis diam euismod, vestibulum arcu. Maecenas eleifend commodo felis, et volutpat metus dignissim vitae. Vestibulum non lectus non sapien faucibus finibus. Morbi dictum, nisl a blandit blandit, diam nibh dignissim urna, sit amet placerat quam velit egestas erat.</p>

					<p>Morbi ullamcorper quam non sem pretium interdum. Maecenas varius feugiat enim, quis ullamcorper eros imperdiet id. Sed faucibus arcu quis nibh imperdiet cursus. Curabitur convallis erat non arcu consectetur dignissim. Praesent varius felis vel lectus pretium eleifend. Sed risus magna, consectetur non urna a, lobortis consequat eros. Ut nec libero finibus, fringilla dui id, mollis felis. In hac habitasse platea dictumst. Suspendisse aliquam accumsan metus at auctor. Aenean at nibh quis leo aliquet aliquam. Nam massa nisl, mattis vel dolor at, placerat ornare nulla. Donec bibendum dolor magna, quis volutpat dolor molestie vitae. Vivamus diam ligula, eleifend eget ornare commodo, ultricies eget orci. Donec lacinia tempor ex eu semper. Curabitur auctor eros in felis semper dapibus. Aenean semper placerat ligula.</p>

					<p>Nulla facilisi. Nunc vel imperdiet dui. Pellentesque iaculis eros at nulla auctor, ac maximus ante lacinia. Aliquam faucibus dolor ut neque iaculis, in scelerisque orci ornare. Sed volutpat at arcu id malesuada. Nunc in nibh sit amet metus tincidunt auctor vel id quam. Duis semper rhoncus enim eu rutrum. Mauris mollis volutpat arcu at efficitur. Sed massa purus, tempus ut pulvinar faucibus, luctus in tortor. Curabitur vitae pretium mauris, in posuere ligula. Vivamus pretium, velit id semper finibus, mi ex elementum justo, non ornare felis lacus at sapien.</p>

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
		var graphArray;

		function render() {
			contest = $("#contest").val();
			question = $("#question").val();
			type = $("#type").val();
			//alert(contest+" "+question+" "+type);
			graphArray = [
			['Year', 'Sales', 'Expenses'],
			['2004',  1000,      400],
			['2005',  1170,      460],
			['2006',  660,       1120],
			['2007',  1030,      540]
			]
			if(contest && !question && !type) {
				all(contest);
			}
			else if(contest && question && !type) {
				oneQuestion(contest,question);
			}
			else if(contest && question && type){
				single(contest,question,type);
			}
			else {
				//alert("Invalid Selection");
			}
			//google.charts.setOnLoadCallback(drawChart);
		}

		function zeros(dimensions) {
			var array = [];
			for (var i = 0; i < dimensions[0]; ++i) {
				array.push(dimensions.length == 1 ? 0 : zeros(dimensions.slice(1)));
			}
			return array;
		}


		function getQuestions(contest) {
			alert("Getting Qns for - "+contest);
			var ar=["PALINGAM","GCAC","CHEFMOVR","RAINBOWA","CHEFFA","STRINGRA","HILLJUMP","WALKBT","MATDW"];
			return ar;
		}


		function all(contest) {
			//alert(contest + " all contest Data");
			var ar=getQuestions(contest);
			var numberOfQuestion = ar.length;
			var dataAr={};
			$("#content").empty();
			for(var i=0;i<numberOfQuestion;i++) {
				var question=ar[i];
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
			console.log(dataAr);
			return;
		}
		function oneQuestion(contest,question) {
			//alert(contest + question + "Question + Contest");
			return;
		}
		function single(contest,question,type) {
			var path=contest+'/'+question+'/'+type+'Data.json';
			$.getJSON(path)
			.done(function( json ) {
				console.log( "JSON Data: " + JSON.stringify(json, null, 2) );
			})
			.fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ", " + error;
				console.log( "Request Failed: " + err );
			});
			//alert(contest + question + type + "Question + Contest + Type");
			return;
		}
		function drawChart() {
			var data = google.visualization.arrayToDataTable(graphArray);

			var options = {
				title: 'Company Performance',
				curveType: 'function',
				legend: { position: 'right' }
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