<?php

class Controller_Home extends Controller
{
    function action_index($params)
    {
        $this->view->generate('home_view.php', 'template_view.php', array('title' => 'Курсы английского языка', 'ref' => isset($params[0]) ? $params[0] : ''));
    }

    function  action_send($params)
    {
        $name = isset($_POST['name']) ? strip_tags($_POST['name']) : '';
        $phone = isset($_POST['phone']) ? strip_tags($_POST['phone']) : '';
        $ref = isset($_POST['ref']) ? strip_tags(urldecode($_POST['ref'])) : '';
        $bid = new Bid($name, $phone, $ref);

        if (isset($params[0]) && $params[0] == 'call') {
            if ($bid->sendBid(true)) {
                $this->view->generate('wait_call.php', 'template_view.php');
            } else {
                $this->view->generate('error_view.php', 'template_view.php');
            }
        } else {
            if ($bid->sendBid()) {
                $this->view->generate('thanks_view.php', 'template_view.php');
            } else {
                $this->view->generate('error_view.php', 'template_view.php');
            }
        }
    }
}