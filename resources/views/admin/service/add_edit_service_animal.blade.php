<form class="form-horizontal" id="frmAddEditServicesAnimals" name="frmAddEditServicesAnimals">

    <div class="" id="alertService" style="display:none"></div>
    

    <div class="form-group">
    <label class="col-md-3 control-label">{{ trans('service.services.title') }}</label>
    <div class="col-md-8">
    @if(empty($serviceId))
    <select class="form-control" name="serviceId" id="service" >

        <option value="">{{ trans('service.services.lbl_service_animals_txt') }}</option>
         @foreach($getAllServices as $key=>$value)  
         @if(empty($existingServiceTypeArr[$value['service_id']]))  
          <option label="{{$value['service_name']}}"  value="{{$value['service_id']}}" 
          @if(isset($status) && $status==$value['service_id'])  selected="selected" @endif>{{$value['service_name']}}</option>         
          @endif 
       @endforeach 
    </select>
    @else
    <input type="hidden" name="serviceId" value="{{$serviceId}}">
    <input class="form-control " type="text"  value="{{$serviceName}}" disabled>
    {{-- <span>{{$serviceName}}</span> --}}

    @endif
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-3 control-label">{{ trans('service.services.lbl_service_animals') }}</label>
    <div class="col-md-8">
    <select class="form-control" name="animalId[]" id='animals' multiple="multiple">
        {{-- <option value="">{{ trans('service.services.lbl_status') }}</option> --}}
         @foreach($getAllAnimalType as $key=>$value) 
            @if(!empty($serviceId) && !empty($existingServiceTypeArr[$serviceId][$value['animal_type_id']]))
              <option label="{{$value['animal_name']}}"  value="{{$value['animal_type_id']}}" selected="selected">{{$value['animal_name']}}</option>          
       
            @else   
          <option label="{{$value['animal_name']}}"  value="{{$value['animal_type_id']}}" >{{$value['animal_name']}}</option>          
          @endif

       @endforeach 
    </select>
    </div>
    </div>

    
  <div class="form-group">
    <label class="col-md-3 control-label">&nbsp;</label>
    <div class="col-md-6">
     <button type="button" class="btn btn-primary" id="btnAddEditServices" onclick="javascript:void(0);return validateServiceAnimals('{{$operation}}','{{$serviceId}}');">{{$btnLabel}}</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
  </div>
</form>

   <script>
       $(document).ready(function() {
        

    $('#example-single').multiselect();

        });
    </script>