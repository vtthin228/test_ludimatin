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
            $data = getData();
    ?>
</head>
<body>
    <div class="header">
        <p>Rechercher un contact</p>
    </div>
    <div class="content">
        <div class="block">
            <p class="text-line">Recherche d'une fiche de contact</p>
        </div>
        <div class="block">
            <form class="search" method='post' action="#">
                <p class="text-search">Renseigner un nom ou une dénomination</p>
                <input type="text" placeholder="Nom ou denormination" class="name_s" name="name-search">
                <input type="submit" id="btn-search" value="Rechercher" name="btn-search" style="width: 80px;" class="btn-search">
            </form>
        </div>
        <?php
            if (isset($_POST['btn-search'])) {
                $data = getDataByName($_POST['name-search']);
                echo '<script type="text/javascript">
                $.ajax({
                    url: "index.php",
                    type: "POST",
                    dataType: "json",
                    data: '.$data.',
                    success: function (data) {
                        if (data == "false")
                            {
                                alert("error");
                            } else {
                                
                                $(".block").html(data);
                            }
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                });
                </script>
                ';  
            }
        ?>
        <div class="block">
            <table>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Telephone</th>
                    <th></th>
                </tr>
                <?php foreach($data as $data){ ?>
                <tr>
                    <td></td>
                    <td><?php echo getDataByID($data['id'])['nom'] ?></td>
                    <td><?php echo getDataByID($data['id'])['adresse'] ?></td>
                    <td><?php echo getDataByID($data['id'])['ville'] ?></td>
                    <td><?php echo getDataByID($data['id'])['tel'] ?></td>
                    <td><a href="info.php?id=<?php echo $data['id'];?>" class="info-detail" type="submit">Voir</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        // document.getElementById("btn-search").onclick = function() {myFunction()};

        // function myFunction() {
        //     var name_search = document.querySelector('[name="name-search"]').value;
        //     // alert($(".name_s").val());
      
        //     $.ajax({
        //             url: 'index.php',
        //             type: 'POST',
        //             data: a,
        //             success: function (data) {
        //                 if (data == 'false')
        //                     {
        //                         alert('error');
        //                     } else {
        //                         $('.block').html(data);
        //                     }
        //             },
        //             error: function (e) {
        //                 console.log(e.message);
        //             }
        //         });
        // }

    </script>
  
</body>
</html>