<!DOCTYPE html>
<html>
	<head>
                <script type="text/javascript">
                    (function(g,c,e,f,a,b,d){window[a]=function(){window[a].q.push(arguments)};window[a].q=[];window[a].t=+new Date;b=c.createElement(e);d=c.getElementsByTagName(e)[0];b.async=1;b.src=f;d.parentNode.insertBefore(b,d)})(window,document,"script","https://luke.switchblade.io/assets/js/bladetrace.js","swb");
                    swb('auth','$2y$10$pucKVbuL05fHO0YTjwITrOulu1WdEApRPuRcTFKUNze7FlZuzPlwW');
                </script>
		<meta charset='utf-8'> 
		<title><?php echo $title;?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			// All CSS loads here
			Casset::css('prettify.css');
			Casset::css('jquery.fancybox.css');
			Casset::css('bootstrap.min.css');
			Casset::css('bootstrap-responsive.css');
			Casset::css('chosen.css');
			Casset::css('base.css');
			Casset::css('markitup_skin.css');
			Casset::css('markitup_set.css');
			Casset::css('jquery-ui-1.8.23.custom.css');
			
			echo Casset::Render_css();
		?>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		<link rel="icon" type="image/ico" href="http://lukepolo.com/assets/img/favicon.ico"/>               
	</head>
	<body  onload="prettyPrint()">
		<div id="wrap">
			<?php echo $header;?>
			<div class="container">
				<div id="content_holder">
					<div id="content" class="<?php
						$segment_2 = Uri::segment(2);
						echo (Uri::segment(1) == 'blog' && empty($segment_2) === true) ? '' : 'hero-unit';?>">
						<?php
							if (Session::get_flash('error'))
							{
								$error = Session::get_flash('error')
							?>
								<div class="alert alert-danger">
									<?php
										echo $error;
									?>
								</div>
							<?php
							}
							if (Session::get_flash('success'))
							{
							?>
								<div class="alert alert-success">
									<?php
										echo Session::get_flash('success');
									?>
								</div>
							<?php
							}
						?>
						<?php echo $content; ?>
					</div>
					<?php
					if(isset($content_below) === true)
					{
					?>
						<?php echo $content_below;?>
					<?php
					}
					?>
				</div>
				<div class="bottom_body"></div>
				<div class="push"></div>
			</div>
		</div>
		<?php echo $footer;?>
	</body>

	<?php
		// All Javascript loads here
		Casset::js('jquery.fancybox.js');
		Casset::js('prettify.js');
		Casset::js('bootstrap.min.js');
		Casset::js('chosen.jquery.min.js');
		Casset::js('jquery-ui-1.8.23.custom.min.js');
		Casset::js('jquery.autosize-min.js');
		Casset::js('sisyphus.min.js');
		Casset::js('modernizr-2.0.6.min.js');
		Casset::js('jquery.markitup.js');
		Casset::js('pdfobject.js');
		Casset::js('markitup_set.js');
		
		echo Casset::Render_js();
		
	?>
	<!-- DOCUMENT READY STUFF HERE -->
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('.fancybox').fancybox({
				live: false
			});
			
			// open all external links in a new window
			$("a[href^=http]").each(function(){
				if (this.href.indexOf(location.hostname) == -1)
				{
					$(this).attr(
						'target',
						'_blank'
					);
				}
			});
		
			// validate
			// add a title
			$('a:not([title])').each(function(){
				$(this).attr(
					'title',
					$(this).html().replace(/<.+>/g,'').trim()
				);
			});
			// make sure there's a proper href
			$('a[href="#"], a:not([href])').each(function(){
				$(this).attr(
					'href',
					window.location+'#'
				);
			});
			// add an alt tag
			$('img:not([alt]), img[alt=""]').each(function(){
				$(this).attr(
					'alt',
					$(this).attr('src')
				);
			});
			// strip empty classes
			$('[class=""]').each(function(){
				$(this).removeAttr('class');
			});
			// strip empty ids
			$('[id=""]').each(function(){
				$(this).removeAttr('id');
			});
		
			// Adds chosen to all selects
			$("select").each(function(){
					var add = $(this).html();
					$(this).html('<option value=""><option>' + add);
					$(this).chosen();
			});
			
			// only let us submit a form once
			$('form').submit(function(){
				$(this).find('input[type="submit"]').each(function(){
					$(this).attr('disabled','disabled');
					$(this).addClass('disabled');
				});
			});
			
			// automatically resize inputs for their text
			$('textarea, input').autosize();
			
			// remembers form data when you reload the page
			$('form').sisyphus();
			
			$( ".datepicker" ).datepicker({
				minDate: 0,
				changeMonth: true,
				changeYear: true,
			});
		});	
		
		// Sets the blue overlay
		var height = null;
		$(window).resize(function() {
			height = $(window).height();
			$('.bottom_body').height(height / 2);
		});
		
		$(window).resize();
		
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
              
                ga('create', 'UA-33266635-1', 'auto');
                ga('send', 'pageview');
                
                function name()
                {
                    element.className += " " + className;
                }
	</script>
</html>