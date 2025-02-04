<?php

namespace JobMetric\Product\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use JobMetric\Product\Events\PlanableResourceEvent;
use JobMetric\Unit\Models\Unit;

/**
 * JobMetric\Product\Models\PricingPlan
 *
 * @property int $id
 * @property bool $is_global
 * @property string $planable_type
 * @property int $planable_id
 * @property string $type
 * @property int $sign
 * @property float $amount
 * @property int $currency_id
 * @property Carbon $from_at
 * @property Carbon $to_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property mixed $planable_resource
 *
 * @property-read Model $planable
 * @property-read Unit $currency
 *
 * @method PricingPlan find(int $int)
 * @method PricingPlan findOrFail(int $int)
 */
class PricingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_global',
        'planable_type',
        'planable_id',
        'type',
        'sign',
        'amount',
        'currency_id',
        'from_at',
        'to_at',
    ];

    /**
     * The products that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_global' => 'bool',
        'planable_type' => 'string',
        'planable_id' => 'integer',
        'type' => 'string',
        'sign' => 'integer',
        'amount' => 'decimal:3',
        'currency_id' => 'integer',
        'from_at' => 'datetime',
        'to_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getTable()
    {
        return config('product.tables.pricing_plan', parent::getTable());
    }

    /**
     * planable relation.
     *
     * @return MorphTo
     */
    public function planable(): MorphTo
    {
        return $this->morphTo();
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

    /**
     * Get the planable resource attribute.
     */
    public function getPlanableResourceAttribute()
    {
        $event = new PlanableResourceEvent($this->planable);
        event($event);

        return $event->resource;
    }
}
