<?php

namespace JobMetric\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use JobMetric\Attribute\Models\AttributeRelation;
use JobMetric\Attribute\Models\AttributeValue;

/**
 * JobMetric\Product\Models\ProductAttribute
 *
 * @property int $product_id
 * @property int $attribute_relation_id
 * @property int $attribute_value_id
 *
 * @property-read Product $product
 * @property-read AttributeRelation $attributeRelation
 * @property-read AttributeValue $attributeValue
 *
 * @method ProductAttribute find(int $int)
 * @method ProductAttribute findOrFail(int $int)
 */
class ProductAttribute extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_relation_id',
        'attribute_value_id',
    ];

    /**
     * The products that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'product_id' => 'integer',
        'attribute_relation_id' => 'integer',
        'attribute_value_id' => 'integer',
    ];

    public function getTable()
    {
        return config('product.tables.product_attribute', parent::getTable());
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
     * attribute relation.
     *
     * @return BelongsTo
     */
    public function attributeRelation(): BelongsTo
    {
        return $this->belongsTo(AttributeRelation::class, 'attribute_relation_id');
    }

    /**
     * attribute value relation.
     *
     * @return BelongsTo
     */
    public function attributeValue(): BelongsTo
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}
