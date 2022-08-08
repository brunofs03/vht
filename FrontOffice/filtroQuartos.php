 <?php 
    require_once "config.php";

    $filtro = "";
    $estrelas = $_POST['estrelas'];
    $moneyMin = $_POST['moneyMin'];
    $moneyMax = $_POST['moneyMax'];

    $moneyMin = str_replace("R$ ", "", $moneyMin);
    $moneyMin = str_replace(".", "", $moneyMin);
    $moneyMin = str_replace(",", ".", $moneyMin);
    
    $moneyMax = str_replace("R$ ", "", $moneyMax);
    $moneyMax = str_replace(".", "", $moneyMax);
    $moneyMax = str_replace(",", ".", $moneyMax);



    if($estrelas !== ''){
        $filtro = $filtro ." and estrelas = " .$estrelas;
    };

    if($moneyMin !== ''){
        $filtro = $filtro ." and preco_diaria > " .$moneyMin;
    };

    if($moneyMax !== ''){
        $filtro = $filtro ." and preco_diaria < " .$moneyMax;
    };


    
    $sql = "SELECT * FROM quartos where 1=1" .$filtro ." order by num_quarto asc";


    // var_dump($sql);

    $result = mysqli_query($link, $sql);

    
  ?>


<?php
            
            while($row = mysqli_fetch_array($result)){
                echo "<div class='col-sm-4' style='height:350px !important;margin-bottom:25px;margin-top:25px;'>";
                echo "<div style='cursor:pointer' onclick='window.location.href=`http://localhost/vht/FrontOffice/TelaQuarto.php?id=";
                echo $row[0];
                echo "`'> <div style='height: 50px;'><div style='color: black;padding: 10px;width: 100%;font-size: 18px;background-color: rgba(189, 189, 189, 0.8);font-weight:700;vertical-align: middle;width:100%;font-size: 22px;text-align: center;'>Quarto ";
                echo $row[2];
                if($row[3] == 'Disponível'){
                  echo " <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Location_dot_green.svg/1200px-Location_dot_green.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
                  }else{
                    echo " <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Location_dot_red.svg/1024px-Location_dot_red.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
                  }; 
                echo "<div style='height: 250px;overflow:hidden;background-image: url(";
                echo $row[5];
                echo ");background-position: center;background-size: cover;'></div>";
                echo "<div style='color: black;display:flex;padding: 10px;width: 100%;background-color: rgba(189, 189, 189, 0.8);font-weight:700;vertical-align: middle;width:100%;font-size: 22px;text-align: center;'>";
                echo "<div style='width:50%;'>";
                echo "<span style='font-weight:700;vertical-align: middle;font-size: 18px;'>R$ ";
                echo number_format($row[1], 2, ',', ' ');
                echo " p/Noite </span>";
                echo "</div>";
                echo "<div style='width:50%;'>";

                if($row[4] == 1){
                    echo "<div style='color: yellow;font-size: 22px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:left;margin: auto;'>★<span style='color:#bfbfbf'>★★★★</span></div>";
                }else if($row[4] == 2){
                    echo "<div style='color: yellow;font-size: 22px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:left;margin: auto;'>★★<span style='color:#bfbfbf'>★★★</span></div>";
                }else if($row[4] ==3){
                    echo "<div style='color: yellow;font-size: 22px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:left;margin: auto;'>★★★<span style='color:#bfbfbf'>★★</span></div>";
                }else if($row[4] == 4){
                    echo "<div style='color: yellow;font-size: 22px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:left;margin: auto;'>★★★★<span style='color:#bfbfbf'>★</span></div>";
                }else if($row[4] == 5){
                    echo "<div style='color: yellow;font-size: 22px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:left;margin: auto;'>★★★★★</div>";
                }
                echo "</div></div></div></div>";
            }
            ?>