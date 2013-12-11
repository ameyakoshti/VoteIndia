<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Timeline</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="vote india website for people to see the progress of indian government" />
        <meta name="keywords" content="rdf, semantic, india, government, timeline" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/timeline.css" />
        <link rel="stylesheet" type="text/css" href="css/vote-india.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Kelly+Slab' rel='stylesheet' type='text/css' />

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/modernizr.js"></script>
		<style>
			body{
				background: #f9f9f9 url(images/cloth.jpg) repeat top left;
			}
		</style>
		
		<script>
			$(document).ready(function() {		
				var split = location.search.replace('?', '').split('=');
				var state=split[1];

				$.ajax({
						url : 'http://localhost:8181/examples/servlets/servlet/VoteIndia',
						data : {'state' : state, 'id': '3'},
						type : 'get',
						async: false,
						datatype : 'jsonp',
						success: function(data){
							JSONData=JSON.stringify(data);
							var obj = jQuery.parseJSON(JSONData);
							var stateDescription = obj.Desc;
							$("#statedesc").html(stateDescription);
						},
						error: function(data){
							alert(data);
						}
					});
				});
		</script>
    </head>
    
    <body>
	     <?php
			$state = $_GET['state'];
		
			$agriculturalValue = "NA";
			$industrialValue = "NA";
			$serviceValue = "NA";
			$femaleLiteracyValue = "NA";
			$maleLiteracyValue = "NA";
			$manufacturingValue = "NA";
			$miningValue = "NA";
			$cmName = "NA";
			$cmImg = "NA";
		
			$JSONData = file_get_contents("http://localhost:8181/examples/servlets/servlet/VoteIndia?state=$state&id=2");
	    ?>
        <div class="container">
            <div class="header">
                <a href="/Vote-India-Website/index.php">
                    <strong>&laquo; Back to Map </strong>
                </a>
                <span class="right">
                    <a href="#">
                      
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			</br></br></br></br></br>
			<h1><?php echo str_replace('_',' ',$state); ?></h1>
			 </br>
			<div class="statedescription" id="statedesc">
				<p> 	            	
		            Data about the State.
	            </p>
			</div>
			
            <h2 class="ss-subtitle"><?php echo str_replace('_',' ',$state); ?> Timeline</h2>
			<div id="ss-links" class="ss-links">
				<a href="#2012">2012</a>
				<a href="#2011">2011</a>
				<a href="#2010">2010</a>
				<a href="#2009">2009</a>
				<a href="#2008">2008</a>
				<a href="#2007">2007</a>
				<a href="#2006">2006</a>
				<a href="#2005">2005</a>
				<a href="#2004">2004</a>
				<a href="#2003">2003</a>
				<a href="#2002">2002</a>
				<a href="#2001">2001</a>			
			</div>
			
            <div id="ss-container" class="ss-container">
                <?php
				$obj = json_decode($JSONData, true);

				foreach ($obj['state']['year'] as $year) {
					
					foreach ($year['factors'] as $factor) {
						$industrialValue = $factor[0]['factorvalue'];
						$femaleLiteracyValue = $factor[1]['factorvalue'];
						$maleLiteracyValue = $factor[2]['factorvalue'];
						$miningValue = $factor[3]['factorvalue'];
						$manufacturingValue = $factor[4]['factorvalue'];
						$serviceValue = $factor[5]['factorvalue'];
						$agriculturalValue = $factor[6]['factorvalue'];
					}
					foreach ($year['cms'] as $cm) {
						$cmName = str_replace(' ','_',$cm[0]['cmname']);
						$cmImg = $cm[0]['img'];
						break;
					}		
					
					$finalscore = 0;
					foreach ($obj['rating'] as $score) {
						if($score['year'] === $year['yearvalue'] ){
							$finalscore = $score['score'];
						}
					}				
					
					$imageCount++;
					$year = '<div class="ss-row"> <div class="ss-left"> <h2 style="color:#49586E;" id="' . $year['yearvalue'] . '">Year</h2> </div> <div class="ss-right"> <h2 style="color:#49586E;">' . $year['yearvalue'] . '</h2> </div> </div>';
					$CMonLeft = '<div class="ss-row ss-medium">' . '<div class="ss-left">' . '<a href="http://localhost:8888/Vote-India-Website/cm.php?name='.$cmName.'"><img title="'.$finalscore.'" src ="'.$cmImg.'"/></a>' . '</div>' . '<div class="ss-right">' . '<h3>' . '<a href="#">Agricultural Growth:' . $agriculturalValue . '</a>' . '</h3>' . '</div>' . '<div class="ss-right">' . '<h3>' . '<a href="#">Industrial Growth:' . $industrialValue . '</a>' . '</h3>' . '</div>' . '<div class="ss-right">' . '<h3>' . '<a href="#">Service Growth:' . $serviceValue . '</a>' . '</h3>' . '</div>' . '</div>' . '<div class="ss-row ss-medium">' . '<div class="ss-left">' . '<h3>' . '<a href="#">Female Literacy:' . $femaleLiteracyValue . '</a>' . '</h3>' . '</div>' . '<div class="ss-right">' . '<h3>' . '<a href="#">Male Literacy:' . $maleLiteracyValue . '</a>' . '</h3>' . '</div>' . '</div>' . '<div class="ss-row ss-medium">' . '<div class="ss-left">' . '<h3>' . '<a href="#">Manufacturing Growth:' . $manufacturingValue . '</a>' . '</h3>' . '</div>' . '<div class="ss-right">' . '<h3>' . '<a href="#">Mining Growth:' . $miningValue . '</a>' . '</h3>' . '</div>' . '</div>';
					echo $year;
					echo $CMonLeft;
					
				}
                ?>
            </div>
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		
        <script type="text/javascript">
			$(function() {

				var $sidescroll = (function() {

					// the row elements
					var $rows = $('#ss-container > div.ss-row'),
					// we will cache the inviewport rows and the outside viewport rows
					$rowsViewport, $rowsOutViewport,
					// navigation menu links
					$links = $('#ss-links > a'),
					// the window element
					$win = $(window),
					// we will store the window sizes here
					winSize = {},
					// used in the scroll setTimeout function
					anim = false,
					// page scroll speed
					scollPageSpeed = 2000,
					// page scroll easing
					scollPageEasing = 'easeInOutExpo',
					// perspective?
					hasPerspective = true, perspective = hasPerspective && Modernizr.csstransforms3d,
					// initialize function
					init = function() {

						// get window sizes
						getWinSize();
						// initialize events
						initEvents();
						// define the inviewport selector
						defineViewport();
						// gets the elements that match the previous selector
						setViewportRows();
						// if perspective add css
						if (perspective) {
							$rows.css({
								'-webkit-perspective' : 600,
								'-webkit-perspective-origin' : '50% 0%'
							});
						}
						// show the pointers for the inviewport rows
						$rowsViewport.find('a.ss-circle').addClass('ss-circle-deco');
						// set positions for each row
						placeRows();

					},
					// defines a selector that gathers the row elems that are initially visible.
					// the element is visible if its top is less than the window's height.
					// these elements will not be affected when scrolling the page.
					defineViewport = function() {

						$.extend($.expr[':'], {

							inviewport : function(el) {
								if ($(el).offset().top < winSize.height) {
									return true;
								}
								return false;
							}
						});

					},
					// checks which rows are initially visible
					setViewportRows = function() {

						$rowsViewport = $rows.filter(':inviewport');
						$rowsOutViewport = $rows.not($rowsViewport)

					},
					// get window sizes
					getWinSize = function() {

						winSize.width = $win.width();
						winSize.height = $win.height();

					},
					// initialize some events
					initEvents = function() {

						// navigation menu links.
						// scroll to the respective section.
						$links.on('click.Scrolling', function(event) {

							// scroll to the element that has id = menu's href
							$('html, body').stop().animate({
								scrollTop : $($(this).attr('href')).offset().top
							}, scollPageSpeed, scollPageEasing);

							return false;

						});

						$(window).on({
							// on window resize we need to redefine which rows are initially visible (this ones we will not animate).
							'resize.Scrolling' : function(event) {

								// get the window sizes again
								getWinSize();
								// redefine which rows are initially visible (:inviewport)
								setViewportRows();
								// remove pointers for every row
								$rows.find('a.ss-circle').removeClass('ss-circle-deco');
								// show inviewport rows and respective pointers
								$rowsViewport.each(function() {

									$(this).find('div.ss-left').css({
										left : '0%'
									}).end().find('div.ss-right').css({
										right : '0%'
									}).end().find('a.ss-circle').addClass('ss-circle-deco');

								});

							},
							// when scrolling the page change the position of each row
							'scroll.Scrolling' : function(event) {

								// set a timeout to avoid that the
								// placeRows function gets called on every scroll trigger
								if (anim)
									return false;
								anim = true;
								setTimeout(function() {

									placeRows();
									anim = false;

								}, 10);

							}
						});

					},
					// sets the position of the rows (left and right row elements).
					// Both of these elements will start with -50% for the left/right (not visible)
					// and this value should be 0% (final position) when the element is on the
					// center of the window.
					placeRows = function() {

						// how much we scrolled so far
						var winscroll = $win.scrollTop(),
						// the y value for the center of the screen
						winCenter = winSize.height / 2 + winscroll;

						// for every row that is not inviewport
						$rowsOutViewport.each(function(i) {

							var $row = $(this),
							// the left side element
							$rowL = $row.find('div.ss-left'),
							// the right side element
							$rowR = $row.find('div.ss-right'),
							// top value
							rowT = $row.offset().top;

							// hide the row if it is under the viewport
							if (rowT > winSize.height + winscroll) {

								if (perspective) {

									$rowL.css({
										'-webkit-transform' : 'translate3d(-75%, 0, 0) rotateY(-90deg) translate3d(-75%, 0, 0)',
										'opacity' : 0
									});
									$rowR.css({
										'-webkit-transform' : 'translate3d(75%, 0, 0) rotateY(90deg) translate3d(75%, 0, 0)',
										'opacity' : 0
									});

								} else {

									$rowL.css({
										left : '-50%'
									});
									$rowR.css({
										right : '-50%'
									});

								}

							}
							// if not, the row should become visible (0% of left/right) as it gets closer to the center of the screen.
							else {

								// row's height
								var rowH = $row.height(),
								// the value on each scrolling step will be proporcional to the distance from the center of the screen to its height
								factor = (((rowT + rowH / 2 ) - winCenter ) / (winSize.height / 2 + rowH / 2 ) ),
								// value for the left / right of each side of the row.
								// 0% is the limit
								val = Math.max(factor * 50, 0);

								if (val <= 0) {

									// when 0% is reached show the pointer for that row
									if (!$row.data('pointer')) {

										$row.data('pointer', true);
										$row.find('.ss-circle').addClass('ss-circle-deco');

									}

								} else {

									// the pointer should not be shown
									if ($row.data('pointer')) {

										$row.data('pointer', false);
										$row.find('.ss-circle').removeClass('ss-circle-deco');

									}

								}

								// set calculated values
								if (perspective) {

									var t = Math.max(factor * 75, 0), r = Math.max(factor * 90, 0), o = Math.min(Math.abs(factor - 1), 1);

									$rowL.css({
										'-webkit-transform' : 'translate3d(-' + t + '%, 0, 0) rotateY(-' + r + 'deg) translate3d(-' + t + '%, 0, 0)',
										'opacity' : o
									});
									$rowR.css({
										'-webkit-transform' : 'translate3d(' + t + '%, 0, 0) rotateY(' + r + 'deg) translate3d(' + t + '%, 0, 0)',
										'opacity' : o
									});

								} else {

									$rowL.css({
										left : -val + '%'
									});
									$rowR.css({
										right : -val + '%'
									});

								}

							}

						});

					};

					return {
						init : init
					};

				})();

				$sidescroll.init();

			});
		</script>
    </body>
</html>