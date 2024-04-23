<!-- registration form -->
<div class="col-12">
    <div class="sign">
        <div class="sign__content">

            <form action="" method="post" class="sign__form">
                <?= error() ?>

                <a href="<?= url() ?>" class="sign__logo">
                    <img src="public/img/logo.svg" alt="">
                </a>

                <div class="sign__group">
                    <input type="text" class="sign__input" style="text-align: center" name='txtEmail'
                        placeholder=" Your email">
                </div>
                <div class="sign__group sign__group--checkbox">
                    <input id="cbAgree" name="cbAgree" type="checkbox" checked="checked">
                    <label for="cbAgree">I agree to the <a href="privacy.html">Privacy Policy</a></label>
                </div>
                <button class="sign__btn" name='btnReset' type="submit">SEND</button>

                <span class="sign__text">We will send a code to your Email</span>
            </form>
        </div>
    </div>
</div>
<!-- end registration form -->