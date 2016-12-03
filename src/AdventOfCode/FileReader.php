<?php namespace AdventOfCode;

class FileReader {
    private $filePath;

    private $fileContents;

    public function __construct($filePath) {
        if (!is_readable($filePath)) {
            throw new \Exception("Path: [{$filePath}] is not readable");
        }

        $this->filePath = $filePath;
    }

    public function readFile() {
        $this->fileContents = file_get_contents($this->filePath);
    }

    public function getFileContents() {
        return $this->fileContents;
    }
}