<?php
function displaymsg($msg){
    $this->session->set_tempdata($msg,3);
    redirect(current_url());
}
?>