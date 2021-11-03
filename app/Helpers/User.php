<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
    /**
     * This Helpers will provide many function which concern the request on the users table
     * 
     */
    class User
    {
        /**
         * Verify if the specified resource is deleted and return a boolean
         * 
         * @param \App\Models
         * @return bool 
         */
        public function isDeleted($model):bool
        {
            return $model->deleted != 0 ? true:false;
        }

    }