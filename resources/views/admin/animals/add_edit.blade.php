<form class="form-horizontal" id="frmAddEditAnimals" name="frmAddEditAnimals">
<input type="hidden"  id="animalTypeId" name="animalTypeId" value="{{$animalTypeId}}"/>
    <div class="" id="alertService" style="display:none"></div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ trans('service.animals.lbl_animalName') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="animalName" name="animalName" maxlength="20" placeholder="{{ trans('service.animals.lbl_animalName') }}" value="{{$animalName}}"/>
            </div>
     </div>

    <div class="form-group">
    <label class="col-md-2 control-label">{{ trans('service.animals.status') }}</label>
    <div class="col-sm-10">
    <select class="form-control" name="status" id='getStatus' >
        <option value="">{{ trans('service.animals.lbl_status') }}</option>
         @foreach($getAllStatus as $key=>$valStatus)    
          <option label="{{{$valStatus}}}"  value="{{{$valStatus}}}" 
          @if(isset($status) && $status==$valStatus)  selected="selected" @endif>{{$valStatus}}</option>          
       @endforeach 
    </select>
    </div>
    </div>

    
  <div class="form-group">
    <label class="col-md-2 control-label">&nbsp;</label>
    <div class="col-md-6">
     <button type="button" class="btn btn-primary" id="btnAddEditAnimals" onclick="javascript:void(0);return validateAnimals('{{$operation}}','{{$animalTypeId}}');">{{$btnLabel}}</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
  </div>
</form>