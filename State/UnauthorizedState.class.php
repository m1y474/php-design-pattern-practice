<?php

require_once('./UserState.class.php');
require_once('./AuthorizedState.class.php');

/**
 * ConcreteStateクラスにを相当する
 * 未認証の状態を表すクラス
 */
class UnauthorizedState implements UserState
{
    private static $singleton = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new UnauthorizedState();
        }
        return self::$singleton;
    }

    public function isAuthenticated()
    {
        return false;
    }

    public function nextState()
    {
        // 次の状態(認証)を返す
        return AuthorizedState::getInstance();
    }

    public function getMenu()
    {
        return '<a href="?mode=state">ログイン</a>';
    }

    /**
     * このインスタンスの複製を許可しないようにする
     * @throws RuntimeException
     */
    public final function __clone()
    {
        throw new RuntimeException('Clone is not allowed against'.get_class($this));
    }
}
