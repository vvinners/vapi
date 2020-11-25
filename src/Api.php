<?php

namespace VVinners\Vapi;

use Exception;

class Api
{
    public function handleStatus($msgcode)
    {
        $allcode = config("msgcode");
        foreach ($allcode as $key => $code) {
            if (isset($code[$msgcode])) {
                return [
                    "status_code" => $key,
                    "msg_code" => $msgcode,
                    "msg" => $code[$msgcode]
                ];
            }
        }
        throw new Exception("Message code not found");
    }

    public function response($data = [], $code = "OK")
    {
        $statusCode = $this->handleStatus($code);

        $newData = [];
        
        $newData["msg_code"] = $statusCode["msg_code"];
        $newData["msg"] = $statusCode["msg"];
        if (is_array($data)) {
            if (isset($data["msg"])) { // let msg to be overwrite if exist
                $newData["msg"] = $data["msg"];
            }
        } else if (trim($data) != "" && !is_null($data)) {
            $newData["msg"] = $data;
        }

        return response()->json($newData, $statusCode["status_code"]);
    }
}
