        <!-- upload album info form -->
        <form action="" method="POST" id="myform" enctype="multipart/form-data">
            <div class=" col-12 col-lg-12" style="display: flex;">
                <div class=" col-12 col-lg-4">
                    <div class="sign__form sign__form--profile" style="height: 96%;">
                        <div class=" row">
                            <div class="col-12">
                                <h4 class="sign__title">Upload</h4>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="txtAlbum">Title</label>
                                    <? if ($_GET['a'] == 'detail') { ?>
                                    <span class="sign__input"
                                        style="border-radius: unset;background-color: unset;padding-top: 25px;font-size: 20px;">
                                        <?= $info->Title ? $info->Title : " " ?>
                                    </span>
                                    <? } else {
                                        if ($_GET['a'] == 'upload') { ?>
                                    <input id="txtAlbum" type="text" name="txtAlbum" class="sign__input" value="">
                                    <? } else { ?>
                                    <input id="txtAlbum" type="text" name="txtAlbum" class="sign__input"
                                        value="<?= $info->Title ? $info->Title : " " ?>">
                                    <? }
                                    } ?>
                                </div>
                            </div>

                            <? if ($_GET['a'] != 'detail') { ?>
                            <div class=" col-12 col-lg-12">
                                <div class="sign__group" style="display:block">
                                    <label class="sign__label" for="select">Genres</label>
                                    <select class="sign__select" name="slGenres" id="slGenres">
                                        <option value="" selected disabled> Choose your genres</option>
                                        <?
                                            foreach ($genresList as $item) { ?>
                                        <option value="<?= $item->Id ?>" <? if ($info->GenresId == $item->Id) {
                                            echo 'selected';
                                            } ?>> <?= $item->Name ?>
                                        </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <? } else { ?>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="sign__group">
                                    <label class="sign__label">Genres</label>
                                    <span class="sign__input"
                                        style="border-radius: unset;background-color: unset;padding-top: 25px;font-size: 20px;">
                                        <?
                                            foreach ($genresList as $item) {
                                                if ($info->GenresId == $item->Id) {
                                                    echo $item->Name;
                                                }
                                            } ?>
                                    </span>
                                </div>
                            </div>
                            <? }; ?>

                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="txtArtist">Artist</label>
                                    <? if ($_GET['a'] == 'detail') { ?>
                                    <span class="sign__input"
                                        style="border-radius: unset;background-color: unset;padding-top: 25px;font-size: 20px;">
                                        <?= $info->Artist ? $info->Artist : " " ?>
                                    </span>
                                    <? } else {
                                        if ($_GET['a'] == 'upload') { ?>
                                    <input id="txtArtist" type="text" name="txtArtist" class="sign__input" value="">
                                    <? } else { ?>
                                    <input id="txtArtist" type="text" name="txtArtist" class="sign__input"
                                        value="<?= $info->Artist ? $info->Artist : " " ?>">
                                    <? }
                                    } ?>

                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="sign__group">

                                    <label class="sign__label" for="Avatar">Avatar</label>
                                </div>
                                <? if ($_GET['a'] == 'detail' || $_GET['a'] == 'edit') { ?>

                                <div class="sign__group">
                                    <div class="artist__cover" ;>
                                        <img src="public/img/covers/<?= $info->Avatar ? $info->Avatar : " " ?>"
                                            id="avtimg" alt="" style="width: 200px;height: 200px;border-radius:20px;">
                                    </div>
                                </div>
                                <? } else {
                                    if ($_GET['a'] == 'upload') { ?>
                                <div class="sign__group">
                                    <div class="artist__cover" ;>
                                        <img src="public/img/covers/default.jpg" id="avtimg" alt=""
                                            style="width: 200px;height: 200px;border-radius:20px;">
                                    </div>
                                </div>
                                <? }
                                } ?>

                                <?
                                if ($_GET['a'] != 'detail') { ?>
                                <div class="sign__group" style="justify-content: center;">
                                    <label class="sign__btn" for="avatar" style="cursor: pointer;">Choose a
                                        photo</label>
                                    <input id="avatar" onchange="loadfile(event)" accept="image/*" type="file"
                                        name="avatar" class="sign__input">
                                </div>
                                <? }
                                ?>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end upload album  form -->


                <!-- list release on album  -->
                <div class="col-12 col-lg-8">
                    <!-- cart -->
                    <div class="cart" style="height: 96%;">
                        <div class="cart__table-wrap ">
                            <div class="cart__table-scroll" style="height: 540px;" data-scrollbar="true" tabindex="-1"
                                style="overflow: hidden; outline: none;">
                                <div class="scroll-content" style="transform: translate3d(0px, 0px, 0px);">
                                    <table class="cart__table" style="min-width: 500px;" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Artist</th>
                                            </tr>
                                        </thead>

                                        <tbody id='audioplace'>

                                            <? if ($_GET['a'] != 'upload') { ?>
                                            <? foreach ($songs as $song) {
                                                    if ($song->status == 1) { ?>
                                            <tr>
                                                <td><span style="padding-left: 6px;"
                                                        class="cart__price"><?= $song->Id ?>
                                                    </span>
                                                </td>
                                                <? if ($_GET['a'] != 'detail') { ?>
                                                <td>
                                                    <div class="sign__group">
                                                        <input id="txtSTitle" style="width:auto" type="text"
                                                            name="txtSTitle[]" value="<?= $song->Name ?>"
                                                            class="sign__input">
                                                        <input id="txtId" type="text" style="display:none"
                                                            name="txtId[]" value="<?= $song->Id ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="sign__group">
                                                        <input id="txtSArtist" style="width:auto" type="text"
                                                            name="txtSArtist[]" value="<?= $song->artist ?>"
                                                            class="sign__input">
                                                    </div>
                                                </td>
                                                <? } else { ?>
                                                <td>
                                                    <div class="sign__group">
                                                        <a data-link="" data-title="<?= trim($song->Name) ?>"
                                                            data-artist="<?= $song->artist ?>"
                                                            data-img="public/img/covers/cover.svg"
                                                            href="public/audio/<?= $song->AlbumId . '/' . $song->Link ?>"
                                                            class="single-item__cover">
                                                            <img src="public/img/covers/cover.svg" alt="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z">
                                                                </path>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <div class="main__table-text" style="font-size: 17px;">
                                                            <?= trim($song->Name) ?></div>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="sign__group">
                                                        <div class="main__table-text" style="font-size: 17px;">
                                                            <?= trim($song->artist) ?></div>
                                                </td>
                                                <? } ?>
                                                <td <? if ($_GET['a']=='detail' ) { echo 'style="display:none"' ; } ?>>

                                                    <button class="btnEditDel cart__delete" type="button"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path
                                                                d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                                            </path>
                                                        </svg></button>
                                                </td>
                                            </tr>
                                            <? }
                                                } ?>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="scrollbar-track scrollbar-track-x show" style="display: block;">
                                    <div class="scrollbar-thumb scrollbar-thumb-x"
                                        style="width: 530.16px; transform: translate3d(0px, 0px, 0px);"></div>
                                </div>
                                <div class="scrollbar-track scrollbar-track-y show" style="display: none;">
                                    <div class="scrollbar-thumb scrollbar-thumb-y"
                                        style="height: 389px; transform: translate3d(0px, 0px, 0px);"></div>
                                </div> -->
                            </div>
                        </div>
                        <? if ($_GET['a'] != 'detail') { ?>
                        <div class="cart__info">
                            <!-- promo -->
                            <div class="cart__promo " style="width: 100%;">
                                <label class="sign__btn" for="inpAudio" style="cursor: pointer;width: 100%;">Add more
                                </label>
                                <input id="inpAudio" accept="audio/*" onchange="audio_select()" type="file" multiple
                                    name="inpAudio[]" class="sign__input">
                                <!-- <button type="files" style="width: 100%;" class=" sign__btn">ADD MORE</button> -->

                            </div>
                            <!-- end promo -->
                        </div>
                        <? } ?>
                    </div>
                    <!-- end cart -->
                </div>
            </div>
            <? if ($_GET['a'] != 'detail') { ?>
            <div class=" col-12 col-lg-12">
                <div class=" col-12 col-lg-12">
                    <div class="sign__form sign__form--profile">
                        <div class="sign__group" style="display:block">
                            <textarea name="txtAlbumAbout" class="sign__textarea " placeholder="Type your message">
                                <?= $info->About ? $info->About : " " ?>
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <? }; ?>

            <? if ($_GET['a'] == 'detail') { ?>
            <div class=" col-12 col-lg-12">
                <div class=" col-12 col-lg-12">
                    <div class="sign__form sign__form--profile">
                        <div class="sign__group albumAbout" style="display:block">
                            <?= $info->About ? $info->About : " " ?>
                        </div>
                    </div>
                </div>
            </div>
            <? }; ?>
            <? if ($_GET['a'] != 'detail') { ?>
            <div class=" col-12 col-lg-12">
                <div class=" col-12 col-lg-12">
                    <div class="sign__form sign__form--profile" style="align-items: end;padding: 3px 5px;">
                        <div class="row">
                            <div class="col-6">
                                <button class="sign__btn" style='background-color:#c52d2d' type="button">Cancel</button>

                            </div>
                            <div class="col-6">
                                <button class="sign__btn" id='<?= $_GET['a'] == 'upload' ? 'btnSubmit' : 'btnEdit' ?>'
                                    name='<?= $_GET['a'] == 'upload' ? 'btnSubmit' : 'btnEdit' ?>' value='1'
                                    type="submit"><?= $_GET['a'] == 'upload' ? 'create' : 'change' ?></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>




        </form>


        <!-- list release on album  -->