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
    <title>Evidnecija gostiju</title>
</head>
<body>
    <?php
    require('db.php');
    $sql_bill = 'SELECT * FROM bill;';
    $conn = db();
    $result = $conn->query($sql_bill);
    ?>
<div class="container-fluid ">
    <div class="row  justify-content-center">
        <h1 class="pb-3 mb-4">Evidnecija gostiju</h1>
    </div>
    <div class="row justify-content-around">
        <div class="col-8">
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">ID računa</th>
                <th scope="col">Ime i prezime gosta</th>
                <th scope="col">Ima li gost ljubimca?</th>
                <th scope="col">Akontacija</th>
                <th scope="col">Jedinična cijena</th>
                <th scope="col">Datum dolaska</th>
                <th scope="col">Datum odlaska</th>
                <th scope="col">Printanje</th>
                </tr>
            </thead> 
            <tbody>
            <?php 
            foreach($result as $r){
                $date_from = new DateTime($r['date_from']);
                $date_from = $date_from->format('d.m.Y');
                $date_to= new DateTime($r['date_to']);
                $date_to = $date_to->format('d.m.Y');
                echo '<tr>
                        <th scope="row">'.$r['id'].'</th>
                        <td>'.$r['guest_name'].'</td>
                        <td>'.$r['has_pet'].'</td>
                        <td>'.$r['accontation'].'</td>
                        <td>'.$r['unit_price'].'</td>
                        <td>'.$date_from.'</td>
                        <td>'.$date_to.'</td>
                        <td><a href = "bill_print.php?id_bill='.$r['id'].'" target="_blank">PDF</a></td>
                </tr>';
            }
            ?>
            </tbody>
            </table>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-8 text-center">
            <a href="cust_signin.php" class="btn btn-secondary">Unesi novog gosta</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>