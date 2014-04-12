<?php
/**
 * Adds Apoc_Social_Widget widget.
 */
class Apoc_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
				'apoc_social_widget',
				__( 'Social Widget', 'apoc' ),
				array( 'description' => __( 'Social Widget', 'apoc' ), )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$facebook = esc_url( $instance['facebook'] );
		$twitter = esc_url( $instance['twitter'] );
		$email = esc_url( $instance['email'] );
		$instagram = esc_url( $instance['instagram'] );
		$pinterest = esc_url( $instance['pinterest'] );
		$rss = esc_url( $instance['rss'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		echo '<div id="social-icons">';
		
		if ( ! empty( $facebook ) ) {
			echo '<a href="' . $facebook . '" class="apoc-social facebook" target="_blank"></a>';
		}
		
		if ( ! empty( $twitter ) ) {
			echo '<a href="' . $twitter . '" class="apoc-social twitter" target="_blank"></a>';
		}
		
		if ( ! empty( $email ) ) {
			echo '<a href="' . $email . '" class="apoc-social email" target="_blank"></a>';
		}
		
		if ( ! empty( $instagram ) ) {
			echo '<a href="' . $instagram . '" class="apoc-social instagram" target="_blank"></a>';
		}
		
		if ( ! empty( $pinterest ) ) {
			echo '<a href="' . $pinterest . '" class="apoc-social pinterest" target="_blank"></a>';
		}
		
		if ( ! empty( $rss ) ) {
			echo '<a href="' . $rss . '" class="apoc-social rss" target="_blank"></a>';
		}
		
		echo '</div><!-- end #social-icons -->';
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : ''; 
		$facebook = isset( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
		$twitter = isset( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
		$email = isset( $instance[ 'email' ] ) ? $instance[ 'email' ] : '';
		$instagram = isset( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '';
		$pinterest = isset( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '';
		$rss = isset( $instance[ 'rss' ] ) ? $instance[ 'rss' ] : '';
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'RSS URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance[instagram] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
		$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';

		return $instance;
	}

} // class Apoc_Social_Widget

new Apoc_Social_Widget();