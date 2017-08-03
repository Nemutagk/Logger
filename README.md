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
$debugger->debug('Namespace',$objecto_or_array_or_whatever);

```