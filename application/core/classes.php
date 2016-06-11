<?php

class __functions
{
    public static function trimLine($str, $maxLen)
    {
        $str = strip_tags($str);
        if (mb_strlen($str) > $maxLen) {
            preg_match('/^.{0,' . $maxLen . '} .*?/ui', $str, $match);
            return $match[0] . '...';
        } else {
            return $str;
        }
    }

    public static function home_url($return = false)
    {
        if ($return) {
            return HOME_URL;
        } else {
            echo HOME_URL;
        }
    }

    public static  function getDomainName () {
        return $_SERVER['SERVER_NAME'];
    }
}

class __log
{
    private $f;
    private $logFileName;

    public function __construct()
    {
        $this->logFileName = "application/log.txt";
        $this->checkFile();
    }

    private function checkFile()
    {
        if (!file_exists($this->logFileName)) {
            $this->f = fopen($this->logFileName, 'w');
            fclose($this->f);
        }
    }

    public function set($info)
    {
        $this->f = fopen($this->logFileName, 'a');
        fwrite($this->f, date("Y.m.d  H:i:s") . "   // " . $info . "\r\n");
        fclose($this->f);
    }

    public function setRequest() {
        $this->set($_SERVER['REQUEST_METHOD'] . ' request: ' . 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '   from: ' . $_SERVER['REMOTE_ADDR']);
    }
}