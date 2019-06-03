<?php

function dirtree($dir, $regex='')
{
    if (!$dir instanceof DirectoryIterator) {
        $dir = new DirectoryIterator((string)$dir);
    }
    $dirs  = array();
    $files = array();
    foreach ($dir as $node) {
        if ($node->isDir() && !$node->isDot()) {
            $tree = dirtree($node->getPathname(), $regex);
            if (count($tree)) {
                $dirs[$node->getFilename()] = $tree;
            }
        } elseif ($node->isFile()) {
            $name = $node->getFilename();
            if ('' == $regex || preg_match($regex, $name)) {
                $files[] = $name;
            }
        }
    }
    asort($dirs);
    sort($files);
    return array_merge($dirs, $files);
}
echo '<pre>';
$a = dirtree('/var/www/');
$json = json_encode($a);
echo($json);
