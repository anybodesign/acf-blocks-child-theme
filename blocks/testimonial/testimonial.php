<?php if ( !defined('ABSPATH') ) die();
	
	// Gutenberg stuff
	
	$id = $block['id'];

	if( !empty($block['align']) ) {
	    $align = ' align' . $block['align'];
	} else {
		$align = null;
	}						

	// ACF stuff
	
	$author = get_field( 'name' ) ?: __('Author name', 'my-acf-blocks');
	$desc = get_field( 'function' ) ?: __('Author role', 'my-acf-blocks');
	$picture = get_field( 'portrait' ) ?: 62;
	$text = get_field( 'testimonial' ) ?: __('Your testimonial here...', 'my-acf-blocks');
?>
						
					<section class="acf-block--testimonial<?php echo esc_attr($align); ?>" id="<?php echo esc_attr($id); ?>">
						<div class="acf-block-container">

					        <article class="acf-block-testimonial-item">
						        
						        <div class="acf-block-testimonial-figure">
						            <?php 
							            if ( $picture ) { 
						            		echo wp_get_attachment_image( $picture, 'thumbnail' ); 
										} else {
											echo '<img src="' . get_stylesheet_directory_uri() .'/assets/fallback.png" alt="">'; 
							        } ?>
							    </div>
							    
								<div class="acf-block-testimonial-content">
									
									<figure>
										<?php if ( $text ) { ?>
										<blockquote>
											<?php echo $text; ?>
										</blockquote>
										<?php } ?>

										<?php if ( $author ) { ?>
										<figcaption class="testimonial-author">
											<?php echo $author; ?>
											
											<?php if ( $desc ) { ?>
											<span class="testimonial-desc">
												<?php echo $desc; ?>
											</span>
											<?php } ?>
										</figcaption>
										<?php } ?>
									</figure>
									
								</div>
							    
					        </article>

						</div>
					</section>