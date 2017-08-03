<?php

require_once('vendor/Debugger.php');

$debugger = Debugger::getInstance();

$myObject = ['item'=>'My first object'];


//Simple debug
$debugger->debug('Info',$myObject);

//Using Json or Print_r for the print object
$debugger->debug('Info',$myObject,['print'=>'json']);	//The default value
$debugger->debug('Info',$myObject,['print'=>'print']);

//Using file to output message
$debugger->debug('Info',$myObject,['use'=>'file']);
//Oter options
$debugger->debug('Info',$myObject,['use'=>'console']); //For the browser, its iqual to use console.log in Javascript
$debugger->debug('Info',$myObject,['use'=>'log']); //For the error_log() in PHP