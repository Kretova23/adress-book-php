<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.03.20
 * Time: 12:58
 */

namespace User;

use App\ContactModel;
use Core\ServiceController as S;

class UserController
{
    public $Model;
    public $View;
    public $Contact;

    public function __construct()
    {
        $this->Model = new ContactModel ('contacts');
        $this->View = new ContactView();
    }
    public function showContactList ()
    {
        $contacts = $this->Contact->getContactList ();
        $this->View->showContactList ($contacts);
    }

}