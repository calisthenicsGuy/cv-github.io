<?php

$host = "localhost";
$dbname = "svetso519_exampledb";
$username = "svetso519_exampledb_user";
$password = "silnaparola49";
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT * FROM users WHERE id=2";
$data = $conn->query($sql)->fetch_object();

$sqlSkills = "SELECT * FROM skills WHERE skills.user = $data->id";
$skillsData = $conn->query($sqlSkills);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV | <?php echo $data->name; ?></title>

    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="container">

        <div class="left_side">

            <div class="profile">
                <div class="img_setting">
                    <img src="image.jpg">
                </div>
                <h4><?php echo $data->name; ?></h4>
                <h5><a href="https://<?php if(!is_null($data->website)) echo $data->website; ?>" target="_blank"><?php if(!is_null($data->website)) echo $data->website; ?></a></h5>
                <button class="btn" onclick="PDF();">Download PDF</button>
            </div>

            
            <div class="left_items">
                <h4 class="title">Contact Info</h4>
                <ul>
                    <li>
                        <span class="icons">
                            <i class="bx bx-envelope"></i>
                        </span>
                        <span class="text"><img src="Gmail_icon.png" alt="Gmail Icon" width="15px"> <a href="mailto:<?php echo $data->email; ?>" style="text-decoration:none"> <?php echo $data->email; ?></a></span>
                    </li>
                    <li>
                        <span class="icons">
                            <i class="bx bx-phone"></i>
                        </span>
                        <span class="text"><img src="phone-number.jpg" alt="Phone Icon" width="16.7px"> +359 <?php echo $data->phone; ?></span>
                    </li>
                    <li>
                        <span class="icons">
                            <i class="bx bx-map"></i>
                        </span>
                        <span class="text"><img src="gitHub.png" alt="Github Icon" width="15px"><a href="https://github.com/<?php echo $data->github; ?>" target="_blank" class="profileContact" style="text-decoration:none"> GitHub</a></span>
                    </li>
                </ul>
            </div>

            <br>

            
            <div class="left_items">
                <h4 class="title">Certificates</h4>
                <ul>
                    <li>
                        <h5 class="dates">May, 2022</h5>
                        <h4 class="text">C# Advanced</h4>
                        <h5 class="dates">January, 2022</h5>
                        <h4 class="text">Programming Fundamentals - C#</h4>
                        <h5 class="dates">September, 2021</h5>
                        <h4 class="text">Programming Basics - C#</h4>
                    </li>
                </ul>
            </div>

            <br>

            
            <div class="left_items">
                <h4 class="title">Languages</h4>
                <ul class="languages">
                    <li>
                        <span class="text">English</span>
                        <div class="percent">
                            <div style="width: 70%"></div>
                        </div>
                    </li>
                    <li>
                        <span class="text">German</span>
                        <div class="percent">
                            <div style="width: 20%"></div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <div class="right_side">
            <div class="right_items">
                <h3 class="title">About me</h3>
                <p><?php echo $data->about; ?>
                    </p>
            </div>

            
            <div class="right_items">
                <h4 class="title">Education</h4>

                <div class="experience">
                    <div class="time_line">
                        <span class="time_point"></span>
                        <span class="time_road"></span>
                    </div>
                    <div class="content">
                        <div class="interval">
                            <h5>2021 - now</h5>
                            <h5><a href="https://softuni.bg/" target="_blank" style="text-decoration:none"></a>SoftUni</h5>
                        </div>
                        <div class="description">
                            <h4>C# Web Developer</h4>
                            <p>Acquired skills:</p>
                            <p>C # and .NET platform programming</p>
                            <p>Developing back-end with C # and front-end with JavaScript and HTML5</p>
                            <p>Creating web applications with ASP.NET MVC</p>
                        </div>
                    </div>
                </div>

                <div class="experience">
                    <div class="time_line">
                        <span class="time_point"></span>
                        <span class="time_road"></span>
                    </div>
                    <div class="content">
                        <div class="interval">
                            <h5>2019 - now</h5>
                            <h5>📕 High School "Dr. Ivan Bogorov</h5>
                        </div>
                        <div class="description">
                            <h4>Web Development</h4>
                            <p>Acquisition of skills related to modern programming languages ​​and work with them, programming technology, computer systems and networks, database and software engineering.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="right_items">
                <h4 class="title">Professional Skills</h4>
                <?php

                    while($skill = $skillsData->fetch_assoc())
                    {
                        echo '<div class="skills">
                        <h4>'.$skill['skill'].'</h4>
                            <div class="percent">
                                <div style="width: '.$skill['percent'].'%"></div>
                            </div>
                        </div>';
                    }
                ?>
            </div>


            <div class="right_items">
                <h4 class="title">Other</h4>
                <p><?php echo $data->other; ?></p>
            </div>

        </div>
    </div>


   <!-- HTML2PDF SOURCE -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- CUSTOM JS -->
   <script type="text/javascript">
   
       function PDF(){
           const e = document.querySelector(".container");

           // RESIZE
           e.style.maxWidth = "700px";
           
           // OPTIONS
           const opt = {
               filename: 'cv-rado.pdf',
               image: {
                   type: "jpg",
                   quality: 0.99
               },
               margin: 0,
               jsPDF: {
                   unit: "pt",
                   format: "letter",
                   orientation: "portrait"
               },
               pagebreak: {
                   mode: ["avoid-all", "css", "legacy"]
               }
           };
           html2pdf().set(opt).from(e).save();

           // RESIZE
           setTimeout(() => {e.style.maxWidth = "1400px";}, 2000);
       }
   </script>
</body>
</html>