<?php

namespace VVinners\Vapi;

use Exception;

class Api
{
    public function handleStatus($msgcode)
    {
        $config = config("msgcode");
        $allcode = $config['response_status'];
        foreach ($allcode as $key => $code) {
            if (isset($code[$msgcode])) {
                return [
                    "status_code" => $key,
                    $config['msg_code_name'] => $msgcode,
                    $config['msg_name'] => $code[$msgcode]
                ];
            }
        }
        throw new Exception("Message code not found");
    }

    public function response($data = [], $code = "OK")
    {
        $config = config("msgcode");
        $statusCode = $this->handleStatus($code);
        $newData = [];

        if (is_array($data)) {
            $newData = $data;
        }
        
        $newData[$config['msg_code_name']] = $statusCode[$config['msg_code_name']];
        $newData[$config['msg_name']] = $statusCode[$config['msg_name']];
        if (is_array($data)) {
            if (isset($data[$config['msg_name']])) { // let msg to be overwrite if exist
                $newData[$config['msg_name']] = $data[$config['msg_name']];
            } 
        } else if (trim($data) != "" && !is_null($data)) {
            $newData[$config['msg_name']] = $data;
        }

        return response()->json($newData, $statusCode["status_code"]);
    }
}
