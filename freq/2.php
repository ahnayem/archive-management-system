
	<!-- Supportive js -->
	<script type="text/javascript" src="design/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="design/js/bootstrap.js"></script>
	<!-- smooth scrolling js -->
	<script src="design/js/SmoothScroll.min.js"></script>
	<!-- smooth scrolling js -->

	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="design/js/move-top.js"></script>
	<script type="text/javascript" src="design/js/easing.js"></script>


	<!-- banner bottom video script -->
	<script src="js/simplePlayer.js"></script>
				<script>
					$("document").ready(function() {
						$("#video").simplePlayer();
					});
	</script>
	<!-- //banner bottom video script -->

	<!-- testimonials plugin script -->
		<script src="design/js/jquery.wmuSlider.js"></script> 
		<script>
			$('.example1').wmuSlider();         
		</script> 
	<!-- testimonials plugin script -->

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>

	<!-- here starts scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->



</body>
</html>