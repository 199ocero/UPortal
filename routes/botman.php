<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Commands', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply("You can give me a different commands. Choose the commands below and hit send.");
    $bot->reply('To check different information: <br><br> ⚪ Student Information <br> ⚪ Grades <br> ⚪ COR <br> ⚪ Announcement <br> ⚪ Activities <br><br> Note: The datas provided here are from our database. Soon when it is ready to publish it will create a new data for the students that are registered to our database.');
});
$botman->hears('Student Information', function ($bot) {
    $studentsData = json_decode(file_get_contents('https://my-json-server.typicode.com/199ocero/schoolDatabase/student_information/3308077482632477'), true);


    if (!empty($studentsData)) {
        $studentID = $studentsData['studentID'];
        $firstName = $studentsData['firstName'];
        $lastName = $studentsData['lastName'];
        $middleName = $studentsData['middleName'];
        $dateofBirth = $studentsData['dateofBirth'];
        $placeofBirth = $studentsData['placeofBirth'];
        $civilStatus = $studentsData['civilStatus'];
        $gender = $studentsData['gender'];
        $nationality = $studentsData['nationality'];
        $religion = $studentsData['religion'];
        $email = $studentsData['email'];
        $contactNo = $studentsData['contactNo'];
        $address = $studentsData['address'];
        $bot->reply("ℹ️ Student Information ℹ️<br><br>▶️Student ID: $studentID<br>▶️First Name: $firstName<br>▶️Last Name: $lastName<br>▶️Middle Name: $middleName<br>▶️Date of Birth: $dateofBirth<br>▶️Place of Birth: $placeofBirth<br>▶️Civil Status: $civilStatus<br>▶️Gender: $gender<br>▶️Nationality: $nationality<br>▶️Religion: $religion<br>▶️Email: $email<br>▶️Contact No: $contactNo<br>▶️Addess: $address<br><br>Note: This is a temporay data to show only the functionality of our chatbot.");
    } else {
        $bot->reply("Facebook ID is not yet registered. Please go to registrar's office.");
    }
});
$botman->hears('Grades', function ($bot) {

    $studentsData = json_decode(file_get_contents('https://my-json-server.typicode.com/199ocero/schoolDatabase/check_grades/3308077482632477'), true);
    if (!empty($studentsData)) {
        $studentID = $studentsData['studentID'];
        $firstName = $studentsData['firstName'];
        $lastName = $studentsData['lastName'];
        $academic_year = $studentsData['academic_year'];
        $semester = $studentsData['semester'];
        $arrayLength = count($studentsData['grades']);

        $answer = '';
        for ($x = 0; $x < $arrayLength; $x++) {
            $code = $studentsData['grades'][$x]['code'];
            $name = $studentsData['grades'][$x]['name'];
            $unit = $studentsData['grades'][$x]['unit'];
            $grade_type = $studentsData['grades'][$x]['grade_type'];
            $grade_value = $studentsData['grades'][$x]['grade_value'];
            $remarks = $studentsData['grades'][$x]['remarks'];
            $answer = "✅Subject: $code - $name<br><br>Unit: $unit<br>Grade Type: $grade_type<br>Grade Value: $grade_value<br>Remarks: $remarks<br><br>" . $answer;
        }
        $bot->reply("ℹ️ Student Grade ℹ️<br><br>▶️Student ID: $studentID<br>▶️First Name: $firstName<br>▶️Last Name: $lastName<br>▶️School Year: $academic_year<br>▶️Semester: $semester<br><br>$answer<br>Note: This is a temporay data to show only the functionality of our chatbot.");
    } else {
        $bot->reply("Facebook ID is not yet registered. Please go to registrar's office.");
    }
});

