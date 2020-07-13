<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="datepicker/moment.js"></script>
	  <script type="text/javascript" src="datepicker/daterangepicker.js"></script>
	  <link rel="stylesheet" type="text/css" href="datepicker/daterangepicker-bs3.css" />
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
      <link href="style.css" type="text/css"  rel="stylesheet">
	  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      
    <title>Upis gosta</title>
</head>
<body>
<div class="container-fluid ">
    <div class="row  justify-content-center">
        <h1 class="pb-3">Unos podataka o računu</h1>
    </div>
    <form name="unos_gosta" method="POST" action="bill_data_preview.php">
        <div class="row justify-content-around text-center ">
            <div class="col-6 border shadow editor">
                <p class="mt-4">Ime gosta</p>
                <input type="text" name="cust_name">
                <hr/>
                <p class="mt-4">Ima li gost ljubimca?</p>
                <label for="1">Da</label>
                <input type="radio" name="pet" value="1">
                <label for="0" >Ne</label>
                <input type="radio" name="pet" value="0" >
                <hr>
                <p>Iznos akontacije:</p>
                <input type="text" name="akontacija">
                <hr>
                <p>Jedinicna cijena:</p>
                <input type="number" name="unit_price">
                <hr>
                <p>Odaberi datume!</p>
                <div class="row justify-content-center m-4">
                    <fieldset>
                      <div class="control-group">
                        <div class="controls">
                        <div class="input-prepend input-group">
                          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                          <input required type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" autocomplete="off"  placeholder="Choose your dates" /> 
                        </div>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <input type="submit" value="Unesi" class="btn btn-primary m-4">
                
            </div>
        </div>  
    </form>
    <div class="row justify-content-around mt-4">
      <div class="col-6 text-center">
        <a href="guest_evidention.php" class="btn btn-secondary">Povratak na početak</a>
      </div>
    </div>
</div>
    <?php
    ?>
     <!-- Optional JavaScript -->
    <!--Datepicker-->
    <script type="text/javascript">
	 		var today = new Date();
            var tomorow = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();

			if (dd < 10) {
			  dd = '0' + dd;
			}

			if (mm < 10) {
			  mm = '0' + mm;
			}
			var sd = dd + 1;
			today = dd + '-' + mm + '-' + yyyy;
			tomorow = sd + '-' + mm + '-' + yyyy;	
			
			$('#reservation').daterangepicker(
			  { 
			  	format: "DD-MM-YYYY",
			  	startDate:today,
			  	endDate:tomorow,
			    minDate: today,
			  },
			  function(start, end, label) {
			  }
			);
	</script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
</body>
</html>