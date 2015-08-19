<form class="form-horizontal" id="frmAddEditServices" name="frmAddEditServices">
<input type="hidden"  id="serviceId" name="serviceId" value="{{$serviceId}}"/>
    <div class="" id="alertService" style="display:none"></div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ trans('service.services.lbl_serviceName') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="serviceName" name="serviceName" maxlength="20" placeholder="{{ trans('service.services.lbl_serviceName') }}" value="{{$serviceName}}"/>
            </div>
     </div>

    <div class="form-group">
    <label class="col-md-2 control-label">{{ trans('service.services.status') }}</label>
    <div class="col-sm-10">
    <select class="form-control" name="status" id='getStatus' >
        <option value="">{{ trans('service.services.lbl_status') }}</option>
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
     <button type="button" class="btn btn-primary" id="btnAddEditServices" onclick="javascript:void(0);return validateServices('{{$operation}}','{{$serviceId}}');">{{$btnLabel}}</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
  </div>
</form>