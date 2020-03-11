<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.02.20
 * Time: 12:36
 */

namespace Panel;


use Core\CoreView;
use Core\ServiceController;

class PanelView extends CoreView
{
    public function showPanel($count){
        echo $this->twig->render('/admin/pages/info.twig',['count'=>$count]);

    }

    public function showContactAdd()
    {
        //ServiceController::dbg($contacts);
        echo $this->twig->render('/admin/pages/addcontact.twig');
    }
//    public function showContactEdit($id)
//    {
//        //ServiceController::dbg($contacts);
//        echo $this->twig->render('/admin/pages/addcontact.twig',['id'=>$id]);
//    }

    public function showContactEdit($contact)
    {
        echo $this->twig->render('/admin/pages/editcontact.twig',['contact' => $contact]);
    }

    public function showLoginForm()
    {
        echo $this->twig->render('/admin/pages/login.html');
    }
    public function showContactList($contacts)
    {
        echo $this->twig->render('/admin/pages/contactlist.twig',['contacts'=>$contacts]);
    }

}