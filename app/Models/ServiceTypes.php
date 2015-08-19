<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Request;
use Redirect;
use App\Helpers\Common;
class ServiceTypes extends Model
{

    protected $primaryKey = 'animal_service_id';
    
    public $timestamps = false;
    
    protected $table = 'service_type';
    
    protected $fillable = ['service_id','animal_type_id', 'date_added','status'];
    
    public function getAllServiceAnimals($serviceId=NULL) {
        if(!empty($serviceId)){
          $services = ServiceTypes::select('animal_service_id','service_id','animal_type_id', 'date_added','status')->where('status','=','Active')->where('service_id',$serviceId)->get();  
      }else{
          $services = ServiceTypes::select('animal_service_id','service_id','animal_type_id', 'date_added','status')->where('status','=','Active')->orderBy('date_added','asc')->get();  
      }

      $getData=$services->toArray();
      if(!empty($getData)){
        return $getData;
    }else{
        return NULL;
    }

}


public function updateServiceTypeData($serviceTypeData){
    try {
     $result = DB::transaction(function ($serviceTypeData) use ($serviceTypeData) {
        $serviceId=!empty($serviceTypeData['serviceId'])?$serviceTypeData['serviceId']:null;
        $animalIdArr=!empty($serviceTypeData['animalId'])?$serviceTypeData['animalId']:null;

        if(!empty($animalIdArr) && !empty($serviceId) && is_array($animalIdArr)){
            $existingServiceType = ServiceTypes::where('service_id',$serviceId)->get()->toArray();
            $existingServiceTypeArr  = null;
            if(!empty($existingServiceType)){
                foreach ($existingServiceType as $key => $value) {
                    $existingServiceTypeArr[$value['service_id']][$value['animal_type_id']] = $value;

                }
                $updateData['status'] = 'Delete';
                ServiceTypes::where('service_id',$serviceId)->update($updateData);

            }

            foreach ($animalIdArr as $key => $animalId) {
                $insertData['service_id'] = $serviceId;
                $insertData['animal_type_id'] = $animalId;
                $insertData['date_added'] = Common::InsertDBDateNow();
                $insertData['status'] = 'Active';
                if(!empty($existingServiceTypeArr[$serviceId][$animalId])){
                    $status = $existingServiceTypeArr[$serviceId][$animalId]['status'];
                    $animal_service_id = $existingServiceTypeArr[$serviceId][$animalId]['animal_service_id'];

                    $result =   ServiceTypes::where('animal_service_id',$animal_service_id)->update($insertData);

                }else{
                    $result =ServiceTypes::insertGetId($insertData);

                }
                                      // var_dump($result);
            }
        }
     //       dd($existingServiceTypeArr);
    });
}
catch(ValidationException $e){

                }
return 'success';
}

public function deleteServiceAnimal($serviceTypeData){
    // dd($serviceTypeData);
    // $result = 'failed';
    if(!empty($serviceTypeData['serviceId'])){

      $updateData['status'] = 'Delete';
      $result = ServiceTypes::where('service_id',$serviceTypeData['serviceId'])->update($updateData);
    return 'success';
  }
  return 'failed';
}
}
