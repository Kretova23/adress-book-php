<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.02.20
 * Time: 11:06
 */

namespace App;


use Core\CoreView;
use Core\ServiceController as S;

class ContactView extends CoreView
{
    public function showContactFromId ($data)
    {
       //print_r($this->twig);
       echo $this->twig->render('contact/single.twig', ['data' => $data] );
        //$this->twig->render('layout.php', ['data' => $data] );
//        echo 'ioutgoui';
    }
    public function showCountRecords($count)
    {
       echo $this->twig->render('count.twig',['count'=>$count]);
    }
    public function showContactList($contacts)
    {
        S::dbg($contacts);

        echo $this->twig->render('/admin/pages/usePage.twig',['contacts'=>$contacts]);
    }


}