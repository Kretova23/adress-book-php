<?php


namespace Core;

use Core\CoreModel as Model;
use Core\ServiceController as Serv;


class CoreController
{
    public $Model;
    public $View;

    public function __construct ()
    {
        $this->Model = new Model('contacts');
    }

    public function count()
    {
        echo $this->Model->count ();
    }

    public function getById ($id)
    {
        Serv::dbg ( $this->Model->getById ($id));
    }

    public function all()
    {
        Serv::dbg ( $this->Model->all ());
    }
}