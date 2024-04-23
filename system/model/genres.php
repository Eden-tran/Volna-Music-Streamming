<?
class genres extends Model
{
    var $table = 'genres';
    public function __construct()
    {
        parent::__construct();
    }
    function GetList()
    {
        $id = $_GET['slGenres'];
        if (isset($id) && !empty($id)) {
            $extraQuery = "where Id=$id";
        } else {
            $extraQuery = '';
        }

        return $this->db->setquery("select * from $this->table $extraQuery")->loadrows([]);
    }
}