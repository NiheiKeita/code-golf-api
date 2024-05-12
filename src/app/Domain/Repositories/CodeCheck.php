<?php

namespace App\Domain\Repositories;

class CheckResult {
    public function __construct(string $response="", string $error="", string $code=""){
        $this->response = $response;
        $this->error = $error;
        $this->code = $code;
    }
}
class CodeCheck
{
    public function codeCheck($code): CheckResult
    {

        //TODO(あとでDocker内でlocalhostsにアクセスできるようにする)
        $data = array(
            'code' => $code,
        );
        $url = "http://172.20.0.1:8081/api/api/code-check";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $outPutString = "";
        $error = curl_error($ch);
        if(!$error){
            $resArray = json_decode($response);
            $outPutString = $resArray->result;
        }
        curl_close($ch);

        return new CheckResult($outPutString, $error, $code);
    }
}