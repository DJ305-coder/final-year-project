@extends('admin.layout.layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<style>
   .table>tbody>tr>td {
      font-size: 16px !important;
   }
</style>
<div class="content-wrapper" >
   <!-- Main content -->
   <section class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>Dashboard</h1>
      </section>
      <!-- Info boxes -->
      <div class="col-md-12 no-pad">
         <div class="box box-primary">
            <div class="box-body"  style="min-height:480px">
               <div class="row">
                  <div class="col-md-4">
                     <div class="dashboard-box">
                        <div>
                        <div>
                     </div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4"></div>
               </div>
              
            </div>
         </div>
      </div>


   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
   $(".s_menu").removeClass("active");
   $(".dashboard_active").addClass("active");
</script>
@endsection