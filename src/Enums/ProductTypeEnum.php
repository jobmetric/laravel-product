<?php

namespace JobMetric\Product\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static SIMPLE()
 * @method static MAKE()
 * @method static ATTRIBUTE()
 */
enum ProductTypeEnum: string
{
    use EnumToArray;

    case SIMPLE = "simple";
    case MAKE = "make";
    case ATTRIBUTE = "attribute";
}
