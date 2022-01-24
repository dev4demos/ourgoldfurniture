<?php

declare (strict_types = 1);

namespace Ourgold\Furniture\Models;

use Illuminate\Database\Eloquent\Builder;

class FurnitureModel extends AbstractModel
{
    /**
     * {@inheritdoc }
     */
    protected $table = 'furnitures';

    /**
     * {@inheritdoc }
     */
    protected $fillable = ['furniture_description', 'check_in_date', 'check_out_date', 'room_id'];

    /**
     * {@inheritdoc }
     */
    protected $casts = ['check_in_date' => 'datetime', 'check_out_date' => 'datetime'];

    /**
     * Get the room that owns the furniture.
     */
    public function room()
    {
        return $this->belongsTo(RoomModel::class, 'room_id');
    }

    /**
     * Scope a query to include all attributes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHistory($builder, $where = []): Builder
    {
        $apartmentModel = new ApartmentModel;

        $roomModel = new RoomModel;
        //
        foreach ($where as $column => $value) {
            if ($column == 'id') {
                $builder->where($this->getQualifiedKeyName(), $value);
            } elseif ($this->isFillable($column)) {
                $builder->where($column, $value);
            } elseif ($roomModel->isFillable($column)) {
                $builder->where($roomModel->qualifyColumn($column), $value);
            } elseif ($apartmentModel->isFillable($column)) {
                $builder->where($apartmentModel->qualifyColumn($column), $value);
            }
        }
        //
        $builder->select([
            $apartmentModel->qualifyColumn('*'),
            $roomModel->qualifyColumn('*'),
            $this->qualifyColumn('*')
        ])->join(
            $roomModel->getTable(), $roomModel->getQualifiedKeyName(), '=', $this->qualifyColumn('room_id')
        )->join(
            $apartmentModel->getTable(), $apartmentModel->getQualifiedKeyName(), '=', $roomModel->qualifyColumn('apartment_id')
        );
        //
        return $builder;
    }
}
