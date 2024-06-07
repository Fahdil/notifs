<?php

                    //isset($_POST['newcomplaint']) && $_POST['newcomplaint']==1 &&
            if( $_SERVER['REQUEST_METHOD'] === 'POST'){


                $name= htmlentities($_POST['name']);
                $email= htmlentities($_POST['email']);
                $phone= htmlentities($_POST['phone']);
                $badperson= htmlentities($_POST['badperson']);
                $date= htmlentities($_POST['date']);
                $location= htmlentities($_POST['location']);
                $description= htmlentities($_POST['description']);
                $witnesses= htmlentities($_POST['witnesses']);
                $action= htmlentities($_POST['action']);
                $type= htmlentities($_POST['type']);
                

                registerUser($name,$badperson,$email,$location , $phone, $action,$type, $witnesses, $description, $date );

            }

            function registerUser($nom,$badperson,$email,$location , $phone, $action,$type, $witnesses, $description, $date ) {

            
                // Database connection details
                require('/pages/param.php');
                $mysqli = new mysqli($host, $name, $passwd, $dbname);
            
                // Check connection
                if ($mysqli->connect_error) {
                    die('Connection error (' . $mysqli->connect_errno . '): ' . $mysqli->connect_error);
                }
            
                else {
                        // User does not exist, proceed with insertion
                        if ($insertStmt = $mysqli->prepare("INSERT INTO conplaint (nom, harceleur, email, typee, phone, datee , descriptionn, witnesses, locationn, actionn) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)")) {
                      
                            $insertStmt->bind_param("ssssssssss", $nom, $badperson, $email, $type, $phone, $date, $description, $witnesses, $location, $action );
                            
                            if ($insertStmt->execute()) {
                                $_SESSION['message'] = "Enregistrement réussi";
                            } else {
                                $_SESSION['message'] = "Impossible d'enregistrer";
                            }
            
                            $insertStmt->close();
                        }
                    }
                    
                   
                
            
                $mysqli->close();
            
                // Redirect to the home page where the message in the session will be displayed
                //header('Location: services.php');
                exit();
            }




?>