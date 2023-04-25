<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <?php 
            include 'test.php';
            // $data = getDataByID("C-00003");
            if(isset($_GET['id'])){
                    $data = getDataByID($_GET['id']);
                     // echo '<script type="text/javascript">
                     //    alert("'.$_POST['id'].'");
                     //    </script>';
            }
            else{
                    echo 'fail';
            }
    ?>
    <div class="header">
        <p>Rechercher un contact</p>
    </div>
    <div class="content">
        <div class="block" style="position: relative;padding: 15px;" >
            <div class="text-line">Mathieu 
                <b>BOMPART</b>
                <!-- <button class="btn-edit">Editer</button> -->
               <!--  <form action="../infoDetail.php?id=<?php echo $_GET['id'];?>" method="post">
                        <a class="btn-edit">Editer</button>
                    </form> -->
                <a href="infoDetail.php?id=<?php echo $_GET['id'];?>" class="btn-edit" type="submit">Editer</a>
            </div>
            
        </div>
        
        <div class="block">
            <div class="info">
                <p>IFNORMATION</p>
                <hr>
                <div class="content-inf">
                    
                    <table >
                        <tr>
                            <td class="title-rc">Prenom &NOM</td>
                            <td><?php echo $data['nom'];?></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Telephone</td>
                            <td><?php echo $data['tel'];?></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Email</td>
                            <td><?php echo $data['email'];?></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Address</td>
                            <td><?php echo $data['adresse'];?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>