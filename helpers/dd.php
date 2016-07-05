<?php
function dd()
{
    if (PHP_SAPI !== 'cli')
    {
        echo "<style>pre.sf-dump .sf-dump-compact { display: block !important; }</style>";
    }

    array_map(function($x) { (new Dumper)->dump($x); }, func_get_args());
     #array_map(function($x) { var_dump($x); }, func_get_args());
    die;
}