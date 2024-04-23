<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
/**
 * Hàm chạy ứng dụng
 */
function FT_load()
{
    // Lấy phần config khởi tạo ban đầu
    $config = include_once PATH_SYSTEM . '/config/init.php';
    // action mặc định]
    // Nếu không truyền controller thì lấy controller mặc định
    $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];

    // Nếu không truyền action thì lấy action mặc định 
    $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];

    // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
    $controller = ucfirst(strtolower($controller)) . '_Controller';
    $model = ucfirst(strtolower($controller));

    // chuyển đổi tên action vì nó có định dạng {name}Action
    $action = strtolower($action) . 'Action';



    // Include controller chính để các controller con nó kế thừa
    include_once PATH_SYSTEM . '/core/FT_Controller.php';
    // Kiểm tra file controller có tồn tại hay không
    if (file_exists(PATH_SYSTEM . '/controller/' . $controller . '.php')) {
        // Gọi file controller vào
        require_once PATH_SYSTEM . '/controller/' . $controller . '.php';
        if (class_exists($controller)) {
            $controllerObject = new $controller();
            if (method_exists($controllerObject, $action)) {
                $controllerObject->{$action}();
            } else {
                loaderror();
            }
        } else {
            loaderror();
        }
    } else {
        loaderror();
    }



    // // Kiểm tra file controller có tồn tại hay không
    // if (!file_exists(PATH_SYSTEM . '/controller/' . $controller . '.php')) {
    //     $action = strtolower('_404') . 'Action';
    //     $controller = ucfirst(strtolower('home')) . '_Controller';
    //     require_once PATH_SYSTEM . '/controller/' . $controller . '.php';
    // } else {
    //     // Gọi file controller vào
    //     require_once PATH_SYSTEM . '/controller/' . $controller . '.php';
    // }
    // // Kiểm tra class controller có tồn tại hay không
    // if (!class_exists($controller)) {
    //     $action = strtolower('_404') . 'Action';
    //     $controller = ucfirst(strtolower('home')) . '_Controller';
    // }
    // // Khởi tạo controller
    // $controllerObject = new $controller();

    // Kiểm tra action có tồn tại hay không
    // if (!method_exists($controllerObject, $action)) {
    //     $action = strtolower('_404') . 'Action';
    //     $controller = ucfirst(strtolower('home')) . '_Controller';
    // }
    // // Chạy ứng dụng

    // $controllerObject->{$action}();
}
function loaderror()
{
    $action = strtolower('_404') . 'Action';
    $controller = ucfirst(strtolower('home')) . '_Controller';
    require_once PATH_SYSTEM . '/controller/' . $controller . '.php';
    $controllerObject = new $controller();
    $controllerObject->{$action}();
}
// function model($model)
// {
//     if (file_exists(PATH_SYSTEM . '/model/' . $model . '.php')) {
//         require_once PATH_SYSTEM . '/model/' . $model . '.php';
//         if (class_exists($model)) {
//             $modelObject = new $model;
//             return $modelObject;
//         }
//     }
//     return false;
// }