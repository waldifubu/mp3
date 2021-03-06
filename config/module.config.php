<?php
/**
 * MP3 Player
 *
 * @author    Sammie S. Taunton <diemuzi@gmail.com>
 * @copyright 2014 Sammie S. Taunton
 * @license   https://github.com/diemuzi/mp3/blob/master/LICENSE License
 * @link      https://github.com/diemuzi/mp3 MP3 Player
 */

return array(
    'router'          => array(
        'routes' => array(
            'mp3-index'           => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mp3/index[:dir]',
                    'defaults' => array(
                        'controller' => 'Mp3\Controller\Index',
                        'action'     => 'index'
                    )
                )
            ),
            'mp3-play-all'        => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mp3/play/all[:dir]',
                    'defaults' => array(
                        'controller' => 'Mp3\Controller\Index',
                        'action'     => 'playall'
                    )
                )
            ),
            'mp3-play-single'     => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mp3/play/single[:dir]',
                    'defaults' => array(
                        'controller' => 'Mp3\Controller\Index',
                        'action'     => 'playsingle'
                    )
                )
            ),
            'mp3-download-folder' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mp3/download/folder[:dir][/format/:format]',
                    'defaults' => array(
                        'controller' => 'Mp3\Controller\Index',
                        'action'     => 'downloadfolder'
                    )
                )
            ),
            'mp3-download-single' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mp3/download/single[:dir]',
                    'defaults' => array(
                        'controller' => 'Mp3\Controller\Index',
                        'action'     => 'downloadsingle'
                    )
                )
            ),
            'mp3-search'          => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mp3/search[/name/][:name][/flash/:flash]',
                    'defaults' => array(
                        'controller' => 'Mp3\Controller\Search',
                        'action'     => 'search',
                        'name'       => null
                    )
                )
            )
        )
    ),
    'console'         => array(
        'router' => array(
            'routes' => array(
                'mp3-import' => array(
                    'options' => array(
                        'route'    => 'mp3 import [--help] [--confirm=]',
                        'defaults' => array(
                            'controller' => 'Mp3\Controller\Search',
                            'action'     => 'import',
                            'confirm'    => 'yes'
                        )
                    )
                )
            )
        )
    ),
    'translator'      => array(
        'locale'                    => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'        => 'gettext',
                'base_dir'    => dirname(__DIR__) . '/language',
                'pattern'     => '%s.mo',
                'text_domain' => 'mp3'
            )
        )
    ),
    'controllers'     => array(
        'invokables' => array(
            'Mp3\Controller\Index'  => 'Mp3\Controller\IndexController',
            'Mp3\Controller\Search' => 'Mp3\Controller\SearchController'
        )
    ),
    'view_manager'    => array(
        'template_map'        => include_once dirname(__DIR__) . '/template_map.php',
        'template_path_stack' => array(
            'mp3' => dirname(__DIR__) . '/view'
        )
    ),
    'view_helpers'    => array(
        'invokables' => array(
            'convert'  => 'Mp3\View\Helper\Convert',
            'navigate' => 'Mp3\View\Helper\Navigate'
        )
    ),
    'service_manager' => array(
        'invokables' => array(
            'Mp3\Service\Calculate' => 'Mp3\Service\Calculate',
            'Mp3\Service\Index'     => 'Mp3\Service\Index',
            'Mp3\Service\Search'    => 'Mp3\Service\Search'
        )
    ),
    'form_elements'   => array(
        'invokables' => array(
            'Mp3\Form\Search' => 'Mp3\Form\Search'
        )
    ),
    'input_filters'   => array(
        'invokables' => array(
            'Mp3\InputFilter\Search' => 'Mp3\InputFilter\Search'
        )
    )
);
