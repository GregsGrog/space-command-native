<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

    protected $table = 'agents';
    /**
     * Get the comments for the blog post.
     */
    public function ships()
    {
        return $this->hasMany(Ship::class, 'agent_symbol')->chaperone();
    }

    public function delete() {
        $this->ships()->delete();
        parent::delete();
    }
}
