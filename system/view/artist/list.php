<div class="col-12">
    <div class="main__filter">
        <form action="#" class="main__filter-search">
            <input type="text" placeholder="Search...">
            <button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
                </svg></button>
        </form>

        <div class="main__filter-wrap">
            <select class="main__select" name="genres">
                <option value="all">All artists</option>
                <option value="legacy">Legacy artists</option>
                <option value="active">Active artists</option>
            </select>

            <select class="main__select" name="years">
                <option value="All genres">All genres</option>
                <option value="1">Alternative</option>
                <option value="2">Blues</option>
                <option value="3">Classical</option>
                <option value="4">Country</option>
                <option value="5">Electronic</option>
                <option value="6">Hip-Hop/Rap</option>
                <option value="7">Indie</option>
                <option value="8">Jazz</option>
                <option value="8">Latino</option>
                <option value="8">R&B/Soul</option>
                <option value="8">Rock</option>
            </select>
        </div>

        <div class="slider-radio">
            <input type="radio" name="grade" id="featured" checked="checked"><label for="featured">Featured</label>
            <input type="radio" name="grade" id="popular"><label for="popular">Popular</label>
            <input type="radio" name="grade" id="newest"><label for="newest">Newest</label>
        </div>
    </div>

    <div class="row row--grid " id='resArtist'>
        <?
        foreach ($list as $item) {
            if ($item->status == 1) { ?>
        <div class="col-6 col-sm-4 col-md-3 col-xl-2 artistL">
            <a href="<?= url('artist', 'detail', ['id' => $item->Id]) ?>" class="artist">
                <div class="artist__cover">
                    <img src="public/img/artists/<?= $item->avatar ?>" alt="">
                </div>
                <h3 class="artist__title"><?= $item->ArtName ?></h3>
            </a>
        </div>
        <? }
        } ?>


    </div>

    <button class="main__load" id='artistLoadMore' type="button">Load more</button>
</div>