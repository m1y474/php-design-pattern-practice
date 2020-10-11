<?php

require_once './OrganizationEntry.class.php';

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
    public function add(OrganizationEntry $entiry)
    {
        array_push($this->entries, $entiry);
    }

    /**
     * 組織ツリーを表示する
     * 自分自身と保持している子要素を表示
     */
    public function dump()
    {
        parent::dump();
        foreach ($this->entries as $entry) {
            $entry->dump();
        }
    }
}
