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
				<a href="#" class="brand-logo center">Codigo 2017</a>
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
				<h3 class="center-align">Submission Trends<sup style="color: red; font-size: 10px;">Beta (error of +-5% to +-10%)</sup></div></h3>

				<div id="content">
					This is the display for number of submissions made during the contest of Codechef in a graphical way.<br><br>
					Brief description.
					<ul class="browser-default">
						<li>First of all we select contest from the side menu.</li>
						<li>Now a Graph is displayed, but what does it represent ?</li>
						<li>It represents the number of submissions for all questions at an interval of one hour.</li>
						<li>Here each question is represented by different line.</li>
						<li>Now we get two new options. Questions and Type</li>
						<li>If we select questions, as obvious it represents a graph for that particular Question only.</li>
						<li>Type, there are two type Star and Language.</li>
						<ul class="browser-default">
							<li>Star type represents for total submission made by the particular starred contestant</li>
							<li>Language type represents for total submission made in language used by the contestant</li>
						</ul>
						<li>When we select the Type without selecting a question, it represents type plot for all questions.</li>
						<li>Similarly, selecting all three option displays. In a contest for that question submissions in particular type.</li>

					</ul>
					
				</div>
				<hr>
				<span id="url"></span><br><br>
				<span class="small">It takes few mili-seconds to load the graph. Thank you for you patience.</span>
			</div>
		</div>
	</main>
	<footer>
			<div class="left">Codes written by - AtulAg</div>
			<div class="right">Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
	</footer>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<!-- <script type="text/javascript" src="js/angular.min.js"></script> -->
	<script type="text/javascript">
		$(".button-collapse").sideNav();
	</script>
	<script type="text/javascript" src="js/controller.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-105322052-1', 'auto');
		ga('send', 'pageview');

	</script>

</body>
</html>