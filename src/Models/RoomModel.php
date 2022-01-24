<?php

declare (strict_types = 1);

namespace Ourgold\Furniture\Models;

class RoomModel extends AbstractModel
{
    /**
     * {@inheritdoc }
     */
    protected $table = 'rooms';

    /**
     * {@inheritdoc }
     */
    protected $fillable = ['apartment_id', 'room_type'];

    /**
     * Get the furnitures in the room.
     */
    public function furnitures()
    {
        return $this->hasMany(FurnitureModel::class, 'room_id');
    }

    /**
     * Get the apartment that owns the room.
     */
    public function apartment()
    {
        return $this->belongsTo(ApartmentModel::class, 'apartment_id');
    }
}
