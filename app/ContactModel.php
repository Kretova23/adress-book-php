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
        $sql = 'SELECT id, CONCAT_WS(" ", SecondName, Name, ThirdName) as fio FROM ' . $this->table .' WHERE Deleted_at IS NULL ';

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $this->contactList[] = $row;
        }
        //ServiceController::dbg($this->contactList);exit();
        return $this->contactList;
    }

    public function addContact()
    {
        if (isset($_POST['btnAdd'])){

            $Name = $_POST['Name'];
            $SecondName = $_POST['SecondName'];
            $ThirdName = $_POST['ThirdName'];
            $Number = $_POST['Number'];
            $Category = $_POST['Category'];

            $sql = "INSERT INTO ".$this->table." (Name, SecondName, ThirdName, Number, Category) VALUES (:Name, :SecondName, :ThirdName, :Number, :Category)";

            $stmt = $this->db->prepare($sql);
            //S::dbg ($stmt);

            $stmt->bindValue(":Name", $Name, \PDO::PARAM_STR);
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
            $Name = $_POST['Name'];
            $SecondName = $_POST['SecondName'];
            $ThirdName = $_POST['ThirdName'];
            $Number = $_POST['Number'];
            $Category = $_POST['Category'];
            $sql = "UPDATE ". $this->table ." SET Name= :Name, SecondName= :SecondName, ThirdName= :ThirdName, Number= :Number, Category= :Category,  Updated_at= now() WHERE id= :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
            $stmt->bindValue(":Name", $Name, \PDO::PARAM_STR);
            $stmt->bindValue(":SecondName", $SecondName, \PDO::PARAM_STR);
            $stmt->bindValue(":ThirdName", $ThirdName, \PDO::PARAM_STR);
            $stmt->bindValue(":Number", $Number, \PDO::PARAM_INT);
            $stmt->bindValue(":Category", $Category, \PDO::PARAM_STR);
            $stmt->execute();
            ServiceController::showAlert ('OK');
            ServiceController::goUri ('/panel/contact-list');

        }else{
            echo 'Пользователь НЕ авторизирован';

        }
    }

    public function deleteContact($id)
    {

            $sql = "UPDATE ". $this->table ." SET   Deleted_at= now() WHERE id= :id";
            $stmt = $this->db->prepare($sql);
            //S::dbg ($stmt);
            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);


            $stmt->execute();
            ServiceController::showAlert ('OK');
            ServiceController::goUri ('/panel/contact-list');


    }
}