<div class="row row--grid">
    <!-- relase form -->
    <div class="col-12 col-lg-6">
        <form action="" enctype="multipart/form-data" method="POST" class="sign__form sign__form--profile">
            <div class="row">
                <div class="col-12">
                    <h4 class="sign__title">Profile details</h4>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="sign__group">
                        <label class="sign__label" for="email">Email</label>
                        <input id="email" type="text" name="email" disabled="" class="sign__input"
                            placeholder="admin@gmail.com">
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="sign__group">
                        <label class="sign__label" for="email">Art Name</label>
                        <input id="email" type="text" name="ArtName" class="sign__input" value="cr7">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                    <div class="sign__group">
                        <label class="sign__label" for="firstname">First name</label>
                        <input id="firstname" type="text" value="we" name="FirstName" class="sign__input">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                    <div class="sign__group">
                        <label class="sign__label" for="lastname">Last name</label>
                        <input id="lastname" type="text" name="LastName" class="sign__input" value="ezx">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                    <div class="sign__group">

                        <label class="sign__label" for="Avatar">Avatar</label>
                    </div>
                    <div class="sign__group">
                        <div class="artist__cover">
                            <img src="public/img/artists/artist1.png" id="avtimg" alt=""
                                style="width: 200px;height: 200px;border-radius:20px;">
                        </div>
                    </div>

                    <div class="sign__group" style="justify-content: center;">
                        <label class="sign__btn" for="avatar" style="cursor: pointer;">Choose a
                            photo</label>
                        <input id="avatar" onchange="loadfile(event)" accept="image/*" type="file" name="avatar"
                            class="sign__input">
                    </div>
                </div>
                <div class="col-12">
                    <button class="sign__btn" type="submit" value="1" name="btnEditInfo">Save</button>
                </div>
            </div>
        </form>
    </div>
    <!-- end details form -->

    <!-- password form -->
    <div class="col-12 col-lg-6">
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
    </div>
    <!-- end password form -->
</div>