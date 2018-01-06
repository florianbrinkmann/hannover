<?php
/**
 * Panel for the theme options.
 *
 * @version 2.0.0
 *
 * @package Hannover
 */

/**
 * Class Hannover_Customize_Theme_Options_Panel
 */
class Hannover_Customize_Theme_Options_Panel extends WP_Customize_Panel {
	/**
	 * Type of this panel.
	 *
	 * @var string
	 */
	public $type = 'hannover_theme_options';

	/**
	 * An Underscore (JS) template for rendering this panel's container.
	 *
	 * Class variables for this panel class are available in the `data` JS object;
	 * export custom variables by overriding WP_Customize_Panel::json().
	 *
	 * @see   WP_Customize_Panel::print_template()
	 *
	 * @since 4.3.0
	 */
	protected function render_template() {
		?>
		<li id="accordion-panel-{{ data.id }}"
		    class="accordion-section control-section control-panel control-panel-{{ data.type }}">
			<h3 class="accordion-section-title" tabindex="0">
				{{ data.title }}
				<span class="screen-reader-text"><?php _e( 'Press return or enter to open this panel' ); ?></span>
			</h3>
			<ul class="accordion-sub-container control-panel-content"></ul>
		</li>
		<?php
	}

	/**
	 * An Underscore (JS) template for this panel's content (but not its container).
	 *
	 * Class variables for this panel class are available in the `data` JS object;
	 * export custom variables by overriding WP_Customize_Panel::json().
	 *
	 * @since 4.3.0
	 *
	 * @see   WP_Customize_Panel::print_template()
	 */
	protected function content_template() {
		?>
		<li class="panel-meta customize-info accordion-section <# if ( ! data.description ) { #> cannot-expand<# } #>">
			<button class="customize-panel-back" tabindex="-1"><span
					class="screen-reader-text"><?php _e( 'Back' ); ?></span></button>
			<div class="accordion-section-title">
				<span class="preview-notice">
				<?php
				/* translators: %s: the site/panel title in the Customizer */
				echo sprintf( __( 'You are customizing %s' ), '<strong class="panel-title">{{ data.title }}</strong>' );
				?>
				</span>
				<# if ( data.description ) { #>
					<button type="button" class="customize-help-toggle dashicons dashicons-editor-help"
					        aria-expanded="false"><span class="screen-reader-text"><?php _e( 'Help' ); ?></span>
					</button>
					<# } #>
			</div>
			<# if ( data.description ) { #>
				<div class="description customize-panel-description">
					{{{ data.description }}}
				</div>
				<# } #>

					<div class="customize-control-notifications-container"></div>
		</li>
		<?php
	}
}
