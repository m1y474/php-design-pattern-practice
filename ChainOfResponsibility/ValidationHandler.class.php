<?php

/**
 * Handlerクラスに相当する
 */
abstract class ValidationHandler
{
    private $next_handler;

    public function __construct()
    {
        $this->next_handler = null;
    }

    public function setHandler(ValidationHandler $handler)
    {
        $this->next_handler = $handler;
        return $this;
    }

    public function getNextHandler()
    {
        return $this->next_handler;
    }

    /**
     * チェーンの実行
     */
    public function validate($input)
    {
        $result = $this->execValidation($input);
        // バリデーションエラー
        if (!$result) {
            return $this->getErrorMessage();
        } elseif (!is_null($this->getNextHandler())) { // ハンドルがセットされているためバリデーションの実行
            return $this->getNextHandler()->validate($input);
        }
        return true;
    }

    /**
     * 自クラスが担当する処理を実行
     */
    protected abstract function execValidation($input);

    /**
     * 自クラスが担当する処理を実行
     */
    protected abstract function getErrorMessage();
}
