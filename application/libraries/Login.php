<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login
{
	function index()
	{
		$ci = get_instance();
		if (!$ci->session->userdata('user')) {
			redirect(base_url('auth/login'));
		}
	}
}
