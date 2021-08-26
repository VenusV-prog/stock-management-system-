<?php
  session_start();
  if(!isset($_SESSION['role']))
  header("Location: index.php");
  // include ('login2.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/fonts/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/jquery-ui-1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/jquery-ui-themes-1.12.1/themes/flick/jquery-ui.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark container-fluid d-flex justify-content-between" style="height:43px; background-color: rgb(40, 44, 21);">
        <!-- Brand -->
      <nav>
        <a class="navbar-brand" href="#" style="font-size: 15px;">Stock Management</a>
        <button id="btnside" class="btn btn-sm btnSideBa openbtn closebtn ml-5" type="button" style="background:none" aria-hidden="true"><i class="fa fa-list text-white font-weight-bold"style="font-size:20px;" aria-hidden="true"></i></button>
      </nav>
      
      <nav class="navbar navbar-expand-sm text-white"> 
      <?php echo 'Welcome '.$_SESSION['user_name'];?>
        <a class="nav-link text-white" href="#"><h3 class="text-primary"><i class="fa fa-user" style="font-size:20px;" aria-hidden="true"></i></h3></a>
        <h3><a href="logout.php">Logout</a></h3>
      </nav>
      
    </nav>
    
    <div class="container-fluid">
        <div class="row"><br>
            <div class="sidebar col-2 mt-2" id="div1" style="background-color: #1e2331;"><br>
              <h3 class="text-white">WELCOME</h3>
              <h3 class="text-white"><?php echo $_SESSION['user_name'];?></h3>
                <div id="accordion" >
                    <div id="a0" class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne">
                                <div id="div0" class="d-flex justify-content-between m-2">
                                    <span class="text-primary"><i class=""></i> Articles</span><i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="articles.php" class="text-dark">Add Articles</a> </li> 
                                <li class="list-group-item"><a href="#" class="text-dark"> list articles</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     
                    <div id="a0"class="card">
                            <div class="card-header">
                           <a  class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                               <div id="div0" class="d-flex justify-content-between m-2">
                                   <span ><i class=""></i> Sales</span><i class="fas fa-chevron-right"></i>
                                </div>
                           </a>
                           </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item"><a href="#" class="text-dark"> Sale</a></li> 
                                      <li class="list-group-item"><a href="#" class="text-dark"> Receipt</a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

<div class="container">
    <h2 class="text-center mt-5 text-primary">POINT OF SALE</h2>
    <hr class="">
    <form action="" class="mt-5">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="my-addon">Client name</span>
            </div>
            <input class="form-control" type="text" name="" placeholder="" aria-label="" aria-describedby="">
        </div>
    </form> <br>
  <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center">Select field</th>
            <th class="text-center ui-widget"> Product Name</th>
            <th class="text-center"> Stock </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center">Date of sale</th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td><h4><input type="checkbox" class="ml-4" id="target"></h4></td>
            <td><input type="text" name="product[]"  placeholder="Enter Product Name" class="form-control article_input" for="tags" id="product_"/></td>
            <td><input type="number" name="stock" placeholder="stock" class="form-control stock_input" step="0" min="0" readonly/></td>
            <td><input type="number" name="qty[]" placeholder="Enter Qty" class="form-control qty" step="0" min="0" id="stock_"/></td>
            <td><input type="number" name="price[]" placeholder="Unit Price" class="form-control price price_input" step="0.00" min="0" id="price_" readonly/></td>
            <td><input type="date" name='' placeholder='' class="form-control"/></td>
            <td><input type="number" name="total[]" placeholder="0.00" class="form-control total" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <input id="add_row" class="btn btn-success pull-left mb-4" value="Add row" type="submit">
      <input id='delete_row' class="pull-right btn btn-danger mb-4"  value="Delete row" type="submit">
    </div>
  </div>
    <div class="row clearfix" style="margin-top:20px">
        <div class="col-md-6"></div>
        <div class=" col-md-6 d-flex justify-content-end">
            <table class="table table-bordered table-hover" id="tab_logic_total">
                <tbody class="">
                <tr>
                    <th class="text-center">Total</th>
                    <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-5">
        <button type="submit" class="btn btn-info mr-5" value="Print"> Print </button>
        <input type="submit" class="btn btn-success mr-5" value="Register" name="submit">
    </div>
</div>
 





