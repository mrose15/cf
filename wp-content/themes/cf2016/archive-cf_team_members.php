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

			<h2 class="page-header">
				<?php
					post_type_archive_title( '', true );
				?>
			</h2>
			<section class="row team_container">

			<?php
			//while ( have_posts() ) : the_post(); 
			/*
			Created the standard while loop originally but then realized I would need the foreach 
			loop in order to use the $args array below to filter the posts with parameters
			*/


			if (is_post_type_archive('cf_team_members')){
				$args = array( 'post_type' => 'cf_team_members', 'posts_per_page' => 12, 'orderby'=> 'title', 'order' => 'ASC' );
				$teamposts = get_posts( $args ); 
			}
			foreach( $teamposts as $post ) :	
				setup_postdata($post); $count++; // Start the Loop with a counter.

				// Get 'team' posts
				/*$team_posts = get_posts( array(
					'post_type' => 'cf_team_members',
					'posts_per_page' => -1, // 12 posts per page
					'orderby' => 'title', // Order alphabetically by name
					'order'   => 'ASC',
				) );*/

				?>
					
					<?php 
						$position = get_post_meta( get_the_ID(), '_cf_team_position', true );
						$facebook = get_post_meta( get_the_ID(), '_cf_team_facebookurl', true );
						$twitter = get_post_meta( get_the_ID(), '_cf_team_twitterurl', true );
					?>
					<article class="col-md-4 team">
						<div class="team_wrapper">
							<div class="team_header">
								<?php if ( has_post_thumbnail() ): ?>
									<?php echo get_the_post_thumbnail('', 'team_thumb', array( 'title' => get_the_title() )); ?>
								<?php endif; ?>
							</div>
							
							<div class="team_content">
								<div class="team_inner_center">
									<h3><?php the_title(); ?></h3>
									<p class="position"><?php echo $position; ?></p>
									<div class="social_links">
										<?php if ( !is_null($facebook) ): ?>
										<a class="btn btn-social-icon btn-facebook" href="<?php echo $facebook; ?>"><span class="fa fa-facebook"></span></a>
										<?php endif; ?>
										<?php if ( !is_null($twitter) ): ?>
										<a class="btn btn-social-icon btn-twitter" href="<?php echo $twitter; ?>"><span class="fa fa-twitter"></span></a>
										<?php endif; ?>
									</div>
								</div>	
								<div class="teamcpt_content">
									<div class="cf_content_to_hide more">
										<?php the_content(); ?>	
										<!--<button class="btn btn-primary">Read Less</button>-->
									</div>
									<button class="btn btn-primary">Read More</button>
								</div>
							</div>
						</div>	
					</article><!-- /.team -->
			    <?php 
			    if ( 0 == $count%3 ) {
		        	echo '<div class="clear"></div>';
		    	}

			    endforeach; ?>		
				
		<?php 

			//endwhile; // End the loop. 

			if ( 0 != $count%3 ) {
			   echo '<div class="clear"></div>';
			}
			
		?>
		</section><!-- /.row -->
		<?php endif; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>