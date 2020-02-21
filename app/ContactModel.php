<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.02.20
 * Time: 11:06
 */

namespace App;


use Core\CoreModel;
use Core\ServiceController;


class ContactModel extends CoreModel
{
    public $contactList = array();
    public function getContactList()
    {
        $sql = 'SELECT id, CONCAT_WS(" ", SecondName, name, ThirdName) as fio FROM ' . $this->table;

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $this->contactList[] = $row;
        }
        return $this->contactList;
    }

    public function addContact()
    {
        if (isset($_POST['btnAdd'])){

            $name = $_POST['name'];
            $SecondName = $_POST['SecondName'];
            $ThirdName = $_POST['ThirdName'];
            $Number = $_POST['Number'];
            $Category = $_POST['Category'];

            $sql = "INSERT INTO ".$this->table." (name, SecondName, ThirdName, Number, Category) VALUES (:name, :SecondName, :ThirdName, :Number, :Category)";

            $stmt = $this->db->prepare($sql);
            //S::dbg ($stmt);

            $stmt->bindValue(":name", $name, \PDO::PARAM_STR);
            $stmt->bindValue(":SecondName", $SecondName, \PDO::PARAM_STR);
            $stmt->bindValue(":ThirdName", $ThirdName, \PDO::PARAM_STR);
            $stmt->bindValue(":Number", $Number, \PDO::PARAM_INT);
            $stmt->bindValue(":Category", $Category, \PDO::PARAM_STR);
            //S::dbg ($stmt);
            $stmt->execute();
            ServiceController::showAlert ('OK');
            ServiceController::goUri ('/panel/contact-list');

        }else{
            echo 'Пользователь НЕ авторизирован';

        }
    }

    public function updateContact()
    {
        if (isset($_POST['btnEdit'])){

            $id = $_POST['id'];
            $name = $_POST['name'];
            $SecondName = $_POST['SecondName'];
            $ThirdName = $_POST['ThirdName'];
            $Number = $_POST['Number'];
            $Category = $_POST['Category'];

            $sql = "UPDATE ". $this->table ." SET name= :name, SecondName= :SecondName, ThirdName= :ThirdName, Number= :Number, Category= :Category WHERE id= :id";
            $stmt = $this->db->prepare($sql);
            //S::dbg ($stmt);
            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
            $stmt->bindValue(":name", $name, \PDO::PARAM_STR);
            $stmt->bindValue(":SecondName", $SecondName, \PDO::PARAM_STR);
            $stmt->bindValue(":ThirdName", $ThirdName, \PDO::PARAM_STR);
            $stmt->bindValue(":Number", $Number, \PDO::PARAM_INT);
            $stmt->bindValue(":Category", $Category, \PDO::PARAM_STR);
            //S::dbg ($stmt);
            $stmt->execute();
            ServiceController::showAlert ('OK');
            ServiceController::goUri ('/panel/contact-list');

        }else{
            echo 'Пользователь НЕ авторизирован';

        }
    }
}