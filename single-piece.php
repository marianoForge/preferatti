<?php
/* Template Name: Piece Page */
/* Template Post Type: piece */


?>
<?php get_header(); ?>
<main id="content" class="mt-8 md:mt-16">
	<div class="flex flex-wrap">
		<div class="menu-wrapper">
			<!-- Header -->
			<?php include get_template_directory() . '/head.php'; ?>
			<!-- End Header -->
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="w-full md:w-8/12 mx-auto px-2">

					<div class="piece--image-wrapper relative mb-4">
						<?php the_post_thumbnail('full', array('class' => 'w-full artist-piece')); ?>

						<a href="<?php echo get_permalink(dsq_previous_page_ID(get_the_ID())); ?>" class="btn-prev"></a>
						<a href="<?php echo get_permalink(dsq_next_page_ID(get_the_ID())); ?>" class="btn-next"></a>

					</div>
					<div class="flex flex-wrap">
						<div class="w-full md:w-6/12">
							<h2 class="piece--title uppercase mb-2"><?php the_title(); ?></h2>
							<h3 class="mb-3 piece--description uppercase">
								<?php echo get_field('piece_specification'); ?>
							</h3>
							<div class="piece--description text-justify mb-4">
								<?php echo get_field('description'); ?>
							</div>
						</div>
						<div class="w-full md:w-6/12">
							<span class="block price mb-4 text-left md:text-right">
								$<?php echo get_field('price'); ?>
							</span>
							<div class="text-left md:text-right mb-3">
								<a href="#" class="btn-piece inline-block text-center uppercase px-4 py-2 inquire-pop-up">
									Inquire
								</a>
							</div>
							<div class="text-left md:text-right mb-3">
								<a href="<?php echo get_permalink(get_field('artist')->ID); ?>" class="btn-piece inline-block text-center uppercase px-4 py-2">
									View More
								</a>
							</div>
						</div>
					</div>

					<script>
						/*window.addEventListener('load', function () {
							document.getElementById('piece-name').innerHTML = "<?php the_title(); ?>";
							document.getElementById('artist-name').innerHTML = "<?php echo get_field('artist')->post_title; ?>";
							document.getElementById('popup-image-container').style.backgroundImage = 'url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full')[0]; ?>)';
							
						});*/
					</script>

				</div>
		<?php endwhile;
		endif; ?>
	</div>
</main>

<?php get_footer(); ?>