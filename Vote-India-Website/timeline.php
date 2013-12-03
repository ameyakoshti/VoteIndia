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

		<script type="text/javascript" src="js/modernizr.js"></script>
		<style>
			body{
				background: #f9f9f9 url(images/cloth.jpg) repeat top left;
			}
		</style>
    </head>
    
    <?php
    	$state = $_GET['state'];
		
		$agriculturalValue = "NA";
		$industrialValue = "NA";
		$serviceValue = "NA";
		$femaleLiteracyValue = "NA";
		$maleLiteracyValue = "NA";
		$manufacturingValue = "NA";
		$miningValue = "NA";
		$JSONData = '{ "state": { "name": "Maharashtra", "year": [ { "yearvalue": 2013, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": "NA" }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": "NA" }, { "factorname": "Manufacturing growth", "factorvalue": "NA" }, { "factorname": "Services growth", "factorvalue": "NA" }, { "factorname": "Agriculture and Allied growth", "factorvalue": "NA" } ] }, "cms": { "cm": { "cmname": "Prithviraj Chavan" } } }, { "yearvalue": 2012, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": "NA" }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": "NA" }, { "factorname": "Manufacturing growth", "factorvalue": "NA" }, { "factorname": "Services growth", "factorvalue": "NA" }, { "factorname": "Agriculture and Allied growth", "factorvalue": "NA" } ] }, "cms": { "cm": { "cmname": "Prithviraj Chavan" } } }, { "yearvalue": 2011, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 9.15 }, { "factorname": "Female Literacy Rate", "factorvalue": 75.48 }, { "factorname": "Male Literacy Rate", "factorvalue": 89.82 }, { "factorname": "Mining and Quarrying growth", "factorvalue": -2.91 }, { "factorname": "Manufacturing growth", "factorvalue": 4.24 }, { "factorname": "Services growth", "factorvalue": 10.13 }, { "factorname": "Agriculture and Allied growth", "factorvalue": -5.12 } ] }, "cms": { "cm": { "cmname": "Prithviraj Chavan" } } }, { "yearvalue": 2010, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 10.83 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": 1.27 }, { "factorname": "Manufacturing growth", "factorvalue": 8.34 }, { "factorname": "Services growth", "factorvalue": 11.04 }, { "factorname": "Agriculture and Allied growth", "factorvalue": 15.59 } ] }, "cms": { "cm": [ { "cmname": "Ashok Chavan" }, { "cmname": "Prithviraj Chavan" } ] } }, { "yearvalue": 2009, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 9.96 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": 7.08 }, { "factorname": "Manufacturing growth", "factorvalue": 7.16 }, { "factorname": "Services growth", "factorvalue": 9.98 }, { "factorname": "Agriculture and Allied growth", "factorvalue": 0.82 } ] }, "cms": { "cm": [ { "cmname": "Ashok Chavan" }, { "cmname": "Ashok Chavan" } ] } }, { "yearvalue": 2008, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": -1.06 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": -3.31 }, { "factorname": "Manufacturing growth", "factorvalue": -4.33 }, { "factorname": "Services growth", "factorvalue": 7.96 }, { "factorname": "Agriculture and Allied growth", "factorvalue": -15.45 } ] }, "cms": { "cm": [ { "cmname": "Vilasrao Deshmukh" }, { "cmname": "Ashok Chavan" } ] } }, { "yearvalue": 2007, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 11.73 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": 0.79 }, { "factorname": "Manufacturing growth", "factorvalue": 8.7 }, { "factorname": "Services growth", "factorvalue": 10.54 }, { "factorname": "Agriculture and Allied growth", "factorvalue": 13.76 } ] }, "cms": { "cm": { "cmname": "Vilasrao Deshmukh" } } }, { "yearvalue": 2006, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 15.82 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": 2.57 }, { "factorname": "Manufacturing growth", "factorvalue": 18.78 }, { "factorname": "Services growth", "factorvalue": 12.23 }, { "factorname": "Agriculture and Allied growth", "factorvalue": 14.03 } ] }, "cms": { "cm": { "cmname": "Vilasrao Deshmukh" } } }, { "yearvalue": 2005, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 18.93 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": 2.35 }, { "factorname": "Manufacturing growth", "factorvalue": 24.92 }, { "factorname": "Services growth", "factorvalue": 11.32 }, { "factorname": "Agriculture and Allied growth", "factorvalue": 9.2 } ] }, "cms": { "cm": { "cmname": "Vilasrao Deshmukh" } } }, { "yearvalue": 2004, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 10.7 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": "NA" }, { "factorname": "Manufacturing growth", "factorvalue": "NA" }, { "factorname": "Services growth", "factorvalue": "NA" }, { "factorname": "Agriculture and Allied growth", "factorvalue": "NA" } ] }, "cms": { "cm": [ { "cmname": "Vilasrao Deshmukh" }, { "cmname": "Sushilkumar Shinde" } ] } }, { "yearvalue": 2003, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": 11.79 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": "NA" }, { "factorname": "Manufacturing growth", "factorvalue": "NA" }, { "factorname": "Services growth", "factorvalue": "NA" }, { "factorname": "Agriculture and Allied growth", "factorvalue": "NA" } ] }, "cms": { "cm": [ { "cmname": "Vilasrao Deshmukh" }, { "cmname": "Sushilkumar Shinde" } ] } }, { "yearvalue": 2002, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": -6.72 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": "NA" }, { "factorname": "Manufacturing growth", "factorvalue": "NA" }, { "factorname": "Services growth", "factorvalue": "NA" }, { "factorname": "Agriculture and Allied growth", "factorvalue": "NA" } ] }, "cms": { "cm": { "cmname": "Vilasrao Deshmukh" } } }, { "yearvalue": 2001, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": -10.36 }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": 85.97 }, { "factorname": "Mining and Quarrying growth", "factorvalue": "NA" }, { "factorname": "Manufacturing growth", "factorvalue": "NA" }, { "factorname": "Services growth", "factorvalue": "NA" }, { "factorname": "Agriculture and Allied growth", "factorvalue": "NA" } ] }, "cms": { "cm": { "cmname": "Vilasrao Deshmukh" } } }, { "yearvalue": 2000, "factors": { "factor": [ { "factorname": "Industry growth", "factorvalue": "NA" }, { "factorname": "Female Literacy Rate", "factorvalue": "NA" }, { "factorname": "Male Literacy Rate", "factorvalue": "NA" }, { "factorname": "Mining and Quarrying growth", "factorvalue": "NA" }, { "factorname": "Manufacturing growth", "factorvalue": "NA" }, { "factorname": "Services growth", "factorvalue": "NA" }, { "factorname": "Agriculture and Allied growth", "factorvalue": "NA" } ] }, "cms": { "cm": { "cmname": "Vilasrao Deshmukh" } } } ] } }';    
    ?>
        
    <body>
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
			<h1><?php echo $state;?></h1>
			 </br>
			<div class="statedescription">
				<p> 	            	
		            Maharashtra is a state in the western region of India. It is the second most populous state after Uttar Pradesh and third largest state by area in India. Maharashtra is the wealthiest state in India, contributing 15% of the country's industrial output and 13.3% of its GDP (2006–2007 figures).[5]
					Maharashtra is bordered by the Arabian Sea to the west, Gujarat and the Union territory of Dadra and Nagar Haveli to the northwest, Madhya Pradesh to the north and northeast, Chhattisgarh to the east, Karnataka to the south, Andhra Pradesh to the southeast and Goa to the southwest. The state covers an area of 307,731 km2 (118,816 sq mi) or 9.84% of the total geographical area of India. Mumbai, the capital city of the state, is India's largest city and the financial capital of the nation. Maharashtra is the world's second most populous first-level administrative country sub-division. Were it a nation in its own right, Maharashtra would be the world's twelfth most populous country ahead of Philippines.
					In the 16th century, the Marathas rose under the leadership of Shivaji against the Mughals, who ruled a large part of India. By 1760, Maratha Empire had reached its zenith with a territory of over 250 million acres (1 million km²) or one-third of the Indian sub-continent. After the Third Anglo-Maratha War, the empire ended and most of Maharashtra became part of Bombay State under a British Raj. After Indian independence, Samyukta Maharashtra Samiti demanded unification of all Marathi-speaking regions under one state. At that time, Babasaheb Ambedkar was of the opinion that linguistic reorganisation of states should be done on a "One state – One language" principle and not on a "One language – One state" principle. He submitted a memorandum to the reorganisation commission stating that a "single government can not administer such a huge state as United Maharashtra".[6] The first state reorganisation committee created the current Maharashtra state on 1 May 1960 (known as Maharashtra Day). The Marathi-speaking areas of Bombay State, Deccan states and Vidarbha united, under the agreement known as Nagpur Pact, to form the current state
	            </p>
			</div>
			
            <h2 class="ss-subtitle"><?php echo $state;?> Timeline</h2>
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
				<!--<a href="#2000">2000</a>-->				
			</div>
			
            <div id="ss-container" class="ss-container">
                <?php
                
                	$obj = json_decode($JSONData,true);
					$imageCount = 0;
					foreach($obj['state']['year']as $year) {
						//echo $year['yearvalue'];
						foreach($year['factors']as $factor) {
								$industrialValue = $factor[0]['factorvalue'];								
								$femaleLiteracyValue = $factor[1]['factorvalue'];
								$maleLiteracyValue = $factor[2]['factorvalue'];
								$miningValue = $factor[3]['factorvalue'];
								$manufacturingValue = $factor[4]['factorvalue'];
								$serviceValue = $factor[5]['factorvalue'];
								$agriculturalValue = $factor[6]['factorvalue'];
						}
						$imageCount++;
						$year = '<div class="ss-row"> <div class="ss-left"> <h2 style="color:#49586E;" id="'.$year['yearvalue'].'">Year</h2> </div> <div class="ss-right"> <h2 style="color:#49586E;">'.$year['yearvalue'].'</h2> </div> </div>';
						$CMonLeft = '<div class="ss-row ss-medium">' .'<div class="ss-left">' .'<a href="http://localhost:8888/vote-india-website/cm.php?name=Prithviraj_Chavan" class="ss-circle ss-circle-'.$imageCount.'"></a>' .'</div>' .'<div class="ss-right">' .'<h3>' .'<a href="#">Agricultural Growth:'.$agriculturalValue.'</a>' .'</h3>' .'</div>' .'<div class="ss-right">' .'<h3>' .'<a href="#">Industrial Growth:'.$industrialValue.'</a>' .'</h3>' .'</div>' .'<div class="ss-right">' .'<h3>' .'<a href="#">Service Growth:'.$serviceValue.'</a>' .'</h3>' .'</div>' .'</div>' .'<div class="ss-row ss-medium">' .'<div class="ss-left">' .'<h3>' .'<a href="#">Female Literacy:'.$femaleLiteracyValue.'</a>' .'</h3>' .'</div>' .'<div class="ss-right">' .'<h3>' .'<a href="#">Male Literacy:'.$maleLiteracyValue.'</a>' .'</h3>' .'</div>' .'</div>' .'<div class="ss-row ss-medium">' .'<div class="ss-left">' .'<h3>' .'<a href="#">Manufacturing Growth:'.$manufacturingValue.'</a>' .'</h3>' .'</div>' .'<div class="ss-right">' .'<h3>' .'<a href="#">Mining Growth:'.$miningValue.'</a>' .'</h3>' .'</div>' .'</div>';
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

			var $sidescroll	= (function() {
					
					// the row elements
				var $rows			= $('#ss-container > div.ss-row'),
					// we will cache the inviewport rows and the outside viewport rows
					$rowsViewport, $rowsOutViewport,
					// navigation menu links
					$links			= $('#ss-links > a'),
					// the window element
					$win			= $(window),
					// we will store the window sizes here
					winSize			= {},
					// used in the scroll setTimeout function
					anim			= false,
					// page scroll speed
					scollPageSpeed	= 2000 ,
					// page scroll easing
					scollPageEasing = 'easeInOutExpo',
					// perspective?
					hasPerspective	= true,
					
					perspective		= hasPerspective && Modernizr.csstransforms3d,
					// initialize function
					init			= function() {
						
						// get window sizes
						getWinSize();
						// initialize events
						initEvents();
						// define the inviewport selector
						defineViewport();
						// gets the elements that match the previous selector
						setViewportRows();
						// if perspective add css
						if( perspective ) {
							$rows.css({
								'-webkit-perspective'			: 600,
								'-webkit-perspective-origin'	: '50% 0%'
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
					defineViewport	= function() {
					
						$.extend( $.expr[':'], {
						
							inviewport	: function ( el ) {
								if ( $(el).offset().top < winSize.height ) {
									return true;
								}
								return false;
							}
						
						});
					
					},
					// checks which rows are initially visible 
					setViewportRows	= function() {
						
						$rowsViewport 		= $rows.filter(':inviewport');
						$rowsOutViewport	= $rows.not( $rowsViewport )
						
					},
					// get window sizes
					getWinSize		= function() {
					
						winSize.width	= $win.width();
						winSize.height	= $win.height();
					
					},
					// initialize some events
					initEvents		= function() {
						
						// navigation menu links.
						// scroll to the respective section.
						$links.on( 'click.Scrolling', function( event ) {
							
							// scroll to the element that has id = menu's href
							$('html, body').stop().animate({
								scrollTop: $( $(this).attr('href') ).offset().top
							}, scollPageSpeed, scollPageEasing );
							
							return false;
						
						});
						
						$(window).on({
							// on window resize we need to redefine which rows are initially visible (this ones we will not animate).
							'resize.Scrolling' : function( event ) {
								
								// get the window sizes again
								getWinSize();
								// redefine which rows are initially visible (:inviewport)
								setViewportRows();
								// remove pointers for every row
								$rows.find('a.ss-circle').removeClass('ss-circle-deco');
								// show inviewport rows and respective pointers
								$rowsViewport.each( function() {
								
									$(this).find('div.ss-left')
										   .css({ left   : '0%' })
										   .end()
										   .find('div.ss-right')
										   .css({ right  : '0%' })
										   .end()
										   .find('a.ss-circle')
										   .addClass('ss-circle-deco');
								
								});
							
							},
							// when scrolling the page change the position of each row	
							'scroll.Scrolling' : function( event ) {
								
								// set a timeout to avoid that the 
								// placeRows function gets called on every scroll trigger
								if( anim ) return false;
								anim = true;
								setTimeout( function() {
									
									placeRows();
									anim = false;
									
								}, 10 );
							
							}
						});
					
					},
					// sets the position of the rows (left and right row elements).
					// Both of these elements will start with -50% for the left/right (not visible)
					// and this value should be 0% (final position) when the element is on the
					// center of the window.
					placeRows		= function() {
						
							// how much we scrolled so far
						var winscroll	= $win.scrollTop(),
							// the y value for the center of the screen
							winCenter	= winSize.height / 2 + winscroll;
						
						// for every row that is not inviewport
						$rowsOutViewport.each( function(i) {
							
							var $row	= $(this),
								// the left side element
								$rowL	= $row.find('div.ss-left'),
								// the right side element
								$rowR	= $row.find('div.ss-right'),
								// top value
								rowT	= $row.offset().top;
							
							// hide the row if it is under the viewport
							if( rowT > winSize.height + winscroll ) {
								
								if( perspective ) {
								
									$rowL.css({
										'-webkit-transform'	: 'translate3d(-75%, 0, 0) rotateY(-90deg) translate3d(-75%, 0, 0)',
										'opacity'			: 0
									});
									$rowR.css({
										'-webkit-transform'	: 'translate3d(75%, 0, 0) rotateY(90deg) translate3d(75%, 0, 0)',
										'opacity'			: 0
									});
								
								}
								else {
								
									$rowL.css({ left 		: '-50%' });
									$rowR.css({ right 		: '-50%' });
								
								}
								
							}
							// if not, the row should become visible (0% of left/right) as it gets closer to the center of the screen.
							else {
									
									// row's height
								var rowH	= $row.height(),
									// the value on each scrolling step will be proporcional to the distance from the center of the screen to its height
									factor 	= ( ( ( rowT + rowH / 2 ) - winCenter ) / ( winSize.height / 2 + rowH / 2 ) ),
									// value for the left / right of each side of the row.
									// 0% is the limit
									val		= Math.max( factor * 50, 0 );
									
								if( val <= 0 ) {
								
									// when 0% is reached show the pointer for that row
									if( !$row.data('pointer') ) {
									
										$row.data( 'pointer', true );
										$row.find('.ss-circle').addClass('ss-circle-deco');
									
									}
								
								}
								else {
									
									// the pointer should not be shown
									if( $row.data('pointer') ) {
										
										$row.data( 'pointer', false );
										$row.find('.ss-circle').removeClass('ss-circle-deco');
									
									}
									
								}
								
								// set calculated values
								if( perspective ) {
									
									var	t		= Math.max( factor * 75, 0 ),
										r		= Math.max( factor * 90, 0 ),
										o		= Math.min( Math.abs( factor - 1 ), 1 );
									
									$rowL.css({
										'-webkit-transform'	: 'translate3d(-' + t + '%, 0, 0) rotateY(-' + r + 'deg) translate3d(-' + t + '%, 0, 0)',
										'opacity'			: o
									});
									$rowR.css({
										'-webkit-transform'	: 'translate3d(' + t + '%, 0, 0) rotateY(' + r + 'deg) translate3d(' + t + '%, 0, 0)',
										'opacity'			: o
									});
								
								}
								else {
									
									$rowL.css({ left 	: - val + '%' });
									$rowR.css({ right 	: - val + '%' });
									
								}
								
							}	
						
						});
					
					};
				
				return { init : init };
			
			})();
			
			$sidescroll.init();
			
		});
		</script>
    </body>
</html>