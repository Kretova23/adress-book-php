<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.03.20
 * Time: 13:00
 */

namespace User;


class UserView extends CoreView
{
    public function showContactList()//$contacts
    {
        //ServiceController::dbg($contacts);
        echo $this->twig->render('/admin/pages/usePage.twig');
    }

}