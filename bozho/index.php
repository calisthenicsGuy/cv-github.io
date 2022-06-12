<?php

$host = "localhost";
$dbname = "svetso519_exampledb";
$username = "svetso519_exampledb_user";
$password = "silnaparola49";
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT * FROM users WHERE id=1";
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
                        <h4 class="text"><a href="https://bozho.codes/assets/2ndplacecsharp.jpg" target="_blank">2nd Place in C# Competition</a></h4>
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
                            <div style="width: 75%"></div>
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
                            <h5>2020 - now</h5>
                            <h5>Self-Taught</h5>
                        </div>
                        <div class="description">
                            <h4>Node.js Developer</h4>
                            <p>Creating applications such as:</p>
                            <p>- REST APIs with Express.js & MongoDB</p>
                            <p>- Discord Bots with Discord.js</p>
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
                            <h4>C# Development</h4>
                            <p>Acquired skills:</p>
                            <p>Fundamentals of C# development</p>
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

</body>
</html>