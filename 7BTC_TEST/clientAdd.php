<?php

//session_start();
//require "dbcon.php";
require_once("database.php");
class clientAdd
{
    private $first_name;
    private $last_name;
    private $id;
    private $mobile;
    private $email;
    private $address;
    protected $dbCon;
    private $start_time;
    private $notes;
    private $client_id;
    private $end_time;
    private $key;
    public function __construct($id = 0, $first_name = "", $last_name = "", $mobile = "", $address = "", $email = "", $key = "", $notes = "", $start_time = "", $client_id = "", $end_time = "")
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->mobile = $mobile;
        $this->address = $address;
        $this->email = $email;
        $this->start_time = $start_time;
        $this->notes = $notes;
        $this->end_time = $end_time;
        $this->client_id = $client_id;

        $this->key = $key;

        $this->dbCon = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getKey()
    {
        return  $this->key;
    }
    public function setStartTime($start_time)
    {
        $this->start_time = $start_time;
    }

    public function getStartTime()
    {
        return  $this->start_time;
    }
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    public function getClientId()
    {
        return  $this->client_id;
    }
    public function setNote($notes)
    {
        $this->notes = $notes;
    }

    public function getNote()
    {
        return  $this->notes;
    }
    public function setEndTime($end_time)
    {
        $this->end_time = $end_time;
    }

    public function getEndTime()
    {
        return  $this->end_time;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return  $this->id;
    }
    public function setName($first_name)
    {
        $this->first_name = $first_name;
    }
    public function getName()
    {
        return  $this->first_name;
    }

    public function setSurname($last_name)
    {
        $this->last_name = $last_name;
    }
    public function getSurname()
    {
        return  $this->last_name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return  $this->email;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getAddress()
    {
        return  $this->address;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }
    public function getMobile()
    {
        return  $this->mobile;
    }
    public function insertData()
    {
        try {

            $stm = $this->dbCon->prepare("INSERT INTO clients (first_name, last_name, mobile,email,address) VALUES (?,?,?,?,?) ");
            $stm->execute([$this->first_name, $this->last_name, $this->mobile,  $this->email, $this->address]);

            echo "<script> alert('Data Created Successfully');document.location='index.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function insertAppointmentDetails()
    {
        try {

            $stm = $this->dbCon->prepare("INSERT INTO appointment (start_time, notes, client_id,end_time) VALUES (?,?,?,?)  ");
            $stm->execute([$this->start_time, $this->notes, $this->client_id, $this->end_time]);

            echo "<script> alert('Data Created Successfully');document.location='index.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //    fetch all rows from table client
    public function fetchAll()
    {
        try {
            $stm = $this->dbCon->prepare("SELECT id, first_name, last_name, mobile, email, address FROM  clients ");
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //    fetch all rows from table appointment
    public function fetch()
    {
        try {
            $stm = $this->dbCon->prepare("SELECT id, start_time, notes, client_id,end_time address FROM  appointment");
            $stm->execute();

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // Fetch Client's data with a specific ID
    public function fetchOne()
    {
        try {
            $stm = $this->dbCon->prepare("SELECT id, first_name, last_name, mobile, email, address FROM  clients  WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // Fetch Appointment's data with a specific ID
    public function fetchOneAppointment()
    {
        try {
            $stm = $this->dbCon->prepare("SELECT id, client_id, start_time, end_time, notes FROM  appointment  WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // GET CLIENT'S DETAILS
    public function fetchClientDetails()
    {
        try {

            $stm1 = $this->dbCon->prepare("SELECT appointment.id, appointment.notes, appointment.start_time, appointment.end_time, appointment.client_id from appointment INNER JOIN clients ON appointment.client_id=clients.id  WHERE clients.id=? ORDER BY appointment.id DESC");
            $stm1->execute([$this->id]);
            return $stm1->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // EDIT CLIENT'S DATA
    public function update()
    {
        try {
            $stm = $this->dbCon->prepare("UPDATE clients SET first_name=?,last_name=?,mobile=?,email=?,address=?  WHERE id=? ");
            $stm->execute([$this->first_name, $this->last_name, $this->mobile, $this->email, $this->address, $this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // DELETE CLIENT'S DATA
    public function delete()
    {
        try {
            $stm = $this->dbCon->prepare("DELETE FROM clients WHERE id=? ");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
            echo "<script> alert('Data Deleted Successfully');document.location='index.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // DELETE CLIENT'S APPOINTMENT
    public function deleteAppointment()
    {
        try {
            $stm = $this->dbCon->prepare("DELETE FROM appointment WHERE id=? ");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
            echo "<script> alert('Data Deleted Successfully');document.location='client-view.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // Search clients by name
    public function search()
    {
        try {
            $query = $this->dbCon->prepare('SELECT id,first_name, last_name, email,mobile, address FROM  clients  WHERE first_name LIKE ? ORDER BY first_name');
            $query->execute([$this->key]);
            $found_results = $query->fetchAll();
            return $found_results;
            header('location: index.php');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function rowCount()
    {
        try {
            $query = $this->dbCon->prepare('SELECT COUNT(id) FROM clients');

            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function rowCount1()
    {
        try {
            $query = $this->dbCon->prepare('SELECT * FROM clients WHERE name LIKE ?');

            $query->execute([$this->key]);
            return $query->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
