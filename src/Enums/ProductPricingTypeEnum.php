<?php

namespace JobMetric\Product\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static NORMAL()
 * @method static SPECIAL()
 */
enum ProductPricingTypeEnum: string
{
    use EnumToArray;

    case NORMAL = "normal";
    case SPECIAL = "special";
}
