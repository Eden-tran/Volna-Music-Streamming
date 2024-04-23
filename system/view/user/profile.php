<div class="row row--grid">
    <div class="col-12">
        <div class="profile">
            <div class="profile__user">
                <div class="profile__avatar">
                    <img src="public/img/avatar.svg" alt="">
                </div>
                <div class="profile__meta">
                    <h3><?= $info->FirstName . ' ' . $info->LastName ?></h3>
                    <span>Volna ID: <?= $info->Id ?></span>
                </div>
            </div>

            <!-- tabs nav -->
            <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
                        aria-selected="true">Profile</a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                        aria-selected="false">Orders</a>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                        aria-selected="false">Upload</a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4"
                        aria-selected="false">Settings</a>
                </li>
            </ul>
            <!-- end tabs nav -->
            <a href=<?= url('user', 'logout') ?>>
                <button class="profile__logout" type="button">
                    <span>Sign out</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
                    </svg>
                </button>
            </a>
        </div>

        <!-- content tabs -->
        <?= error() ?>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                <div class="row row--grid">
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="stats">
                            <span>My balance <a href="#modal-topup" class="open-modal">top up</a></span>
                            <p><b>$90.99</b></p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M6,11a1,1,0,1,0,1,1A1,1,0,0,0,6,11Zm12,0a1,1,0,1,0,1,1A1,1,0,0,0,18,11Zm2-6H4A3,3,0,0,0,1,8v8a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V8A3,3,0,0,0,20,5Zm1,11a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V8A1,1,0,0,1,4,7H20a1,1,0,0,1,1,1ZM12,9a3,3,0,1,0,3,3A3,3,0,0,0,12,9Zm0,4a1,1,0,1,1,1-1A1,1,0,0,1,12,13Z" />
                            </svg>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="stats">
                            <span>Premium plan</span>
                            <p><b>$39.99</b>/month</p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z" />
                            </svg>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="stats">
                            <span>Minutes listened</span>
                            <p><b>407 021</b></p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z" />
                            </svg>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="stats">
                            <span>Promo code</span>

                            <form action="#" class="stats__form">
                                <input type="text" placeholder="__-__-__-__">
                                <button type="button">send</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row row--grid">
                    <!-- dashbox -->
                    <div class="col-12 col-lg-6">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z" />
                                    </svg> Your Album</h3>

                                <div class="dashbox__wrap">
                                    <a class="dashbox__refresh" href="<?= url('album', 'upload') ?>"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                        </svg></a>
                                    <a class="dashbox__more" href="<?= url('album', 'list') ?>">View All</a>
                                </div>
                            </div>

                            <div class="dashbox__list-wrap">
                                <ul class="main__list main__list--dashbox">

                                    <?
                                    if (!empty($album)) {
                                        # code...

                                        foreach ($album as $item) { ?>

                                    <li class="single-item">
                                        <div class="single-item__cover">
                                            <img src="public/img/covers/<?= $item->Avatar ?>" alt="">

                                        </div>
                                        <div class="single-item__title">
                                            <h4><a
                                                    href="<?= url('album', 'detail', ['Id' => $item->Id]) ?>"><?= $item->Title ?></a>
                                            </h4>
                                            <span>
                                                <a href="<?= url('artist', 'detail', ['id' => $item->UserId]) ?>">
                                                    <?= $item->Artist ?></a>
                                            </span>
                                        </div>
                                        <a href="#" class="single-item__add">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                            </svg>
                                        </a>
                                        <a href="#" class="single-item__export">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z" />
                                            </svg>
                                        </a>
                                        <span class="single-item__time">2:58</span>
                                    </li>
                                    <? }
                                    } ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end dashbox -->

                    <!-- dashbox -->
                    <div class="col-12 col-lg-6">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z" />
                                    </svg> Your Single</h3>

                                <div class="dashbox__wrap">
                                    <a class="dashbox__refresh" href="<?= url('album', 'singleup') ?>"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                        </svg></a>
                                    <a class="dashbox__more" href="<?= url('album', 'slist') ?>">View All</a>
                                </div>
                            </div>

                            <div class="dashbox__list-wrap">
                                <ul class="main__list main__list--dashbox">
                                    <?
                                    if (!empty($single)) {
                                        foreach ($single as $item) { ?>
                                    <li class="single-item">
                                        <a data-link data-title="<?= $item->Name ?>" data-artist="<?= $item->artist ?>"
                                            data-img="public/img/covers/<?= $item->avatar ?>"
                                            href="public/audio/single/<?= $item->Link ?>" class="single-item__cover">
                                            <img src="public/img/covers/<?= $item->avatar ?>" alt="">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z" />
                                            </svg>
                                        </a>
                                        <div class="single-item__title">
                                            <h4><a href="#"><?= $item->Name ?></a></h4>
                                            <span><a href="artist.html"><?= $item->artist ?></a></span>
                                        </div>
                                        <a href="#" class="single-item__add">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                            </svg>
                                        </a>
                                        <a href="#" class="single-item__export">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z" />
                                            </svg>
                                        </a>
                                        <span class="single-item__time">2:58</span>
                                    </li>
                                    <? }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end dashbox -->
                </div>
            </div>

            <div class="tab-pane fade" id="tab-4" role="tabpanel">
                <div class="row row--grid">
                    <!-- details form -->
                    <div class="col-12 col-lg-6">
                        <form action="<?= url('user', 'UProfile') ?>" enctype="multipart/form-data" method='POST'
                            class="sign__form sign__form--profile">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="sign__title">Profile details</h4>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label" for="email">Email</label>
                                        <input id="email" type="text" name="email" disabled class="sign__input"
                                            placeholder="<?= $info->Email ?>" value="<?= $info->Email ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label" for="email">Art Name</label>
                                        <input id="email" type="text" name="ArtName" class="sign__input"
                                            placeholder="<?= $info->ArtName ?>" value='<?= $info->ArtName ?>'>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label" for="firstname">First name</label>
                                        <input id="firstname" type="text" value='<?= $info->FirstName ?>'
                                            placeholder="<?= $info->FirstName ?>" name="FirstName" class="sign__input">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label" for="lastname">Last name</label>
                                        <input id="lastname" type="text" name="LastName" class="sign__input"
                                            placeholder="<?= $info->LastName ?>" value='<?= $info->LastName ?>'>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                    <div class="sign__group">

                                        <label class="sign__label" for="Avatar">Avatar</label>
                                    </div>
                                    <div class="sign__group">
                                        <div class="artist__cover">
                                            <img src="public/img/artists/<?= $info->avatar ?>" id='avtimg' alt=""
                                                style='width: 200px;height: 200px;border-radius:20px;'>
                                        </div>
                                    </div>

                                    <div class="sign__group" style='justify-content: center;'>
                                        <label class="sign__btn" for="avatar" style="cursor: pointer;">Choose a
                                            photo</label>
                                        <input id="avatar" onchange="loadfile(event)" accept="image/*" type="file"
                                            name="avatar" class="sign__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="sign__btn" type='submit' value=1 name='btnEditInfo'>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end details form -->

                    <!-- password form -->
                    <div class="col-12 col-lg-6">
                        <form action="<?= url('user', 'upPw') ?>" method="POST" class="sign__form sign__form--profile">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="sign__title">Change password</h4>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="sign__group">
                                        <label class="sign__label" for="oldpass">Old password</label>
                                        <input id="oldpass" type="password" name="oldpass" class="sign__input">
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="sign__group">
                                        <label class="sign__label" for="newpass">New password</label>
                                        <input id="newpass" type="password" name="newpass" class="sign__input">
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="sign__group">
                                        <label class="sign__label" for="confirmpass">Confirm new password</label>
                                        <input id="confirmpass" type="password" name="confirmpass" class="sign__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="sign__btn" name='btnChangePw' type="submit">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end password form -->
                    <div class="col-12 ">
                        <form action="<?= url('user', 'upDescription') ?>" method="POST"
                            class="sign__form sign__form--profile">
                            <div class="sign__group" style="display:block">
                                <textarea name="txtAbout" class="sign__textarea " placeholder="Type your message">
                                    <?= $info->Description ?>
                                </textarea>
                            </div>
                            <div class="col-12">
                                <button class="sign__btn" name='btnChangeDes' type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class=" tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="row row--grid">
                                            <div class="col-12">
                                                <div class="dashbox">
                                                    <div class="dashbox__table-wrap">
                                                        <div class="dashbox__table-scroll">
                                                            <table class="main__table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>№</th>
                                                                        <th><a href="#">Product <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M9.71,10.21,12,7.91l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Zm4.58,4.58L12,17.09l-2.29-2.3a1,1,0,0,0-1.42,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42Z" />
                                                                                </svg></a></th>
                                                                        <th><a href="#" class="active">Title <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M17,13.41,12.71,9.17a1,1,0,0,0-1.42,0L7.05,13.41a1,1,0,0,0,0,1.42,1,1,0,0,0,1.41,0L12,11.29l3.54,3.54a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29A1,1,0,0,0,17,13.41Z" />
                                                                                </svg></a></th>
                                                                        <th><a href="#" class="active">Date <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" />
                                                                                </svg></a></th>
                                                                        <th><a href="#">Quantity <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M9.71,10.21,12,7.91l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Zm4.58,4.58L12,17.09l-2.29-2.3a1,1,0,0,0-1.42,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42Z" />
                                                                                </svg></a></th>
                                                                        <th><a href="#">Total <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M9.71,10.21,12,7.91l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Zm4.58,4.58L12,17.09l-2.29-2.3a1,1,0,0,0-1.42,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42Z" />
                                                                                </svg></a></th>
                                                                        <th><a href="#">Status <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M9.71,10.21,12,7.91l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Zm4.58,4.58L12,17.09l-2.29-2.3a1,1,0,0,0-1.42,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42Z" />
                                                                                </svg></a></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                class="main__table-text main__table-text--number">
                                                                                <a href="#modal-info"
                                                                                    class="open-modal">631</a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-img">
                                                                                <img src="public/img/store/item3.jpg"
                                                                                    alt="">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-text"><a
                                                                                    href="#">Music Blank</a></div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-text">Aug 21, 2021
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-text">17</div>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="main__table-text main__table-text--price">
                                                                                $67.83</div>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="main__table-text main__table-text--green">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" />
                                                                                </svg> Delivered
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                class="main__table-text main__table-text--number">
                                                                                <a href="#modal-info"
                                                                                    class="open-modal">632</a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-img">
                                                                                <img src="public/img/store/item3.jpg"
                                                                                    alt="">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-text"><a
                                                                                    href="#">Music Blank</a></div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-text">Aug 21, 2021
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-text">17</div>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="main__table-text main__table-text--price">
                                                                                $67.83</div>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="main__table-text main__table-text--red">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z" />
                                                                                </svg> Canceled
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                class="main__table-text main__table-text--number">
                                                                                <a href="#modal-info"
                                                                                    class="open-modal">708</a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-img">
                                                                                <img src="public/img/store/item4.jpg"
                                                                                    alt="">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="main__table-text"><a
                                                                                    href="#">Headphones ZR-991</a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <d iv class="main__table-text">Aug 14, 2021
                                                        </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text">1</div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--price">$199
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--grey"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20ZM14.09814,9.63379,13,10.26807V7a1,1,0,0,0-2,0v5a1.00025,1.00025,0,0,0,1.5.86621l2.59814-1.5a1.00016,1.00016,0,1,0-1-1.73242Z" />
                                                                </svg> On the way</div>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="main__table-text main__table-text--number">
                                                                    <a href="#modal-info" class="open-modal">750</a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-img">
                                                                    <img src="public/img/store/item1.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text"><a href="#">Vinyl
                                                                        Player</a></div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text">Aug 5, 2021</div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text">1</div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    $11 899</div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text main__table-text--green">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24">
                                                                        <path
                                                                            d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" />
                                                                    </svg> Delivered
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
        </div>


    </div>


    <!-- <div class="tab-pane fade" id="tab-3" role="tabpanel">
            <div class="row row--grid"> -->
    <!-- upload album info form -->
    <!-- <div class="col-12 col-lg-4">
                    <form action="" enctype="multipart/form-data" method="POST" class="sign__form sign__form--profile">
                        <div class="row">
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
                                    <div class="artist__cover">
                                        <img src="" id="avtimg" alt=""
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
                            <div class="col-12">
                                <button class="sign__btn" type="submit" value="1" name="btnEditInfo">Save</button>
                            </div>
                        </div>
                    </form>
                </div> -->
    <!-- end upload album  form -->


    <!-- list release on album  -->
    <!-- <div class="col-12 col-lg-8">
                    <form action="#" class="sign__form sign__form--profile">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="sign__title">Change password</h4>
                            </div>

                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                <div class="sign__group">
                                    <label class="sign__label" for="oldpass">Old password</label>
                                    <input id="oldpass" type="password" name="oldpass" class="sign__input">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                <div class="sign__group">
                                    <label class="sign__label" for="newpass">New password</label>
                                    <input id="newpass" type="password" name="newpass" class="sign__input">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                <div class="sign__group">
                                    <label class="sign__label" for="confirmpass">Confirm new password</label>
                                    <input id="confirmpass" type="password" name="confirmpass" class="sign__input">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                <div class="sign__group">
                                    <label class="sign__label" for="select">Select</label>
                                    <select name="select" id="select" class="sign__select">
                                        <option value="0">Option</option>
                                        <option value="1">Option 2</option>
                                        <option value="2">Option 3</option>
                                        <option value="3">Option 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="sign__btn" type="button">Change</button>
                            </div>
                        </div>
                    </form>
                </div> -->
    <!-- list release on album  -->
    <!-- </div>
        </div> -->


</div>
<!-- end content tabs -->
</div>
</div>