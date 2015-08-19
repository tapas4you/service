<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Request;
use App\Models\Animals;
use App\Helpers\Common;
use Input;
use Illuminate\Http\Request;


//use LaravelPusher;
class AnimalController extends Controller
{
   public function __construct(Request $req) {
    }
    
    public function showAllAnimals(){
        $oAnimals=new Animals();
        $getAllAnimals=$oAnimals->getAllAnimals();
        return view('admin.animals.index',compact('getAllAnimals'));
    }

    public function showAnimalModal(){
        $animalData=Input::all();
        $oAnimals=new Animals();
         
        $operation='create';$btnLabel='Save';$animalDetails='';
        $animalTypeId='';
        $getAllStatus = Common::getAllEnumValues('animal_type', 'status');
        $animalName='';$status='';
        if(!empty($animalData['animal_type_id'])){
            $animalTypeId=$animalData['animal_type_id'];
            $operation='edit';
            $btnLabel='Update';
            $animalDetails=$oAnimals->getAllAnimals($animalTypeId);
            $animalName=$animalDetails[0]['animal_name'];
            $status=$animalDetails[0]['status'];
         }
        return view('admin.animals.add_edit',compact('operation','animalTypeId','btnLabel','animalName','status','getAllStatus'));    
    }

    public function updateAnimals()
    {   
        $animalData=Input::all();
        if(isset($animalData) && sizeof($animalData)>0){
            $oAnimals=new Animals();
            $updateAnimals=$oAnimals->editAnimalDetails($animalData);
            echo $updateAnimals;die;
        }else{
            echo 'Something went wrong';die;
        }
    }

    public function createAnimals()
    {   
        $animalData=Input::all();
        if(isset($animalData) && sizeof($animalData)>0){
            $oAnimals=new Animals();
            $createAnimals=$oAnimals->addNewAnimals($animalData);
            echo $createAnimals;die;
        }else{
            echo 'Something went wrong';die;
        }
    }

     public function deleteAnimal(){
        $animalData=Input::all();
        if(isset($animalData) && sizeof($animalData)>0){
            $oAnimals=new Animals();
            $deleteStatus=$oAnimals->deleteAnimalDetails($animalData);
            echo $deleteStatus;die;
        }else{
            echo 'Something went wrong';die;
        }     
    }

}
