<?
class request extends Model
{

    var $table = 'request';
    public function __construct()
    {
        parent::__construct();
    }

    function DeleteRequest($id)
    {
        return $this->db->setquery(
            "DELETE FROM $this->table WHERE UserId = ?"
        )->save([$id]);
    }
    function GetRequest($id, $type)
    {
        return $this->db->setquery("SELECT * FROM `$this->table` WHERE `UserId`= ? AND `Type` = ? ORDER BY `CreatedDate` DESC LIMIT 1")->loadrow([$id, $type]);
    }

    function CreateRequest($UserId, $Passcode, $type)
    {
        return $this->db->setquery(
            "INSERT INTO $this->table (`UserId`,Passcode,Type) VALUES (?, ?,?)"
        )->save([$UserId, $Passcode, $type]);
    }
}