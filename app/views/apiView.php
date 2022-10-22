<?php


class ApiView {
    private $smarty;

    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requesStatus($status));
        echo json_encode($data);
    }

    private function _requesStatus($code) {
        $status = [
            200 => "OK",
            404 => "Not Found",
            500 => "Internal Server Error"
        ];
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }

}