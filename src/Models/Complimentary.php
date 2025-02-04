<?php

namespace JobMetric\Product\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * JobMetric\Product\Models\Complimentary
 *
 * @property int $id
 * @property int $product_id
 * @property float $product_quantity
 * @property int $complimentary_id
 * @property float $complimentary_quantity
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Product $product
 * @property-read Product $complimentary
 *
 * @method Complimentary find(int $int)
 * @method Complimentary findOrFail(int $int)
 */
class Complimentary extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'product_id',
        'product_quantity',
        'complimentary_id',
        'complimentary_quantity',
    ];

    /**
     * The products that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'product_id' => 'integer',
        'product_quantity' => 'decimal:3',
        'complimentary_id' => 'integer',
        'complimentary_quantity' => 'decimal:3',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function getTable()
    {
        return config('product.tables.complimentary', parent::getTable());
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
     * complimentary relation.
     *
     * @return BelongsTo
     */
    public function complimentary(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'complimentary_id');
    }
}
