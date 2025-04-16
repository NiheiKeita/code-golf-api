<?php

namespace App\Domain\Repositories;

class CodeCheck
{
    public function codeCheck(string $code): CheckResult
    {
        //TODO(あとでDocker内でlocalhostsにアクセスできるようにする)
        $data = [
            'code' => $code,
        ];
        $url = config('app.php_check_url');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $outPutString = "";
        $error = curl_error($ch);
        if (!$error && is_string($response)) {
            $resArray = json_decode($response);
            if (is_object($resArray) && property_exists($resArray, 'result')) {
                $outPutString = $resArray->result;
            } else {
                // JSONデコードに失敗した場合または 'result' プロパティがない場合
                $outPutString = 'Error: Invalid response format or missing result';
            }
        }
        curl_close($ch);

        return new CheckResult($outPutString, $error, $code);
    }
}
