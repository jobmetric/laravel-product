<?php

namespace JobMetric\Product\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JobMetric\Attribute\Models\GalleryVariation;
use JobMetric\Unit\Enums\UnitTypeEnum;
use JobMetric\Unit\Models\Unit;

/**
 * JobMetric\Product\Models\Product
 *
 * @property int $id
 * @property int $product_interfaceable_id
 * @property string $product_interfaceable_type
 * @property int $gallery_variation_id
 * @property string $type
 * @property string $sku
 * @property int $minimum
 * @property int $maximum
 * @property float $warning_quantity
 * @property int $weight_sign
 * @property float $weight
 * @property int $weight_unit_id
 * @property bool $is_lock_pricing_plan
 * @property int $unit_type_id
 * @property bool $status
 * @property bool $is_hide
 * @property bool $is_ladder
 * @property Carbon $ladder_at
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Model $productInterfaceable
 * @property-read GalleryVariation $galleryVariation
 * @property-read Unit $weightUnit
 * @property-read Unit $unitType
 *
 * @method Product find(int $int)
 * @method Product findOrFail(int $int)
 */
class Product extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'product_interfaceable_id',
        'product_interfaceable_type',
        'gallery_variation_id',
        'type',
        'sku',
        'minimum',
        'maximum',
        'warning_quantity',
        'weight_sign',
        'weight',
        'weight_unit_id',
        'is_lock_pricing_plan',
        'unit_type_id',
        'status',
        'is_hide',
        'is_ladder',
        'ladder_at'
    ];

    /**
     * The products that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'product_interfaceable_id' => 'integer',
        'product_interfaceable_type' => 'string',
        'gallery_variation_id' => 'integer',
        'type' => 'string',
        'sku' => 'string',
        'minimum' => 'integer',
        'maximum' => 'integer',
        'warning_quantity' => 'decimal:3',
        'weight_sign' => 'integer',
        'weight' => 'decimal:3',
        'weight_unit_id' => 'integer',
        'is_lock_pricing_plan' => 'boolean',
        'unit_type_id' => 'integer',
        'status' => 'boolean',
        'is_hide' => 'boolean',
        'is_ladder' => 'boolean',
        'ladder_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getTable()
    {
        return config('product.tables.product', parent::getTable());
    }

    /**
     * productInterfaceable relation.
     *
     * @return MorphTo
     */
    public function productInterfaceable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * galleryVariation relation.
     *
     * @return BelongsTo
     */
    public function galleryVariation(): BelongsTo
    {
        return $this->belongsTo(GalleryVariation::class, 'gallery_variation_id');
    }

    /**
     * weightUnit relation.
     *
     * @return BelongsTo
     */
    public function weightUnit(): BelongsTo
    {
        return $this->belongsTo(Unit::class)->where('type', UnitTypeEnum::WEIGHT());
    }

    /**
     * unitType relation.
     *
     * @return BelongsTo
     */
    public function unitType(): BelongsTo
    {
        return $this->belongsTo(Unit::class)->where('type', UnitTypeEnum::NUMBER());
    }
}
