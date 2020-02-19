<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.02.20
 * Time: 10:59
 */

namespace App;


use App\ContactModel ;
use App\ContactView;

class ContactController
{
    public $Model;
    public $View;

    public function __construct()
    {
        $this->Model = new ContactModel ('contacts');
        $this->View = new ContactView();
    }
    public function showContactFromId($id)
    {
       $contact = $this->Model->getById($id) ;
       $this->View->showContactFromId($contact);
    }
    public function showCountRecords()
    {
       $count = $this->Model->count();
       $this->View->showCountRecords($count);
    }
}
