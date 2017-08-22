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
</head>
<body>
	<header class="top_pad">
		<nav class="dbg">
			<div class="nav-wrapper">
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
				<a href="#" class="brand-logo center">Logo</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<li><a href=""></a></li>
				</ul>
			</div>
		</nav>
		<ul id="slide-out" class="side-nav fixed z-depth-4">
			<img src="fonts/svg/bar.svg" />
			<ul class="collapsible" data-collapsible="accordion">
				<li>
					<div class="collapsible-header"><i class="material-icons">code</i>Long</div>
					<div class="collapsible-body">
					<ul>
					<li>AUG17</li>
					</ul>
					</div>
				</li>
			</ul>
		</ul>

	</header>
	<main>
		<div class="container">
			<div class="row">
				<h3 class="center-align">CodeChef's Submission Trends</h3>

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

</body>
</html>