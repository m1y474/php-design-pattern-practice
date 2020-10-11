<?php

require_once('./Visitor.class.php');
require_once('./Group.class.php');

class DumpVisitor implements Visitor
{
    public function visit(OrganizationEntry $entry)
    {
        if (get_class($entry) === Group::class) {
            echo '■';
        } else {
            echo '&nbsp;&nbsp;';
        }
        echo $entry->getCode() . ':' . $entry->getName() . '<br>';
        foreach ($entry->getChildren() as $ent) {
            $ent->accept($this);
        }
    }
}
