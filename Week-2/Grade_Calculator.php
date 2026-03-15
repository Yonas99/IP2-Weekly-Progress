<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade</title>
</head>
<body>
    <h2>Grade Calculator</h2>
    <form method="post">
        <div>
            <p>Insert your score out of 100 for each course and click the button to calculate your GPA.</p>
        </div>
        <fieldset>
            <legend>Courses</legend>
        <div>
            <label for="ip">Internet Programming II:</label>
            <input type="number" name="ip" id="ip">
        </div>
        <div>
            <label for="flat">Formal Language and Automata Theory:</label>
            <input type="number" name="flat" id="flat">
        </div>
        <div>
            <label for="os">Operating System</label>
            <input type="number" name="os" id="os">
        </div>
        <div>
            <label for="ap">Advanced Programming:</label>
            <input type="number" name="ap" id="ap">
        </div>
        <div>
            <label for="sre">Software Requirement Engineering:</label>
            <input type="number" name="sre" id="sre">
        </div>
        </fieldset>
        <div>
            <button type="submit" name="submit">Calculate Grade</button>
        </div>
    </form>

    <?php
    function calculaGrade($mark) {
        if($mark>=90 && $mark<=100) {
            return ["A+",4.0];
        }else if($mark>=85 && $mark<90) {
            return ["A",4.0];
        }else if($mark>=80 && $mark<85) {
            return ["A-",3.75];
        }else if($mark>=75 && $mark<80) {
            return ["B+",3.5];
        }else if ($mark>=70 && $mark<75) {
            return ["B",3.0];
        }else if($mark>=65 && $mark<70) {
            return ["B-",2.75];
        }else if ($mark>=60 && $mark<65) {
            return["C+",2.5];
        }else if($mark>=55 && $mark<60) {
            return["C",2.0];
        }else if($mark>=50 && $mark<55) {
            return["C-",1.75];
        }else if($mark>=0 && $mark<50) {
            return["F",0];
        }else {
            return "Invalid Input!";
        }
    }
    if(isset($_POST['submit'])) {
        $ip=$_POST['ip'];
        $flat=$_POST['flat'];
        $os=$_POST['os'];
        $ap=$_POST['ap'];
        $sre=$_POST['sre'];

        if(empty($ip) || empty($flat) || empty($os) || empty($ap) || empty($sre)){
        echo "ERROR! All fields must be filled";
        exit();
        }
        if(!is_numeric($ip) || !is_numeric($flat) || !is_numeric($os) || !is_numeric($ap) || !is_numeric($sre)){
        echo "ERROR! Scores must be numbers!";
        exit();
        }
        if($ip < 0 || $ip > 100 ||
        $flat < 0 || $flat > 100 ||
        $os < 0 || $os > 100 ||
        $ap < 0 || $ap > 100 ||
        $sre < 0 || $sre > 100) {

        echo "<h3>Invalid Input! Scores must be between 0 and 100</h3>";
        exit();
        }

        $ipGrade=calculaGrade($ip);
        $flatGrade=calculaGrade($flat);
        $osGrade=calculaGrade($os);
        $apGrade=calculaGrade($ap);
        $sreGrade=calculaGrade($sre);

        echo "<h3>Course Gardes</h3>";
        echo "Internet Programming II: <strong>$ipGrade[0]</strong> <br>";
        echo "Formal Language and Automata Theory: <strong>$flatGrade[0]</strong><br>";
        echo "Operating System: <strong>$osGrade[0]</strong> <br>";
        echo "Advanced Programming: <strong>$apGrade[0]</strong> <br>";
        echo "Software Requirement Engineering: <strong>$sreGrade[0]</strong> <br>";
        $ipCredit=3;
        $osCredit=4;
        $flatCredit=3;
        $apCredit=4;
        $sreCredit=3;
        $totalCredit=$ipCredit + $osCredit + $flatCredit + $apCredit + $sreCredit;
        $totalGrade=($ipCredit * $ipGrade[1])+($flatCredit * $flatGrade[1])+($osCredit * $osGrade[1])+($apCredit * $apGrade[1])+($sreCredit * $sreGrade[1]);
        $gpa=$totalGrade/$totalCredit;
        $gpa=round($gpa,2);
        echo " <br><br>GPA: <strong>$gpa</strong>";
    }
    
    ?>
</body>
</html>
