<?php
if (!function_exists('api_json')) {
    function api_json($data = '', $msg = 'success', $status = 200)
    {
        $arr['code'] = $status;
        $arr['msg'] = $msg;
        $arr['data'] = $data;
        echo json_encode($arr);
        exit();
    }
}