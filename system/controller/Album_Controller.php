<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');

class Album_Controller extends FT_Controller
{
    public $data = [
        'controller' => 'Album'
    ];
    public function __construct()
    {
        $this->model = $this->model('Album');
    }
    public function IndexAction()
    {
        // $searchKey = $_GET['txtSearch'];
        $this->data['list'] = $this->model->getList();
        $this->data['single'] = $this->model->getSong(0, 10);
        $this->model = $this->model('genres');
        $this->data['genresList'] = $this->model->GetList();
        $this->data['content'] = 'album/homepage';
        $this->data['breadcrumb'] = 'Release';
        $this->data['title'] = 'Release';

        $this->render('layout/masterlayout', $this->data);
    }

    public function genresChangeAction()
    {
        $genres = $_GET['slGenres'];

        $output = '';

        $result = $this->model->getListByGenres($genres);
        if ($result) {
            foreach ($result as $item) {
                $output .= '<div class="col-6 col-sm-4 col-lg-2">
                    <div class="album">
                        <div class="album__cover">
                            <img src="public/img/covers/' . $item->Avatar . '" alt="">
                            <a href="' . url('album', 'detail', [$item->Id]) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z">
                                    </path>
                                </svg></a>
                            <span class="album__stat">
                                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M3.71,16.29a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21,1,1,0,0,0-.21.33,1,1,0,0,0,.21,1.09,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1,1,0,0,0,.21-1.09A1,1,0,0,0,3.71,16.29ZM7,8H21a1,1,0,0,0,0-2H7A1,1,0,0,0,7,8ZM3.71,11.29a1,1,0,0,0-1.09-.21,1.15,1.15,0,0,0-.33.21,1,1,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1,1,0,0,0,3.71,11.29ZM21,11H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2ZM3.71,6.29a1,1,0,0,0-.33-.21,1,1,0,0,0-1.09.21,1.15,1.15,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21,1,1,0,0,0,1.09-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1.15,1.15,0,0,0,3.71,6.29ZM21,16H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z">
                                        </path>
                                    </svg> 22</span>
                                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z">
                                        </path>
                                    </svg> 19 503</span>
                            </span>
                        </div>
                        <div class="album__title">
                            <h3><a href="release.html">' . $item->Title . '</a></h3>
                            <span><a href="artist.html">' . $item->Artist . '</a></span>
                        </div>
                    </div>
                </div>';
            }
        }

        echo $output;
    }
    public function countListenAction()
    {
        $id = $_GET['id'];
        // $id = 10;
        $count = $_GET['count'];
        if (isset($id) && $count > 0) {
            $song = $this->model->getSongs2($id);
            $value = $song->Listen + $count;
            $this->model->listenCount($id, $value);
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function detailFEAction()
    {
        $id = $_GET['Id'];
        $this->data['info'] = $this->model->getDetail($id);
        $this->data['songs'] = $this->model->getSong($id, 0);
        $this->data['content'] = 'album/detailFE';
        $this->data['other'] = $this->model->getlistWithId(4, $this->data['info']->UserId);
        $this->data['breadcrumb'] = 'Release';
        // $this->data['title'] = 'detail';
        $this->render('layout/masterlayout', $this->data);
    }
    public function searchAction()
    {
        $searchKey = $_GET['txtSearch'];
        // $this->data['key'] = $searchKey;
        $this->data['content'] = 'album/search';
        $this->data['albumRes'] = $this->model->SearchAlbum($searchKey);
        $this->data['singleRes'] = $this->model->SearchSingle($searchKey);
        $this->model = $this->model('user');
        $this->data['userRes'] = $this->model->searchUser($searchKey);
        $this->data['breadcrumb'] = 'Search';
        $this->render('layout/masterlayout', $this->data);
    }
    public function UploadAction()
    {
        if (!islogin()) {
            chuyentrang(url('user', 'signin'));
        }
        if (post('btnSubmit')) {
            if (post('txtAlbum') && post('txtArtist') && post('txtAlbumAbout') && post('slGenres')) {
                $this->model->CreateAlbum();
                $id = $this->model->lastinsert();
                if (isset($_FILES['avatar']) && !empty($_FILES["avatar"]['name'])) {
                    $target_dir = "public/img/covers";
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
                    if ($_FILES["avatar"]["size"] > 5000000) {
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
                        // echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        $avatar = 'covers' . $id . '.' . $imageFileType;

                        if (file_exists($target_file)) {
                            if ($avatar != 'defaul.jpg') {
                                unlink($target_dir . '/' . $avatar);
                                //xóa theo tên file+extension;
                                //? xử lý xóa theo tên file không cần theo đuôi extension 
                            }
                        }
                        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_dir . '/' . $avatar)) {
                            $this->model->updateavatar($avatar, $id);
                        } else {
                            $msg['msg'] = 'LỖI';
                            $msg['type'] = 'error';
                            chuyentrang(url('album', 'list', $msg));
                        }
                    }
                } else {
                    $avatar = 'default.jpg';
                    $this->model->updateavatar($avatar, $id);
                }
                if (isset($_FILES['inpAudio']) && $id) {
                    mkdir("public/audio/$id");
                    $total = count($_FILES['inpAudio']['name']);
                    $target_dir = "public/audio/$id";
                    for ($i = 0; $i < $total; $i++) {
                        if (isset($_FILES['inpAudio']['name'][$i]) && $_FILES['inpAudio']['name'][$i] != '') {
                            // File name
                            $name = isset($_POST['txtSTitle'][$i]) ?  $_POST['txtSTitle'][$i] : '';
                            $artist = isset($_POST['txtSArtist'][$i]) ?  $_POST['txtSArtist'][$i] : '';
                            $target_file = $target_dir . basename($_FILES["inpAudio"]["name"][$i]);
                            $uploadOk = 1;
                            $AudioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            // Check if file already exists

                            // Check file size
                            if ($_FILES["inpAudio"]["size"][$i] > 7000000) {
                                // echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }

                            // Allow certain file formats
                            if ($AudioFileType != "mp3") {
                                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }

                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                // echo "Sorry, your file was not uploaded.";
                                // if everything is ok, try to upload file
                            } else {
                                $this->model->AddSong($name, $artist, $id);
                                $SId = $this->model->lastinsert();

                                $audio = 'Audio' . $SId . '.' . $AudioFileType; // đang nghiệm
                                if (file_exists($audio)) {
                                    unlink($target_dir . '/' . $audio);
                                    //xóa theo tên file+extension;
                                    //? xử lý xóa theo tên file không cần theo đuôi extension 
                                }
                                if (move_uploaded_file($_FILES["inpAudio"]["tmp_name"][$i], $target_dir . '/' . $audio)) {
                                    $this->model->AddSongS2($audio, $SId);
                                    $msg['msg'] = 'UP album thành công';
                                    $msg['type'] = 'succesful';
                                } else {
                                    $msg['msg'] = 'LỖI';
                                    $msg['type'] = 'error';
                                }
                            }
                        }
                    }
                }
            }
            return chuyentrang(url('album', 'list', $msg));
        }
        // var_dump($_POST);
        $this->data['content'] = 'album/detail';
        $this->data['breadcrumb'] = 'Upload';
        $this->model = $this->model('genres');
        $this->data['genresList'] = $this->model->GetList();
        $this->data['title'] = 'Upload';
        $this->render('layout/masterlayout', $this->data);
        // $view = 'view/user/login.php';
        // $this->render($view, ['class' => 'login', 'msg' => $msg], 'emptylayout');
    }
    public function DeleteAction()
    {
        $id = $_GET['Id'];
        $dir = "public/audio/$id";
        $songs = $this->model->getsong($id, 0);
        $album = $this->model->getDetail($id);
        if ($album->UserId != $_SESSION['Id']) {
            return chuyentrang(url('Home', '_404'));
        }
        $avtdir = "public/img/covers/$album->Avatar";
        if (file_exists($avtdir)) {
            if ($album->Avatar != 'default.jpg') {
                unlink($avtdir);
            }
        }
        unlink($avtdir);
        foreach ($songs as $song) {
            unlink($dir . "/$song->Link");
        }
        rmdir($dir);
        $this->model->deleteA($id);
        $this->model->deleteSA($id);
        $msg['msg'] = 'Xóa album thành công';
        $msg['type'] = 'succesful';

        return chuyentrang(url('album', 'list', $msg));
    }
    public function ListAction()
    {
        $this->data['list'] = $this->model->getlistWithId(); // sửa list with SESSION ID
        $this->data['content'] = 'album/list';
        $this->data['breadcrumb'] = 'album';
        $this->data['title'] = 'album';
        $this->render('layout/masterlayout', $this->data);
    }
    public function editAction()
    {
        if (!islogin()) {
            chuyentrang(url('user', 'signin'));
        }
        $id = $_GET['Id'];
        $this->data['info'] = $this->model->getDetail($id);
        $this->data['songs'] = $this->model->getSong($id, 0);
        if ($this->data['info'] != $_SESSION['Id']) {
            return chuyentrang(url('Home', '_404'));
        }
        if (post('btnEdit')) {
            $target_dirS = "public/audio/$id";

            if (post('txtAlbum') && post('txtArtist') && post('txtAlbumAbout') && post('slGenres')) {
                $this->model->updatealbum($_POST['txtAlbum'], $_POST['txtArtist'], $_POST['txtAlbumAbout'], $_POST['slGenres'], $id);
            }
            if (isset($_FILES['avatar']) && !empty($_FILES["avatar"]['name'])) {
                $target_dir = "public/img/covers";
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
                if ($_FILES["avatar"]["size"] > 5000000) {
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

                    // echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if ($this->data['info']->Avatar != 'default.jpg') {
                        unlink($target_dir . '/' . $this->data['info']->Avatar);
                    }
                    $avatar = 'covers' . $id . '.' . $imageFileType;

                    if (file_exists($target_file)) {
                        if ($avatar != 'default.jpg') {
                            unlink($target_dir . '/' . $avatar);
                            //xóa theo tên file+extension;
                            //? xử lý xóa theo tên file không cần theo đuôi extension 
                        }
                    }
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_dir . '/' . $avatar)) {
                        $this->model->updateavatar($avatar, $id);
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            if (post('txtId')) { // cập nhật tên tuổi
                $listdelete = [];
                $listget = [];
                for ($i = 0; $i < count($_POST['txtId']); $i++) {
                    for ($j = 0; $j < count($this->data['songs']); $j++) {
                        // if ($_POST['txtId'][$i] != $this->data['songs'][$j]->Id) {
                        if (!in_array($this->data['songs'][$j]->Id, $_POST['txtId'])) {
                            if (!in_array($this->data['songs'][$j]->Id, $listdelete)) {
                                $listdelete[] = $this->data['songs'][$j]->Id;
                            }
                        } else {
                            if (!in_array($this->data['songs'][$j]->Id, $listget)) {
                                $listget[] = $this->data['songs'][$j]->Id;
                            }
                        }
                    }
                    if (count($listget) == count($_POST['txtId']) || count($listdelete) == count($_POST['txtId'])) {
                        break;
                    }
                }

                if (count($listdelete) > 0) {

                    for ($z = 0; $z < count($listdelete); $z++) {
                        $audio = "Audio$listdelete[$z].mp3";
                        unlink($target_dirS . '/' . $audio);
                        $this->model->deleteS($listdelete[$z]);
                    }
                }
                if (count($listget) > 0) {
                    for ($i = 0; $i < count($listget); $i++) {
                        $name = $_POST['txtSTitle'][$i];
                        $artist = $_POST['txtSArtist'][$i];
                        $sId = $listget[$i];
                        $this->model->updateSA($name, $artist, $sId);
                    }
                }
            } else {
                $target_dirS = "public/audio/$id";
                for ($i = 0; $i < count($this->data['songs']); $i++) {
                    $file = $target_dirS . '/' . $this->data['songs'][$i]->Link;
                    if (file_exists($file)) {
                        $this->model->deleteS($this->data['songs'][$i]->Id);
                        unlink($file);
                    }
                }
            }
            $start = (count($listget) != 0) ? count($listget) : 0;
            if (isset($_FILES['inpAudio']) && !empty($_FILES["inpAudio"]['name'][0])) {
                $total = count($_FILES['inpAudio']['name']);
                $target_dir = "public/audio/$id";
                for ($i = 0; $i < $total; $i++) {
                    if (isset($_FILES['inpAudio']['name'][$i]) && $_FILES['inpAudio']['name'][$i] != '') {
                        // File name
                        $name = isset($_POST['txtSTitle'][$i + $start]) ?  $_POST['txtSTitle'][$i + $start] : '';
                        $artist = isset($_POST['txtSArtist'][$i + $start]) ?  $_POST['txtSArtist'][$i + $start] : '';
                        $target_file = $target_dir . basename($_FILES["inpAudio"]["name"][$i]);
                        $uploadOk = 1;
                        $AudioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        // Check if file already exists

                        // Check file size
                        if ($_FILES["inpAudio"]["size"][$i] > 7000000) {
                            // echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }

                        // Allow certain file formats
                        if ($AudioFileType != "mp3") {
                            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            // echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                        } else {
                            $this->model->AddSong($name, $artist, $id);
                            $SId = $this->model->lastinsert();

                            $audio = 'Audio' . $SId . '.' . $AudioFileType; // đang nghiệm
                            if (file_exists($audio)) {
                                unlink($target_dir . '/' . $audio);
                                //xóa theo tên file+extension;
                                //? xử lý xóa theo tên file không cần theo đuôi extension 
                            }
                            if (move_uploaded_file($_FILES["inpAudio"]["tmp_name"][$i], $target_dir . '/' . $audio)) {
                                $this->model->AddSongS2($audio, $SId);
                            } else {
                                $msg['msg'] = 'LỖi';
                                $msg['type'] = 'error';

                                return chuyentrang(url('album', 'list', $msg));
                            }
                        }
                    }
                }
            }
            chuyentrang(url('album', 'list'));
        }
        $this->model = $this->model('genres');
        $this->data['genresList'] = $this->model->GetList();
        $this->data['content'] = 'album/detail';
        $this->data['breadcrumb'] = 'Edit';
        $this->data['title'] = 'Edit';
        $this->render('layout/masterlayout', $this->data);
    }
    public function DetailAction()
    {

        $id = $_GET['Id'];
        $this->data['info'] = $this->model->getDetail($id);
        if ($this->data['info'] != $_SESSION['Id']) {
            return chuyentrang(url('Home', '_404'));
        }

        $this->data['songs'] = $this->model->getSong($id, 0);
        $this->data['content'] = 'album/detail';
        $this->model = $this->model('genres');
        $this->data['genresList'] = $this->model->GetList();
        $this->data['breadcrumb'] = 'detail';
        $this->data['title'] = 'detail';
        $this->render('layout/masterlayout', $this->data);
    }
    public function SingleUpAction()
    {
        if (!islogin()) {
            chuyentrang(url('user', 'signin'));
        }
        if (isset($_FILES['btnSong']) && !empty($_FILES['btnSong']['name'])) {
            if (post('txtNameS') && post('txtArtistS')) {
                $singleAlbum = 0;
                $this->model->AddSong($_POST['txtNameS'], $_POST['txtArtistS'], $singleAlbum);
                $id = $this->model->lastinsert();
                $default = 'default.jpg';
                if (isset($_FILES['avatar']) && !empty($_FILES["avatar"]['name'])) {
                    $target_dir = "public/img/covers";
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
                    if ($_FILES["avatar"]["size"] > 5000000) {
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
                        // echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        $avatar = 'songs' . $id . '.' . $imageFileType;
                        if (file_exists($target_file)) {

                            unlink($target_dir . '/' . $avatar);
                            //xóa theo tên file+extension;
                            //? xử lý xóa theo tên file không cần theo đuôi extension 
                        }
                        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_dir . '/' . $avatar)) {
                            $this->model->updateavatar($avatar, $id);
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                    }
                } else {
                    $avatar = $default;
                    $this->model->updateavatar($avatar, $id);
                }
                if (isset($_FILES['btnSong']['name']) && $_FILES['btnSong']['name'] != '') {
                    // File name
                    $target_dir = "public/audio/single";
                    // $name = isset($_POST['txtNameS']) ?  $_POST['txtNameS'] : '';
                    // $artist = isset($_POST['txtArtistS']) ?  $_POST['txtArtistS'] : '';
                    $target_file = $target_dir . basename($_FILES["btnSong"]["name"]);
                    $uploadOk = 1;
                    $AudioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if file already exists

                    // Check file size
                    if ($_FILES["btnSong"]["size"] > 7000000) {
                        // echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if ($AudioFileType != "mp3") {
                        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        // echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {

                        $single = 'Audio' . $id . '.' . $AudioFileType; // đang nghiệm
                        if (file_exists($single)) {
                            unlink($target_dir . '/' . $single);
                            //xóa theo tên file+extension;
                            //? xử lý xóa theo tên file không cần theo đuôi extension 
                        }
                        if (move_uploaded_file($_FILES["btnSong"]["tmp_name"], $target_dir . '/' . $single)) {
                            $this->model->AddSongS3($single, $avatar, $id);
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
            }
            return chuyentrang(url('album', 'slist'));
        }

        $this->data['content'] = 'album/singleup';
        $this->data['breadcrumb'] = 'Upload';
        $this->data['title'] = 'Upload';
        $this->render('layout/masterlayout', $this->data);
    }
    public function SDeleteAction()
    {
        if (!islogin()) {
            chuyentrang(url('user', 'signin'));
        }
        $id = $_GET['Id'];
        $song = $this->model->getSongs2($id);
        if ($song->UserId != $_SESSION['Id']) {
            return chuyentrang(url('Home', '_404'));
        }
        $dir = "public/audio/single/$song->Link";
        $avtdir = "public/img/covers/$song->avatar";
        //if bắt lỗi ko có file;
        if ($song->avatar != "default.jpg") {
            unlink($avtdir);
        }
        unlink($dir);
        $this->model->deleteS($id);
        $msg['msg'] = 'Xóa bài hát thành công';
        $msg['type'] = 'succesful';

        return chuyentrang(url('album', 'slist', $msg));
    }
    public function SEditAction()
    {
        $id = $_GET['Id'];
        $this->data['song'] = $this->model->getSongs2($id);
        if ($this->data['song']->UserId != $_SESSION['Id']) {
            return chuyentrang(url('Home', '_404'));
        }
        if (post('txtNameS') && post('txtArtistS')) {
            $this->model->updateSA($_POST['txtNameS'], $_POST['txtArtistS'], $id);
            if (isset($_FILES['avatar']) && !empty($_FILES["avatar"]['name'])) {
                $target_dir = "public/img/covers";
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
                if ($_FILES["avatar"]["size"] > 5000000) {
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

                    // echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    unlink($target_dir . '/' . $this->data['song']->avatar);

                    $avatar = 'songs' . $id . '.' . $imageFileType;
                    if (file_exists($target_file)) {
                        unlink($target_dir . '/' . $avatar);
                        //xóa theo tên file+extension;
                        //? xử lý xóa theo tên file không cần theo đuôi extension 
                    }
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_dir . '/' . $avatar)) {
                        $this->model->updateSavatar($avatar, $id);
                    } else {
                        $msg['msg'] = 'LỖi';
                        $msg['type'] = 'error';
                        return chuyentrang(url('album', 'list', $msg));
                        // echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            $msg['msg'] = 'cập nhật thành công';
            $msg['type'] = 'succesful';
            return chuyentrang(url('album', 'slist', $msg));
        }

        $this->data['content'] = 'album/singleup';
        $this->data['breadcrumb'] = 'Edit';
        $this->data['title'] = 'Edit';
        $this->render('layout/masterlayout', $this->data);
    }
    public function SListAction()
    {
        $this->data['list'] = $this->model->sList();
        $this->data['content'] = 'album/songlist';
        $this->data['breadcrumb'] = 'Single';
        $this->data['title'] = 'Single';
        $this->render('layout/masterlayout', $this->data);
    }
}