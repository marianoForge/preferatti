<?php
/* Template Name: Piece Page */
/* Template Post Type: piece */


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



				Description 
				<p>		
					<?php echo get_field('description'); ?>	
				</p>
				
				
				

				<?php the_post_thumbnail(); ?>


				
				Price
				<p>		
					<?php echo get_field('price'); ?>	
				</p>
				
			</header>
		</article>
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>

