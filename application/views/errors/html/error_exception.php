<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error
{
	public $classe;
	public $message;
	public $file;
	public $line;
}

$erro = new Error();
$erro->message = $message;
$erro->classe = $exception;
$erro->file = $exception->getFile();
$erro->line = $exception->getLine();

echo(json_encode($erro));
?>