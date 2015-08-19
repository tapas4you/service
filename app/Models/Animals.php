<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Request;
use Redirect;
use App\Helpers\Common;
class Animals extends Model
{
   

    protected $primaryKey = 'animal_type_id';
    
    public $timestamps = false;
    
    protected $table = 'animal_type';
    
    protected $fillable = ['animal_type_id','animal_name', 'status','date_added'];
    
    public function getAllAnimals($animalTypeId=NULL) {
        if(!empty($animalTypeId)){
          $animals = Animals::select('animal_type_id','animal_name','status','date_added')->where('animal_type_id',$animalTypeId)->get();  
        }else{
          $animals = Animals::select('animal_type_id','animal_name','status','date_added')->orderBy('animal_name','asc')->get();  
        }
        $getData=$animals->toArray();
        if(!empty($getData)){
            return $getData;
        }else{
            return NULL;
        }
        
    }
    
    public function editAnimalDetails($animalData){
        $newAnimalName=$animalData['animalName'];
        $checkAnimalExist=Animals::where('animal_name',$newAnimalName)->get();
        $checkAnimals=$checkAnimalExist->toArray();
         if(is_array($checkAnimals) && sizeof($checkAnimals)>0 && $animalData['animalTypeId']!=$checkAnimals[0]['animal_type_id']){
                return 'animal_name_exist';die; 
         }else{
         	if(empty($animalData['animalName']) || empty($animalData['status'])){
                return 'input_required';die;
            }
            $txn=DB::transaction(function ($animalData) use ($animalData){
                    try{
                        if(!empty($animalData['animalTypeId'])){
                            $updateanimalData=Animals::where('animal_type_id',$animalData['animalTypeId'])
                                            ->update(['animal_name'=>$animalData['animalName'],'status'=>$animalData['status']]);
                        }else{

                        }

                    }catch(ValidationException $e){

                    }
            });
            return 'success';die;
        }
    }

    public function addNewAnimals($animalData){
        $newAnimalName=$animalData['animalName'];
        $checkAnimalExist=Animals::where('animal_name',$newAnimalName)->get();
        $checkAnimals=$checkAnimalExist->toArray();

        if(is_array($checkAnimals) && sizeof($checkAnimals)>0){
            return 'animal_name_exist';die; 
        }else{
        	if(empty($animalData['animalName']) || empty($animalData['status'])){
                return 'input_required';die;
            }
            $txn=DB::transaction(function ($animalData) use ($animalData){
                try{
                       $addTabData=Animals::insertGetId(['animal_name'=>$animalData['animalName'],'status'=>$animalData['status'],
                                    'date_added'=>Common::InsertDBDateNow()]); 
                 }catch(ValidationException $e){

                }
            });
            return 'success';die;
            
        }
    }

    public function deleteAnimalDetails($animalData){
        $delete = Animals::where('animal_type_id', $animalData['animalTypeId'])->delete();
        if($delete){return 'success';}else{return 'failed';}
    }
}
