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
			<a href="../">BACK</a>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<h3 class="center-align">Submission Trends</h3>
				<h4>Base Idea.</h4>
				To represent data of AC submissions.
				<h5>Initial Thought</h5>
				At the contest page of codechef "<a href="https://www.codechef.com/LOCAUG17" target="_blank"><i>www.codechef.com/[contest_code]</i></a> ". There is list on Problems, and a total number of AC submission made on that particular Qn. So First thought was that at the end of every contest, let us display the pie chart repesenting out of total submission how much portion was for which Qn.<br>
				Quite simple which can be done manually, all we need is to create data for Google Pie chart and we are done.
				<h5>Current Version</h5>
				The initial thought extended that if at the end we can represent the chart then why not look at the page after every fixed interval and draw the line graph so as to plot the trend.<br>
				Now since every submisson made will be in particular language, and by particular Starred contestant. So we can plot on Language based and Star based also that too for every Qn.
				<h5>How it's done</h5>
				To do this let's have a look on every problem page "<a href="https://www.codechef.com/LOCAUG17/problems/PRINCESS" target="_blank"><i>www.codechef.com/[contest_code]/[problem_code]</i></a> " we'll find that on right side of problem statement there is 'Successful Submissions' clicking on which gives the list for AC for that particular problem.
				One could easily use developer tool to Inspect that part. So on insepection we get a link "<a href="https://www.codechef.com/ssubmission/prob?page=110&pcode=PRINCESS&ccode=LOCAUG17" target="_blank"><i>https://www.codechef.com/ssubmission/prob?page=[page_no]&pcode=[problem_code]&ccode=[contest_code]</i></a> ".
				<br>What does this gives ? This give only the table so it is easier to filter this. As it contains the CC id of user, Star of user, and Language used. We need this much only. Rest it was to write a php code which will make cURL request, parse and filter the data create array for star and language type, store it in JSON format.<br>
				But it wouldn't be wise to make request for all page at evry time, rather continue counting from that page where we left last, so a pointer is stored to continue from last visit.
				Finally filtered data for LOCAUG17 can be found here "<a href="http://52.32.175.165/subtrend/LOCAUG17/" target="_blank"><i>http://52.32.175.165/subtrend/LOCAUG17/</i></a>"
				<h5>Display Part</h5>
				For UI Google's Materialize framework is used, and some of own written css.
				We have data now all need to be done is to mould in the form that Google Charts require. Google Material Line Chart is used for that and JS is written for that "<a href="http://52.32.175.165/subtrend/js/controller.js" target="_blank"><i>http://52.32.175.165/subtrend/js/controller.js</i></a>". One issue here is that Synchronous Ajax call is used so it gives warining as "[Deprecation] Synchronous XMLHttpRequest on the main thread is deprecated because of its detrimental effects to the end user's experience."
				<h5>Hosting Part</h5>
				It is hosted on Amazon AWS, as I used AWS Student pack so not allowed for Elastic Beanstalk, thus created EC2 instance by reading Documentation installed Linux, wamp and php on that instance, and transfered file there. Now as mentioned above we need to look repeatedly after certain interval but this need to be automated so used CRON job to periodically update the JSON datas.<br> Another issue is 503 error, though tried to handle but need more improvement.
				<hr>
				LOCAUG17 contest is used to check the working. <br>Will use only for Long Challenges.
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
