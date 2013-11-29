<!DOCTYPE html>
<html>
	<head>
		<title>Vote India</title>
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Kelly+Slab'/>
		<link rel="stylesheet" href="css/jquery-jvectormap.css" media="screen"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/demo.css" />

		<script src="js/jquery.js"></script>
		<script src="js/jquery-jvectormap-1.1.1.min.js"></script>
		<script src="js/jquery-jvectormap-india.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<div id="map" class="map"></div>
		<script>
			$(function() {
				
				/*
				var palette = ['#F9573B', '#F9573B'];
				generateColors = function() {
					var colors = {}, key;

					for (key in map.regions) {
						colors[key] = palette[Math.floor(Math.random() * palette.length)];
					}
					return colors;
				}, map;

				map = new jvm.WorldMap({
					map : 'in_mill_en',
					container : $('#map'),
					series : {
						regions : [{
							attribute : 'fill'
						}]
					}
				});
				map.series.regions[0].setValues(generateColors());
				$('#map').click(function(e) {
					e.preventDefault();
					$("#stateInfo").modal('show');
				});*/

				
				$('#map').vectorMap({
					map : 'in_mill_en',
					//backgroundColor : '#F9573B',
					hoverOpacity : 0.7,
					hoverColor : '#ec4924',
					onRegionClick : function(event, code) {
						var linkProcess = 'gaurang.html' + "?state=" + code;
						$("#stateInfo").modal('show');
					}
				});
			});
		</script>

		<div class="modal fade" id="stateInfo" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">State Name</h4>
					</div>
					<div class="modal-body">
						<div id="state-title" style="text-align: center;">
							<h5>Some title</h5>
						</div>
						<div id="state-description" style="margin: 30px; text-align: center;">

						</div>
						<div id="state-trailer"  style="text-align: center; margin: 30px 0px 10px 0px;">
							<a href="/vote-india/timeline.php"> Click here for timeline</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>

