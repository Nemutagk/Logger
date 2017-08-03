# Logger
Class for debuggin in PHP

## What it is Logger
Logger it's a class for debuggin in PHP, light, fast and simple, having several options to display message as there are file, console in browser and error_log of PHP

### Installing
Just copy the file "Debugger.php" to the directory where you libraries are, and use include/require/use in the file where are you like using the debuggin


```
<?php
//for namespace
use Vendor\Debugger;

//for include/require
require_once('Vendor\Debugger.php');

```

And get instance for debugger


```
$debugger = Debugger::getInstance();

```

And use method debug for send message to log


```
$debugger->debug('Namespace',$object_or_array_or_whatever);

```

Using Json to print a object (the options is json and print)


```
$debugger->debug('Namespace',$object,['print'=>'json']);

```

Using a file to save message


```
$debugger->debug('Namespace',$object,['print'->'json','use'=>'file']);

```

The options for deploy message it's file, console (for the browser) and log (for the error_log);

```
$debugger->debug('Namespace',$object,['print'->'json','use'=>'file']);
$debugger->debug('Namespace',$object,['print'->'json','use'=>'console']);
$debugger->debug('Namespace',$object,['print'->'json','use'=>'log']);

```

### Licence
The lincence using its a GPL-3.0