@extends('admin.master_layouts.master')
      
@section('content')
<script src="{{ asset('/admin/js/jquery-1.11.0.js') }}"></script>
  
  <!-- DataTables CSS -->
    <link href="{{ asset('/admin/css/plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
               <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Roles</h1>
                </div>
           	<!-- /.col-lg-12 -->
            </div>
            
             <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="{{ url('/admin/roles/addrole') }}" class="btn btn-sm  btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add New Service</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="services">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service Name</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       	<tr class="odd gradeX">
                                            	<td>1</td>
                                            	<td>s</td>
                                            	<td>s</td>
                                            	<td>s</td>
                                            	<td>s</td>
                                          </tr>
                                        <tr>
                                               <td  colspan="7"> There are no records.</td>
                                       </tr>
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



	 <!-- DataTables JavaScript -->
      <script src="{{ asset('/admin/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
      <script src="{{ asset('/admin/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
   
     <script>
       $(document).ready(function() {
            $('#services').DataTable({
            	"pagingType":"full_numbers",
            	 stateSave:true,
               });
        });
    </script>
@endsection