<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.02.20
 * Time: 12:34
 */

namespace Panel;


use App\ContactModel;
use Core\ServiceController as S;
;


class PanelController
{
    public $View;
    public $Contact;

    public function __construct ()
    {
        $this->View = new PanelView();
        $this->Contact = new ContactModel('contacts');
        $this->checkAuth();
    }
    public  function checkAuth()
    {
        if (S::checkAuth() == false) {
            $this->View->showLoginForm();
            exit();
        }
    }


    public function login()
    {
        S::logIn();
    }

    public function logout()
    {
        S::logOut();
    }

    public function index ()
    {
        $count = $this->Contact->count ();
        $this->View->showPanel ($count);
    }

    public function showContactList ()
    {
        $contacts = $this->Contact->getContactList ();
        $this->View->showContactList ($contacts);
    }

    public function addContact ()
    {
        $this->Contact->addContact ();
    }

    public function showContactAdd ()
    {

        $this->View->showContactAdd ();
    }

    public function showContactEdit ($id)
    {
        $contact = $this->Contact->getById ($id);
        $this->View->showContactEdit ($contact);
    }

    public function editContact ()
    {
        $this->Contact->updateContact ();
    }

    public function  deleteContact($id)
    {
        $this->Contact->deleteContact($id);
    }

}