<script type="text/javascript" src="vendor/js/jquery.min.js"></script>
<script type="text/javascript" src="vendor/js/popper.min.js"></script>
<script type="text/javascript" src="vendor/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/fonts/js/all.js"></script>
<script type="text/javascript" src="vendor/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="vendor/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script>
  $("#btnside").click(function(){
      $("#div1").toggle("slide",300);
  });
</script>

<script>
  $(document).ready(function(){
    var i = 0;
    $(document).on('click', '#add_row', function() {
        i += 1;
      	$('#addr'+i+1).html($('#addr'+i+1).html()).find('td:first-child').html(i);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"><td>'+(i+1)+'</td><td><h4><input type="checkbox" class="ml-4" id="target"></h4></td><td><input type="text" name="product[]"  placeholder="Enter Product Name" class="form-control article_input" for="tags" id="product_'+(i+1)+'"/></td><td><input type="number" name="stock" placeholder="stock" class="form-control stock_input" step="0" min="0" id="stock_'+(i+1)+'" readonly/></td><td><input type="number" name="qty[]" placeholder="Enter Qty" class="form-control qty" step="0" min="0"/></td><td><input type="number" name="price[]" placeholder="Unit Price" class="form-control price price_input" id="price_'+(i+1)+'" step="0.00" min="0" readonly/></td><td><input type="date" class="form-control"/></td><td><input type="number" name="total[]" placeholder="0.00" class="form-control total" readonly/></td></tr>');
  	});
    
    //   $(document).on('change', 'article_input', function() {
    //     $.get( "search.php", function(data) {
    //       $(".article_input").autocomplete({
    //             source: JSON.parse(data),
    //             autoFocus: true,
    //             minLength: 1,
    //             select:function(event, ui){
    //               alert(i)
    //               var selected = ui.item.value;
    //               var splitted = selected.split("|");
    //               var name = splitted[0];
    //               var stock = splitted[1];
    //               var price = splitted[2];
    //               $("#product_"+i).val(name);
    //               $('#stock_'+i).val(stock);
    //               $("#price_"+i).val(price);
                  
    //           } 
    //       }); 
    //     });
    // });

    $( "#add_row").on( "click", function() {
      alert(i)
     $.get( "search.php", function(data) {
       $(".article_input").autocomplete({
          source: JSON.parse(data),
          autoFocus: true,
          minLength: 1,
          select:function(event, ui){
            var selected = ui.item.value;
            var splitted = selected.split("|");
            var name = splitted[0];
            var stock = splitted[1];
            var price = splitted[2];
            $("#product_"+i).val(name);
            $('#stock_'+i).val(stock);
            $("#price_"+i).val(price);
          } 
       });
     });
   });


    $("#delete_row").click(function(){
    	if(i>1){
		    $("#addr"+(i-1)).html('');
		    i--;
		  }
		   calc();
	  });
	
    $('#tab_logic tbody').on('keyup change',function(){
    	calc();
    });
    $('#tax').on('keyup change',function(){
    	calc_total();
    });
    
	});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}
</script>

<script>
   
   $(function() {
    //  $.get( "search.php", function(data) {
      //var parent = $(".article_input").parent().parent().attr("id");
      // function changeClass(){
      //   document.getElementById("addr1").className = "article_input";
      // }
      // $("#"+ parent +" .article_input").autocomplete({
      //     source: JSON.parse(data),
      //     autoFocus: true,
      //     minLength: 1,
      //     select:function(event, ui){
      //       var selected = ui.item.value;
      //       var splitted = selected.split("|");
      //       var name = splitted[0];
      //       var stock = splitted[1];
      //       var price = splitted[2];
      //       $("#product_'+(i+1)+'").val(name);
      //       $('#stock_'+i).val(stock);
      //       $("#price_'+(i+1)+'").val(price);
      //   } 
      // }); 
    //});
     
     // $.ajax({
     //   type: "POST",
     //   url: "search.php",
     //   datatype : 'json',
     //   data: {
     //     'var1':data2,
     //     'var2':data3,
     //   },
     //   success: function(data2){
     //     $(".stock_input").autocomplete({
     //       source: JSON.parse(data.data2),
     //     });
     //     $(function (data3){
     //       $(".price_input").autocomplete({
     //         source: JSON.parse(data.data3),
     //       });
     //     })
     //   }
     // });
   });

  
 </script>

</body>
</html>