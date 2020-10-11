<?php

require_once './DataShapshot.class.php';

/**
 * Originatorに相当する
 */
final class Data extends DataSnapshot
{
    private $comment;

    public function __construct()
    {
        $this->comment = [];
    }

    /**
     * Mementoを生成する
     * @return DataSnapshot
     */
    public function takeSnapshot()
    {
        return new DataSnapshot($this->comment);
    }

    /**
     * Mementoから復元する
     */
    public function restoreSnapshot(DataSnapshot $snapshot)
    {
        $this->comment = $snapshot->getComment();
    }

    public function addComment($comment)
    {
        $this->comment[] = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
