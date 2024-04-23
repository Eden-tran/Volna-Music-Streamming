<div class="sign">
    <div class="sign__content">
        <!-- authorization form -->
        <form action="" method="POST" class="sign__form" enctype="multipart/form-data">
            <?
            if ($_GET['a'] == 'singleup') { ?>
            <div class="sign__group" style="justify-content: center;">
                <label class="sign__btn" for="btnSong" style="cursor: pointer;">Choose a single</label>
                <input id="btnSong" onchange="song_show()" accept="audio/*" type="file" name="btnSong"
                    class="sign__input">
            </div>
            <? } ?>

            <div class="sign__group">
                <label class="sign__label" for="txtAlbum">Title</label>
                <input id="txtNameS" type="text" name="txtNameS" class="sign__input"
                    value="<?= isset($song->Name) ? $song->Name : "" ?>">
            </div>
            <div class="sign__group">
                <label class="sign__label" for="txtAlbum">Artist</label>
                <input id="txtArtistS" type="text" name="txtArtistS" class="sign__input"
                    value="<?= isset($song->artist) ? $song->artist : "" ?>">

            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="sign__group">

                    <label class="sign__label" for="Avatar">Avatar</label>
                </div>
                <div class="sign__group">
                    <div class="artist__cover" ;="">
                        <img src="public/img/covers/<?= !empty($song->avatar) ? $song->avatar : "default.jpg" ?>"
                            id="avtimg" alt="" style="width: 200px;height: 200px;border-radius:20px;">
                    </div>
                </div>

                <div class="sign__group" style="justify-content: center;">
                    <label class="sign__btn" for="avatar" style="cursor: pointer;">Choose a
                        photo</label>
                    <input id="avatar" onchange="loadfile(event)" accept="image/*" type="file" name="avatar"
                        class="sign__input">
                </div>

            </div>

            <button class="sign__btn" type="submit">Save</button>



        </form>
        <!-- end authorization form -->
    </div>
</div>