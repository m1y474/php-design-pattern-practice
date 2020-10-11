<?php

require_once './Reader.class.php';
require_once './CSVFileReader.class.php';
require_once './XMLFileReader.class.php';

/**
 * Readerクラスのインスタンス生成を行うクラス
 */
class ReaderFactory
{
    /**
     * Readerクラスのインスタンスを生成
     */
    public function create($filename)
    {
        $reader = $this->createReader($filename);
        return $reader;
    }

    /**
     * Readerクラスのサブクラスを条件判定し、生成する
     */
    private function createReader($filename)
    {
        $poscsv = stripos($filename, '.csv');
        $posxml = stripos($filename, '.xml');
        if ($poscsv !== false) {
            return new CSVFileReader($filename);
        } elseif ($posxml !== false) {
            return new XMLFileReader($filename);
        }
        return die('This filename is not supported : ' . $filename);
    }
}
