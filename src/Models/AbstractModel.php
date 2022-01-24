<?php

declare (strict_types = 1);

namespace Ourgold\Furniture\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    /**
     * {@inheritdoc }
     */
    public $timestamps = false;
}
