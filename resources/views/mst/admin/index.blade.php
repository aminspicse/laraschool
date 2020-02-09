
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Users <a href="#createnewuser" id="newuser">Create New User</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="usertable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>User Code</th>
                        <th>Auth Code</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $data)
                    <tr> 
                        <td>{{$i++}}</td>
                        <td>{{$data->id}}</td>
                        <td>{{$data->auth_code}}</td>
                        <td>{{$data->user_name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->inst_address}}</td>
                        <td>
                            <input type="text" value="{{$data->id}}" class="user_id">
                            <a href="{{url('/admin/show/')}}/{{$data->id}}" id="admin_show" title="View" class="btn btn-info">
                                <span class="fa fa-eye"></span>
                            </a>
                            <button id="btn">Click</button>
                            <a href="#" id="admin_delete" onclick="deletedata({{$data->id}})" 
                            title="Inactive" class="btn btn-danger admin_delete">
                                
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                        <th>SL</th>
                        <th>User Code</th>
                        <th>Auth Code</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
            <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='{{url("public/image/loading.gif")}}' width="300px" height="300px" /><br>Loading..</div>
    </div>
    <!-- /.box -->
    <script>
        $(document).ready(function(){
		  $("#newuser").click(function(){
            $("#wait").css("display", "block");
			$("#content_warper").load("{{url('/admin/create')}}");
		  });
         
		});
       
    $(function () {
        $('#usertable').DataTable();
    });

    //var url= {{url('admin/delete/')}};
        function deletedata(id){
        /*    $.ajax({
                type: "GET",
                url: "admin/delete/"+id,
                data: id:id,
                success: function(response){
                    alert("delete success");
                }
            });
            */
            alert(url);
        }

    </script>