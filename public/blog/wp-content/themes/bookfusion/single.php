<?php get_header() ?>


<main class="main-content">


		<!-- Blog List -->
		<div class="tc-padding">
			

			<div class="container">
				<div class="row">

					<!-- Content -->
					<div class="col-lg-9 col-md-8">
						<!-- blog Detail -->
						<div class="single-blog-detail">
							<h2><?php the_title(); ?></h2>
							<div class="large-blog-img">
								<img src="assets/images/no-img.png" alt="">
							</div>
							<div class="social-text">
								<ul class="social-icons">
				                	<li><a href="https://ww.facebook.com/sharer.php?u=<?php echo the_permalink() ?>/&intent=share" target="_blank" class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
				                    <li><a href="https://twitter.com/share?url=<?php echo the_permalink() ?>/&text=<?php echo the_title(); ?>&intent=share" target="_blank" class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
				                    <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
				                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
				                </ul>
								<p><?php echo wp_trim_words( get_the_excerpt(), 80 ); ?></p>
							</div>
							<!-- BEGIN AUTHOR HERE -->
							<div class="blog-arthor">
								<?php if( has_post_thumbnail() ): ?>
				    							<?php the_post_thumbnail(); ?>
				    						<?php else: ?>
				    							<h4>No image found</h4>
				    						<?php endif ?>
								<div class="blog-arthor-detail">
									<h6><?php the_title() ?></h6>
									<p><?php echo wp_trim_words( get_the_excerpt(), 30 ); ?></p>
									<ul class="social-icons">
					                	<li><a href="https://ww.fcaebook.com/sharer.php?u=<?php echo the_permalink() ?>/&intent=share" target="_blank" class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
					                    <li><a href="https://twitter.com/share?url=<?php echo the_permalink() ?>/&text=<?php echo the_title(); ?>&intent=share" target="_blank" class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
					                    <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
					                </ul>
				                </div>
							</div>
							<!-- END AUTHRO HERE -->

						</div>
						<!-- blog Detail -->

						<!-- Related Blog -->
						<div class="related-events">

							<!-- Secondary heading -->
			        		<div class="sec-heading">
			        			<h3>You may also like this</h3>
			        		</div>
			        		<!-- Secondary heading -->
			        		 <?php 
                                        $tags = wp_get_post_tags(get_the_ID());
                                        $tag_ids = [];
                                        foreach ($tags as $tag) {
                                            $tag_ids = $tag->term_id;
                                        }
                                        $args = [
                                            'tag__in' => $tag_ids,
                                            'post__not_in' => [get_the_ID()],
                                            'posts_per_page'=> 3, 
                                        ];

                                        $related = new wp_query( $args );
                                    ?>

			        		<!-- Related Blog -->
			        		<?php if ( $related->have_posts() ) : while( $related->have_posts() ) : $related->the_post() ?>
							<div class="related-events-slider">
								<div class="item">
									<div class="grid-blog">
				    					<div class="grid-blog-img">
				    						  <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php else: ?>
				    					</div>
				    					<div class="product-detail blog-detail">
				    						<span class="date"><i class="fa fa-calendar"></i><?php echo get_the_date() ?></span>
				    						
				    						<h5><?php the_title(); ?></h5>
				    				
				    						<p><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></p>
				    						<div class="aurthor-detail">
				    							<span>
				    								<?php if( has_post_thumbnail() ): ?>
				    							<?php the_post_thumbnail(); ?>
				    						<?php else: ?>
				    							<h4>No image found</h4>
				    						<?php endif ?>

				    						<?php the_author(); ?>
				    							</span>
				    							<a class="add-wish" href="#"><i class="fa fa-share-alt"></i></a>
				    						</div>
				    					</div>
				    						 <?php endif ?>
				    				</div>
								</div>
		    				</div>
		    				<?php endwhile ?>
                                    <?php endif ?>
                                    <?php wp_reset_query(); ?>


		    			</div>

						<!-- Related Blog -->

						<!-- Comments Holder -->
						<?php comments_template() ?>
						
					</div>
					<!-- Content -->

					<!-- Aside -->
					<?php get_sidebar() ?>
					<!-- Aside -->
				</div>
			</div>
		</div>
		<!-- Blog List -->
	</main>
	<?php get_footer() ?>