<?php

class Controller_404 extends Controller
{

    function action_index()
    {
        $log = new __log();
        $log->set('404');
        $this->view->generate('404_view.php', 'template_view.php', array('title' => '404'));
    }

}
