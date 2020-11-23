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

        $data["msg_code"] = $statusCode["msg_code"];
        if (!isset($data["msg"])) { // let msg to be overwrite if exist
            $data["msg"] = $statusCode["msg"];
        }

        return response()->json($data, $statusCode["status_code"]);
    }
}
