<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="autor" content="Adam Jurewicz">
        <title>Generator danych - wykonanie funkcji</title>
        <link rel="stylesheet" href="styl.css">        
        <script language="javascript" type="text/javascript">
            function powrot() {
                document.location='index.html';
            }
        </script>
    </head>
    <body>
        <h1 class="naglowek">Generator losowych danych kont użytkowników</h1>
        <?php
            if($_POST['ilosc_wierszy'] != '' AND $_POST['aktywuj_gen'] == '343$#@232') {
                
                $il_wierszy = (int) + $_POST['ilosc_wierszy'];
                
                if($il_wierszy >= 1 AND $il_wierszy <= 1000) {

                    $imiona = file('imiona_meskie.txt');
                    $nazwiska = file('nazwiska_meskie.txt');
                    $poczty = file('poczty.txt');
                    

                    echo '<p class="opis">';
                    echo 'Wygenerowane zostało <b>' . $il_wierszy . '</b> wierszy!';
                    echo '</p>';
                    echo '<p><button class="powrot" onClick="javascript: powrot();">Powrót</button></p>';
        ?>
        <div class="centrum"><hr>
        <table class="dane">
            <tr>
                <td class="kol_dane1">ID</td>
                <td class="kol_dane1">IMIĘ</td>
                <td class="kol_dane1">NAZWISKO</td>
                <td class="kol_dane1">ADRES E-MAIL</td>
                <td class="kol_dane1">HASŁO</td>
                <td class="kol_dane1">DATA REJESTRACJI</td>
            </tr>
            <?php            

            for($licz = 1; $licz <= $il_wierszy; $licz++) {
                $los_imie = rand(0, 49);
                $los_nazwisko = rand(0, 49);
                $los_poczty = rand(0, 9);
                $email_plus = rand(0, 9) . rand(0, 9) . rand(0, 99) . rand(0, 9);
                $los_email = trim($imiona[$los_imie]) . '_' . trim($nazwiska[$los_nazwisko]) . '_' . $email_plus . '@' . trim($poczty[$los_poczty]);
                $haslo = md5($imiona[$los_imie] . $nazwiska[$los_nazwisko] . $los_email . $email_plus);
                $data_rej = rand(1, 27) . '-' . rand(1, 12) . '-' . rand(2016, 2022);
                                

                echo '
            <tr>
                <td class="kol_dane2">' . $licz .'</td>
                <td class="kol_dane2">' . $imiona[$los_imie] . '</td>
                <td class="kol_dane2">' . $nazwiska[$los_nazwisko] . '</td>
                <td class="kol_dane2">' . $los_email . '</td>
                <td class="kol_dane2">' . $haslo . '</td>
                <td class="kol_dane2">' . $data_rej . '</td>
            </tr>
                ';
            }                    
            ?>
        </table><hr>        
        </div>        
        <?php
                    echo '<p class="opis">';
                    echo 'Wygenerowane zostało <b>' . $il_wierszy . '</b> wierszy!';
                    echo '</p>';
                    echo '<p><button class="powrot" onClick="javascript: powrot();">Powrót</button></p>';
                }
                else {
                    echo '<p class="opis">';
                    echo '<font color="red"><b>Błąd!</b></font> Twoja wartość to: <font color="white"><b>' . $il_wierszy . '</b></font><br>';
                    echo 'Podaj wartość w zakresie od 1 do 1000.</p>';
                    echo '<p><button class="powrot" onClick="javascript: powrot();">Powrót</button></p>';
                }
            }
            else {
                echo '<p class="opis">';
                echo '<font color="red"><b>Błąd!</b></font> Podaj wartość w zakresie od 1 do 1000.</p>';
                echo '<p><button class="powrot" onClick="javascript: powrot();">Powrót</button></p>';
            }
        ?>
    </body>
</html>
