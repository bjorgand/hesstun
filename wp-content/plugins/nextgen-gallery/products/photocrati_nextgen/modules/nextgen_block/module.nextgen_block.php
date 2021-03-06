<?php

/***
{
    Module:     photocrati-nextgen_block,
}
***/

define('NEXTGEN_BLOCK', 'photocrati-nextgen_block');

class M_NextGEN_Block extends C_Base_Module
{
	function define($id = 'pope-module',
                    $name = 'Pope Module',
                    $description = '',
                    $version = '',
                    $uri = '',
                    $author = '',
                    $author_uri = '',
                    $context = FALSE)
	{
		parent::define(
			'photocrati-nextgen_block',
			'NextGEN Block',
			'Provides a NextGEN Block for the Gutenberg interface.',
			'3.0.16.4',
			'https://www.imagely.com/wordpress-gallery-plugin/nextgen-gallery/',
			'Imagely',
			'https://www.imagely.com'
		);
	}

    function _register_hooks()
    {
        add_action( 'enqueue_block_assets', array($this, 'nextgen_block_editor_assets') );
    }

    function nextgen_block_editor_assets() {

        $router = C_Router::get_instance();

        wp_enqueue_script(
            'nextgen-block-js', 
            $router->get_static_url(NEXTGEN_BLOCK . '#build/block.min.js'),
            array( 'wp-blocks', 'wp-i18n', 'wp-element'),
            NGG_SCRIPT_VERSION,
            TRUE
        );

        wp_enqueue_style(
            'nextgen-block-css', 
            $router->get_static_url(NEXTGEN_BLOCK . '#editor.css'),
            array( 'wp-edit-blocks' ),
            NGG_SCRIPT_VERSION
        );
    }

}

new M_NextGEN_Block();