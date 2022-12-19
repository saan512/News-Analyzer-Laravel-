@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Manage Results')

@section('content')

<div class="container">
    <h3>Manage Database News Records</h3>
    <a style="margin-bottom: 10px" class="btn btn-primary delete_all" href="{{ url('admin.deleteSelectedResults') }}">Delete All Selected</a>
    <table class="table table-bordered">
        <tr>
            <th width="50px"><input type="checkbox" id="master"></th>
            <th>ID</th>
            <th>News</th>
            <th>Sentiments</th>
            <th width="100px">Action</th>
        </tr>
        @if($scraped_data_english->count())
            <span style="display:none">{{ $i=0 }}</span>
                            
           
            @foreach($scraped_data_english as $data)
                <tr id="tr_{{$i++}}">
                    <td><input type="checkbox" class="sub_chk" data-id="{{$i}}"></td>
                    <td>{{ $i }}</td>
                    <td>{{ $data }}</td>
                    <td>{{ $sentiments_english[$loop->index] }}</td>
                    <td>
                         <a href="{{ url('admin.deleteResultEng', $id) }}" class="btn btn-danger btn-sm"
                           data-tr="tr_{{$i}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            
        @endif
    </table>
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });

</script>


@endsection