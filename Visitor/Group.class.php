<?php

require_once('./OrganizationEntry.class.php');

/**
 * Compositeクラスに相当する
 */
class Group extends OrganizationEntry
{
    private $entries;
    public function __construct($code, $name)
    {
        parent::__construct($code, $name);
        $this->entries = [];
    }

    /**
     * 子要素を追加する
     */
    public function add(OrganizationEntry $entry)
    {
        array_push($this->entries, $entry);
    }

    /**
     * 子要素を取得する
     */
    public function getChildren()
    {
        return $this->entries;
    }
}
