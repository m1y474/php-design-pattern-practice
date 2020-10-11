<?php

require_once('./Visitor.class.php');

/**
 * Componentクラスに相当する
 */
abstract class OrganizationEntry
{
    private $code;
    private $name;

    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * 子要素を追加する
     * ここでは抽象メソッドとして用意
     */
    public abstract function add(OrganizationEntry $entry);

    /**
     * 子要素を取得する
     * ここでは抽象メソッドとして用意
     */
    public abstract function getChildren();

    /**
     * 組織ツリーを表示する
     * サンプルではデフォルトの実装を用意
     */
    public function accept(Visitor $visitor)
    {
        $visitor->visit($this);
    }
}
