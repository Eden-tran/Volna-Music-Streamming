<?php
class Model extends database
{
    protected $db;
    public function __construct()
    {
        $this->db = new database; // db-> trỏ tới class database có kết nối ,
        //  $this->querry => ko có kết nối -> lớp pdo ko sử dụng dc
        // $this->db->querry => trỏ tới lớp pdo khởi tạo 

    }
    // var $table='';
    function add($col)
    { // $col là tên cột chứa giá trị
        $list_col = $value = '';
        $result = []; // Mảng chứa giá trị của cột
        foreach ($col as $k => $v) {
            $list_col .= '`' . $k . '`,';
            $value .= '?,';
            $result[] = trim($v);
        }
        $list_col = rtrim($list_col, ',');
        $value = rtrim($value, ',');
        return $this->setquery("INSERT INTO `'.$this->table.'` ('.$list_col.') VALUES ('.$value.')")->save($result);
        // $list_col là ds cột, $value là giá trị trong ds cột  
    }
    function edit($col, $id)
    {
        $list_col = $value = '';
        $result = [];
        foreach ($col as $k => $v) {
            $list_col .= '`' . $k . '`,';
            $value .= '?,';
            $result[] = trim($v);
        }
        $list_col = rtrim($list_col, ',');
        $value = rtrim($value, ',');
        return $this->setquery("UPDATE `'.$this->table.'` SET '.$list_col.'='.$value.' WHERE `id`=$id")->save($result);
    }
    function remove($id)
    {
        return $this->setquery("DELETE FROM `'.$this->table.'` WHERE `id`=$id")->save($id);
    }
}