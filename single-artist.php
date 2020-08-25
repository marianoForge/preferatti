<?php
/* Template Name: Artist Page */
/* Template Post Type: artist */


?>
<?php get_header(); ?>
<main id="content" class="mt-16 pr-4 lg:pr-0 lg:pl-0 pl-4">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1 class="uppercase mb-12">
				<a href="<?php echo get_home_url(); ?>" title="Back to Homepage" class="mr-2">
					<i class="icn-back"></i>
				</a>
				<?php the_title(); ?>
			</h1>
			<div class="bio__wrapper flex mb-12 lg:ml-8">
				<div class="w-auto">
					<div class="bio--image__wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
				</div>
				<div class="bio--info__wrapper ml-6 flex flex-col">
					<h2 class="mb-5 ">BIO</h2>
					<div class="info--wrapper flex-grow">
						<?php echo get_field('biography'); ?>
					</div>
					<?php if (get_the_title($artist_website->ID)); ?>
					<a href="<?php ?>" title="Visit <?php echo get_the_title($artist_website->ID); ?> Website" class="btn uppercase">
						View Artist Website
					</a>
					<? endif; ?>
				</div>
			</div>
			<div class="bio__wrapper lg:ml-8">
				<h2 class="mb-6">ART</h2>
				<div class="info--wrapper mb-16">
					<?php echo get_field('art'); ?>
				</div>
				<h3 class="uppercase mb-8"><em>Other Available Painting from this artist</em></h3>
				<?php $pieces = get_field('piece'); ?>
				<?php if ($pieces) : ?>
					<div class="grid grid-cols-6 gap-6 painting__wrapper">
						<?php foreach ($pieces as $piece) : ?>
							<div class="painting--item__wrapper">
								<a href="<?php echo get_permalink($piece->ID); ?>">

									<div class="painting__item mb-4" style="background-image: url(<?php echo get_the_post_thumbnail_url($piece->ID, 'thumbnail'); ?>)"></div>
									<h4><?php echo get_the_title($piece->ID); ?></h4>
									<h5><?php echo get_the_title($artist->ID); ?></h5>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
	<?php endwhile;
	endif; ?>
</main>

<?php get_footer(); ?>