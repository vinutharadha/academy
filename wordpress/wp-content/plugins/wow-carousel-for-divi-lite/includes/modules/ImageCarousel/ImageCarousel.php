<?php
class WDCL_ImageCarousel extends WDCL_Builder_Module {

	public $slug       = 'wdcl_image_carousel';
	public $vb_support = 'on';
	public $child_slug = 'wdcl_image_carousel_child';

	protected $module_credits = array(
		'module_uri' => 'https://wowcarousel.com/modules/image-carousel/',
		'author'     => 'Wow Carousel',
		'author_uri' => 'https://wowcarousel.com/',
	);

	public function init() {

		$this->name = esc_html__( 'Wow Image Carousel', 'wdcl-wow-divi-carousel-lite');
        $this->icon_path = plugin_dir_path(__FILE__) . "wdcl-image-carousel.svg";

		$this->settings_modal_toggles = [
			'general' => [
				'toggles' => [
					'settings' => [
                        'title'    => esc_html( 'Carousel Settings', 'wdcl-wow-divi-carousel-lite' ),
                        'tabbed_subtoggles'	=> true,
						'sub_toggles'		=> [
							'general' => [
								'name' => esc_html( 'General', 'wdcl-wow-divi-carousel-lite' )
							],
							'advanced' => [
								'name' => esc_html('Advanced', 'wdcl-wow-divi-carousel-lite' )
							],
						]
					],
				],
			],

			'advanced' => [
				'toggles' => [
                    'carousel' => [
						'title' => esc_html( 'Carousel', 'wdcl-wow-divi-carousel-lite' ),
                    ],
					'arrow' => [
						'title' => esc_html( 'Navigation', 'wdcl-wow-divi-carousel-lite' ),
						'tabbed_subtoggles'	=> true,
						'sub_toggles'		=> [
							'arrow_common' => [
								'name' => esc_html( 'Common', 'wdcl-wow-divi-carousel-lite' )
							],
							'arrow_left' => [
								'name' => esc_html('Left', 'wdcl-wow-divi-carousel-lite' )
							],
							'arrow_right' => [
								'name' => esc_html( 'Right', 'wdcl-wow-divi-carousel-lite' )
							],
						]
					],
					'pagination'  =>  [
						'title' => esc_html( 'Pagination', 'wdcl-wow-divi-carousel-lite' ),
						'tabbed_subtoggles'	=> true,
						'sub_toggles'		=> [
							'pagi_common' => [
								'name' => esc_html( 'Common', 'wdcl-wow-divi-carousel-lite' )
							],
							'pagi_active' => [
								'name' => esc_html( 'Active', 'wdcl-wow-divi-carousel-lite' )
							],
						]
					],
				],
			]
		];
	}

	public function get_fields() {

        return WDCL_Builder_Module::_get_carousel_option_fields( 'carousel', [] );
	}

	public function get_advanced_fields_config() {

		$advanced_fields                 = [];

		$advanced_fields["text"]         = false;
		$advanced_fields['borders']      = false;
        $advanced_fields["text_shadow"]  = false;
        $advanced_fields["link_options"] = false;
		$advanced_fields["fonts"]        = false;

        return $advanced_fields;
	}

	public function render( $attrs, $content = null, $render_slug ){

		// Props
		$content                        = $this->props['content'];
		$is_center                      = $this->props['is_center'];
		$center_mode_type               = $this->props['center_mode_type'];
		$custom_cursor                  = $this->props['custom_cursor'];


        // Render CSS
		$this->_render_css( $render_slug );

		$classes = [];

		if( $is_center === 'on' ) {
			array_push( $classes, 'wdcl-centered' );
			array_push( $classes, "wdcl-centered--{$center_mode_type}" );
        }

        if( $custom_cursor === 'on' ) {
            array_push( $classes, 'wdcl-cursor' );
        }

		$output =  sprintf('
			<div class="wdcl-carousel wdcl-image-carousel wdcl-carousel-frontend %3$s" %2$s >
                %1$s
            </div>',
			$content,
			$this->_get_carousel_options_data(),
			join( ' ', $classes )
        );

		return $output;
	}

	public function _render_css( $render_slug ) {
        // Carousel CSS
        $this->_render_carousel_css( $render_slug );
    }

}

new WDCL_ImageCarousel;
