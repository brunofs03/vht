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
        $filtro = $filtro ." and classificacao = " .$estrelas;
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
                echo "<div style='cursor:pointer' onclick='window.location.href=`/VHT/FrontOffice/TelaQuarto.php?id=";
                echo $row['id'];
                echo "`'> <div style='height: 50px;'><div style='color: black;padding: 10px;width: 100%;font-size: 18px;background-color: rgba(189, 189, 189, 0.8);font-weight:700;vertical-align: middle;width:100%;font-size: 22px;text-align: center;'>Quarto ";
                echo $row['num_quarto'];
                if($row['disponibilidade'] == 'Disponível'){
                  echo " <img src='/VHT/FrontOffice/images/Location_dot_green.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
                  }else{
                    echo " <img src='/VHT/FrontOffice/images/1024px-Location_dot_red.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
                  }; 
                echo "<div style='height: 250px;overflow:hidden;background-image: url(";
                echo $row['link'];
                echo ");background-position: center;background-size: cover;'></div>";
                echo "<div style='color: black;display:flex;padding: 10px;width: 100%;background-color: rgba(189, 189, 189, 0.8);font-weight:700;vertical-align: middle;width:100%;font-size: 22px;text-align: center;'>";
                echo "<div style='width:50%;'>";
                echo "<span style='font-weight:700;vertical-align: middle;font-size: 16px;'>A partir de R$ ";
                echo number_format($row['preco_diaria'], 2, ',', ' ');
                echo "</span>";
                echo "</div>";
                echo "<div style='width:50%;'>";

                if($row['classificacao'] == 1){
                    echo "<div style='color: white;font-size: 16px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Standard</div>";
                }else if($row['classificacao'] == 2){
                    echo "<div style='color: white;font-size: 16px;background-color: crimson;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Master</div>";
                }else if($row['classificacao'] ==3){
                    echo "<div style='color: white;font-size: 16px;background-color: darkgoldenrod;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Deluxe</div>";
                }
                echo "</div></div></div></div>";
            }
            ?>