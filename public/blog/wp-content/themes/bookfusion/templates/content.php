<div class="col-lg-4 col-md-6 col-xs-6 r-full-width">
									<div class="grid-blog">
				    					<div class="grid-blog-img">
				    						<?php if( has_post_thumbnail() ): ?>
				    							<?php the_post_thumbnail(); ?>
				    						<?php else: ?>
				    							<h4>No image found</h4>
				    						<?php endif ?>
				    					</div>
				    					<div class="product-detail blog-detail">
				    						<span class="date"><i class="fa fa-calendar"></i><?php echo get_the_date() ?></span>
				    						<?php if (is_single() ): ?>
				    						<h5><?php the_title(); ?></h5>
				    					<?php else: ?>
				    						<h5><a href="<?php echo the_permalink() ?>"><?php the_title(); ?></a></h5>
				    					<?php endif ?>
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
				    				</div>
								</div>