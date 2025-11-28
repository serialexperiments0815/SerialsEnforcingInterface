<html>

<head>
    <title>Profile creation</title>
    <link rel="stylesheet" href="graphics.css">
</head>

<body>
<div class="block_text">
            <h1>Create a profile</h1>
</div>

<div class="block_image_text">
               <form action="profile_create_next.php" method="POST" enctype="multipart/form-data" id="theform">
                    <br>
                    <p>Picture:</p>
                    <input name="person_picture" type="file">
                    <p>First name:</p>
                    <input name="first_name">
                    <p>Middle name:</p>
                    <input name="middle_name">
                    <p>Last name:</p>
                    <input name="last_name">
                    <p>Date of birth:</p>
                    <input name="date_of_birth" type="date">
                    <p>State of residence:</p>
                    <select name="state_of_residence" form="theform">
                        <?php
                        $state_of_residence = [
                        'ALABAMA', 'ALASKA', 'ARIZONA', 'ARKANSAS', 'CALIFORNIA',
                        'COLORADO', 'CONNECTICUT', 'DELAWARE', 'FLORIDA', 'GEORGIA',
                        'HAWAII', 'IDAHO', 'ILLINOIS', 'INDIANA', 'IOWA',
                        'KANSAS', 'KENTUCKY', 'LOUISIANA', 'MAINE', 'MARYLAND',
                        'MASSACHUSETTS', 'MICHIGAN', 'MINNESOTA', 'MISSISSIPPI', 'MISSOURI',
                        'MONTANA', 'NEBRASKA', 'NEVADA', 'NEW HAMPSHIRE', 'NEW JERSEY',
                        'NEW MEXICO', 'NEW YORK', 'NORTH CAROLINA', 'NORTH DAKOTA', 'OHIO',
                        'OKLAHOMA', 'OREGON', 'PENNSYLVANIA', 'RHODE ISLAND', 'SOUTH CAROLINA',
                        'SOUTH DAKOTA', 'TENNESSEE', 'TEXAS', 'UTAH', 'VERMONT',
                        'VIRGINIA', 'WASHINGTON', 'WEST VIRGINIA', 'WISCONSIN', 'WYOMING'
                        ];
                        foreach ($state_of_residence as $state){
                            ECHO "<option value=\"{$state}\">{$state}</option>\n ";
                        }
                        ?>
                    </select>
                    <br>
                    <input type="hidden" name="form_origin" value="profile_create">
                    <button type="submit">NEXT</button>
                    <br>
                </form>
</div>
</body>

</html>