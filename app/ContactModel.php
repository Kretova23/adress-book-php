<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.02.20
 * Time: 11:06
 */

namespace App;


use Core\CoreModel;


class ContactModel extends CoreModel
{
    public $contactList = array();
    public function getContactList()
    {
        $sql = "SELECT id, CONCAT_WS(\" \", SecondName, name, ThirdName) as fio FROM " . $this->table;

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $this->contactList[] = $row;
        }
        return $this->contactList;
    }

}