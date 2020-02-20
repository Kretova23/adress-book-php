<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.02.20
 * Time: 12:34
 */

namespace Panel;


use App\ContactModel;


class PanelController
{
    public $View;
    public $Contact;
    public  function __construct()
    {
        $this->View = new PanelView();
        $this->Contact = new ContactModel('contacts');
    }

    public function index()
     {
         $count =$this->Contact->count();
         $this->View->showPanel($count);
     }
     public function showContactList()
     {
         $contacts = $this->Contact->getContactList();
         $this->View->showContactList($contacts);
     }
     public function addContact()
     {
         $this->Contact->addContact();
     }
    public function showContactAdd()
    {

        $this->View->showContactAdd();
    }
    public function showContactEdit($id)
    {

        $this->View->showContactAdd($id);
    }
}