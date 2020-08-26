<?php
/* Template Name: Piece Page */
/* Template Post Type: piece */


?>
<?php get_header(); ?>
<main id="content" class="mt-16">
	<div class="flex flex-wrap">
		<div class="w-12 lg:w-2/12">
			<!-- Header -->
			<?php include get_template_directory() . '/head.php'; ?>
			<!-- End Header -->
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="md:w-8/12 mx-auto">

					<div class="piece--image-wrapper relative mb-4">
						<?php the_post_thumbnail('full', array('class' => 'w-full')); ?>
						<a href="#" class="btn-prev"></a>
						<a href="#" class="btn-next"></a>
					</div>

					<div class="flex flex-wrap">
						<div class="w-full md:w-6/12">
							<h2 class="piece--title uppercase mb-1"><?php the_title(); ?></h2>
							<h3 class="mb-3 piece--description uppercase">Description</h3>
							<div class="piece--description text-justify">
								<?php echo get_field('description'); ?>
							</div>
						</div>
						<div class="w-full md:w-6/12">
							<span class="block price mb-4 text-left md:text-right">
								$<?php echo get_field('price'); ?>
							</span>
							<div class="text-left md:text-right mb-3">
								<a href="#" class="btn-piece inline-block text-center uppercase px-4 py-2">
									Inquire
								</a>
							</div>
							<div class="text-left md:text-right mb-3">
								<a href="<?php the_permalink(); ?>" class="btn-piece inline-block text-center uppercase px-4 py-2">
									View More
								</a>
							</div>
						</div>
					</div>
				</div>
		<?php endwhile;
		endif; ?>
	</div>
</main>

<?php get_footer(); ?>