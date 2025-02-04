<?php

namespace JobMetric\Product\Events;

class PlanableResourceEvent
{
    /**
     * The planable model instance.
     *
     * @var mixed
     */
    public mixed $planable;

    /**
     * The resource to be filled by the listener.
     *
     * @var mixed|null
     */
    public mixed $resource;

    /**
     * Create a new event instance.
     *
     * @param mixed $planable
     */
    public function __construct(mixed $planable)
    {
        $this->planable = $planable;
        $this->resource = null;
    }
}
