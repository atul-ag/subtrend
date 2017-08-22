<?php
chdir(__DIR__);
echo $time= time();
file_put_contents(getcwd()."/phpout.txt","Test $time\n");
?>
