<?php


namespace Mine\Crontab;


use Hyperf\Crontab\Crontab;

class MineCrontab extends Crontab
{
    /**
     * 失败策略
     * @var string
     */
    protected $failPolicy = '3';

    /**
     * 调用参数
     * @var string
     */
    protected $parameter;

    /**
     * 任务ID
     * @var integer
     */
    protected $crontab_id;

    /**
     * @return string
     */
    public function getFailPolicy(): string
    {
        return $this->failPolicy;
    }

    /**
     * @param string $failPolicy
     */
    public function setFailPolicy(string $failPolicy): void
    {
        $this->failPolicy = $failPolicy;
    }

    /**
     * @return string
     */
    public function getParameter(): string
    {
        return $this->parameter;
    }

    /**
     * @param string $parameter
     */
    public function setParameter(string $parameter): void
    {
        $this->parameter = $parameter;
    }

    /**
     * @return int
     */
    public function getCrontabId(): int
    {
        return $this->crontab_id;
    }

    /**
     * @param int $crontab_id
     */
    public function setCrontabId(int $crontab_id): void
    {
        $this->crontab_id = $crontab_id;
    }
}