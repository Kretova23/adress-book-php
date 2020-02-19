<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.02.20
 * Time: 11:06
 */

namespace App;


use Core\CoreView;

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
}