<?php

namespace JobMetric\Product\Events;

class ProductInterfaceableResourceEvent
{
    /**
     * The productInterfaceable model instance.
     *
     * @var mixed
     */
    public mixed $productInterfaceable;

    /**
     * The resource to be filled by the listener.
     *
     * @var mixed|null
     */
    public mixed $resource;

    /**
     * Create a new event instance.
     *
     * @param mixed $productInterfaceable
     */
    public function __construct(mixed $productInterfaceable)
    {
        $this->productInterfaceable = $productInterfaceable;
        $this->resource = null;
    }
}