$botman->hears('COR', function ($bot) {

    $studentsData = json_decode(file_get_contents('https://my-json-server.typicode.com/199ocero/schoolDatabase/check_cor/3308077482632477'), true);
    if (!empty($studentsData)) {
        $studentID = $studentsData['studentID'];
        $firstName = $studentsData['firstName'];
        $lastName = $studentsData['lastName'];
        $program = $studentsData['program'];
        $yearLevel = $studentsData['yearLevel'];
        $arrayLength = count($studentsData['cor']);

        $answer = '';
        for ($x = 0; $x < $arrayLength; $x++) {
            $code = $studentsData['cor'][$x]['code'];
            $name = $studentsData['cor'][$x]['name'];
            $unit = $studentsData['cor'][$x]['unit'];
            $section = $studentsData['cor'][$x]['section'];
            $schedule = $studentsData['cor'][$x]['schedule'];
            $faculty = $studentsData['cor'][$x]['faculty'];
            $answer = "✅Subject: $code - $name<br><br>Unit: $unit<br>Section: $section<br>Schedule: $schedule<br>Faculty: $faculty<br><br>" . $answer;
        }
        $bot->reply("ℹ️ Student Actual Load ℹ️<br><br>▶️Student ID: $studentID<br>▶️First Name: $firstName<br>▶️Last Name: $lastName<br>▶️Program: $program<br>▶️Year Level: $yearLevel<br><br>$answer<br>Note: This is a temporay data to show only the functionality of our chatbot.");
    } else {
        $bot->reply("Facebook ID is not yet registered. Please go to registrar's office.");
    }
});

$botman->hears('Announcement', function ($bot) {

    $studentsData = json_decode(file_get_contents('https://my-json-server.typicode.com/199ocero/schoolDatabase/check_announcement/3308077482632477'), true);
    if (!empty($studentsData)) {
        $studentID = $studentsData['studentID'];
        $firstName = $studentsData['firstName'];
        $lastName = $studentsData['lastName'];
        $program = $studentsData['program'];
        $yearLevel = $studentsData['yearLevel'];
        $arrayLength = count($studentsData['cor']);

        $answer = '';
        for ($x = 0; $x < $arrayLength; $x++) {
            $code = $studentsData['cor'][$x]['code'];
            $name = $studentsData['cor'][$x]['name'];
            $section = $studentsData['cor'][$x]['section'];
            $faculty = $studentsData['cor'][$x]['faculty'];
            $announcement = $studentsData['cor'][$x]['announcement'];
            $answer = "✅Subject: $code - $name<br><br>Section: $section<br>Faculty: $faculty<br>Announcement: $announcement<br><br>" . $answer;
        }
        $bot->reply("ℹ️ Announcement ℹ️<br><br>▶️Student ID: $studentID<br>▶️First Name: $firstName<br>▶️Last Name: $lastName<br>▶️Program: $program<br>▶️Year Level: $yearLevel<br><br>$answer<br>Note: This is a temporay data to show only the functionality of our chatbot.");
    } else {
        $bot->reply("Facebook ID is not yet registered. Please go to registrar's office.");
    }
});

$botman->hears('Activities', function ($bot) {

    $studentsData = json_decode(file_get_contents('https://my-json-server.typicode.com/199ocero/schoolDatabase/check_activities/3308077482632477'), true);
    if (!empty($studentsData)) {
        $studentID = $studentsData['studentID'];
        $firstName = $studentsData['firstName'];
        $lastName = $studentsData['lastName'];
        $program = $studentsData['program'];
        $yearLevel = $studentsData['yearLevel'];
        $arrayLength = count($studentsData['cor']);

        $answer = '';
        for ($x = 0; $x < $arrayLength; $x++) {
            $code = $studentsData['cor'][$x]['code'];
            $name = $studentsData['cor'][$x]['name'];
            $section = $studentsData['cor'][$x]['section'];
            $faculty = $studentsData['cor'][$x]['faculty'];
            $activities = $studentsData['cor'][$x]['activities'];
            $attachment = $studentsData['cor'][$x]['attachment'];
            $answer = "✅Subject: $code - $name<br><br>Section: $section<br>Faculty: $faculty<br>Activity: $activities<br>Attachment: $attachment<br><br>" . $answer;
        }
        $bot->reply("ℹ️ Activities ℹ️<br><br>▶️Student ID: $studentID<br>▶️First Name: $firstName<br>▶️Last Name: $lastName<br>▶️Program: $program<br>▶️Year Level: $yearLevel<br><br>$answer<br>Note: This is a temporay data to show only the functionality of our chatbot.");
    } else {
        $bot->reply("Facebook ID is not yet registered. Please go to registrar's office.");
    }
});

$botman->fallback(function ($bot) {
    $bot->reply('Sorry, I can\'t understand this command. Please type "Commands" and hit send.');
});
$botman->hears('Start conversation', BotManController::class . '@startConversation');
