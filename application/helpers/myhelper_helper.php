
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('nominal')) {
    function nominal($angka)
    {
        $jd = number_format($angka, 0, ',', '.');
        return $jd;
    }
}

function is_logged_in_user()
{
    $ci = get_instance();
    if (($ci->session->userdata('id_user') == '') && $ci->session->userdata('role') == '') {
        redirect('home/auth');
    }
}

function is_logged_admin()
{
    $ci = get_instance();
    if (($ci->session->userdata('id_user') == '') && (($ci->session->userdata('role') != 'Admin')) || $ci->session->userdata('role') != 'Super Admin') {
        redirect('home/auth');
    }
}

function is_logged_superAdmin()
{
    $ci = get_instance();
    if (($ci->session->userdata('id_user') == '') && $ci->session->userdata('role') != 'Super Admin') {
        redirect('home/auth');
    }
}

function cek_session($session)
{
    $ci = get_instance();
    $sess = $ci->session->userdata($session);
    echo $sess;
}

function post($name)
{
    $ci = get_instance();
    $ci->input->post($name);
}

function is_read($table, $field, $id)
{
    $ci = get_instance();
    $data = [
        'is_read'   => 1
    ];
    $ci->Crud_model->edit($table, $field, $id, $data);
}

if (!function_exists('convert_number')) {
    function convert_number($no)
    {
        if (!preg_match('/[+0-9]/', trim($no))) {
            //cek apakah no hp karakter 1-3 ada +62
            if (substr(trim($no), 0, 3) == '+62') {
                $hp = trim($no);
            }
            //cek appakah no hp karakter 1 adlah 0
            elseif (substr(trim($no), 0, 1) == '0') {
                $hp = '+62' . substr(trim($no), 1);
            } else {
                $hp = '00000';
            }
            return $hp;
        }
    }
}
