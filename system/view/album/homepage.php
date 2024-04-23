<div class="row row--grid">
    <div class="col-12" data-select2-id="10">
        <div class="main__filter">
            <form action="#" class="main__filter-search">
                <input type="text" placeholder="Search...">
                <button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
                    </svg></button>
            </form>

            <div class="main__filter-wrap">


                <select class="main__select" id='slGenres' name="slGenres">
                    <option value="0">All genres</option>
                    <?
                    foreach ($genresList as $genres) {  ?>
                    <option value=<?= $genres->Id ?>><?= $genres->Name ?></option>

                    <? } ?>
                </select>

            </div>

            <div class="slider-radio">
                <input type="radio" name="grade" id="featured" checked="checked"><label for="featured">Featured</label>
                <input type="radio" name="grade" id="popular"><label for="popular">Popular</label>
                <input type="radio" name="grade" id="newest"><label for="newest">Newest</label>
            </div>
        </div>

        <div class="row row--grid" id='releasePlace'>
            <? foreach ($list as $item) { ?>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="album">
                    <div class="album__cover">
                        <img src="public/img/covers/<?= $item->Avatar ?>" alt="">
                        <a href="<?= url('album', 'detailFE', ['Id' => $item->Id]) ?>"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z">
                                </path>
                            </svg></a>
                        <span class="album__stat">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M3.71,16.29a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21,1,1,0,0,0-.21.33,1,1,0,0,0,.21,1.09,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1,1,0,0,0,.21-1.09A1,1,0,0,0,3.71,16.29ZM7,8H21a1,1,0,0,0,0-2H7A1,1,0,0,0,7,8ZM3.71,11.29a1,1,0,0,0-1.09-.21,1.15,1.15,0,0,0-.33.21,1,1,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1,1,0,0,0,3.71,11.29ZM21,11H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2ZM3.71,6.29a1,1,0,0,0-.33-.21,1,1,0,0,0-1.09.21,1.15,1.15,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21,1,1,0,0,0,1.09-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1.15,1.15,0,0,0,3.71,6.29ZM21,16H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z">
                                    </path>
                                </svg>
                                <?
                                    $album = new Album;
                                    $res = $album->countSongInAlbum($item->Id);
                                    echo $res->result;
                                    ?>
                            </span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z">
                                    </path>
                                </svg>
                                <?
                                    $album = new Album;
                                    $listen = $album->countListen($item->Id);
                                    $res1 = "";
                                    if (($listen->result / 1000) > 0) {
                                        $res1 =  $listen->result / 1000 . "K";
                                    } else {
                                        $res1 = $listen->result;
                                    }
                                    echo $res1;
                                    ?>
                            </span>
                        </span>
                    </div>
                    <div class="album__title">
                        <h3><a href="<?= url('album', 'detailFE', ['Id' => $item->Id]) ?>"><?= $item->Title ?></a></h3>
                        <span><a
                                href="<?= url('artist', 'detail', ['id' => $item->UserId]) ?>"><?= $item->Artist ?></a></span>
                    </div>
                </div>
            </div>
            <? } ?>
        </div>
        <button class="main__load" type="button">Load more</button>
    </div>
</div>
<section class="row row--grid">


    <div class="col-12">
        <div class="row row--grid">
            <!-- title -->
            <div class="col-12">
                <div class="main__title">
                    <h2><a href="#">New Singles</a></h2>
                </div>
            </div>
            <!-- end title -->
            <div class="col-12">
                <ul class="main__list">
                    <?
                    foreach ($single as $item) { ?>
                    <li class="single-item">
                        <a data-link="" data-title="<?= $item->Name ?>" data-artist="<?= $item->artist ?>"
                            data-img="public/img/covers/<?= $item->avatar ?>"
                            href="public/audio/single/<?= $item->Link ?>" class="single-item__cover">
                            <img src="public/img/covers/<?= $item->avatar ?>" alt="">
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
                        <audio style="display:none" class='ad'>
                            <source src="public/audio/single/<?= $item->Link ?>" type="audio/mpeg">

                        </audio>
                        <div class="single-item__title">
                            <h4><a href="#"><?= $item->Name ?></a></h4>
                            <span>
                                <a href="<?= url('artist', 'detail', ['id' => $item->UserId]) ?>"><?= $item->artist ?>
                                </a>
                            </span>
                        </div>
                        <span class="single-item__time duration">3:02</span>
                    </li>
                    <? } ?>
                </ul>
            </div>
        </div>
    </div>
</section>