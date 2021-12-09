@extends('layouts.app')
@section('title')
    Add Test /  
@endsection
@section('content')
<title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="">    
                <br />
                <h3 align="center">Add psychometer</h3>
                <br />
                
              <div class="table-responsive">
                        <form method="post" id="dynamic_form">
  <input type="hidden" name="test_id" value="{{$id}}" >
                            <span id="result"></span>
                            <table width="100%" class="table table-bordered table-striped" id="user_table">
                          <thead>
                           <tr>
                              
                               <th >Question </th>
                               <th >Option 1</th>
                               <th >Option 2</th>
                               <th >Option 3</th>
                               <th >Option 4</th>
                               <th >Option 5</th>
                               <th >Action</th>
                           </tr>
                          </thead>
                          <tbody>
           
                          </tbody>
                          <tfoot>
                              <tr>
                                <td colspan="5" align="right">&nbsp;</td> <td>
                             @csrf
                             <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                     
                              </td>
                           </tr>
                          </tfoot>
                      </table>
                 </form>
              </div>
             </div>
            </body>
           </html>
           
           <script>
           $(document).ready(function(){
           
            var count = 1;
           
            dynamic_field(count);
           
            function dynamic_field(number)
            {
             html = '<tr>';
              
                   html += '<td><textarea type="text" name="question[]" class="form-control" cols="30" rows="5" /></td>';
                   html += '<td><textarea type="text" name="option1[]" class="form-control" cols="30" rows="3" /></td>';
                   html += '<td><textarea type="text" name="option2[]" class="form-control" cols="30" rows="3" /></td>';
                   html += '<td><textarea type="text" name="option3[]" class="form-control" cols="30" rows="3" /></td>';
                   html += '<td><textarea type="text" name="option4[]" class="form-control" cols="30" rows="3" /></td>';
                   html += '<td><textarea type="text" name="option5[]" class="form-control" cols="30" rows="3" /></td>';
       
                   if(number > 1)
                   {
                       html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                       $('tbody').append(html);
                   }
                   else
                   {   
                       html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                       $('tbody').html(html);
                   }
            }
           
            $(document).on('click', '#add', function(){
             count++;
             dynamic_field(count);
            });
           
            $(document).on('click', '.remove', function(){
             count--;
             $(this).closest("tr").remove();
            });
           
            $('#dynamic_form').on('submit', function(event){
                   event.preventDefault();
                   $.ajax({
                    url:'{{ url("dynamic-field/insert") }}',
                       method:'post',
                       data:$(this).serialize(),
                       dataType:'json',
                       beforeSend:function(){
                           $('#save').attr('disabled','disabled');
                       },
                       success:function(data)
                       {
                           if(data.error)
                           {
                               var error_html = '';
                               for(var count = 0; count < data.error.length; count++)
                               {
                                   error_html += '<p>'+data.error[count]+'</p>';
                               }
                               $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                           }
                           else
                           {
                               dynamic_field(1);
                               $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                           }
                           $('#save').attr('disabled', false);
                       }
                   })
            });
           
           });
           </script>

        </div>

    </div>
@endsection

