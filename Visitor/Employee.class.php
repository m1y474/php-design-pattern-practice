<?php

require_once('./OrganizationEntry.class.php');

/**
 * Leafクラスに相当する
 */
class Employee extends OrganizationEntry
{
    /**
     * 子要素を追加する
     * Leafクラスは子要素を持たないので例外を発生させている
     * @throws Exception
     */
    public function add(OrganizationEntry $entry)
    {
        throw new Exception('method not allowed');
    }

    public function getChildren()
    {
        return [];
    }
}
