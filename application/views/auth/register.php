


<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
    <main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <div class="mdl-card__supporting-text color--dark-gray">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="login-name text-color--white">Create an Account! </span>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">

                        <form action="<?= base_url('auth/registration'); ?>" class="user" method="POST">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="name" name="name" value="<?= set_value('name') ?>">
                                <label class="mdl-textfield__label" for="name">Full Name</label>
                                <?= form_error('name','  <small class="text-danger pl-3">',' </small>');?> 
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="email" name="email" value="<?= set_value('email') ?>">
                                <label class="mdl-textfield__label" for="email">Email</label>
                                <?= form_error('email','  <small class="text-danger pl-3">',' </small>');?> 
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="password" id="password1" name="password1">
                                <label class="mdl-textfield__label" for="password1">Password</label>
                                <?= form_error('password1','  <small class="text-danger pl-3">',' </small>');?> 
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="password" id="password2" name="password2">
                                <?= form_error('password2','  <small class="text-danger pl-3">',' </small>');?> 
                                <label class="mdl-textfield__label" for="password2">Confirmasi Password</label>
                            </div>
                            <!-- <a href="forgot-password.html" class="login-link">Forgot password?</a> -->
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                            <div class="mdl-layout-spacer"></div>
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                    LOGIN
                                </button>
                        </div>
                        </form>

                        <a href="<?= base_url('auth') ?>" class="login-link">Do have account?</a>
                    </div>
                </div>
            </div>
    </main>
</div>

