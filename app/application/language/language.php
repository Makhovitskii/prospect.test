<?php

class Language
{
	public static $langElement = array();
	public static $langFile = "az";

    public function __construct($lang)
    {
        self::$langFile = $lang;
        if($this->checkFile())
        {
        	$this->getLangFile();
        }
        else
        {
        	die("Language file not found!");
        }
    }

    public function getLangFile()
    {
    	$languageElements = require(APP . 'language/'. self::$langFile .'/lang.php');
    	self::$langElement = array_merge(self::$langElement, $_);
    }

    public function checkFile()
    {
    	if(is_file(APP . 'language/'. self::$langFile .'/lang.php'))
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
}

class lang extends Language
{
	public static function word($word)
	{
		if(isset(parent::$langElement[$word]))
		{
			return urldecode(parent::$langElement[$word]);
		}
		else
		{
			return urldecode($word);
		}
	}

    public static function selectedLanguage()
    {
    	return parent::$langFile;
    }
}