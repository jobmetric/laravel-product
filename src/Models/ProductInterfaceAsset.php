<?php

namespace JobMetric\Product\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JobMetric\Extension\Models\Plugin;
use JobMetric\Translation\Contracts\TranslationContract;
use JobMetric\Translation\HasTranslation;

/**
 * JobMetric\Product\Models\ProductInterfaceAsset
 *
 * @property int $id
 * @property int $plugin_id
 * @property int $tax_class_id
 * @property bool $has_tax
 * @property int $hits
 * @property bool $status
 * @property float $max_discount
 * @property string $password
 * @property Carbon $published_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Plugin $plugin
 * @property-read mixed $translations
 *
 * @method ProductInterfaceAsset find(int $int)
 * @method ProductInterfaceAsset findOrFail(int $int)
 */
class ProductInterfaceAsset extends Model implements TranslationContract
{
    use HasFactory,
        HasTranslation,
        SoftDeletes;

    protected $fillable = [
        'plugin_id',
        'tax_class_id',
        'has_tax',
        'hits',
        'status',
        'max_discount',
        'password',
        'published_at',
    ];

    /**
     * The products that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'plugin_id' => 'integer',
        'tax_class_id' => 'integer',
        'has_tax' => 'boolean',
        'hits' => 'integer',
        'status' => 'boolean',
        'max_discount' => 'decimal:3',
        'password' => 'string',
        'published_at' => 'datetime',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getTable()
    {
        return config('product.tables.product_interface_asset', parent::getTable());
    }

    public function translationAllowFields(): array
    {
        return [
            'name',
            'description',
            'summary',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ];
    }

    /**
     * plugin relation
     *
     * @return BelongsTo
     */
    public function plugin(): BelongsTo
    {
        return $this->belongsTo(Plugin::class, 'plugin_id');
    }

    /**
     * taxClass relation
     *
     * @return BelongsTo
     */
    /*public function taxClass(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'tax_class_id')->where();
    }*/
}
