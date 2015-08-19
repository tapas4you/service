<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Request;
use App\Models\Service;
use App\Models\ServiceTypes;
use App\Models\AnimalType;
use App\Helpers\Common;
use Input;
use Illuminate\Http\Request;


//use LaravelPusher;
class ServiceController extends Controller
{
   public function __construct(Request $req) {
    }
    
    public function showAllSerivces(){
        $oService=new Service();
        $getAllServices=$oService->getAllServices();
        return view('admin.service.index',compact('getAllServices'));
    }

    public function showServiceModal(){
        $serviceData=Input::all();
        $oService=new Service();
         
        $operation='create';$btnLabel='Save';$serviceDetails='';
        $serviceId='';
        $getAllStatus = Common::getAllEnumValues('service', 'status');
        $serviceName='';$status='';
        if(!empty($serviceData['service_id'])){
            $serviceId=$serviceData['service_id'];
            $operation='edit';
            $btnLabel='Update';
            $serviceDetails=$oService->getAllServices($serviceId);
            $serviceName=$serviceDetails[0]['service_name'];
            $status=$serviceDetails[0]['status'];
         }
        return view('admin.service.add_edit',compact('operation','serviceId','btnLabel','serviceName','status','getAllStatus'));    
    }

    public function updateServices()
    {   
        $serviceData=Input::all();
        if(isset($serviceData) && sizeof($serviceData)>0){
            $oService=new Service();
            $updateService=$oService->editServiceDetails($serviceData);
            echo $updateService;die;
        }else{
            echo 'Something went wrong';die;
        }
    }

    public function createServices()
    {   
        $serviceData=Input::all();
        if(isset($serviceData) && sizeof($serviceData)>0){
            $oService=new Service();
            $createService=$oService->addNewService($serviceData);
            echo $createService;die;
        }else{
            echo 'Something went wrong';die;
        }
    }

    public function deleteService(){
        $serviceData=Input::all();
        if(isset($serviceData) && sizeof($serviceData)>0){
            $oService=new Service();
            $deleteService=$oService->deleteServiceDetails($serviceData);
            echo $deleteService;die;
        }else{
            echo 'Something went wrong';die;
        }     
    }
    
    public function updateServiceAnimals()
{   
    $serviceTypeData =Input::all();
    // var_dump($serviceTypeData);
    if(isset($serviceTypeData) && sizeof($serviceTypeData)>0){
        $oServiceTypes=new ServiceTypes();
        $updateService=$oServiceTypes->updateServiceTypeData($serviceTypeData);
        echo $updateService;die;
    }else{
        echo 'Something went wrong';die;
    }
}

public function showAllSerivcesAnimals(){
    $oService =new Service();
    $oServiceTypes = new ServiceTypes();
    $oAnimalType = new AnimalType();
    $getAllServices = $oService->getAllServices();
    $getAllServiceTypes = $oServiceTypes->getAllServiceAnimals();
    if(!empty($getAllServiceTypes)){
        $animalIdArr = array_pluck($getAllServiceTypes,'animal_type_id');
        $getAllAnimalType = $oAnimalType->getAllAnimals($animalIdArr);

    }
    if(!empty($getAllAnimalType)){
        foreach ($getAllAnimalType as $key => $value) {
         $animalTypeData[$value['animal_type_id']] = $value;
     }
 }

 if(!empty($getAllServiceTypes)){
    foreach ($getAllServiceTypes as $key => $value) {
        $existingServiceTypeArr[$value['service_id']][$value['animal_type_id']] = $value;
    }
}
$showAddButton = true;
if(!empty($existingServiceTypeArr)){
    if(count($existingServiceTypeArr) == count($getAllServices)){
     $showAddButton = false;
 }
}
foreach ($getAllServices as $key => $value) {
 $serviceId = $value['service_id'];
 $serviceAnimalList = null;
 if(!empty($existingServiceTypeArr[$serviceId])){
    foreach ($existingServiceTypeArr[$serviceId] as $serviceTypeKey => $serviceType) {
     $animalId =  $serviceType['animal_type_id'];
     if(!empty($animalTypeData[$animalId])){
        $serviceAnimalList[] = $animalTypeData[$animalId]['animal_name'];
    }
}

}
if(!empty($serviceAnimalList)){
    $getAllServices[$key]['animal_list'] = implode($serviceAnimalList,',');
}else{
  unset($getAllServices[$key]);
}
}

    // dd($getAllServices);
return view('admin.service.service_animal',compact('getAllServices','showAddButton'));
}

public function showServiceAnimalsModal(){
    $serviceData=Input::all();
    $oService=new Service();
    $oServiceTypes = new ServiceTypes();
    $oAnimalType = new AnimalType();
    $operation='create';$btnLabel='Save';$serviceDetails='';
    $serviceId='';
    $getAllStatus = Common::getAllEnumValues('service', 'status');
    $serviceName='';$status='';
    $getAllServices = $oService->getAllServices();
    $getAllAnimalType = $oAnimalType->getAllAnimals();
    $getAllServiceTypes = $oServiceTypes->getAllServiceAnimals();
    $existingServiceTypeArr = null;
    if(!empty($getAllServiceTypes)){
        foreach ($getAllServiceTypes as $key => $value) {
            $existingServiceTypeArr[$value['service_id']][$value['animal_type_id']] = $value;
        }
    }
    // dd($existingServiceTypeArr);
    if(!empty($serviceData['service_id'])){
        $serviceId=$serviceData['service_id'];
        $operation='edit';
        $btnLabel='Update';
        $serviceDetails=$oService->getAllServices($serviceId);
        
        $serviceName=$serviceDetails[0]['service_name'];
        $status=$serviceDetails[0]['status'];
    }
    return view('admin.service.add_edit_service_animal',compact('operation','existingServiceTypeArr','getAllAnimalType','getAllServices','serviceId','btnLabel','serviceName','status','getAllStatus'));    
}

public function deleteServiceAnimal(){
     $serviceData=Input::all();
     if(!empty($serviceData)){
        $oServiceTypes = new ServiceTypes();
        $updateService = $oServiceTypes->deleteServiceAnimal($serviceData);
        echo $updateService;die;
    }else{
        echo 'Something went wrong';die;
    }

}

}
