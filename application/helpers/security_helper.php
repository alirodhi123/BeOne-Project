<?php
function helper_security($field_db){
    $CI =& get_instance();

    $session_id = $CI->session->userdata('user_id');

    //load model log
    $CI->load->model('User_model');

   $role_id = $CI->User_model->load_role_by_user($session_id);
   $security = $CI->User_model->load_security($role_id['role_id']);

    return $security[$field_db];
}
?>
