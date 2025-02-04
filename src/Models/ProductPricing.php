<?php

namespace JobMetric\Product\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JobMetric\Unit\Models\Unit;

/**
 * JobMetric\Product\Models\ProductPricing
 *
 * @property int $id
 * @property int $product_id
 * @property string $type
 * @property float $amount
 * @property int $currency_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Product $product
 * @property-read Unit $currency
 *
 * @method ProductPricing find(int $int)
 * @method ProductPricing findOrFail(int $int)
 */
class ProductPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'amount',
        'currency_id',
    ];

    /**
     * The products that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'product_id' => 'integer',
        'type' => 'string',
        'amount' => 'decimal:3',
        'currency_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getTable()
    {
        return config('product.tables.product_pricing', parent::getTable());
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
     * currency relation.
     *
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'currency_id');
    }
}
