<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');

class User_Controller extends FT_Controller
{
    public $data = [
        'controller' => 'user'
    ];
    public function __construct()
    {
        $this->model = $this->model('user');
    }
    public function UProfileAction()
    {
        if (islogin()) {
            if ($_POST['btnEditInfo']) {
                if (post('ArtName') && post('FirstName') && post('LastName')) {
                    $this->model->updateprofile();
                    $time = time() + 86400;
                    $_SESSION['name'] = $_POST['FirstName'];
                    setcookie('name', $_POST['FirstName'], $time);
                    //xử lý file avatar

                    if (isset($_FILES["avatar"])) {
                        $target_dir = "public/img/artists";
                        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                        if ($check !== false) {
                            //echo st
                            $uploadOk = 1;
                        } else {
                            //echo error
                            $uploadOk = 0;
                        }
                        // Check if file already exists

                        // Check file size
                        if ($_FILES["avatar"]["size"] > 500000) {
                            // echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }

                        // Allow certain file formats
                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {
                            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            chuyentrang(url('user', 'profile', ['msg' => 'lỗi', 'color' => 'red']));

                            // echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                        } else {
                            $avatar = 'artists' . $_SESSION['Id'] . '.' . $imageFileType;
                            if (file_exists($target_file)) {
                                $info = $this->model->getuser($_SESSION['Id']);
                                if ($info->avatar != 'default.jpg') {
                                    unlink($target_dir . '/artists' . $_SESSION['Id'] . '.' . $imageFileType);
                                }
                            }
                            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_dir . '/artists' . $_SESSION['Id'] . '.' . $imageFileType)) {
                                $this->model->updateavatar($avatar);
                            } else {
                                // echo "Sorry, there was an error uploading your file.";
                                chuyentrang(url('user', 'profile', ['msg' => 'lỗi', 'color' => 'red']));
                            }
                        }
                        $msg['msg'] = 'Thành công';
                        $msg['type'] = 'succesful';
                        chuyentrang(url('user', 'profile', $msg));
                    }
                }
            } else {
                chuyentrang(url());
            }
            chuyentrang(url('user', 'profile'));
        }
    }

    public function ProfileAction()
    {

        if (!islogin($_SESSION['status_login'])) {

            chuyentrang(url('user', 'Signin'));
        }
        if (post('btnEditInfo')) {
            $this->UProfileAction();
        }

        $this->data['content'] = 'user/profile';
        $this->data['title'] = 'Profile';
        $this->data['breadcrumb'] = 'Profile';
        $this->data['info'] = $this->model->getuser($_SESSION['Id']);
        $this->model = $this->model('album');
        $this->data['album'] = $this->model->getlistWithId(10);
        $this->data['single'] = $this->model->sList(10);

        $this->render('layout/masterlayout', $this->data);
    }

    public function SignInAction()
    {

        if (islogin()) {

            chuyentrang(url('user', 'profile'));
        }
        $this->data['content'] = 'user/signin';
        $this->data['breadcrumb'] = 'Sign in';
        if (post('email') && post('password')) {
            //dang nhap
            $user = $this->model->login(post('email'), post('password'));
            if ($user) {
                if ($user->status == 1) {
                    $_SESSION['status_login'] = true;
                    $_SESSION['name'] = $user->FirstName;
                    $_SESSION['Id'] =  $user->Id;
                    if (post('remember')) {
                        $time = time() + 86400;
                        setcookie('src', true, $time);
                        setcookie('name', $user->FirstName, $time);
                        setcookie('Id', $user->id, $time);
                    }
                    chuyentrang(url());
                } else {
                    $this->render('layout/masterlayout', $this->data);
                }
            } else {

                $this->render('layout/masterlayout', $this->data);
            }
        }

        $this->render('layout/masterlayout', $this->data);
        // $view = 'view/user/login.php';
        // $this->render($view, ['class' => 'login', 'msg' => $msg], 'emptylayout');

    }
    public function SignUpAction()
    {

        if (isset($_POST['btnSignUp'])) {
            if (
                post('txtFirstName') && post('txtLastName') && post('txtEmail') &&
                post('txtArtName') && post('txtPassword') && post('txtRePassword') && post('remember')
            ) {
                $email = $_POST['txtEmail'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $msg['msg'] = 'Email Lỗi';
                    $msg['type'] = 'error';
                    return chuyentrang(url('user', 'signup', $msg));
                }
                $check = $this->model->searchWithEmail($email);
                if (!empty($check)) {
                    $msg['msg'] = 'Email đã tồn tại trên hế thống';
                    $msg['type'] = 'error';
                    return chuyentrang(url('user', 'signup', $msg));
                }
                if (post('txtPassword') != post('txtRePassword')) {
                    $msg['msg'] = 'Password không giống nhau.Hãy nhập lại';
                    $msg['type'] = 'error';
                    return chuyentrang(url('user', 'signup', $msg));
                }
                if (!post('remember')) {
                    $msg['msg'] = 'Bạn chưa đồng ý với điều khoản của chúng tôi';
                    $msg['type'] = 'error';
                    return chuyentrang(url('user', 'signup', $msg));
                }
                $query = $this->model->signUp(
                    post('txtFirstName'),
                    post('txtLastName'),
                    post('txtEmail'),
                    post('txtPassword'),
                    post('txtArtName')
                );
                if ($query) {
                    $info = [
                        'firstname' => $_POST['txtFirstName'],
                        'lastname' => $_POST['txtLastName'],
                        'Email' => $_POST['txtEmail'],
                        'password' => $_POST['txtPassword'],
                        'ArtName' => $_POST['txtArtName'],
                    ];
                    // var_dump($_POST);
                    // var_dump($this->model->lastInsert());
                    // die();
                    $id = $this->model->lastInsert();
                    //generate 6 random numbers
                    $passcode = sprintf("%06d", mt_rand(1, 999999));
                    $this->model = $this->model('request');
                    $type = 1; //type=1 active, type=2 forgot pw
                    $generate = $this->model->CreateRequest($id, $passcode, $type);
                    if ($generate) {
                        include("system/core/library/mail.php");
                        sendEmail($info, $passcode);
                        return chuyentrang(url('user', 'active', ['id' => $id, 'kind' => 1]));
                    } else {
                        $msg['msg'] = 'Đã xảy ra lỗi khi tạo tài khoản';
                        $msg['type'] = 'error';
                        return chuyentrang(url('user', 'signup', $msg));
                    }
                }
            } else {
                $msg['msg'] = 'Hãy nhập tấ cả các trường';
                $msg['type'] = 'error';
                return chuyentrang(url('user', 'signup', $msg));
            }
        }

        $this->data['content'] = 'user/signup';
        $this->data['breadcrumb'] = 'Sign up';
        $this->render('layout/masterlayout', $this->data);
    }
    public function activeAction()
    {
        $kind = $_GET['kind'];
        $id = $_GET['id'];
        if ($kind && $id) {
            $this->model = $this->model('request');
            $verified = $this->model->GetRequest($id, $kind);
            if ($verified) {
                if (post('txtActive') && isset($_POST['btnActive'])) {
                    if ($kind == 1) {
                        $this->model = $this->model('user');
                        $user = $this->model->getuser($_GET['id']);

                        if (post('txtActive') == $verified->Passcode) {
                            $this->model->activeAccount();
                            $_SESSION['status_login'] = true;
                            $_SESSION['name'] = $user->FirstName;
                            $_SESSION['Id'] =  $user->Id;
                            $this->model = $this->model('request');
                            $this->model->DeleteRequest($id);
                            return chuyentrang(url('home', 'index'));
                        } else {
                            $msg['msg'] = 'Sai mã kích hoạt';
                            $msg['type'] = 'error';
                            return chuyentrang(url('user', 'active', ['id' => $id, 'kind' => $kind, 'msg' => $msg['msg'], 'type' => $msg['type']]));
                        }
                    } else if ($kind == 2) {

                        if (post('txtActive') == $verified->Passcode) {
                            return chuyentrang(url('user', 'newpw', ['id' => $id, 'kind' => $kind, 'passcode' => $verified->Passcode]));
                        } else {
                            $msg['msg'] = 'Sai mã kích hoạt';
                            $msg['type'] = 'error';
                            return chuyentrang(url('user', 'active', ['id' => $id, 'kind' => $kind, 'msg' => $msg['msg'], 'type' => $msg['type'], 'passoce' => $verified->Passcode]));
                        }
                    } else {
                        return chuyentrang(url('Home', '_404'));
                    }
                }
            }
        } else {
            return chuyentrang(url('Home', '_404'));
        }
        $this->data['content'] = 'user/active';
        $this->data['breadcrumb'] = 'Active';
        $this->render('layout/masterlayout', $this->data);
    }
    public function newpwAction()
    {
        $id = $_GET['id'];
        $passcode = $_GET['passcode'];
        $kind = $_GET['kind'];
        if ($passcode) {
            $this->model = $this->model('request');
            $verified = $this->model->GetRequest($id, $kind);
            if ($verified->Passcode == $passcode) {
                if (isset($_POST['txtPassword']) && isset($_POST['txtRePassword'])) {
                    if (post('txtPassword') === post('txtRePassword')) {
                        $newpass = $_POST['txtPassword'];
                        $this->model = $this->model('user');
                        $execute = $this->model->resetPW($newpass, $id);
                        if ($execute) {
                            $user = $this->model->getuser($id);
                            if ($user) {
                                $_SESSION['status_login'] = true;
                                $_SESSION['name'] = $user->FirstName;
                                $_SESSION['Id'] =  $user->Id;
                                $this->model = $this->model('request');
                                $this->model->DeleteRequest($id);
                                return chuyentrang(url('home', 'index'));
                            }
                        }
                    } else {
                        $msg['msg'] = 'password không khớp';
                        $msg['type'] = 'error';
                        return chuyentrang(url('user', 'newPw', ['id' => $id, 'msg' => $msg['msg'], 'type' => $msg['type']]));
                    }
                }
            } else {
                return chuyentrang(url('home', '_404'));
            }
        } else {
            return chuyentrang(url('home', '_404'));
        }

        $this->data['content'] = 'user/newpw';
        // $this->data['breadcrumb'] = 'Active';
        $this->render('layout/masterlayout', $this->data);
    }

    public function forgotPWAction()
    {
        $email = $_POST['txtEmail'];
        $kind = 2;
        if (isset($email) && isset($_POST['cbAgree'])) {
            $info = $this->model->searchWithEmail($email);
            if (!empty($info)) {
                $res = [
                    'id' => $info->Id,
                    'firstname' => $info->FirstName,
                    'lastname' => $info->LastName,
                    'Email' => $info->Email,
                    'password' => $info->Password,
                    'ArtName' => $info->ArtName,
                ];
                $passcode = sprintf("%06d", mt_rand(1, 999999));
                $this->model = $this->model('request');
                $querry = $this->model->CreateRequest($res['id'], $passcode, $kind);
                if ($querry) {
                    include("system/core/library/mail.php");
                    sendEmail($res, $passcode);
                    return chuyentrang(url('user', 'active', ['id' => $res['id'], 'kind' => $kind]));
                }
            } else {
                $msg['msg'] = 'email không tồn tại trong hệ thống';
                $msg['type'] = 'error';
                return chuyentrang(url('user', 'forgotpw', $msg));
            }
        }
        $this->data['content'] = 'user/forgotpw';
        // $this->data['breadcrumb'] = '';
        $this->render('layout/masterlayout', $this->data);
    }
    public function resendActiveAction()
    {
        $id = $_GET['id'];
        $kind = $_GET['kind'];
        $user = $this->model->getuser($id);
        $info = [
            'Email' => $user->Email,
            'FirstName' => $user->FirstNamem,
            'LastName' => $user->LastName,
            'ArtName' => $user->ArtNam
        ];
        $passcode = sprintf("%06d", mt_rand(1, 999999));
        $this->model = $this->model('request');
        $this->model->DeleteRequest($id);
        $generate = $this->model->CreateRequest($id, $passcode, $kind);
        if ($generate) {
            include("system/core/library/mail.php");
            sendEmail($info, $passcode);
            $msg['msg'] = 'Đã gửi lại mã kích hoạt thành công';
            $msg['type'] = 'succesful';
            return chuyentrang(url('user', 'active', ['id' => $id, 'msg' => $msg['msg'], 'type' => $msg['type'], 'kind' => $kind]));
        } else {
            $msg['msg'] = 'Lỗi không thể gửi lại mã kích hoạt';
            $msg['type'] = 'error';
            return chuyentrang(url('user', 'active', ['id' => $id, 'msg' => $msg['msg'], 'type' => $msg['type'], 'kind' => $kind]));
        }
    }
    public function LogOutAction()
    {
        session_destroy();
        $time = 0;
        setcookie('src', '', $time);
        setcookie('avt', '', $time);
        setcookie('id', '', $time);
        chuyentrang(url('user', 'signin'));
    }
    public function upPwAction()
    {
        $this->data['info'] = $this->model->getuser($_SESSION['Id']);
        if ($_POST['oldpass'] === $this->data['info']->password) {
            if ($_POST['newpass'] === $_POST['confirmpass']) {
                $action = $this->model->updatePassword($_POST['confirmpass']);
                if ($action) {
                    $msg['msg'] = 'cập nhật thành công';
                    $msg['type'] = 'succesful';
                    chuyentrang(url('user', 'profile', $msg));
                } else {
                    $msg['msg'] = 'lỗi khi thực thi';
                    $msg['type'] = 'succesful';
                    chuyentrang(url('user', 'profile', $msg));
                }
            } else {
                $msg['msg'] = 'mật khẩu không hợp lệ';
                $msg['type'] = 'error';
                chuyentrang(url('user', 'profile', $msg));
            }
        } else {
            $msg['msg'] = 'mật khẩu không hợp lệ';
            $msg['type'] = 'error';
            chuyentrang(url('user', 'profile', $msg));
        }
    }
    public function upDescriptionAction()
    {
        if (isset($_POST['btnChangeDes'])) {
            if ($_POST['txtAbout']) {
                $this->model->updateDescription($_POST['txtAbout']);
                $msg['msg'] = 'cập nhật thành công';
                $msg['type'] = 'succesful';
                return chuyentrang(url('user', 'profile', $msg));
            } else {
                $msg['msg'] = 'dữ liệu lỗi';
                $msg['type'] = 'error';
                return chuyentrang(url('user', 'profile', $msg));
            }
        } else {
            $msg['msg'] = 'dữ liệu lỗi';
            $msg['type'] = 'error';
            return chuyentrang(url('user', 'profile', $msg));
        }
    }
}