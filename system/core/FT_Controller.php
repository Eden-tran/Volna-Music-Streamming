<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');

/**
 * @package     FT_Framework
 * @author      Freetuts Dev Team
 * @email       freetuts.net@gmail.com
 * @copyright   Copyright (c) 2015
 * @since       Version 1.0
 * @filesource  system/core/FT_Controller.php
 */
class FT_Controller
{
    // Đối tượng view
    protected $view     = NULL;

    // Đối tượng model
    protected $model    = NULL;

    // Đối tượng library
    protected $library  = NULL;

    // Đối tượng helper
    protected $helper   = NULL;

    // Đối tượng config
    protected $config   = NULL;

    /**
     * Hàm khởi tạo
     * 
     * @desc    Load các thư viện cần thiết
     */
    public function __construct()
    {
    }

    /**
     * Hàm chạy ứng dụng
     * 
     * @desc    tham số truyền vào gồm controller và action
     */
    // public function load($controller, $action)
    // {

    //     // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
    //     $controller = ucfirst(strtolower($controller)) . '_Controller';

    //     // chuyển đổi tên action vì nó có định dạng {name}Action
    //     $action = strtolower($action) . 'Action';

    //     // Kiểm tra file controller có tồn tại hay không
    //     if (!file_exists(PATH_SYSTEM . '/controller/' . $controller . '.php')) {
    //         die('Controller không tồn tại');
    //     }

    //     require_once PATH_SYSTEM . '/controller/' . $controller . '.php';

    //     // Kiểm tra class controller có tồn tại hay không
    //     if (!class_exists($controller)) {
    //         die('Controller không tồn tại');
    //     }

    //     // Khởi tạo controller
    //     $controllerObject = new $controller();

    //     // Kiểm tra action có tồn tại hay không
    //     if (!method_exists($controllerObject, $action)) {
    //         die('Action không tồn tại');
    //     }

    //     // Gọi tới action
    //     $controllerObject->{$action}();
    // }
    public function render($view, $data = [])
    {
        extract($data);
        if (file_exists(PATH_SYSTEM . '/view/' . $view . '.php')) {
            require_once PATH_SYSTEM . '/view/' . $view . '.php';
        }
    }
    function model($model)
    {
        if (file_exists(PATH_SYSTEM . '/model/' . $model . '.php')) {
            require_once PATH_SYSTEM . '/model/' . $model . '.php';
            if (class_exists($model)) {
                $modelObject = new $model;
                return $modelObject;
            }
        }
        return false;
    }
}