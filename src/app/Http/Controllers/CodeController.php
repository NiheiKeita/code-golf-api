<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class CodeController extends Controller
{

    function codeExecutionOutput($code){
        ob_start();
        eval($code);
        $output = ob_get_clean();
        return $output;
    }
    function isCorrect($value){
        $correctValue ="1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz\n16\n17\nFizz\n19\nBuzz\nFizz\n22\n23\nFizz\nBuzz\n26\nFizz\n28\n29\nFizzBuzz\n31\n32\nFizz\n34\nBuzz\nFizz\n37\n38\nFizz\nBuzz\n41\nFizz\n43\n44\nFizzBuzz\n46\n47\nFizz\n49\nBuzz\nFizz\n52\n53\nFizz\nBuzz\n56\nFizz\n58\n59\nFizzBuzz\n61\n62\nFizz\n64\nBuzz\nFizz\n67\n68\nFizz\nBuzz\n71\nFizz\n73\n74\nFizzBuzz\n76\n77\nFizz\n79\nBuzz\nFizz\n82\n83\nFizz\nBuzz\n86\nFizz\n88\n89\nFizzBuzz\n91\n92\nFizz\n94\nBuzz\nFizz\n97\n98\nFizz\nBuzz\n";
        return $correctValue === $value;
    }

    #[OA\Post(
        path: '/code-check',
        responses: [
            new OA\Response(response: 200, description: 'OK'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function index(Request $request): Array
    {
        //TODO(あとでDocker内でlocalhostsにアクセスできるようにする)
        $url = "http://172.20.0.1:8081/api/api/code-check";
        $data = array(
            'code' => $request->code,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        $response  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if($error){
            $errorData = [
                "result" => "error",
                "error" => $error,
            ];
            return $errorData;
        }
        $data = [
            "result" => "ok",
            "response" => $response,
            "error" => $error,
            "code" => $request->code,
        ];
        return $data;
    }

    public function check(Request $request): Array
    {
        $resultCode = self::codeExecutionOutput($request->code);
        $data = [
            "result" => $resultCode,
        ];
        return $data;
    }

}
