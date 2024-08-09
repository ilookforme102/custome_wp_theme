			<?php if ( is_home() && ! is_front_page() ) :?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			?>
			<div class="related-post">
			<div class="related-post-block">
			<div class= "most-top-heading"> 
				<h2>Tin mới nhất</h2>
			</div>
			<div class="top-post-container">
			<div class="left-first-post-container">
			<?php
				while ( $query->have_posts() ) :
					// Get all post from query
					$query->the_post();
					if ( $query->current_post == 0 ) {
						?>
						
						<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>

						<div class="first-post-content">
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
						</div>
						<?php
					}
				endwhile;
				?>
			</div>
			<?php

			// Display the next 7 posts on the right side with title only
			?>
			<div class="right-post-container">
			<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					if ( $query->current_post > 0 && $query->current_post < 8 ) {
						?>
						<div class="right-posts">
							<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						</div>
						<?php
					}
				endwhile;
			?>
			</div>
			</div>
			<div class="bottom-post-container">
			<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					if ( $query->current_post >= 8  ) {
						?>
						<div class="bottom-posts">
							
							<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
							
						</div>
						<?php
					}
				endwhile;
			?>
			</div>
			</div>
			<div class="standing-table-container">
				<?php include get_template_directory().'/components/standing-table.php'; ?>
			</div>
			<div class="match-predict-container">
				<?php include get_template_directory().'/components/match-predict.php'; ?>	
			</div>
			</div>
			