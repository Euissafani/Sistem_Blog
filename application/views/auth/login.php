


<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
    <main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <div class="mdl-card__supporting-text color--dark-gray">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="login-name text-color--white">Login Page</span>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                         <form  class="user" method="post" action="<?= base_url('auth'); ?>">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                                <label class="mdl-textfield__label" for="email">Email</label>
                                <?= form_error('email','  <small class="text-danger pl-3">',' </small>');?> 
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="password" name="password" id="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                                <?= form_error('password','  <small class="text-danger pl-3">',' </small>');?> 
                            </div>
                            <!-- <a href="forgot-password.html" class="login-link">Forgot password?</a> -->
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                            <a href="<?= base_url('auth/registration') ?>" class="login-link">Don't have account?</a>
                            <div class="mdl-layout-spacer"></div>
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                    LOGIN
                                </button>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
    </main>
</div>

