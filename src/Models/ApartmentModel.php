<?php

declare (strict_types = 1);

namespace Ourgold\Furniture\Models;

class ApartmentModel extends AbstractModel
{
    /**
     * {@inheritdoc }
     */
    protected $table = 'apartments';

    /**
     * {@inheritdoc }
     */
    protected $fillable = ['apartment_description', 'total_rooms'];

    /**
     * Get the rooms for the apartment.
     */
    public function rooms()
    {
        return $this->hasMany(RoomModel::class, 'apartment_id');
    }
}
