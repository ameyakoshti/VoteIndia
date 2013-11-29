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
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
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
    	$state = "Maharashtra";
		    
    ?>
    
    <?php
	 $CMonLeft = 
	        '<div class="ss-row ss-medium">'
			.'<div class="ss-left">'
			.'<a href="#" class="ss-circle ss-circle-1"></a>'
			.'</div>'
			.'<div class="ss-right">'
			.'<h3>'
			.'<a href="#">Agricultural Growth:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-right">'
			.'<h3>'
			.'<a href="#">Industrial Growth:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-right">'
			.'<h3>'
			.'<a href="#">Service Growth:</a>'
			.'</h3>'
			.'</div>'
			.'</div>'
			.'<div class="ss-row ss-medium">'
			.'<div class="ss-left">'
			.'<h3>'
			.'<a href="#">Female Literacy:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-right">'
			.'<h3>'
			.'<a href="#">Male Literacy:</a>'
			.'</h3>'
			.'</div>'
			.'</div>'
			.'<div class="ss-row ss-medium">'
			.'<div class="ss-left">'
			.'<h3>'
			.'<a href="#">Manufacturing Growth:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-right">'
			.'<h3>'
			.'<a href="#">Mining Growth:</a>'
			.'</h3>'
			.'</div>'
			.'</div>';

	$CMonRight =
			'<div class="ss-row ss-medium">'
			.'<div class="ss-left">'
			.'<a href="#" class="ss-circle ss-circle-1"></a>'
			.'</div>'
			.'<div class="ss-left">'
			.'<h3>'
			.'<a href="#">Agricultural Growth:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-left">'
			.'<h3>'
			.'<a href="#">Industrial Growth:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-left">'
			.'<h3>'
			.'<a href="#">Service Growth:</a>'
			.'</h3>'
			.'</div>'
			.'</div>'
			.'<div class="ss-row ss-medium">'
			.'<div class="ss-right">'
			.'<h3>'
			.'<a href="#">Female Literacy:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-left">'
			.'<h3>'
			.'<a href="#">Male Literacy:</a>'
			.'</h3>'
			.'</div>'
			.'</div>'
			.'<div class="ss-row ss-medium">'
			.'<div class="ss-right">'
			.'<h3>'
			.'<a href="#">Manufacturing Growth:</a>'
			.'</h3>'
			.'</div>'
			.'<div class="ss-left">'
			.'<h3>'
			.'<a href="#">Mining Growth:</a>'
			.'</h3>'
			.'</div>'
			.'</div>';
    ?>
    
    <body>
        <div class="container">
            <div class="header">
                <a href="/Vote-India/index.php">
                    <strong>&laquo; Back to Map </strong>
                </a>
                <span class="right">
                    <a href="#">
                        <!--<strong> Text on right side</strong>-->
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			
			<h1><?php echo $state;?></h1>
			 </br>
			<div class="statedescription">
				<p> 	            	
		            Maharashtra is a state in the western region of India. It is the second most populous state after Uttar Pradesh and third largest state by area in India. Maharashtra is the wealthiest state in India, contributing 15% of the country's industrial output and 13.3% of its GDP (2006–2007 figures).[5]
					Maharashtra is bordered by the Arabian Sea to the west, Gujarat and the Union territory of Dadra and Nagar Haveli to the northwest, Madhya Pradesh to the north and northeast, Chhattisgarh to the east, Karnataka to the south, Andhra Pradesh to the southeast and Goa to the southwest. The state covers an area of 307,731 km2 (118,816 sq mi) or 9.84% of the total geographical area of India. Mumbai, the capital city of the state, is India's largest city and the financial capital of the nation. Maharashtra is the world's second most populous first-level administrative country sub-division. Were it a nation in its own right, Maharashtra would be the world's twelfth most populous country ahead of Philippines.
					In the 16th century, the Marathas rose under the leadership of Shivaji against the Mughals, who ruled a large part of India. By 1760, Maratha Empire had reached its zenith with a territory of over 250 million acres (1 million km²) or one-third of the Indian sub-continent. After the Third Anglo-Maratha War, the empire ended and most of Maharashtra became part of Bombay State under a British Raj. After Indian independence, Samyukta Maharashtra Samiti demanded unification of all Marathi-speaking regions under one state. At that time, Babasaheb Ambedkar was of the opinion that linguistic reorganisation of states should be done on a "One state – One language" principle and not on a "One language – One state" principle. He submitted a memorandum to the reorganisation commission stating that a "single government can not administer such a huge state as United Maharashtra".[6] The first state reorganisation committee created the current Maharashtra state on 1 May 1960 (known as Maharashtra Day). The Marathi-speaking areas of Bombay State, Deccan states and Vidarbha united, under the agreement known as Nagpur Pact, to form the current state
	            </p>
			</div>
			
            </br></br></br></br></br></br>
                        
            
            <h2 class="ss-subtitle"><?php echo $state;?> Timeline</h2>
			<div id="ss-links" class="ss-links">
				<a href="#2013">2013</a>
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
				<a href="#2000">2000</a>				
			</div>
			
            <div id="ss-container" class="ss-container">
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2013">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2013</h2>
                    </div>
                </div>
                <?php
                	echo $CMonLeft;
                ?>
               
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <h3>
                            <span>November 22, 2011</span>
                            <a href="http://tympanus.net/Development/HoverClickTriggerCircle/">Hover and Click Trigger for Circular Elements with jQuery</a>
                        </h3>
                    </div>
					<div class="ss-right">
                        <a href="http://tympanus.net/Development/HoverClickTriggerCircle/" class="ss-circle ss-circle-2">Hover and Click Trigger for Circular Elements with jQuery</a>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
						<a href="http://tympanus.net/Tutorials/ElasticSlideshow/" class="ss-circle ss-circle-3">Elastic Image Slideshow with Thumbnail Preview</a>
                    </div>
					<div class="ss-right">
                         <h3>
                            <span>November 21, 2011</span>
                            <a href="http://tympanus.net/Tutorials/ElasticSlideshow/">Elastic Image Slideshow with Thumbnail Preview</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <h3>
                            <span>November 18, 2011</span>
                            <a href="http://tympanus.net/Development/FullscreenImageBlurEffect/">Fullscreen Image Blur Effect with HTML5</a>
                        </h3>
                    </div>
					<div class="ss-right">
                        <a href="http://tympanus.net/Development/FullscreenImageBlurEffect/" class="ss-circle ss-circle-4">Fullscreen Image Blur Effect with HTML5</a>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/InteractiveTypographyEffects/" class="ss-circle ss-circle-5">Interactive Typography Effects with HTML5</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>November 9, 2011</span>
                            <a href="http://tympanus.net/Tutorials/InteractiveTypographyEffects/">Interactive Typography Effects with HTML5</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/AnimatedButtons/" class="ss-circle ss-circle-6">Animated Buttons with CSS3</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>November 7, 2011</span>
                            <a href="http://tympanus.net/Tutorials/AnimatedButtons/">Animated Buttons with CSS3</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <h3>
                            <span>November 2, 2011</span>
                            <a href="http://tympanus.net/Tutorials/OriginalHoverEffects/">Original Hover Effects with CSS3</a>
                        </h3>
                    </div>
					<div class="ss-right">
                        <a href="http://tympanus.net/Tutorials/OriginalHoverEffects/" class="ss-circle ss-circle-7">Original Hover Effects with CSS3</a>
                    </div>
                </div>
				<div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2012">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2012</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                        <h3>
                            <span>October 31, 2011</span>
                            <a href="http://tympanus.net/Development/FullscreenImage3DEffect/">Fullscreen Image 3D Effect with CSS3 and jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/FullscreenImage3DEffect/" class="ss-circle ss-circle-8">Fullscreen Image 3D Effect with CSS3 and jQuery</a>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/CreativeCSS3AnimationMenus/" class="ss-circle ss-circle-9">Creative CSS3 Animation Menus</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>October 24, 2011</span>
                            <a href="http://tympanus.net/Tutorials/CreativeCSS3AnimationMenus/">Creative CSS3 Animation Menus</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/BlurMenu/" class="ss-circle ss-circle-10">Blur Menu with CSS3 Transitions</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>October 19, 2011</span>
                            <a href="http://tympanus.net/Tutorials/BlurMenu/">Blur Menu with CSS3 Transitions</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <h3>
                            <span>October 17, 2011</span>
                            <a href="http://tympanus.net/Development/WaveDisplayEffect/">Wave Display Effect with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/WaveDisplayEffect/" class="ss-circle ss-circle-11">Wave Display Effect with jQuery</a>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/FlexibleSlideToTopAccordion/" class="ss-circle ss-circle-12">Flexible Slide-to-top Accordion</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>October 12, 2011</span>
                            <a href="http://tympanus.net/Tutorials/FlexibleSlideToTopAccordion/">Flexible Slide-to-top Accordion</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <h3>
                            <span>October 10, 2011</span>
                            <a href="http://tympanus.net/Tutorials/CircleNavigationEffect/">Circle Navigation Effect with CSS3</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Tutorials/CircleNavigationEffect/" class="ss-circle ss-circle-13">Circle Navigation Effect with CSS3</a>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/DraggableImageBoxesGrid/" class="ss-circle ss-circle-14">Draggable Image Boxes Grid</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>October 7, 2011</span>
                            <a href="http://tympanus.net/Tutorials/DraggableImageBoxesGrid/">Draggable Image Boxes Grid</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2011">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2011</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                        <h3>
                            <span>September 30, 2011</span>
                            <a href="http://tympanus.net/Tutorials/ScrollbarVisibility/">Scrollbar Visibility with jScrollPane</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Tutorials/ScrollbarVisibility/" class="ss-circle ss-circle-15">Scrollbar Visibility with jScrollPane</a>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Development/MultiLevelPhotoMap/" class="ss-circle ss-circle-16">Multi-level Photo Map</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>September 27, 2011</span>
                            <a href="http://tympanus.net/Development/MultiLevelPhotoMap/">Multi-level Photo Map</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/ResponsiveImageGallery/" class="ss-circle ss-circle-17">Responsive Image Gallery with Thumbnail Carousel</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>September 20, 2011</span>
                            <a href="http://tympanus.net/Tutorials/ResponsiveImageGallery/">Responsive Image Gallery with Thumbnail Carousel</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
						<h3>
                            <span>September 12, 2011</span>
                            <a href="http://tympanus.net/Development/Elastislide/">Elastislide - A Responsive jQuery Carousel Plugin</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/Elastislide/" class="ss-circle ss-circle-18">Elastislide - A Responsive jQuery Carousel Plugin</a>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Development/Slicebox/" class="ss-circle ss-circle-19">Slicebox - A fresh 3D image slider with graceful fallback </a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>September 5, 2011</span>
                            <a href="http://tympanus.net/Development/Slicebox/">Slicebox - A fresh 3D image slider with graceful fallback </a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2010">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2010</h2>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
						<h3>
                            <span>August 30, 2011</span>
                            <a href="http://tympanus.net/Development/AutomaticImageMontage/">Automatic Image Montage with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/AutomaticImageMontage/" class="ss-circle ss-circle-20">Automatic Image Montage with jQuery</a>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Development/ImageZoomTour/" class="ss-circle ss-circle-21">Image Zoom Tour with jQuery</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>August 23, 2011</span>
                            <a href="http://tympanus.net/Development/ImageZoomTour/">Image Zoom Tour with jQuery</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
						<h3>
                            <span>August 16, 2011</span>
                            <a href="http://tympanus.net/Development/CircularContentCarousel/">Circular Content Carousel with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/CircularContentCarousel/" class="ss-circle ss-circle-22">Circular Content Carousel with jQuery</a>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/PortfolioImageNavigation/" class="ss-circle ss-circle-23">Portfolio Image Navigation with jQuery</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>August 9, 2011</span>
                            <a href="http://tympanus.net/Tutorials/PortfolioImageNavigation/">Portfolio Image Navigation with jQuery</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
						<h3>
                            <span>August 4, 2011</span>
                            <a href="http://tympanus.net/Development/FullscreenGridPortfolioTemplate/">Expanding Fullscreen Grid Portfolio</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/FullscreenGridPortfolioTemplate/" class="ss-circle ss-circle-24">Expanding Fullscreen Grid Portfolio</a>
                    </div>
                </div>
				<div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2009">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2009</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Development/ContentRotator/example1.html" class="ss-circle ss-circle-25">Content Rotator with jQuery</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>July 29, 2011</span>
                            <a href="http://tympanus.net/Development/ContentRotator/example1.html">Content Rotator with jQuery</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
						<h3>
                            <span>July 22, 2011</span>
                            <a href="http://tympanus.net/Development/VerticalSlidingAccordion/example1.html">Vertical Sliding Accordion with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/VerticalSlidingAccordion/example1.html" class="ss-circle ss-circle-26">Vertical Sliding Accordion with jQuery</a>
                    </div>
                </div>
				<div class="ss-row ss-medium">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Tutorials/AnimatedTextIconMenu/example1.html" class="ss-circle ss-circle-27">Animated Text and Icon Menu with jQuery</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>July 12, 2011</span>
                            <a href="http://tympanus.net/Tutorials/AnimatedTextIconMenu/example1.html">Animated Text and Icon Menu with jQuery</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
						<h3>
                            <span>July 5, 2011</span>
                            <a href="http://tympanus.net/Tutorials/FullscreenSlideshowAudio/">Fullscreen Slideshow with HTML5 Audio and jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Tutorials/FullscreenSlideshowAudio/" class="ss-circle ss-circle-30">Fullscreen Slideshow with HTML5 Audio and jQuery</a>
                    </div>
                </div>
				<div class="ss-row ss-large">
                    <div class="ss-left">
                        <a href="http://tympanus.net/Development/SlidingBackgroundImageMenu/example5.html" class="ss-circle ss-circle-28">Sliding Background Image Menu with jQuery</a>
                    </div>
                    <div class="ss-right">
                        <h3>
                            <span>July 3, 2011</span>
                            <a href="http://tympanus.net/Development/SlidingBackgroundImageMenu/example5.html">Sliding Background Image Menu with jQuery</a>
                        </h3>
                    </div>
                </div>
				<div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2008">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2008</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2007">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2007</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2006">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2006</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2005">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2005</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2004">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2004</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2003">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2003</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2002">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2002</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2001">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2001</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
                <div class="ss-row">
                    <div class="ss-left">
                        <h2 id="2000">Year</h2>
                    </div>
                    <div class="ss-right">
                        <h2>2000</h2>
                    </div>
                </div>
				<div class="ss-row ss-small">
                    <div class="ss-left">
                       <h3>
                            <span>June 9, 2011</span>
                            <a href="http://tympanus.net/Development/GridNavigationEffects/example5.html">Grid Navigation Effects with jQuery</a>
                        </h3>
                    </div>
                    <div class="ss-right">
						<a href="http://tympanus.net/Development/GridNavigationEffects/example5.html" class="ss-circle ss-circle-29">Grid Navigation Effects with jQuery</a>
                    </div>
                </div>
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