<?php

namespace App\Http\Api\Controller\V1;

use App\Http\Common\Controller\AbstractController;
use App\Http\Common\Result;
use Hyperf\Snowflake\IdGeneratorInterface;
use Hyperf\Context\ApplicationContext;
use Hyperf\Swagger\Annotation\Get;
use Hyperf\Swagger\Annotation\HyperfServer;
use Mine\Swagger\Attributes\ResultResponse;

#[HyperfServer(name: 'http')]
final class ProductController extends AbstractController
{
    public function __construct()
    {

    }

    #[Get(path: '/api/v1/product/demo',operationId: "ApiV1ProductDemo",summary: "测试",tags: ['api'])]
    #[ResultResponse(new Result())]
    public function demo(): Result
    {
        $container = ApplicationContext::getContainer();
        $generator = $container->get(IdGeneratorInterface::class);

        $id = $generator->generate();
        return $this->success($id);
    }
}