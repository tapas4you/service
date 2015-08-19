@extends('admin.master_layouts.master')

@section('content')
<script src="{{ asset('/admin/js/jquery-1.11.0.js') }}"></script>
<script src="{{ asset('/admin/js/admin.js') }}"></script> 

<script src="{{ asset('/admin/plugins/multiselect/js/bootstrap-multiselect.js') }}"></script> 

<!-- Include the plugin's CSS and JS: -->


<link rel="stylesheet" href="{{ asset('/admin/plugins/multiselect/css/bootstrap-multiselect.css') }}" type="text/css"/>

<!-- DataTables CSS -->
<link href="{{ asset('/admin/css/plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">{{ trans('service.services.lbl_assign_service') }}</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="alert alert-success" id="alertMessage" style="display:none"></div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      @if(!empty($showAddButton))
      <div class="panel-heading">
    
       <a href="javascript:void(0);" onclick="return addEditServiceAnimals('add','');" class="btn btn-sm  btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> {{ trans('service.services.lbl_assign_new_service') }}</a>
      
     </div>
      @endif
     <!-- /.panel-heading -->
     <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="services">
          <thead>
            <tr>
              <th>#</th>
              <th>Service Name</th>
              <th>Service Animals</th>
              <th>Status</th>
              <th>Date Added</th>
              <th>{{ trans('service.common.grid_operations') }}</th>
            </tr>
          </thead>
          <tbody>
           @if(isset($getAllServices) && is_array($getAllServices) && count($getAllServices) > 0)
          <?php $index = 0 ?>
           @foreach($getAllServices as $key => $value)
           <tr class="odd gradeX">
             <td>{{ $index + 1}}</td>
             <td>{{$value['service_name']}}</td>
             <td>{{$value['animal_list']}}</td>
             <td>{{$value['status']}}</td>
             <td>{{App\Helpers\Common::convertToUserTimeZone($value['date_added'])}}</td>
             <td><a href="javascript:void(0);" onclick="return addEditServiceAnimals('edit','{{$value['service_id']}}');" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> {{ trans('service.grid_functions.edit') }}</a>
              <a href="javascript:void(0);" onclick="return deleteServiceAnimal('{{$value['service_id']}}');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>{{ trans('service.grid_functions.delete') }}</a>
            </td>
          </tr>
            <?php $index++; ?>
          @endforeach
          @else
          <tr>
            <td  colspan="7"> {{ trans('service.common.err_no_records') }}</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->

  </div>
  <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- To use dialog box use the below code -->           
@include('popup_dialog')


<!-- DataTables JavaScript -->
<script src="{{ asset('/admin/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/admin/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
@if(isset($getAllServices) && is_array($getAllServices) && count($getAllServices) > 0)
<script>
 $(document).ready(function() {
  $('#services').DataTable({
   "pagingType":"full_numbers",
   stateSave:true,
 });

});
</script>
@endif
@endsection