<?php
	if(empty($blogs) === false)
	{
		foreach($blogs as $blog)
		{
		?>
			<div class="hero-unit content">
			<!-- Start of blog header -->
				<div id="<?php echo $blog->slug;?>" class="page-header">
					<h1><?php echo $blog->title;?> <small><h2 style="color:#336699;display:inline-block"><?php echo $blog->sub_title;?></h2><?php echo Auth::check() ? ' <a href="'.Uri::base().'blog/edit/'.$blog->id.'">edit</a>' : '';?></small></h1>
					<div class="hidden-tablet hidden-desktop">
						Posted : <?php echo date('F j, Y',$blog->created_at);?>
					</div>
					<?php
						if($blog->updated_at != $blog->created_at)
						{
						?>
							<p style="font-weight:bold">Updated At : <?php echo date('F j, Y',$blog->updated_at);?></p>
						<?php	
						}
					?>
				</div>
				<!-- Start of blog -->
				<div style="padding-bottom:30px;" class="row">
					<div class="span1 hidden-phone">
					    <div class="pull-left date">
							<span class="day"><?php echo date('j',$blog->created_at);?></span>
							<span class="month"><?php echo date('F',$blog->created_at);?></span>
							<span class="year"><?php echo date('Y',$blog->created_at);?></span>
					    </div>
					</div>
					<div class="span9 offset1">
						<?php echo html_entity_decode($blog->text);?>
					</div>
				</div>
			<!-- End of Blog -->
			</div>
	<?php	
		}
	}
	else
	{
	?>
		<div class="hero-unit content">
			<div class="page-header">
				Guess what? My go daddy account went down! So I switched to a VM and loving it so far, but theres lots todo ! LOST ALL MY BLOGS :-( , im sure your really missing thoses.......
			</div>
		</div>
	<?php	
	}
?>

