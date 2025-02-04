<?php

namespace JobMetric\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * JobMetric\Product\Models\ProductMake
 *
 * @property int $product_id
 * @property int $child_id
 * @property float $quantity
 *
 * @property-read Product $product
 * @property-read Product $child
 *
 * @method ProductMake find(int $int)
 * @method ProductMake findOrFail(int $int)
 */
class ProductMake extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'child_id',
        'quantity',
    ];

    /**
     * The products that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'product_id' => 'integer',
        'child_id' => 'string',
        'quantity' => 'decimal:3',
    ];

    public function getTable()
    {
        return config('product.tables.product_make', parent::getTable());
    }

    /**
     * product relation.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * child relation.
     *
     * @return BelongsTo
     */
    public function child(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'child_id');
    }
}
