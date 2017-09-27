<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
	private $_type;

    protected $table = 'service_orders';

    protected $guarded = ['id', 'created_at'];

    protected $casts = [
        'tools_required'     => 'array',
        'logistics_required' => 'array',
        'vendor_required'    => 'array',
    ];

    function getTypeAttribute($value)
    {
    	$this->_type = $value;
    	return config('settings.formTypes')[$value];
    }

    function getCategoryAttribute($value)
    {
    	return config('settings.services.'.$this->_key($this->_type))[$value];
    }

    private function _key($type)
    {
    	if($type == 'FARM-MANAGEMENT') {
    		return 'farm';
    	}
    }

    function getCountyAttribute($value)
    {
    	return @config('settings.counties')[$value];
    }
}
