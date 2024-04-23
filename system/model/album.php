<?
class album extends Model
{
    var $table = 'album';
    public function __construct()
    {
        parent::__construct();
    }
    function listenCount($id, $value)
    {
        return $this->db->setquery(
            'UPDATE `song`
            SET Listen=?
            WHERE Id= ?'
        )->save([$value, $id]);
    }
    function CreateAlbum()
    {

        return $this->db->setquery('INSERT INTO ' . $this->table . ' (`Title`, `Artist`,`UserId`,`About`,`GenresId`)
        VALUES (?, ?, ?, ?,?);')
            /* UPDATE album set `avatar`= ? WHERE `Id`=LAST_INSERT_ID();') */
            ->loadrow([$_POST['txtAlbum'], $_POST['txtArtist'], $_SESSION['Id'], $_POST['txtAlbumAbout'], $_POST['slGenres']]);
    }
    function SearchAlbum($search)
    {
        return $this->db->setquery(
            "SELECT *
        FROM  $this->table 
        WHERE `Title` LIKE '%$search%'
        OR `Artist` LIKE '%$search%';"
        )->loadrows([]);
    }
    function countListen($id)
    {
        return $this->db->setquery("SELECT 
        SUM(Listen) as result from `song` where 
        AlbumId=?")->loadrow([$id]);
    }
    function SearchSingle($search)
    {
        return $this->db->setquery(
            "SELECT *
        FROM  `song` 
        WHERE `Name` LIKE '%$search%'
        OR `artist` LIKE '%$search%';"
        )->loadrows([]);
    }

    function updateavatar($avatar, $id)
    {

        return $this->db->setquery(
            'UPDATE `' . $this->table . '`
            SET avatar=?
            WHERE Id= ?'
        )->save([$avatar, $id]);
    }

    function getlistWithId($limit = null, $id = null)

    {
        if ($limit > 0) {
            $limitQuery = "LIMIT $limit";
        } else {
            $limitQuery = "";
        }
        $id = $id ??  $_SESSION['Id'];
        return $this->db->setquery('select * from `' . $this->table . '` WHERE UserId= ? ' . $limitQuery . '')->loadrows([$id]);
    }
    function updateSavatar($avatar, $id)
    {

        return $this->db->setquery(
            'UPDATE `song`
            SET avatar=?
            WHERE Id= ?'
        )->save([$avatar, $id]);
    }
    function updatealbum($title, $artist, $about, $genres, $id)
    {

        return $this->db->setquery(
            'UPDATE `' . $this->table . '`
            SET Title=?, Artist=?,About=?,GenresId=?
            WHERE Id= ?'
        )->save([$title, $artist, $about, $genres, $id]);
    }
    function AddSong($title, $artist, $id)
    {
        return $this->db->setquery('INSERT INTO song (`Name`, `artist`,`AlbumId`,`UserId`)
        VALUES (?, ?, ?,?);')
            /* UPDATE album set `avatar`= ? WHERE `Id`=LAST_INSERT_ID();') */
            ->loadrow([$title, $artist, $id, $_SESSION['Id']]);
    }
    function AddSongS3($Link, $avatar, $SId)
    {
        return $this->db->setquery(
            'UPDATE `song`
            SET `Link`=?,`status`=1,`avatar`=?
            WHERE Id= ?'
        )->save([$Link, $avatar, $SId]);
    }
    function AddSongS2($Link, $SId)
    {
        return $this->db->setquery(
            'UPDATE `song`
            SET `Link`=?,`status`=1
            WHERE Id= ?'
        )->save([$Link, $SId]);
    }
    function lastinsert()
    {
        return $this->db->lastInsertId();
    }
    function countSongInAlbum($id)
    {

        return $this->db->setquery("SELECT count(AlbumId) as result from `song` where AlbumId=?")->loadrow([$id]);
    }
    function getSong($id, $limit)
    {
        if ($limit > 0) {
            $extra = "limit $limit";
        } else {
            $extra = "";
        }
        return $this->db->setquery("select * from `song` where AlbumId=? $extra ")->loadrows([$id]);
    }
    function getSongs2($id)
    {

        return $this->db->setquery("select * from `song` where Id=?")->loadrow([$id]);
    }
    function getDetail($id)
    {
        return $this->db->setquery('select * from `' . $this->table . '` where Id=?')->loadrow([$id]);
    }
    function getList()
    {
        return $this->db->setquery('select * from `' . $this->table . '`')->loadrows([]);
    }
    function deleteA($id)
    {
        return $this->db->setquery(

            'DELETE FROM ' . $this->table . ' WHERE Id=?;'
        )->save([$id]);
    }
    function getSlist()
    {
        return $this->db->setquery('select * from `song` WHERE AlbumId=0')->loadrows([]);
    }
    function getListByGenres($genres)
    {
        if ($genres == 0) {
            $extra = '';
        } else {
            $extra = "WHERE genresId= $genres";
        }
        return $this->db->setquery("select * from $this->table $extra")->loadrows([]);
    }
    function deleteSA($id)
    {
        return $this->db->setquery(
            'DELETE FROM `song`  WHERE  AlbumId=?;'
        )->save([$id]);
    }
    function deleteS($id)
    {
        return $this->db->setquery(
            'DELETE FROM `song`  WHERE Id=?;'
        )->save([$id]);
    }
    function updateSA($name, $artist, $id)
    {
        return $this->db->setquery(
            'UPDATE `song`
            SET Name=?, Artist=?
            WHERE Id= ?'
        )->save([$name, $artist, $id]);
    }
    function sList($limit = null)
    {
        if ($limit > 0) {
            $limitQuery = "LIMIT $limit";
        } else {
            $limitQuery = '';
        }
        return $this->db->setquery('select * from `song` where AlbumId=0 AND UserId=? ' . $limitQuery . '')->loadrows([$_SESSION['Id']]);
    }
}