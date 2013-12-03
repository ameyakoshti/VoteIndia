<!DOCTYPE html>
<html>
	<head>
		<title>Vote India</title>
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Kelly+Slab'/>
		<link rel="stylesheet" href="css/jquery-jvectormap.css" media="screen"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/timeline.css" />

		<script src="js/jquery.js"></script>
		<script src="js/jquery-jvectormap-1.1.1.min.js"></script>
		<script src="js/jquery-jvectormap-india.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body style="background-color:#1B7CCD">
		<div id="map" class="map"></div>
		
		<div id="dialog" style="z-index: 10; position: absolute; right: 3px; top: 3px;border:1px solid;border-radius:10px;">
  			<ul class="nav nav-list" style="padding:10px">
			  <p style="color:#FFFFFF;">National Parties</p>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Bharatiya_Janta_Party">Bharatiya Janta Party</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Indian_National_Congress">Indian National Congress</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Bahujan_Samaj_Party">Bahujan Samaj Party</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Samajwadi_Party">Samajwadi Party</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Samata_Party">Samata Party</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Communist_Party_of_India">Communist Party of India</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Rashtriya_Janata_Dal">Rashtriya Janata Dal</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Shiv_Sena">Shiv Sena</a></li>
			  <li><a href="http://localhost:8888/vote-india-website/party.php?party=Communist_Party_Marxist">Communist Party (Marxist)</a></li>
			</ul>
		</div>
		
		<script>
			$(function() {				
				$('#map').vectorMap({
					map : 'in_mill_en',
					backgroundColor : '#1B7CCD',
					hoverOpacity : 0.7,
					hoverColor : '#ec4924',
					onRegionClick : function(event, code) {
						var stateName = "?state=" + code;
						$('#link').attr('href', $('#link').attr('href') + stateName);
						$("#stateInfo").modal('show');
						$("#voteIndiaState").html(code);
						
						$.ajax({
							url : '#',
							data : {'state' : code},
							type : 'post',
							async: false,
							success: function(){
								var JSONData = '{ "Capital": "Bangalore", "Coordinate": "10 20 30 40", "Population": "10000", "Image": "http://www.mapsofindia.com/maps/karnataka/karnataka-map.jpg", "Desc": "Karnataka /k?rn??t?k?/ is a state in South West India. It was created on 1 November 1956, with the passage of the States Reorganisation Act. Originally known as the State of Mysore, it was renamed Karnataka in 1973." }';
								var obj = jQuery.parseJSON(JSONData);								
								
								var stateDescription = obj.Desc;
								var stateURI = '';
								var stateImage = '<img height="200px" width="200px" src="'+obj.Image+'"></img>';
								var stateCapital = 'Capital: '+ obj.Capital;
								var statePopulation = obj.Population;
								
								$("#stateTitle").html(stateCapital);
								$("#stateDescription").html("<div style=\"float:left;\"><p> "+stateImage+"</p></div><div style=\"margin-left:5px;width:250px;float:left;\"><p style=\"text-align:justify;margin-left:5px \"> "+stateDescription+" </p></br><p>Population :"+statePopulation+"</p></div>");								
							}
						});
						
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
						<h4 id="voteIndiaState" class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div id="state-title" style="text-align: center;">
							<h5 id="stateTitle">Sample Title</h5>
						</div>
						<div id="state-description" style="margin: 30px; text-align: center;">
							<p id="stateDescription"> Sample Description </p>
						</div>
						<div id="state-trailer" style="clear:both; padding-top: 20px; text-align: center; margin: 30px 0px 10px 0px;">
							<a id="link" href="/vote-india-website/timeline.php"> Click here for timeline</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>

