<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					post_type_archive_title( '', true );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>

			<?php
			
			while ( have_posts() ) : the_post(); // Start the Loop.

				the_post();

				// Get 'team' posts
				$team_posts = get_posts( array(
					'post_type' => 'cf_team_members',
					'posts_per_page' => 12, // Unlimited posts
					'orderby' => 'title', // Order alphabetically by name
				) );

				if ( $team_posts ):
				?>
				<section class="row profiles">
					
					<?php 
					foreach ( $team_posts as $post ): 
					setup_postdata($post);
					$position = get_post_meta( get_the_ID(), '_cf_team_position', true );
					$facebook = get_post_meta( get_the_ID(), '_cf_team_facebook', true );
					$twitter = get_post_meta( get_the_ID(), '_cf_team_twitter', true );
					?>
					<article class="col-md-4 profile">
						<div class="profile-header">
							<?php if ( has_post_thumbnail() ): ?>
								<?php echo get_the_post_thumbnail('', 'team_thumb', array( 'title' => get_the_title() )); ?>
							<?php endif; ?>
						</div>
						
						<div class="profile-content">
							<h3><?php the_title(); ?></h3>
							<p class="lead position"><?php echo $position; ?></p>
							<?php the_content(); ?>
						
							<div class="profile-footer">
								<?php if ( !is_null($facebook) ): ?>
								<a href="<?php echo $facebook; ?>"><i class="icon-facebook"></i></a>
								<?php endif; ?>
								<?php if ( !is_null($twitter) ): ?>
								<a href="<?php echo $twitter; ?>"><i class="icon-twitter"></i></a>
								<?php endif; ?>
							</div>
						</div>
					</article><!-- /.profile -->
					<?php endforeach; ?>
				</section><!-- /.row -->
				<?php endif;

			
			endwhile; // End the loop.

			// Previous/next page navigation.
			/*the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );*/

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
