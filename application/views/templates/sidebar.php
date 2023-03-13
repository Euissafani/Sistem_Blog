    <!-- Sidebar -->
    <div class="mdl-layout__drawer">
        <header>darkboard</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <li class="<?php if ($this->uri->segment('2') == "index") {echo "mdl-navigation__link--current";} ?>">
                        <a class="mdl-navigation__link " href="<?= base_url('user/index') ?>">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Dashboard
                        </a>
                        </li>
                        <li class="<?php if ($this->uri->segment('2') == "categories") {echo "mdl-navigation__link--current";} ?>">
                        <a class="mdl-navigation__link" href="<?= base_url('user/categories') ?>">
                            <i class="material-icons">view_comfy</i>
                            View Categories
                        </a>
                        </li>
                        <li class="<?php if ($this->uri->segment('2') == "mypost") {echo "mdl-navigation__link--current";} ?>">
                        <a class="mdl-navigation__link" href="<?= base_url('admin/mypost') ?>">
                            <i class="material-icons ">edit_note</i>
                            My Post
                        </a>
                        </li>
                        <li class="<?php if ($this->uri->segment('2') == "viewCategory") {echo "mdl-navigation__link--current";} ?>">
                        <a class="mdl-navigation__link" href="<?= base_url('admin/viewCategory') ?>" >
                            <i class="material-icons ">add_box</i>
                            Creat Categorie
                        </a>
                        </li>
                        <li>
                        <a class="mdl-navigation__link" href="<?= base_url('user/myaccount') ?>">
                            <i class="material-icons " role="presentation">person</i>
                            My Account
                        </a>
                        </li>
                        <div class="mdl-layout-spacer"></div>
                        <hr>
                        <a class="mdl-navigation__link" href="<?= base_url('auth/logout'); ?>">
                            <i class="material-icons" role="presentation">logout</i>
                            Logout
                        </a>
                    </nav>
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>

   