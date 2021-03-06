<?php

namespace GuzzleHttp\Event;

use GuzzleHttp\Transaction;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;

/**
 * Base class for request events, providing a request and client getter.
 */
abstract class AbstractRequestEvent extends AbstractEvent {

    /** @var Transaction */
    protected $transaction;

    /**
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction) {
        $this->transaction = $transaction;
    }

    /**
     * Get the HTTP client associated with the event.
     *
     * @return ClientInterface
     */
    public function getClient() {
        return $this->transaction->client;
    }

    /**
     * Get the request object
     *
     * @return RequestInterface
     */
    public function getRequest() {
        return $this->transaction->request;
    }

    /**
     * @return Transaction
     */
    protected function getTransaction() {
        return $this->transaction;
    }

}
