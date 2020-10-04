<?php

namespace App\Traits;

use App\Scopes\SoftDeletedByDeleteFlagScope;
use App\Scopes\SoftDeletedByFlagScope;
use Illuminate\Database\Eloquent\SoftDeletes;

trait SoftDeletesWithDeletedFlag {

    use SoftDeletes;

    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootSoftDeletes()
    {
        static::addGlobalScope(new SoftDeletedByFlagScope(0));
    }

    /**
     * Perform the actual delete query on this model instance.
     *
     * @return void
     */
    protected function runSoftDelete()
    {
        $query = $this->setKeysForSaveQuery($this->newModelQuery());

        $time = $this->freshTimestamp();

        $columns = [$this->getDeletedAtColumn() => 1];

        $this->{$this->getDeletedAtColumn()} = 1;

        if ($this->timestamps && ! is_null($this->getUpdatedAtColumn())) {
            $this->{$this->getUpdatedAtColumn()} = $time;

            $columns[$this->getUpdatedAtColumn()] = $this->fromDateTime($time);
        }

        $query->update($columns);

        $this->syncOriginalAttributes(array_keys($columns));
    }
}
