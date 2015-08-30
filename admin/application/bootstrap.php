<?php

Init::start();

try {
    Loader::registerAutoload();
    Request::instance()->execute();
} catch (SysException $e) {
    Util::ShowMessage('', "/error.html");
    echo $e;
} catch (Exception $e) {
    Util::ShowMessage('', "/error.html");
    echo $e->getMessage();
}