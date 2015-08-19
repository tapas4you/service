<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Request;
use Redirect;
class AnimalType extends Model
{
   
    protected $primaryKey = 'animal_type_id';
    
    public $timestamps = false;
    
    protected $table = 'animal_type';
    
    protected $fillable = ['animal_type_id','animal_name', 'status'];
    
    public function getAllAnimals($animalIdArr=NULL) {
        if(!empty($animalIdArr)){
          $animal = AnimalType::select('animal_type_id','animal_name', 'status')->where('status','=','Active')->whereIn('animal_type_id',$animalIdArr)->get();  
        }else{
          $animal = AnimalType::select('animal_type_id','animal_name', 'status')->where('status','=','Active')->get();  
        }

        $getData=$animal->toArray();
        if(!empty($getData)){
            return $getData;
        }else{
            return NULL;
        }
        
    }
   
}
