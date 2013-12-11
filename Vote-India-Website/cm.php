<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chief Minister</title>
		<meta name="description" content="Description and news about chief ministers of India" />
		<meta name="author" content="ameya koshti" />
		<link rel="stylesheet" type="text/css" href="css/cm_party.css" />
		<script src="js/modernizr.custom.79639.js"></script>
		<script src="js/jquery.js"></script>

		<script>
			$(document).ready(function() {
				var split = location.search.replace('?', '').split('=');
				var cm = split[1];
				$.ajax({
					url : 'http://localhost:8181/examples/servlets/servlet/VoteIndia',
					data : {
						'cm_name' : cm,
						'id' : '4'
					},
					type : 'get',
					async : false,
					datatype : 'jsonp',
					success : function(data) {
						JSONData = JSON.stringify(data);
						var obj = jQuery.parseJSON(JSONData).cm;
						$("#cmname").html(obj.name);
						$("#cmdescription").html(obj.desc);
						$("#cmparty").html(obj.party);
						$("#cmwiki").attr("href", obj.wiki);
						$("#cmimg").attr("src", obj.img);
						$("#cmstartdate").html("Political Career from : " + obj.startyear);
						$("#cmenddate").html("Political Career to : " + obj.endyear);
					},
					error : function(data) {
						alert(2);
						alert(data);
					}
				});
			});

		</script>
	</head>
	<body>
		<div id="container" class="container">
			<div class="header">
				<a href="/vote-india-website/timeline.php?state=Maharashtra"> <strong>&laquo; Back to Timeline </strong> </a>
				<div class="clr"></div>
			</div>
			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item" id="item1">
						<div class="content">

							<div class="scroller">
								<h2 id="cmname">CM Name</h2>

								<div style="float:left;padding-right:20px;padding-left:8%;">
									<img id="cmimg" src="#"></img>
								</div>

								<div>
									<p id="cmdescription">

									</p>
									</br>
									<p id="cmparty">

									</p>
									</br>
									<p id="cmstartdate">

									</p>
									<p id="cmenddate">

									</p>
									</br>
									<p>
										<a id="cmwiki" href="#">Wiki Link</a>
									</p>
									</br>
									<p>
										<div style="margin-left:8%;margin-right:8%;border:1px solid;border-radius:2px;padding: 10px;">
											<script type="text/javascript" src="http://output66.rssinclude.com/output?type=js&amp;id=806744&amp;hash=17ddd08b8f5c18948e75e40a417ef7d3"></script>
										</div>
									</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</body>
</html>
