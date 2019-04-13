@extends("admin._layout")

@section("title")
ادارة التصنيفات
@endsection



@section("content")
<form class="row DTForm">
    <div class="col-sm-4">
      <input type="text" autofocus name="q" placeholder="كلمة البحث" class="form-control" />
    </div>
    <div class="col-sm-2">
        <select class="form-control" name="active">
            <option value="">جميع الحالات</option>
            <option value="1">فعال</option>
            <option value="0">غير فعال</option>
        </select>
    </div>
    
    <div class="col-sm-2">
      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> بحث</button>
    </div>
    <div class="col-sm-4 text-right">
    <a class="btn btn-success Popup" title="اضافة تصنيف جديد" href="/admin/categoryajax/create">
        <i class="fa fa-plus"></i> اضافة</a>
    </div>
</form> 

<table id="tblAjax" class="table table-striped table-hover">
    <thead>
        <tr><th>التصنيف</th><th width="12%">فعال؟</th><th width="20%">تاريخ الانشاء</th>
            <th width="12%"></th>
        </tr>
    </thead>
    <tbody>
        
        
        </tbody>
</table>

@endsection

@section("css")    
        <link href="/metronic-rtl/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
        <style>
        table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting{
			padding-right:15px;
		}
        </style>
@endsection()

@section("js")
    <script src="/metronic-rtl/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/metronic-rtl/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/metronic-rtl/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

    <script>
        var oTable;
        $(function(){
            //$(".cbActive").click(function(){            
            $(document).on("click",".cbActive",function(){
                var id=$(this).val();
                $.get("/admin/categoryajax/active/"+id,function(json){
                    ShowMessage(json.msg,"ادارة التصنيفات");
                    //alert(json.msg);
                },"json");
            });
            BindDataTable(); 
            $(".DTForm").submit(function(){
                BindDataTable(); 
                return false;
            });
        });
        
        //هذه تختلف حسب الصفحة
        function BindDataTable() {
           oTable = $('#tblAjax').dataTable(
           {
			   language: {
               aria: {
						sortAscending: ": فعال لترتيب العمود تصاعديا", sortDescending: ": فعال لترتيب العمود تنازليا"
					}
					, emptyTable:"لا يوجد بيانات لعرضها", info:"عرض _START_ الى _END_ من _TOTAL_ صف", infoEmpty:"لا يوجد نتائج لعرضها", infoFiltered:"(filtered1 من _MAX_ اجمالي صفوف)", lengthMenu:"_MENU_ صف", search:"بحث", zeroRecords:"لا يوجد نتائج لعرضها",
					paginate:{sFirst:"الاول",sLast:"الاخير",sNext:"التالي",sPrevious:"السابق"}
				},
               "iDisplayLength": 10,
               "sPaginationType": "full_numbers",
               "bFilter": false,
               "bDestroy": true,
               "bSort": true,
			   "bStateSave": true,
               "columnDefs": [ {
                   "targets": 3,
                   "orderable": false
               } ],
 		       "order": [[ 1, "asc" ]],
               serverSide: true,
               columns: [                       
                       { data: 'name', name: 'name' },
                       //{ data: 'active', name: 'active' },
                       {
                           name: 'active', "render": function (data, type, row) {
                               return "<input class='cbActive' value='"+row["id"]+"' type='checkbox' "+(row["active"]?"checked":"")+" />";
                           }
                       },
                       { data: 'created_at', name: 'created_at' },                                       
                       {
                           name: 'buttons', "render": function (data, type, row) {
                               return "<a title='تعديل تصنيف' href='/admin/categoryajax/" + row["id"] + "/edit' class='btn btn-primary Popup btnEdit btn-xs'><i class='glyphicon glyphicon-edit'></i></a> "                              
                               + " <a href='/admin/categoryajax/" + row["id"] + "/delete' class='btn Confirm btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a>";
                           }
                       }
               ],
               ajax: {
                   type: "POST",
                   contentType: "application/json",
                   url: '/admin/categoryajax/AjaxDT',
                   data: function (d) {
					   d._token="{{csrf_token()}}";
                       d.q = $("[name=q]").val();
                       d.active = $("[name=active]").val();
                       return JSON.stringify(d);
                   }
               }
           });
        }

</script>
@endsection


