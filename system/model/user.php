<?php
class user extends Model
{
    private $table = 'user';
    public function __construct()
    {
        parent::__construct();
    }

    // Login
    function login($user, $pass)
    {

        return $this->db->setquery("select * from `$this->table` where `Email` = ? and `password` = ?")->loadrow([$user, $pass]);
    }
    function searchWithEmail($key)
    {
        return $this->db->setquery("SELECT * FROM `$this->table`
        WHERE `Email` LIKE '%$key%';  
        ")->loadrow([]);
    }
    function searchUser($searchkey)
    {
        return $this->db->setquery("select * from `$this->table`
        where `FirstName` LIKE '%$searchkey%'   
        OR `LastName` LIKE  '%$searchkey%'
        OR `ArtName` LIKE  '%$searchkey%';
        ")->loadrows([]);
    }
    function resetPW($newpw, $id)
    {
        return $this->db->setquery(
            'UPDATE `' . $this->table . '`
                SET password=?
                WHERE Id= ?'
        )->save([$newpw, $id]);
    }
    // Danh sách thành viên
    function lastinsert()
    {
        return $this->db->lastInsertId();
    }
    function user_list($offset = 0, $limit = 0)
    {
        $extra = '';
        if ($limit > 0) {
            $extra = "LIMIT $limit OFFSET $offset";
        }

        return $this->db->setquery("select * from `$this->table` $extra")->loadrows([]);
    }
    function getuser($id)
    {
        return $this->db->setquery('select * from `' . $this->table . '` where Id=?')->loadrow([$id]);
    }
    function activeAccount()
    {
        return $this->db->setquery(
            'UPDATE `' . $this->table . '`
                SET status=1
                WHERE Id= ?'
        )->save([$_GET['id']]);
    }
    function updateprofile()
    {

        return $this->db->setquery(
            'UPDATE `' . $this->table . '`
            SET ArtName=?, FirstName=?,LastName=?
            WHERE Id= ?'
        )->save([$_POST['ArtName'], $_POST['FirstName'], $_POST['LastName'], $_SESSION['Id']]);
    }
    function updateavatar($avatar)
    {

        return $this->db->setquery(
            'UPDATE `' . $this->table . '`
            SET avatar=?
            WHERE Id= ?'
        )->save([$avatar, $_SESSION['Id']]);
    }
    function signUp($firstname, $lastname, $email, $password, $artname)
    {
        return $this->db->setquery("INSERT INTO  `$this->table` 
        (`FirstName`,`LastName`,`Email`,`password`,`ArtName`) 
        values(?,?,?,?,?)")->save([$firstname, $lastname, $email, $password, $artname]);
    }
    function updatePassword($password)
    {
        return $this->db->setquery('UPDATE `' . $this->table . '`
        SET password=?
        WHERE Id= ?')->save([$password, $_SESSION['Id']]);
    }
    function updateDescription($description)
    {
        return $this->db->setquery('UPDATE `' . $this->table . '`
        SET description=?
        WHERE Id= ?')->save([$description, $_SESSION['Id']]);
    }
}