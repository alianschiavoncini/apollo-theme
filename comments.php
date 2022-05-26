<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Apollo Hotel
 */
?>
<div class="comments-section">
<?php
if ( post_password_required() ) :
?>
	<p class="nopassword"><?php  esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'apollo-hotel' ); ?></p>
</div>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
endif;
?>

<?php if ( have_comments() ) : ?>

	<p class="title-section"><?php comments_number( esc_html__( 'No Comments', 'apollo-hotel' ), esc_html__( 'One Comment', 'apollo-hotel' ), esc_html__( '% Comments', 'apollo-hotel' ) );?></p>
 
	<ol class="commentlist">
		<?php
			/* 
			 * Loop through and list the comments. Tell wp_list_comments() to use astrothemes_comments() to format the comments.
			 */
			wp_list_comments( array( 'callback' => 'astrothemes_comments' ) );
		?>
	</ol><!-- .commentlist -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="navigation">
        <?php
            paginate_comments_links( 
                array(
                    'prev_text' => esc_html__( '<span class="meta-nav">&larr;</span> Older Comments', 'apollo-hotel' ), 
                    'next_text' => esc_html__( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'apollo-hotel' )
                )
            );
        ?>
    </div><!-- .navigation -->
    <?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

		/* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */
		if ( ! comments_open() ) :
	?>
		<!-- <p class="title-section"><?php  esc_html_e( 'Comments are closed.', 'apollo-hotel' ); ?></p> -->
	<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php 
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$custom_comment_form = array( 
		'fields' => apply_filters( 'comment_form_default_fields', 
						array(
							'author' => '<div class="form-group">
										<label for="author" class="comment-label">' . esc_html__( 'Your Name' , 'apollo-hotel' ) . ( $req ? ' <span class="required_lab">*</span>' : '' ) . '</label> 
										<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' class="form-control required" required="required">
										</div>',
							'email' => '<div class="form-group">
										<label for="email" class="comment-label">' . esc_html__( 'Your Email' , 'apollo-hotel' ) . ( $req ? ' <span class="required_lab">*</span>' : '' ) . '</label> 
										<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' class="form-control required" required="required">
										</div>',
							'url' => '<div class="form-group">
										<label for="url" class="comment-label">' . esc_html__( 'Your Website' , 'apollo-hotel' ) . '</label> 
										<input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) . '"' . $aria_req . ' class="form-control">
										</div>')
							),
							'comment_field' => '<div class="form-group">
										<label for="comment" class="comment-label">' . esc_html__( 'Comment' , 'apollo-hotel' ) . '</label> 
										<textarea id="comment" name="comment" rows="6" aria-required="true" class="form-control required" required="required"></textarea>
										</div>',
							'logged_in_as' => '<p class="logged-in-as">' . sprintf( esc_html__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>', 'apollo-hotel' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
							'title_reply' => '<p class="title-section">' . esc_html__( 'Leave a Reply' , 'apollo-hotel' ) . '</p>',
							'cancel_reply_link' => esc_html__( 'Cancel' , 'apollo-hotel' ),
							'label_submit' => esc_html__( 'Submit Comment' , 'apollo-hotel' ),
							'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-primary btn-comment" value="%4$s" />',
							'comment_form_after' => '<hr>',
							);
comment_form( $custom_comment_form ); 
?>
</div>