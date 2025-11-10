<?php

include('../security/authentication.php');


if(isset($_POST['save_subject']))
{
    $subject_name = mysqli_real_escape_string($con, $_POST['subjectName']);
    $lower_subName = strtolower($subject_name);
    $final_subName = ucwords($lower_subName);
    $subject_name = $final_subName;
        
    $subjectComment = mysqli_real_escape_string($con, $_POST['subjectComment']);


    $subject_query = "INSERT INTO subject (subject_name, subject_comment) VALUES ('$subject_name', '$subjectComment')";
    $subject_query_run = mysqli_query($con, $subject_query);

        if($subject_query_run)
        {
            $last_id = mysqli_insert_id($con);
            if ($last_id){
                $code = rand(1,99999);
                $subjectCode = "Sub".$code."_".$last_id;
                $query = "UPDATE subject SET subjectCode = '".$subjectCode."' WHERE subject_id = '".$last_id."'";
                $res = mysqli_query($con, $query);

                if ($res)
                {
                    $_SESSION['message'] = "New Subject Added Successfully!";
                    header("Location: ../assessment.php");
                    exit();
                }
                else
                {
                    $_SESSION['message'] = "Something Went Wrong!";
                    header("Location: ../assessment.php");
                        exit(0);
                }
            }
        }
}
?>