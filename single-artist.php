<?php
/* Template Name: Artist Page */
/* Template Post Type: artist */


?>
<?php get_header(); ?>
<main id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article>
			<header class="entry-header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>



				BIO
				<p>		
					<?php echo get_field('biography'); ?>	
				</p>
				
				
				

				<?php the_post_thumbnail(); ?>


				
				ART
				<p>		
					<?php echo get_field('art'); ?>	
				</p>
				
				
				
				
				SHOP
				<?php $pieces = get_field('piece'); ?>
		
				<?php if( $pieces ): ?>
					<ul>
					<?php foreach( $pieces as $piece ): ?>
						<li>
							<a href="<?php echo get_permalink( $piece->ID ); ?>">
								
								<img src="<?php echo get_the_post_thumbnail_url($piece->ID, 'thumbnail'); ?>" />
								<?php echo get_the_title( $piece->ID ); ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
			</header>
		</article>
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>

