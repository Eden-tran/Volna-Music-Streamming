<div class="row row--grid">
    <div class='addCustom col-12'>
        <a href="<?= url('album', 'SList') ?>">
            <button class="btnAdd">Add new </button>
        </a>
    </div>
    <div class="col-12">
        <?= error() ?>
        <div class="dashbox">
            <div class="dashbox__table-wrap">
                <div class="dashbox__table-scroll" data-scrollbar="true" tabindex="-1"
                    style="overflow: hidden; outline: none;">
                    <div class="scroll-content">
                        <table class="main__table">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th><a href="#"> </a></th>
                                    <th><a href="#" class="active">Title <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M17,13.41,12.71,9.17a1,1,0,0,0-1.42,0L7.05,13.41a1,1,0,0,0,0,1.42,1,1,0,0,0,1.41,0L12,11.29l3.54,3.54a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29A1,1,0,0,0,17,13.41Z">
                                                </path>
                                            </svg></a></th>
                                    <th><a href="#" class="active">Date <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z">
                                                </path>
                                            </svg></a></th>
                                    <th><a href="#">Artist <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M9.71,10.21,12,7.91l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Zm4.58,4.58L12,17.09l-2.29-2.3a1,1,0,0,0-1.42,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42Z">
                                                </path>
                                            </svg></a></th>
                                    <th><a href="#">Status <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M9.71,10.21,12,7.91l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Zm4.58,4.58L12,17.09l-2.29-2.3a1,1,0,0,0-1.42,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42Z">
                                                </path>
                                            </svg></a></th>
                                    <th><a href="#">Status <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M9.71,10.21,12,7.91l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Zm4.58,4.58L12,17.09l-2.29-2.3a1,1,0,0,0-1.42,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42Z">
                                                </path>
                                            </svg></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach ($list as $item) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="main__table-text main__table-text--number"><a
                                                href="<?= url('album', 'sdetail', ['Id' => $item->Id]) ?>"><?= $item->Id ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="main__table-img">
                                            <a data-link="" data-title="<?= trim($item->Name) ?>"
                                                data-artist="<?= $item->artist ?>"
                                                data-img="public/img/covers/<?= $item->avatar ?>"
                                                href="public/audio/single/<?= $item->Link ?>"
                                                class="single-item__cover">
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
                                        </div>

                                    </td>


                                    <!-- <div class="main__table-img">
                                            <img src="public/img/covers/ alt="">
                                        </div> -->
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href=""><?= $item->Name ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">
                                            <?= date("d/m/y", strtotime($item->DateCreate)) ?></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">
                                            <?= $item->artist ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="main__table-text main__table-text--green"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z">
                                                </path>
                                            </svg> Delivered</div>
                                    </td>
                                    <td>
                                        <div class="table-button">
                                            <a href="<?= url('album', 'sedit', ['Id' => $item->Id]) ?>"
                                                class="single-item__add" style=" color: #25a56a;   margin-left: 5px;">
                                                <i class="fa-regular fa-pen-to-square"></i> </a>
                                            <a href="<?= url('album', 'sdelete', ['Id' => $item->Id]) ?>"
                                                class="single-item__delete" style=" color: red;   margin-left: 5px;">
                                                <i class="fa-solid fa-x"></i>
                                            </a>

                                        </div>

                                    </td>
                                </tr>
                                <? }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="scrollbar-track scrollbar-track-x show" style="display: none;">
                        <div class="scrollbar-thumb scrollbar-thumb-x"
                            style="width: 882px; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                    <div class="scrollbar-track scrollbar-track-y show" style="display: none;">
                        <div class="scrollbar-thumb scrollbar-thumb-y"
                            style="height: 484px; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>