<?php

namespace App\Services;

class ResponseService {


    public function data_response($code , $records, $msg = "Data fetched successfully"){
        return response()->json([
            'status' => $code,
            'message' => $msg,
            "data" => $records
        ], $code);
    }


    public function simple_response($code, $msg){
        return response()->json([
            'status' => $code,
            'message' => $msg,
            "data" => NULL
        ], $code);
    }

    public function indexed_reponse($code , $offset, $has_data , $records, $msg = "Data fetched successfully"){
        return response()->json([
            'status' => $code,
            'message' => $msg,
            'offset' => $offset,
            'has_data' => $has_data,
            "data" => $records
        ], $code);
    }

}
