<?php
if (empty($_POST['page'])) {                                
    $display_type = 'no-signin';                                
    include ('index.php');
    exit();
}

session_start();

require('model.php'); 


if ($_POST['page'] == 'StartPage')
{
    $command = $_POST['command'];
    switch($command) {  
        case 'SignIn':  

            if (!is_valid($_POST['username'], $_POST['password'])) {
                $error_msg_username = '* Wrong username, or';
                $error_msg_password = '* Wrong password';
                                                        
                $display_type = 'signin';                                             
                include('index.php');
            } 
            else {
                $_SESSION['signedin'] = 'YES';
                $_SESSION['username'] = $_POST['username'];
                $username = $_POST['username'];
                include ('teachers.php');
            }
            exit();

        case 'Join':  
            if (does_exist($_POST['username'])) {
                $error_msg_username = '* The user exists.';
                $error_msg_password = '';
                $display_type = 'join';
                include('index.php');
            } else {
                if (insert_new_user($_POST['username'], $_POST['password'], $_POST['full_name'], $_POST['user_type'], $_POST['select'])) {
                    $error_msg_username = '';
                    $error_msg_password = '';
                    $display_type = 'signin';
                    include('index.php');
                } else {
                    $error_msg_username = '* Insertion error';
                    $error_msg_password = '';
                    $display_type = 'join';
                    include('index.php');
                }
            }
            exit();        
    }
}


else if ($_POST['page'] == 'MainPage') 
{   
    
    $command = $_POST['command'];
    
    switch($command) {
        case 'SignOut':          
            session_unset();
            session_destroy();           
            $display_type = 'no-signin';
            include('index.php');
            break;
              
        case 'CreateAssignment':
            $result = create_assignment($_POST['assignment'], $_POST['class'], $_POST['max']);            
			break;
        
        
        case 'ListAssignments':
            $result = list_assignments($_POST['assignment']);           
            break;
            
        case 'ListStudents':
            $result = list_students($_POST['class']);          
            break;

        case 'AttachAssignment':

            $result = attach_assignment($_POST['assignment_score'],$_POST['assignment_id'],$_POST['student_id']);          
            break;

         case 'AttachAssignmentButton':

            $result = attach_assignment_button($_POST['student_class']);          
            break;
            
        default:
            echo 'Unknown command - ' . $command . '<br>';
    }
}

?>   
