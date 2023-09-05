<?php

function cek_login()
{
	$ci = get_instance();
	if (!$ci->session->userdata('user')) {
		$ci->session->set_flashdata('error_login', '<div class="icon-box mt-3 animate__animated animate__shakeX" data-aos="fade-left" data-aos-duration="500">
      <div class="alert alert-danger p-1 text-center">
        <small>Mohon login terlebih dahulu.</small>
      </div>
    </div>');
		redirect(base_url('login_admin'));
	}
}
