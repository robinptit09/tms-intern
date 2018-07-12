<?php
/**
 * @author: HUYHQ6159
 * Date: 2/3/2017
 * Time: 1:18 PM
 */

namespace App\Models\Traits;

use App\Models\Scopes\EnableScope;
use Sentinel;

trait EnableTrait
{
    /**
     * Indicates if the model is currently force deleting.
     *
     * @var bool
     */
    protected $forceDeleting = false;

    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootEnableTrait()
    {
        static::addGlobalScope(new EnableScope());
    }

    /**
     * Force a hard delete on a soft deleted model.
     *
     * @return bool|null
     */
    public function forceDelete()
    {
        $this->forceDeleting = true;

        $deleted = $this->delete();

        $this->forceDeleting = false;

        return $deleted;
    }

    /**
     * Perform the actual delete query on this model instance.
     *
     * @return mixed
     */
    protected function performDeleteOnModel()
    {
        if ($this->forceDeleting) {
            return $this->newQueryWithoutScopes()->where($this->getKeyName(), $this->getKey())->forceDelete();
        }

        return $this->runSoftDelete();
    }

    /**
     * Perform the actual delete query on this model instance.
     *
     * @return void
     */
    protected function runSoftDelete()
    {
        $query = $this->newQueryWithoutScopes()->where($this->getKeyName(), $this->getKey());


        $updateData = [
            $this->getEnableColumn() => INACTIVE
        ];
        if ($admin = Sentinel::getUser()){
            $updateData['updated_by'] = $admin->sid;
        }
        $query->update($updateData);
    }

    /**
     * Restore a soft-deleted model instance.
     *
     * @return bool|null
     */
    public function restore()
    {
        // If the restoring event does not return false, we will proceed with this
        // restore operation. Otherwise, we bail out so the developer will stop
        // the restore totally. We will clear the deleted timestamp and save.
        if ($this->fireModelEvent('restoring') === false) {
            return false;
        }

        $this->{$this->getEnableColumn()} = ACTIVE;

        // Once we have saved the model, we will fire the "restored" event so this
        // developer will do anything they need to after a restore operation is
        // totally finished. Then we will return the result of the save call.
        $this->exists = true;

        $result = $this->save();

        $this->fireModelEvent('restored', false);

        return $result;
    }

    /**
     * Determine if the model instance has been soft-deleted.
     *
     * @return bool
     */
    public function trashed()
    {
        return ($this->{$this->getEnableColumn()} != ACTIVE);
    }

    /**
     * Register a restoring model event with the dispatcher.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function restoring($callback)
    {
        static::registerModelEvent('restoring', $callback);
    }

    /**
     * Register a restored model event with the dispatcher.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function restored($callback)
    {
        static::registerModelEvent('restored', $callback);
    }

    /**
     * Determine if the model is currently force deleting.
     *
     * @return bool
     */
    public function isForceDeleting()
    {
        return $this->forceDeleting;
    }

    /**
     * Get the name of the "enable" column.
     *
     * @return string
     */
    public function getEnableColumn()
    {
        return defined('static::ENABLE') ? static::ENABLE : 'enable';
    }

    /**
     * Get the fully qualified "enable" column.
     *
     * @return string
     */
    public function getQualifiedEnableColumn()
    {
        return $this->getTable().'.'.$this->getEnableColumn();
    }

}