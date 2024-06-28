<?php
/**
 * Skill Section
 *
 * @package Melissa_Portfolio
 */

$default_args = array(
    'panel'    => 'melissa_portfolio_front_page_options',
    'title'    => esc_html__( 'Project Section', 'melissa-portfolio' ),
    'priority' => priority_section('melissa_portfolio_project_section'),
);
$wp_customize->add_section(
    new Melissa_Portfolio_Custom_Section(
        $wp_customize,
        'melissa_portfolio_project_section',
        array_merge(
            $default_args,
            array(
                'button_text'      => __( 'Buy Pre', 'melissa-portfolio' ),
                'url'              => MELISSA_PORTFOLIO_URL_DEMO,
            )
        )
    )
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_project_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_project_section',
		array(
			'label'    => esc_html__( 'Enable Project Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_project_section',
			'settings' => 'melissa_portfolio_enable_project_section',
		)
	)
);

