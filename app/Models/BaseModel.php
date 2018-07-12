<?php

/**
 * Base model extends Illuminate\Database\Eloquent\Model
 *
 * @author HUYHQ6159
 * Date: 1/9/2017
 */

namespace App\Models;

use Carbon\Carbon;
use App\Models\Traits\EnableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class BaseModel extends Model
{
    /**
     * Add use "enable" field for logic delete
     */
    use EnableTrait;

    /**
     * List field can sortable
     *
     * @var array
     */
    protected $sortable = [
        'created_at'
    ];

    /**
     * Get sortable field
     *
     * @return array
     */
    public function getSortable () {
        return $this->sortable;
    }


    public function addRow($attrs,$created_by)
    {
        foreach ($attrs as $key => $value) {
            $this->setAttribute($key, $value);
        }
        $now = Carbon::now();
        $this->setAttribute("updated_at", $now);
        $this->setAttribute("created_at", $now);
        $this->setAttribute("updated_by", $created_by);
        $this->setAttribute("created_by", $created_by);
        $this->setAttribute("enable", 1);
        Log::debug("add row[" . $this->table . "]");
        return $this->save();
    }

}
