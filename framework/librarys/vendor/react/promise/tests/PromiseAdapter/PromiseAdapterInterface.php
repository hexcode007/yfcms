<?php

namespace React\Promise\PromiseAdapter;

use React\Promise;

interface PromiseAdapterInterface {

    public function promise();

    public function resolve();

    public function reject();

    public function progress();

    public function settle();
}
