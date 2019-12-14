<?php
	/**
	 * Adds Simple_Bitcoin_Donation_Widget widget.
	 */
	class Simple_Bitcoin_Donation_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'sbd_widget', // Base ID
				esc_html__( 'Simple Bitcoin Donation Widget', 'sbd_domain' ), // Name
				array( 'description' => esc_html__( 'Displays a clickable button to goto bitcoin account', 'sbd_domain' ), ) // Args
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
			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
		?>
		<div class="bitcoin-donations">
			<a href="<?php echo $instance['link'] ?>" target="_blank" >
				<img src="<?php echo plugins_url(); ?>/simple-bitcoin-donation-widget/images/bitcoin_donation.png" alt="" />
			</a>
			<p><?php echo $instance['subtitle']; ?></p>
		</div>
		<?php
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
			// Variables
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Enter Header Title', 'sbd_domain' );
			$link = ! empty( $instance['link'] ) ? $instance['link'] : esc_html__( 'Enter the Bitcoin Link', 'sbd_domain' );
			$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : esc_html__( 'Enter Subtitle', 'sbd_domain' );
			?>

			<!-- Title -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php esc_attr_e( 'Title:', 'spd_domain' ); ?>
				</label> 
				
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
					type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>

			<!-- Url -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>">
					<?php esc_attr_e( 'Button Link Address:', 'spd_domain' ); ?>
				</label> 
				
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" 
					type="text" value="<?php echo esc_attr( $link ); ?>">
			</p>
			
			<!-- Subtitle -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>">
					<?php esc_attr_e( 'Subtitle:', 'spd_domain' ); ?>
				</label> 
				
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" 
					type="text" value="<?php echo esc_attr( $subtitle ); ?>">
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
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? sanitize_text_field( $new_instance['link'] ) : '';
			$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
			return $instance;
		}

	} // class Simple_Bitcoin_Donation_Widget
?>
