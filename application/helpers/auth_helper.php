<?php

function is_logged_in()
{
    // get_instance(); untuk memanggil library CI 
    $ci = get_instance();
    if(!$ci->session->userdata('email'))
    {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');

    }
}


