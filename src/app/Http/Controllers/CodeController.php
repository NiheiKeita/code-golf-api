<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\CodeCheck;
use App\Models\Code;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class CodeController extends Controller
{
    public function codeExecutionOutput(string $code): string|false
    {
        ob_start();
        eval($code);
        $output = ob_get_clean();
        return $output;
    }

    public function isCorrect(string $value, string $answer): bool
    {
        // $correctValue ="1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz\n16\n17\nFizz\n19\nBuzz\nFizz\n22\n23\nFizz\nBuzz\n26\nFizz\n28\n29\nFizzBuzz\n31\n32\nFizz\n34\nBuzz\nFizz\n37\n38\nFizz\nBuzz\n41\nFizz\n43\n44\nFizzBuzz\n46\n47\nFizz\n49\nBuzz\nFizz\n52\n53\nFizz\nBuzz\n56\nFizz\n58\n59\nFizzBuzz\n61\n62\nFizz\n64\nBuzz\nFizz\n67\n68\nFizz\nBuzz\n71\nFizz\n73\n74\nFizzBuzz\n76\n77\nFizz\n79\nBuzz\nFizz\n82\n83\nFizz\nBuzz\n86\nFizz\n88\n89\nFizzBuzz\n91\n92\nFizz\n94\nBuzz\nFizz\n97\n98\nFizz\nBuzz\n";
        return $answer === $value;
    }

    #[OA\Post(
        path: '/code-check',
        responses: [
            new OA\Response(response: 200, description: 'OK'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function index(Request $request): JsonResponse
    {
        /** @var \App\Models\User $user */
        $user = User::findOrFail($request->user_id);
        /** @var \App\Models\Question $question */
        $question = Question::findOrFail($request->question_id);

        $codeCheck = new CodeCheck();

        $code = is_string($request->code) ? $request->code : "";
        $result = $codeCheck->codeCheck($code);
        $isCorrect = self::isCorrect($result->response ?? "", $question->answer);
        $codeResult = !$result->error ? ($isCorrect ? "ok" : "ng") : "error";
        $byte = null;
        if ($codeResult === "ok") {
            $byte = strlen($code);
            self::createCode($code, $user, $question);
        }
        return response()->json([
            "result" => $codeResult,
            "response" => $result->response,
            "error" => $result->error,
            "code" => $request->code,
            "byte" => $byte,
        ], 200);
    }

    // TODO: 別コンテナへ移行
    public function check(Request $request): array
    {
        $code = is_string($request->code) ? $request->code : "";
        $resultCode = self::codeExecutionOutput($code);
        $data = [
            "result" => $resultCode,
        ];
        return $data;
    }

    public function createCode(string $code, User $user, Question $quesion): void
    {
        Code::create([
            "user_id" => $user->id,
            "question_id" => $quesion->id,
            "code" => $code,
        ]);
    }
}
