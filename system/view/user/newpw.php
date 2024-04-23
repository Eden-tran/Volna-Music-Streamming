<!-- registration form -->
<div class="col-12">
    <div class="sign">
        <div class="sign__content">

            <form action="" method="post" class="sign__form">
                <?= error() ?>

                <a href="index.html" class="sign__logo">
                    <img src="public/img/logo.svg" alt="">
                </a>

                <div class="sign__group">
                    <input type="password" class="sign__input" style="text-align: center" name='txtPassword'
                        placeholder=" Your new password">
                </div>
                <div class="sign__group">
                    <input type="password" class="sign__input" style="text-align: center" name='txtRePassword'
                        placeholder=" Repeat your password">
                </div>
                <button class="sign__btn" name='btnChange' type="submit">Change</button>


            </form>
        </div>
    </div>
</div>
<!-- end registration form -->