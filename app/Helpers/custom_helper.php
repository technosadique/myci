<?php

use App\Models\HelperModel;
use App\Models\AdminModel;
use Twilio\Rest\Client;

use function PHPSTORM_META\type;

function get_single_row_helper($table, $select = "", $where = "", $order_by = [])
{
	$helper_model = new HelperModel();
	return $helper_model->get_single_row($table, $where, $select, $order_by);
}

function get_list_helper($table, $select = "", $where = "", $order_by = [], $group_by = "")
{
	$helper_model = new HelperModel();
	return $helper_model->get_list($table, $where, $select, $order_by, $group_by);
}
