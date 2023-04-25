<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>
<body>
    <div class="header">
        <p>Rechercher un contact</p>
    </div>
    <div class="content">
        <div class="block" style="position: relative;padding: 15px;" >
            <div class="text-line">Mathieu 
                <b>BOMPART</b>
                <button class="btn-edit">
                    Editer
                </button>
            </div>
            
        </div>
        
        <div class="block">
            <div class="info">
                <p>EDITION</p>
                <hr>
                <form action="#" method="post">
                <div class="content-inf">
                    
                    <table >
                        
                        <tr>
                            <td class="title-rc">Prenom &NOM</td>
                            <td><input type="text" value="<?php echo $data['nom'];?>" name="name"></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Telephone</td>
                            <td><input type="text" value="<?php echo $data['tel'];?>" name="tel"></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Email</td>
                            <td><input type="text" value="<?php echo $data['email'];?>" name="email"></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Address</td>
                            <td><input type="text" value="<?php echo $data['adresse'];?>" name="address"></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Code postal</td>
                            <td><input type="text" value="<?php echo $data['code_postal'];?>" name="code_postal"></td>
                        </tr>
                        <tr>
                            <td class="title-rc">Ville</td>
                            <td><input type="text" value="<?php echo $data['ville'];?>" name="ville"></td>
                        </tr>
                    
                    </table>

                </div>
                <hr>
                <div class="btn">
                    <button class="annu" >Annuler</button>
                    <input type="submit" class="enre" name ='enre' value="Enregistrer">
                </div>
                </form>
            </div>
           
        </div>
    </div>
    <?php 
        if(isset($_POST['enre'])){
            $data_array = array(
            'nom' => $_POST["name"],
            'email' => $_POST['email'],
            'tel' => $_POST['tel'],
            'adresse' => $_POST['address'],
            'code_postal' => $_POST['code_postal'],
            'ville' => $_POST['ville']
                );
            $data_array = json_encode($data_array);
            $d = putData($_GET['id'],$data_array);
            if($d == "200"){
                echo '<script type="text/javascript">
                        alert("Edit success");
                        window.location.href ="info.php?id='.$_GET['id'].'";
                        </script>';
            }
            else{
                echo $d;
            }

        }
    ?>
</body>
</html>