<?php

namespace JobMetric\Product\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static AMOUNT()
 * @method static PERCENTAGE()
 */
enum ProductPlanTypeEnum: string
{
    use EnumToArray;

    case AMOUNT = "amount";
    case PERCENTAGE = "percentage";
}
