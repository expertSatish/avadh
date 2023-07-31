<?php
use App\Models\City;
use App\Models\State;
use App\Models\WebMaster;
use App\MsgApp;

if (!function_exists('getWhereIn')) {
  function getWhereIn($data)
  {
    $return = array();
    foreach ($data as $val) :
      $return[] = $val->dataId;
    endforeach;
    return $return;
  }
}
if (!function_exists('randomInt')) {
  function randomInt()
  {
    return date('y') . random_int(10000000, 99999999);
  }
}
if (!function_exists('userType')) {
  function userType()
  {
    return json_decode(MsgApp::USER_TYPE);
  }
}
if (!function_exists('dynamicSelect')) {
  function dynamicSelect($value, $name)
  {
    return '<option value="' . $value . '">' . $name . '</option>';
  }
}

if (!function_exists('changeDateFormate')) {
  function changeDateFormate($orgDate)
  {
      return date("Y-m-d", strtotime($orgDate));
  }
}

if (!function_exists('web_master')) {
  function web_master()
  {
    $data =  WebMaster::first();
    return $data->primary_email;
  }
}
if (!function_exists('bladeStateGetNameById')) {
  function bladeStateGetNameById($id)
  {
      return State::idByName($id);
  }
}
if (!function_exists('bladeCityGetNameById')) {
  function bladeCityGetNameById($id)
  {
      return City::idByName($id);
  }
}