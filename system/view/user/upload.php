        <!-- upload album info form -->
        <form action="" method="POST" id="myform" enctype="multipart/form-data">
            <div class=" col-12 col-lg-12" style="display: flex;">
                <div class=" col-12 col-lg-4">
                    <div class="sign__form sign__form--profile" style="
    height: 96%;">
                        <div class=" row">
                            <div class="col-12">
                                <h4 class="sign__title">Upload</h4>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="txtAlbum">Title</label>
                                    <input id="txtAlbum" type="text" name="txtAlbum" class="sign__input">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="txtArtist">Artist</label>
                                    <input id="txtArtist" type="text" name="txtArtist" class="sign__input" value="">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="sign__group">

                                    <label class="sign__label" for="Avatar">Avatar</label>
                                </div>
                                <div class="sign__group">
                                    <div class="artist__cover" ;>
                                        <img src="public/img/covers/default.jpg" id="avtimg" alt=""
                                            style="width: 200px;height: 200px;border-radius:20px;">
                                    </div>
                                </div>

                                <div class="sign__group" style="justify-content: center;">
                                    <label class="sign__btn" for="avatar" style="cursor: pointer;">Choose a
                                        photo</label>
                                    <input id="avatar" onchange="loadfile(event)" accept="image/*" type="file"
                                        name="avatar" class="sign__input">
                                </div>
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
                                    <table class="cart__table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Artist</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody id='audioplace'>





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


                    </div>
                    <!-- end cart -->
                </div>
            </div>
            <div class=" col-12 col-lg-12">
                <div class=" col-12 col-lg-12">
                    <div class="sign__form sign__form--profile" style="align-items: end;padding: 3px 5px;">
                        <div class="row">

                            <div class="col-6">
                                <button class="sign__btn" style='background-color:#c52d2d' type="button">Cancel</button>

                            </div>
                            <div class="col-6">
                                <button class="sign__btn" id='btnSubmit' name='btnSubmit' value='1'
                                    type="submit">Change</button>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </form>


        <!-- list release on album  -->