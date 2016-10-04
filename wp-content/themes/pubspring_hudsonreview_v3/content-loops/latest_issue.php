<article>

<h4 class="">The Current Issue</h4>						

<?php
	//ISSUES
		$query = new WP_Query(array( 
		'post_type' => 'sm_issues',	
		'post_status' => 'publish', 
//		'offset' => 14,
		'posts_per_page' => 1, 
		'orderby' => 'date',
		'order' => 'desc',
		)
		);			
		
		if ($query->have_posts()) :

//			$child_id = get_the_ID('$query->the_post()');
				while($query->have_posts()) : $query->the_post();
?>


	<div class="article_headerTK">							 
		<h2><?php the_field('issue_name'); ?></h2>						 
		<h1 class="<?php the_field('issue_season'); ?>TK" style="border-bottom:1px solid #DDD;margin-bottom:.5em;">
			<?php the_title(); ?>
			<small>(<?php echo 'Volume '; the_field('volume'); ?>, No. <?php the_field('issue_number'); ?>)</small></h1>
	</div>
	
	<?php 
	
	//display the image if there is one.
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			?>
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('category-small', array('class' => 'image-shadow flow_left')); 
			
			
			?> 
			</a>
			
	<?php  	
			} 
			?>
<?php  the_content()    ?>


<?php  //get_template_part('content-loops/issue-toc');    ?>



<hr /><h4 class="center"><a href="<?php the_permalink(); ?>">View Issue Contents</a></h4>

<?php  endwhile; endif; ?>


</article>