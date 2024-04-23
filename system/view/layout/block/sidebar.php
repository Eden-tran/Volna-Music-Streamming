<!-- sidebar -->
<div class="sidebar">
    <!-- sidebar logo -->
    <div class="sidebar__logo">
        <img src="public/img/logo.svg" alt="">
    </div>
    <!-- end sidebar logo -->

    <!-- sidebar nav -->
    <ul class="sidebar__nav">
        <li class="sidebar__nav-item">
            <a href="<?= url() ?>"
                class="sidebar__nav-link <?= $controller == 'home'  ? 'sidebar__nav-link--active' : '' ?> ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z">
                    </path>
                </svg>
                <span>Home</span></a>
        </li>

        <li class="sidebar__nav-item">
            <a href="<?= url('artist',) ?>"
                class="sidebar__nav-link <?= $controller == 'artist'  ? 'sidebar__nav-link--active' : '' ?> ">
                <svg xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                </svg> <span>Artists</span>
            </a>
        </li>

        <li class="sidebar__nav-item">
            <a href="<?= url('album') ?>"
                class="sidebar__nav-link <?= $controller == 'boiz' ? 'sidebar__nav-link--active' : '' ?> "><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z" />
                </svg> <span>Releases</span></a>
        </li>
        <!-- collapse
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link <?= $controller == 'zs'  ? 'sidebar__nav-link--active' : '' ?> "
                data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false"
                aria-controls="collapseMenu1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M19,5.5H12.72l-.32-1a3,3,0,0,0-2.84-2H5a3,3,0,0,0-3,3v13a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V8.5A3,3,0,0,0,19,5.5Zm1,13a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5.5a1,1,0,0,1,1-1H9.56a1,1,0,0,1,.95.68l.54,1.64A1,1,0,0,0,12,7.5h7a1,1,0,0,1,1,1Z" />
                </svg>
                <span>Pages</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" />
                </svg></a>

            <div class="collapse" id="collapseMenu1">
                <ul class="sidebar__menu sidebar__menu--scroll">
                    <li><a href="artist.html">Artist</a></li>
                    <li><a href="event.html">Event</a></li>
                    <li><a href="release.html">Release</a></li>
                    <li><a href="product.html">Product</a></li>
                    <li><a href="article.html">Article</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="pricing.html">Pricing plans</a></li>
                    <li><a href="privacy.html">Privacy policy</a></li>
                    <li><a href="signin.html">Sign in</a></li>
                    <li><a href="signup.html">Sign up</a></li>
                    <li><a href="forgot.html">Forgot password</a></li>
                    <li><a href="404.html">404 Page</a></li>
                </ul>
            </div>
        </li> -->
        <!-- end collapse -->
        <li class="sidebar__nav-item">
            <a href="news.html"
                class="sidebar__nav-link <?= $controller == 'essqw'  ? 'sidebar__nav-link--active' : '' ?> ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M16,14H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Zm0-4H10a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm4-6H17V3a1,1,0,0,0-2,0V4H13V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H4A1,1,0,0,0,3,5V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V5A1,1,0,0,0,20,4ZM19,19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V6H7V7A1,1,0,0,0,9,7V6h2V7a1,1,0,0,0,2,0V6h2V7a1,1,0,0,0,2,0V6h2Z" />
                </svg>
                <span>News</span></a>
        </li>
    </ul>
    <!-- end sidebar nav -->
</div>