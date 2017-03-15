<?php
namespace App\Model;

//use \App\Models\LogModifiche;
//use \App\Lib\Report\odtPdfReport;
//use \App\Lib\Report\pdfUtils;

use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{
	//const CREATED_AT = 'data_inserimento';
	//const UPDATED_AT = 'data_modifica';
	protected $dateFormat='Y-m-d H:i:s';
	const DATE_FORMAT='d/m/Y';
	//const CREATED_BY = 'utente_inserimento';
	//const UPDATED_BY = 'utente_modifica';
	/*protected $rules=array(
			"warnings"=>array(),
			"errors"=>array()
		);*/
	//protected $defaults=array();
	//protected $calculated=array();
	protected $guarded=array();
	
	public function __construct($attributes = array())  {
		
		\Carbon\Carbon::setToStringFormat(self::DATE_FORMAT);
	
		parent::__construct($attributes); // Eloquent
	}
	
	protected function asDateTime($value)
	{
		if ($value && is_object($value) && (get_class($value)=="DateTime" || is_subclass_of($value,"DateTime")))
			return \Carbon\Carbon::instance($value);
		else {
			try {
				if ($value) 
					$value=\Carbon\Carbon::createFromFormat(self::DATE_FORMAT,$value);
			}
			catch (InvalidArgumentException $e){
				try {
					if ($value) 
						$value=\Carbon\Carbon::createFromFormat($this->dateFormat."+",$value);
				}
				catch  (InvalidArgumentException $e){
					
				}
			}
			return parent::asDateTime($value);
		}
	}
	
	public function setAttribute($property,$value) {
		
		$ignore=false;
		if (!$value){
			if ($property==$this->primaryKey)
				$ignore=true;
			else if ($value!=="0" && $value!==0){
				$value = null;
			}
		}
		else if (in_array($property,$this->getDates())){
			if (is_object($value) && (get_class($value)=="DateTime" || is_subclass_of($value,"DateTime")))
				$this->attributes[$property]=$value;
			else
				$this->attributes[$property]=\Carbon\Carbon::createFromFormat(self::DATE_FORMAT,$value);
			$ignore=true;
		}
		if (!$ignore)
			parent::setAttribute($property,$value);
	}

	public static function getEnumValues($table, $column)
	{
		$type = \DB::select( \DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'") )[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$enum = array();
		foreach( explode(',', $matches[1]) as $value )
		{
			$v = trim( $value, "'" );
			$enum = array_add($enum, $v, $v);
		}
		return $enum;
	}	
}
?>
