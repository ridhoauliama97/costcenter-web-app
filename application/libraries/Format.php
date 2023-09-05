<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Format
{
	function currency($num)
	{
		$str = $num;
		if ($str != '' || !empty($str)) {
			if (substr($num, 0, 1) == '-') {
				$str = $str * (-1);
				if (strlen($str) % 3 == 2) {
					$res = str_split("0$str", 3);
					$res[0] = (int) $res[0];
					return '-Rp.' . implode('.', $res);
				} elseif (strlen($str) % 3 == 1) {
					$res = str_split("00$str", 3);
					$res[0] = (int) $res[0];
					return '-Rp.' . implode('.', $res);
				} else {
					$res = str_split($str, 3);
					return '-Rp.' . implode('.', $res);
				}
			} else {
				if (strlen($str) % 3 == 2) {
					$res = str_split("0$str", 3);
					$res[0] = (int) $res[0];
					return 'Rp.' . implode('.', $res);
				} elseif (strlen($str) % 3 == 1) {
					$res = str_split("00$str", 3);
					$res[0] = (int) $res[0];
					return 'Rp.' . implode('.', $res);
				} else {
					$res = str_split($str, 3);
					return 'Rp.' . implode('.', $res);
				}
			}
		} else {
			return 'Rp.0';
		}
	}

	function account($num)
	{
		$str = $num;
		if ($str != '' || !empty($str)) {
			if (substr($num, 0, 1) == '-') {
				$str = $str * (-1);
				if (strlen($str) % 3 == 2) {
					$res = str_split("0$str", 3);
					$res[0] = (int) $res[0];
					return '(' . implode('.', $res) . ')';
				} elseif (strlen($str) % 3 == 1) {
					$res = str_split("00$str", 3);
					$res[0] = (int) $res[0];
					return '(' . implode('.', $res) . ')';
				} else {
					$res = str_split($str, 3);
					return '(' . implode('.', $res) . ')';
				}
			} else {
				if (strlen($str) % 3 == 2) {
					$res = str_split("0$str", 3);
					$res[0] = (int) $res[0];
					return implode('.', $res);
				} elseif (strlen($str) % 3 == 1) {
					$res = str_split("00$str", 3);
					$res[0] = (int) $res[0];
					return implode('.', $res);
				} else {
					$res = str_split($str, 3);
					return implode('.', $res);
				}
			}
		} else {
			return 0;
		}
	}

	function date($num)
	{
		$res = date('d-m-Y', strtotime($num));
		return $res;
	}

	function date_full($num)
	{
		$arr = [
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];

		$bulan = '';
		$m = (int)date('m', strtotime($num)) - 1;
		for ($i = 0; $i < 12; $i++) {
			if ($m == $i) {
				$bulan = $arr[$i];
			}
		}
		$hari = date('d', strtotime($num));
		$tahun = date('Y', strtotime($num));
		$res = $hari . ' ' . $bulan . ' ' . $tahun;
		return $res;
	}

	function date_full_2($num)
	{
		$arr = [
			'Jan',
			'Feb',
			'Mar',
			'Apr',
			'Mei',
			'Jun',
			'Jul',
			'Agu',
			'Sep',
			'Okt',
			'Nov',
			'Des'
		];

		$bulan = '';
		$m = (int)date('m', strtotime($num)) - 1;
		for ($i = 0; $i < 12; $i++) {
			if ($m == $i) {
				$bulan = $arr[$i];
			}
		}
		$hari = date('d', strtotime($num));
		$tahun = date('Y', strtotime($num));
		$res = $hari . ' ' . $bulan . ' ' . $tahun;
		return $res;
	}
}
