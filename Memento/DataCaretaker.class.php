<?php

/**
 * Caretakerに相当する
 */
class DataCaretaker
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setSnapshot(DataSnapshot $snapshot)
    {
        $_SESSION['snapshot'] = $snapshot;
    }

    public function getSnapshot()
    {
        return (isset($_SESSION['snapshot']) ? $_SESSION['snapshot'] : null);
    }
}
