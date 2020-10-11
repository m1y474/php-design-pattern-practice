<?php
require_once('./OrganizationEntry.class.php');

interface Visitor
{
    public function visit(OrganizationEntry $entry);
}
