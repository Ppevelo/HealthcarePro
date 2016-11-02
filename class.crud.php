<?php

class crud{
    private $db;

    function __construct($DB_con){
        $this->db = $DB_con;
    }

    public function create($prenom, $nom, $email, $num_agrement){
        try{
            $stmt = self::$db->prepare("
            INSERT INTO contact(
              firstname,
              lastname,
              email,
              approval_number
            )
            VALUES(
             ?, ?, ?, ?
            );");
            $stmt->bindParam(1, $prenom, PDO::PARAM_STR, 25);
            $stmt->bindParam(2, $nom, PDO::PARAM_STR, 25);
            $stmt->bindParam(3, $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(4, $num_agrement, PDO::PARAM_INT, 10);
            $stmt->execute();
            return true;
        }
        catch(PDOexception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($prenom, $nom, $email, $num_agrement,$id){
        try{
            $stmt = self::$db->prepare("
            UPDATE contact
            SET
              firstname = ?,
              lastname = ?,
              email = ?,
              approval_number = ?
            WHERE
              id = ?
            ;");
            $stmt->bindParam(1, $prenom, PDO::PARAM_STR, 25);
            $stmt->bindParam(2, $nom, PDO::PARAM_STR, 25);
            $stmt->bindParam(3, $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(4, $num_agrement, PDO::PARAM_INT, 10);
            $stmt->bindParam(5, $id, PDO::PARAM_INT, 11);
            $stmt->execute();
            return true;
        }
        catch(PDOexception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id){
        try{
            $stmt = self::$db->prepare("
            DELETE FROM contact
            WHERE
              id = ?
            ;");
            $stmt->bindParam(1, $id, PDO::PARAM_INT, 11);
            $stmt->execute();
            return true;
        }
        catch(PDOexception $e){
            echo $e->getMessage();
            return false;
        }
    }
}
