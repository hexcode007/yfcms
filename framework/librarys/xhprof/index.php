<?php
function bar($x) {
  for($i=1;$i<10000;$i++){
    echo " ";
  }
}

function foo() {
  for ($idx = 0; $idx < 5; $idx++) {
    bar($idx);
    $x = strlen("abc");
  }
}

define("APP_PATH",__DIR__."/logs/");
// start profiling
xhprof_enable(XHPROF_FLAGS_MEMORY | XHPROF_FLAGS_CPU|XHPROF_FLAGS_NO_BUILTINS);

// run program
foo();

// stop profiler
$xhprof_data = xhprof_disable();

// display raw xhprof data for the profiler run
print_r($xhprof_data);


$XHPROF_ROOT = realpath(dirname(__FILE__) .'');
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

// save raw data for this profiler run using default
// implementation of iXHProfRuns.
$xhprof_runs = new XHProfRuns_Default(APP_PATH);

// save the run under a namespace "xhprof_foo"
$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_foo");


$url = "http://test.me/xhprof/xhprof_html/index.php?run=$run_id&source=xhprof_foo&path=".APP_PATH;
echo "<br>";
echo '<a href="'.$url.'">'.$url.'</a>';

