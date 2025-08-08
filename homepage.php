<?php
session_start();
include("database.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Essslogo (2).png">
    <title>ESSS</title>
    <style>
    /* Updated CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background-color: #f4f4f9;
    color: #333;
    line-height: 1.6;
}

.head {
    width: 100%;
    height: 100px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    padding: 0 20px;
}

.head img {
    height: 70px;
    width: 70px;
    margin-right: 15px;
}

.header {
    color: #198dcb;
}

.header h1 {
    font-size: 24px;
    font-weight: 600;
}

.header p {
    font-size: 14px;
    color: #666;
}

.nav {
    background-color: #198dcb;
    width: 100%;
    height: 45px;
    display: flex;
    align-items: center;
    padding: 0 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.list {
    display: flex;
    gap: 25px;
}

.list a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease;
}

.list a:hover {
    color: #EEA200;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2.sh2 {
    text-align: center;
    margin: 20px 0;
    font-size: 28px;
    color: #198dcb;
}

form {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table td {
    padding: 12px;
    border: 1px solid #ddd;
}

table td:first-child {
    width: 30%;
    font-weight: 500;
    background-color: #f9f9f9;
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="tel"],
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
select:focus {
    border-color: #198dcb;
    outline: none;
}

input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    cursor: pointer;
}

input[type="file"]:hover {
    background-color: #e9e9e9;
}

.save {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #EEA200;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.save:hover {
    background-color: #198dcb;
}

.footer {
    width: 100%;
    height: 70px;
    background-color: #198dcb;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 40px;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
}

.footer p {
    font-size: 14px;
    margin: 0;
}

.container1 {
    text-align: center;
    margin-top: 20px;
}

.container1 button {
    padding: 10px 20px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.container1 button:hover {
    background-color: skyblue;
}

/* Responsive Design */
@media (max-width: 768px) {
    .head {
        flex-direction: column;
        height: auto;
        padding: 10px;
    }

    .header h1 {
        font-size: 20px;
    }

    .header p {
        font-size: 12px;
    }

    .nav {
        height: auto;
        padding: 10px;
    }

    .list {
        flex-direction: column;
        gap: 10px;
    }

    table td {
        display: block;
        width: 100%;
        text-align: left;
    }

    table td:first-child {
        background-color: transparent;
        font-weight: 600;
    }

    .save {
        width: 100%;
    }
}
.nav {
            background-color: #198dcb;
            padding: 10px;
            text-align: center;
        }

        .nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .nav a:hover {
            color: #EEA200;
        }

    </style>
</head>
<body>
<div class="head">
        <img src="esss.png">

        <div class="header">
            <h1>EduSite for Smart School </h1>
            <p>(Smart School for Smart Society)</p>
        </div>
    </div>


    <div class="nav">
        <a href="userdashboard.php">Home</a>
        <a href="homepage.php">Register School</a>
        <a href="school.php">School Details</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<h2 class="sh2" style="text-align:center;margin-top:10px;">SCHOOL DETAILS FORM</h2>


    
       
      
    <div>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td><label for="sname">1.School Name :</label></td>
                    <td style="width:65%;"><input type="text" name="sname" class="sname" placeholder="Enter School Name" required></td>
                </tr>
                <tr>
                    <td><label for="scontact">2.School Contact :</td></label>
                    <td><input type="tel" name="scontact" class="scontact" placeholder="Enter School Contact" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="semail">3.School E-mail :</label></td>
                    <td><input type="email" class="semail" name="semail" placeholder="Enter School E-mail" required></td>
                </tr>
                <tr>
                    <td><div class="State">
            <label for="inputState">4.State :</label></td>
            <td><select class="form-control" id="inputState" name="inputState">
                <option value="SelectState"> - - Select State - -</option>
                <option value="TamilNadu">TamilNadu</option>
            </select>
        </div></td>
                </tr>
                <tr>
                    <td><div class="District">
            <label for="inputDistrict">5.District :</label></td>
            <td><select class="form-control" id="inputDistrict" name="inputDistrict">
                <option value="SelectDistrict"> - - Select District - - </option>
            </select>
        </div></td>
                </tr>
                <tr>
                    <td>
                        <label for="sudise">6.School UDISE Code :</label>
                        
                    </td>
                    <td><input type="number" id="sudise" name="udise" placeholder="Enter School UDISE Code" required> </td>
                </tr>
                <tr>
                    <td><label for="sgender">7.School Gender Composition : </label>  </td>
                    <td><select id="gender" name="gender">
                        <option value="">- - Select  - -</option>
                <option value="Male">Male School</option>
                <option value="Female">Female School</option>
                <option value="Co-Ed">Co-Ed School</option>
            </select></td>
                </tr>
                <tr>
                    <td><label for="smanagement">8.School Managed By :</label></td>
                    <td><select id="smanaged" name="smanaged">
                    <option value="">- - Select  - -</option>
                <option value="Gov">Governtment School</option>
                <option value="Govaid">Governtment Aided School</option>
                <option value="Public">Private School</option>
            </select></td>
                </tr>
                <tr>
                    <td><div class="Block">
            <label for="inputBlock">9.Block :</label></td>
            <td><select class="form-control" id="inputBlock" name="inputBlock">
                <option value="SelectBlock"> - - Select Block - - </option>
            </select>
        </div></td>
                </tr>
                <tr>
                    <td><label for="sward">10.School Ward :</label></td>
                    <td><input type="text" id="sward" name="sward" placeholder="Enter your School Ward" required></td>
                </tr>
                <tr>
                    <td><label for="sleveling">11.Level Of Schooling : </label></td>
                    <td> <select id="level" name="level" >
                    <option value="">- - Select - -</option>
                <option value="Primary">Primary School</option>
                <option value="Secondary">Secondary School</option>
                <option value="Higer Secondary">Higer Secondary School</option>
            </select></td>
                </tr>
                <tr>
                    <td><label for="sclass">12.School Class Start Fromx:</label></td>
                    <td><select name="sclass" id="sclass">
                        <option value="">- - Select - -</option>
                        <option value="1-12">1-12</option>
                        <option value="6-12">6-12</option>
                        <option value="9-12">9-12</option>
                        <option value="11-12">11-12</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="spincode">13.School PinCode :</label></td>
                    <td><input type="number" id="spincode" name="spincode" placeholder="Enter your School PinCode :" required></td>
                </tr>
                <tr>
                    <td><label for="snostudents">14.No. of Students :</label></td>
                    <td><input type="number" placeholder="Enter No of Students" id="snostudents" name="snostudents" required></td>
                </tr>
       <tr>
        <td><label for="steachers">15.No. of Teachers :</label></td>
        <td><input type="number" placeholder="Enter No of Teachers" id="steachers" name="steachers" required></td>
       </tr>

       <tr>
        <td><label for="sclassrooms">16.Class Rooms :</label>
        </td>
        <td><input type="number" id="sclassrooms" name="sclassrooms" required placeholder="Enter School Class Rooms "></td>
       </tr>
       
       <tr>
        <td><label for="sotherrooms">17.Other Rooms :</label>
        </td>
        <td><input type="number" id="sotherrooms" name="otherrooms" required placeholder="Enter School Other Rooms "></td>
       </tr>
       <tr>
        <td><label for="stoilets">18.No of Toilets :</label></td>
        <td><input type="number" id="stoilets" name="stoilets" required placeholder="Enter No of Toilets"></td>
       </tr>
       <tr>
        <td><label for="sinternet" name="sinternet">19.School Internet</label></td>
        <td ><input type="radio" id="yes" value="yes" name="sinternet" required style="margin-left: 3px;margin-right:10px;"><label for="yes" style="margin-right:10px;">Yes</label>
        <input type="radio" id="no" value="no" name="sinternet" required style="margin-right:10px;"><label for="no">No</label></td>
       </tr>
       <tr>
    <td><label for="simage">20.School Image :</label></td>
    <td><input type="file" id="simage" name="simage" accept="image/*" required></td>
</tr>
                

            </table>
           
            <input class="save" type="submit" onclick="saveStudent()">
        </form>
    </div>
    

                    
    <footer>
    
   
    <div class="bottom">
    <div class="footer">    

            <p>This site is designed, hosted, developed and maintained by
                <br>EduSite For Smart School(ESSS)
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <script>
        var TamilNadu = ["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"];


        $("#inputState").change(function () {
            var StateSelected = $(this).val();
            var optionsList;
            var htmlString = "";

            switch (StateSelected) {
                case "TamilNadu":
                    optionsList = TamilNadu;
                    break;

            }


            for (var i = 0; i < optionsList.length; i++) {
                htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
            }
            $("#inputDistrict").html(htmlString);

        });
    </script>
    <script>
  document.querySelector('form').addEventListener('submit', function() {
    window.location.href = 'index.php';
  });
</script>

<script>
        const districtSelect = document.getElementById('inputDistrict');
  const blockSelect = document.getElementById('inputBlock');
  const searchButton = document.getElementById('searchButton');
  const resultsDiv = document.getElementById('results');


        var Ariyalur = ["T.Palur", "Sendurai", "Ariyalur", "Andimadam", "Jayankondam", "Thirumanur"];
        var Chengalpattu = ["Thiruporur", "Kattankolathur", "Thirukalukundram", "St.Thomas Mount", "Acharapakkam", "Madurantagam", "Lathur", "Chithamur"];
        var Chennai = ["Thiruvotriyur", "Anna Nagar", "Tondiarpet", "Royapuram Central", "Royapuram North", "Thiru Vi Ka Nagar", "Royapuram South", "Kodambakkam", "Teynampet", "Adyar"];
        var Coimbatore = ["Coimbatore city", "Madukkarai", "Periyanaickan Palayam", "Perur", "Sarkar Samakkulam", "Thondamuthur", "Anaimalai", "Kinathukkadavu", "Pollachi north", "Pollachi south", "Valparai", "Annur", "Karamadai", "Sulthanpet", "Sulur"];
        var Cuddalore = ["Cuddalore", "Annagrammam", "Panruti", "Kurinjipadi", "Virudhachalam", "Nallur", "Mangalore", "Kammapuram", "Srimushnam", "Parangipettai", "Bhuvanagiri", "Keerapalayam", "Kumaratchi", "Kattumannarkoil"];
        var Dharmapuri = ["Dharmapuri", "Nallampalli", "Pennagaram", "Eriyur", "Palacode", "Karimangalam", "Kadathur", "Morappur", "Pappireddipatti", "Harur"];
        var Dindigul = ["Athoor", "Batlagundu", "Dindigul - Rural", "Gujiliamparai", "Kodaikanal", "Natham", "Nilakottai", "Oddanchathram", "Palani - Rural", "Reddiyarchatram", "Sanarpatty", "Thoppampatty", "Vadamadurai", "Vedasandur", "Dindigul -Urban"];
        var Erode = ["Ammapettai-Erode", "Anthiyur", "Bhavani", "Bhavani sagar", "Chennimalai", "Erode", "Gobi", "Kodumudi", "Modakurichi", "Nambiyur", "Perundurai", "Sathiyamangalam", "Thalavady", "Thuckanaicken Palayam"];
        var Kallakurichi = ["Rishivanthiyam", "Thirukoilur", "Sankarapuram", "Kalrayan Hills", "Kallakurichi", "Chinnasalem", "Thiyagadurgam", "Ulundurpet", "Thirunavalur"];
        var Kancheepuram = ["Kancheepuram", "Walajabad", "Uthiramerur", "Sriperumbudur", "Kundrathur"];
        var Kanniyakumari = ["Thovalai", "Agastheeswaram", "Rajakkamangalam", "Kurunthancode", "Thuckalay", "Thiruvattar", "Melpuram", "Killiyoor", "Munchirai"];
        var Karur = ["Karur", "Thanthoni", "Aravakurichi", "K.Paramathi", "Krishnarayapuram", "Kadavoor", "Kulithalai", "Thogaimalai"];
        var Krishnagiri = ["Uthangarai", "Krishnagiri", "Kaveripatinam", "Bargur", "Veppanapalli", "Shoolagiri", "Hosur", "Kelamangalam", "Thally", "Mathur"];
        var Madurai = ["Alanganallur", "Chellampatti", "Kallikudi", "T.kallupatti", "Kottampatti", "Madurai East", "Madurai West", "Melur", "Sedapatti", "Thirumangalam", "Thiruparamkundram", "Usilampatti", "T.vadipatti", "Madurai North", "Madurai South"];
        var Mayiladuthurai = ["Mayiladudurai", "Sembanarkoil", "Kuthalam", "Sirkali", "kollidam"];
        var Nagapattinam = ["Nagapattinam", "Thirumarugal", "Kelvelur", "Keezhaiyur", "Thalainayar", "Vedaranyam"];
        var Namakkal = ["Namakkal", "Kollihills", "Mohanur", "Erumapatti", "Sendamangalam", "Puduchatram", "Rasipuram", "Vennandur", "Namagiripet", "Tiruchengode", "Pallipalayam", "Mallasamudram", "Elachipalayam", "Paramathi", "Kabilarmala"];
        var Nilgiris = ["Udhagamandalam", "Coonoor", "Kotagiri", "Gudalur"];
        var Perambalur = ["Veppur", "Veppanthattai", "Perambalur", "Alathur"];
        var Pudukkottai = ["Kunnandarkoil", "Annavasal", "Viralimalai", "Gandarvakkottai", "Pudukkottai", "Thiruvarankulam", "Karambakkudi", "Thirumayam", "Ponnamaravathy", "Arimalam", "Aranthangi", "Manamelkudi", "Avudaiyarkoil"];
        var Ramanathapuram = ["Thiruvadanai", "Rajasingamangalam", "Paramakudi", "Bogalur", "Nainarkoil", "Kamuthi", "Mudukulathur", "Kadaladi", "Ramanathapuram", "Thiruppullani", "Mandapam"];
        var Ranipet = ["Arakkonam", "Kaveripakkam", "Nemili", "Sholingar", "Walaja West", "Walaja East", "Arcot", "Timiri"];
        var Salem = ["Gangavalli", "Pethanaickenpalayam", "Kadayampatti", "Magundanchavadi", "Konganapuram", "Panamarathupatti", "Thalaivasal", "Veerapandi", "Salem-Rural", "Tharamangalam", "Nangavalli", "Edappadi", "Attur", "Ayothiyapattinam", "Kolathur", "Mecheri", "Omalur", "Sankari", "Valappadi", "Yercaud", "Salem-Urban"];
        var Sivagangai = ["Sivagangai", "Kalayarkoil", "Manamadurai", "Thiruppuvanam", "Ilayangudi", "Devakottai", "Kannangudi", "Sakkottai", "Thiruppatur", "Singampunari", "S.Pudur", "Kallal"];
        var Tenkasi = ["Alangulam", "Kadayam", "Kadayanallur", "Keelapavoor", "Kuruvikulam", "Melaneelithanallur", "Sankarankovil", "Shenkottai", "Tenkasi", "Vasudevanallur"];
        var Thanjavur = ["Thanjavur(Urban)", "Thanjavur(Rural)", "Thiruvaiyar", "Budalur", "Orathanadu", "Thiruvonam", "Kumbakonam", "Papanasam", "Ammapettai-TNJ", "Thiruvidaimarudhur", "Thiruppanandal", "Pattukkottai", "Madukkur", "Peravurani", "Sethubavachatram"];
        var Theni = ["Aundipatty", "Bodinayakanur", "Chinnamanur", "Cumbum", "Myladumparai", "Periyakulam", "Theni", "Uthamapalayam"];
        var Thoothukudi = ["Thoothukudi Urban", "Karunkulam", "Srivaikundam", "Alwarthirunagar", "Thiruchenthur", "Udangudi", "Sathankulam", "Kovilpatti", "Kayathar", "Ottapidaram", "Vilathikulam", "Pudur", "Thoothukudi Rural"];
        var Tiruchirappalli = ["Andhanallur", "Lalgudi", "Mannachanallur", "Manikandam", "Manapparai", "Marungapuri", "Musiri", "Pullambadi", "Trichy-Urban", "Trichy-West", "Thiruverumbur", "Thottiyam", "Thuraiyur", "Thathiengarpet", "Uppiliyapuram", "Vaiyampatti",];
        var Tirunelveli = ["Ambasamudram", "Cheranmahadevi", "Kalakad", "Manur", "Pappakudi", "Nanguneri", "Palay-Rural", "Radhapuram", "Valliyoor", "Palay-Urban", "Tirunelveli Urban"];
        var Tirupathur = ["Madhanur", "Alangayam", "Jolarpet", "Thirupattur", "Natrampalli", "Kandhili"];
        var Tiruppur = ["Dharapuram", "Gangayam", "Gundadam", "Moolanur", "Uthukuli", "Vellackoil", "Kudimangalam", "Madathukulam", "Udumalaipattai", "Avinaci", "Palladam", "Pongalur", "Tiruppur South", "Tiruppur North"];
        var Tiruvallur = ["Thiruvallur", "Poondi", "Kadambathur", "Ellapuram", "Poonamallee", "Minjur", "Sholavaram", "Gummidipoondi", "Villivakkam", "Puzhal", "Tiruttani", "Thiruvalangadu", "Pallipat", "R.K.Pet"];
        var Tiruvannamalai = ["Vembakkam", "Cheyyar", "Anakkavur", "Peranamallur", "Vandavasi", "Thellar", "Arni", "West Arni", "Polur", "Kalasapakkam", "Chetpet", "Thurinjapuram", "Kilpennathur", "Tiruvannamalai", "Pudupalayam", "Chengam", "Thandrampet", "Jawadhu Hills"];
        var Tiruvarur = ["Valangaiman", "Kudavasal", "Koradachery", "Nannilam", "Thiruvarur", "Mannargudi", "Needamangalam", "Kottur", "Thiruthuraipoondi", "Muthupettai"];
        var Vellore = ["Katpadi", "Vellore Rural", "Vellore Urban", "Kaniyambadi", "Anaicut", "K.V.Kuppam", "Gudiyatham", "Pernambut"];
        var Viluppuram = ["Melmalayanur", "Gingee", "Vallam", "Olakkur", "Mailam", "Marakkanam", "Vaanur", "Kanai", "Vikaravandi", "Koliyanur", "Kandamangalam", "Mugaiyur", "Thiruvennainallur"];
        var Virudhunagar = ["Aruppukottai", "Virudhunagar", "Kariyapatti", "Thiruchuli", "Narikudi", "Rajapalayam", "Srivilliputhur", "Watrap", "Sivakasi", "Vembakottai", "Sattur"];



        $("#inputDistrict").change(function () {
            var DistrictSelected = $(this).val();
            var optionsList;
            var htmlString = "";

            switch (DistrictSelected) {
                case "Ariyalur":
                    optionsList = Ariyalur;
                    break;
                case "Chengalpattu":
                    optionsList = Chengalpattu;
                    break;
                case "Chennai":
                    optionsList = Chennai;
                    break;
                case "Coimbatore":
                    optionsList = Coimbatore;
                    break;
                case "Cuddalore":
                    optionsList = Cuddalore;
                    break;
                case "Dharmapuri":
                    optionsList = Dharmapuri;
                    break;
                case "Dindigul":
                    optionsList = Dindigul;
                    break;
                case "Erode":
                    optionsList = Erode;
                    break;
                case "Kallakurichi":
                    optionsList = Kallakurichi;
                    break;
                case "Kancheepuram":
                    optionsList = Kancheepuram;
                    break;
                case "Kanniyakumari":
                    optionsList = Kanniyakumari;
                    break;
                case "Karur":
                    optionsList = Karur;
                    break;
                case "Krishnagiri":
                    optionsList = Krishnagiri;
                    break;
                case "Madurai":
                    optionsList = Madurai;
                    break;
                case "Mayiladuthurai":
                    optionsList = Mayiladuthurai;
                    break;
                case "Nagapattinam":
                    optionsList = Nagapattinam;
                    break;
                case "Namakkal":
                    optionsList = Namakkal;
                    break;
                case "Nilgiris":
                    optionsList = Nilgiris;
                    break;
                case "Perambalur":
                    optionsList = Perambalur;
                    break;
                case "Pudukkottai":
                    optionsList = Pudukkottai;
                    break;
                case "Ramanathapuram":
                    optionsList = Ramanathapuram;
                    break;
                case "Ranipet":
                    optionsList = Ranipet;
                    break;
                case "Salem":
                    optionsList = Salem;
                    break;
                case "Sivagangai":
                    optionsList = Sivagangai;
                    break;
                case "Tenkasi":
                    optionsList = Tenkasi;
                    break;
                case "Thanjavur":
                    optionsList = Thanjavur;
                    break;
                case "Theni":
                    optionsList = Theni;
                    break;
                case "Thoothukudi":
                    optionsList = Thoothukudi;
                    break;
                case "Tiruchirappalli":
                    optionsList = Tiruchirappalli;
                    break;
                case "Tirunelveli":
                    optionsList = Tirunelveli;
                    break;
                case "Tirupathur":
                    optionsList = Tirupathur;
                    break;
                case "Tiruppur":
                    optionsList = Tiruppur;
                    break;
                case "Tiruvallur":
                    optionsList = Tiruvallur;
                    break;
                case "Tiruvannamalai":
                    optionsList = Tiruvannamalai;
                    break;
                case "Tiruvarur":
                    optionsList = Tiruvarur;
                    break;
                case "Vellore":
                    optionsList = Vellore;
                    break;
                case "Viluppuram":
                    optionsList = Viluppuram;
                    break;
                case "Virudhunagar":
                    optionsList = Virudhunagar;
                    break;
            }


            for (var i = 0; i < optionsList.length; i++) {
                htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
            }
            $("#inputBlock").html(htmlString);

        });
        
    </script>

    
</body>
</html>