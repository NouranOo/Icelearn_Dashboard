@extends('commonmodule::layouts.master')
@section('title') الغياب
@endsection

@section('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        ابحث 
    </h1>

</section>
@endsection

@section('content')

<section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">البحث:</h3>
           <h3 class="box-title" style=" float: left; color: crimson;  font-weight: 900; ">U GROW</h3>
        </div>
        <div class="alert alert-danger attendance_error hidden"> <ul></ul></div>
        <!-- /.box-header -->
        <form class="form-horizontal" action="" method="Get">
        @csrf

            <div class="box-body">
             <div class="row">

             {{-- name --}}
                <div class="form-group col-sm-12" >
                
                    <label class="control-label col-sm-2" for="title">البحث:
                    </label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control"  name="search" id="searchinput" >

                                
                    </div>

                    <div class="col-sm-2">
                    <button type="" id="searchbtn" class="btn btn-primary pull-right">Search &nbsp; <i class="fa fa-search"></i></button>
       
                    </div>
                </div>
               
            </div>
           </div> 
            <!-- /.box-body -->
            <div class="box-footer">
                <!-- <a href="{{url('admin-panel')}}" type="button" class="btn btn-default">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a> -->
                <!-- <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button> -->
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</section>
<form class="" action="{{route('attendance.store')}}" method="POST">
            {{ csrf_field() }}  
<!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">الطلاب</h3>
                        <!-- <a href="" type="button"
                           class="btn btn-warning pull-right"><i class="fa fa-angle-left" aria-hidden="true"></i>
                            &nbsp;   رجوع</a> -->
                            <input type="hidden" name="subclasse_id" value="{{$subclasse->id}}">
                            <input type="hidden" name="classe_id" value="{{$subclasse->classe->id}}">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tableID" class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th> #</th>    
                                <th> الطالب</th>
                                <th>كود الطالب </th>
                                <th> الغياب</th>
                                <th> حذف</th>

 
                            </tr>
                            </thead>
                            <tbody>
                         
                            </tbody>
                        </table>
                    </div>
                 <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{url('/admin-panel/classes')}}" type="button" class="btn btn-danger">{{__('formIndex.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                <button type="submit" class="btn btn-primary pull-right">{{__('formIndex.submit')}} &nbsp; <i class="fa fa-save"></i></button>
            </div>
            <!-- /.box-footer -->
        </form>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('javascript')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script>

    $(function () {
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5({
                toolbar: {
                    "font-styles": true,
                    "emphasis": true,
                    "lists": true,
                    "html": true,
                    "link": true,
                    "image": false
                }
            });
    });

     ////ajax///

     document.onkeydown=function(){
            if(window.event.keyCode =='13'){
                search();
            }
        }
 
  
     $('#searchbtn').on('click',function(e){
        e.preventDefault();
         search();
      
     });


     function myFunction(data) {
            var element1, flag, table, tr, td, i, txtValue;
            var searchinput = $('#searchinput').val();

            element1 = data.barCode ;
            table = document.getElementById("tableID");
            tr = table.getElementsByTagName("tr");
            flag = 0;

           

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue == searchinput) {
                       
                        $('.attendance_error').removeClass('hidden');
                        $('.attendance_error ul').html(`<li>'هذا الطالب موجود بالفعل!'</li>`);
                            flag = 1;
                        }
                    }
                }
            

            if (!flag == 1) {
                flag = 0;
                var searchinput = $('#searchinput').val();

                if (searchinput != null) {
                    addRow('tableID',data);
                } else {
                    alert('الرجاء كتابه باركود الطالب !!');
                    return 0;
                }
            }
    }

     function search(){
      var searchinput = $('#searchinput').val();
      
     
     $.ajax({
             url: '{{ route('attendance.search') }}',
             method:'POST',
             data: {'search':searchinput, '_token':"{{csrf_token() }}"},
             success: function (data) {

                 if(data.data == null) {
                     $('.attendance_error').removeClass('hidden');
                     $('.attendance_error ul').html(`<li>${data.messages}</li>`);
                 }else{
                     

                     $('.attendance_error').addClass('hidden');
                     // toastr.success("تم اضافة العميل بنجاح", 'شكراً لك !');
                   
                       myFunction(data.data);
                    //    addRow('tableID',data.data);
                 }
             }
     });


 }

        function addRow(tableID ,data) {
        
       

            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            var row = table.insertRow(rowCount);

            // create cel 0
            var cell0 = row.insertCell(0);
            cell0.innerHTML = rowCount;

            //create cell 1
            var cell1 = row.insertCell(1);
            
            cell1.innerHTML = data.name ;
            cell1.appendChild(addHiddenInput(data.name , 'item['+rowCount+'][name]'));
            cell1.appendChild(addHiddenInput(data.id , 'item['+rowCount+'][id]'));


            // create cel 2
            var cell2 = row.insertCell(2);
            
            cell2.innerHTML = data.barCode ;
            cell2.appendChild(addHiddenInput( data.barCode, 'item['+rowCount+'][barCode]'));

         // create cel 3

         var elmentTrue = document.createElement("i");
            elmentTrue.className = 'fa fa-check';

            var cell3 = row.insertCell(3);
            var element3 = document.createElement("button");
            element3.type = "button";
            element3.appendChild(elmentTrue);
            element3.className = "btn  btn-success";
            cell3.appendChild(element3);

            cell2.appendChild(addHiddenInput('true', 'item['+rowCount+'][attandance]'));

            //create cell 3
            var elmentTrash = document.createElement("i");
            elmentTrash.className = 'fa fa-trash';
            var cell4 = row.insertCell(4);
            var element4 = document.createElement("button");
            element4.type = "button";
            element4.appendChild(elmentTrash);
            element4.className = "btn rm  btn-danger";
            cell4.appendChild(element4);

        }

        function addHiddenInput(value, name) {
            var store_hidden_input = document.createElement("input");
            store_hidden_input.type = "hidden";
            store_hidden_input.value = value;
            store_hidden_input.name = name;
            return store_hidden_input;
        }


        ////delete row////
        
        var table = document.getElementById('tableID');

        $(table).on("click", ".rm", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
        });

        
</script>
@endsection
