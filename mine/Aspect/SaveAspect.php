<?php
declare(strict_types=1);
namespace Mine\Aspect;

use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Hyperf\Di\Exception\Exception;
use Mine\Helper\LoginUser;
use Mine\MineModel;

/**
 * Class GenIdAspect
 * @package Mine\Aspect
 * @Aspect
 */
class SaveAspect extends AbstractAspect
{
    public $classes = [
        'Mine\MineModel::save'
    ];

    /**
     * @var LoginUser
     */
    protected $loginUser;

    public function __construct(LoginUser $loginUser)
    {
        $this->loginUser = $loginUser;
    }

    /**
     * @param ProceedingJoinPoint $proceedingJoinPoint
     * @return mixed
     * @throws Exception
     */
    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $instance = $proceedingJoinPoint->getInstance();
        // 设置创建人
        try {
            $this->loginUser->check();
            if ($instance instanceof MineModel && in_array('created_by', $instance->getFillable())) {
                $instance->created_by = $this->loginUser->getId();
            }
        } catch (\Exception $e) {}

        // 生成ID
        if ($instance instanceof MineModel &&
            !$instance->incrementing &&
            $instance->getPrimaryKeyType() === 'int' &&
            empty($instance->{$instance->getKeyName()})
        ) {
            $instance->setPrimaryKeyValue($instance->genId());
        }
        return $proceedingJoinPoint->process();
    }
}