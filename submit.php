<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $register_no = filter_input(INPUT_POST, 'registerNumber', FILTER_SANITIZE_NUMBER_INT);
    $student_name = filter_input(INPUT_POST, 'studentName', FILTER_SANITIZE_STRING);
    $father_name = filter_input(INPUT_POST, 'fatherName', FILTER_SANITIZE_STRING);
    $phone_no = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
    $maths = filter_input(INPUT_POST, 'mathsMark', FILTER_SANITIZE_NUMBER_INT);
    $physics = filter_input(INPUT_POST, 'physicsMark', FILTER_SANITIZE_NUMBER_INT);
    $chemistry = filter_input(INPUT_POST, 'chemistryMark', FILTER_SANITIZE_NUMBER_INT);
    $cs1 = filter_input(INPUT_POST, 'choice1', FILTER_SANITIZE_STRING);
    $cs2 = filter_input(INPUT_POST, 'choice2', FILTER_SANITIZE_STRING);
    $cs3 = filter_input(INPUT_POST, 'choice3', FILTER_SANITIZE_STRING);

    if ($register_no !==false && $student_name && $father_name && $phone_no && $maths !== false && $physics !== false && $chemistry !== false && $cs1 && $cs2 && $cs3) {

        $cutoff = $maths + ($chemistry + $physics) / 2;

        $student_details = "$register_no\t$student_name\t$father_name\t$phone_no\t$maths\t$physics\t$chemistry\t$cutoff\t$cs1\t$cs2\t$cs3";
        $file = fopen("student_details.txt", "a");
        if ($file) {
            fwrite($file, $student_details . PHP_EOL);
            fclose($file);
            header("Location: submission.html");
            exit();
        } else {
            echo "Error opening file.";
        }
    } else {
        echo "Please fill in all required fields correctly.";
    }
} else {
    echo "Form not submitted.";
}
?>