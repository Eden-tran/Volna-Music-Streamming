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
                    <input type="text" class="sign__input" style="text-align: center" name='txtActive'
                        placeholder=" Your active code">
                </div>

                <button class="sign__btn" name='btnActive' type="submit">Active</button>

                <span class="sign__text">You don't received email ? <a
                        href="<?= url('user', 'resendActive', ['id' => $_GET['id'], 'kind' => $_GET['kind']]) ?>">Resend
                        it!</a></span>
            </form>
        </div>
    </div>
</div>
<!-- end registration form -->