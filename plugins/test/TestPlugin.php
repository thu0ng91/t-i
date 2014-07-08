<?php
/**
 * Class TestPlugin
 */
class TestPlugin extends FWPlugin {

    public function install()
    {

    }

    public function uninstall()
    {

    }

    public function upgrade()
    {

    }

    public function hooks()
    {
        return array(
            'member' => array(
                'beforeRegister' => array('site', 'onRegister'),
            ),
        );
    }
}