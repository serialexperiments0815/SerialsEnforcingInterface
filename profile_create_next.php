<?php
// start the session to store data across pages
session_start();

// Check if the session variable for record entries list exists, if not, initialize it
if (!isset($_SESSION['record_entries_list'])) {
    $_SESSION['record_entries_list'] = [];
}

// Assign form_origin to variable to determine from which pages this page was called
$var_recieved_from = $_POST['form_origin'];

// If the pages called by basic profile creation assign profile data and move picture into image/dir
//--------------------------------------------------------------------------------------\\
if ($var_recieved_from === 'profile_create') {
    $var_person_picture = $_FILES['person_picture'];
    $var_first_name = $_POST['first_name'];
    $var_middle_name = $_POST['middle_name'];
    $var_last_name = $_POST['last_name'];
    $var_date_of_birth = $_POST['date_of_birth'];
    $var_state_of_residence = $_POST['state_of_residence'];


    $var_directory = "Images/";
    $var_target_file = $var_directory.basename($_FILES["person_picture"]["name"]);
    move_uploaded_file($_FILES["person_picture"]["tmp_name"], $var_target_file);
} elseif ($var_recieved_from === 'profile_create_next') {
    $var_target_file = $_POST['person_picture'];
    $var_directory = "Images/";
    $var_first_name = $_POST['first_name'];
    $var_middle_name = $_POST['middle_name'];
    $var_last_name = $_POST['last_name'];
    $var_date_of_birth = $_POST['date_of_birth'];
    $var_state_of_residence = $_POST['state_of_residence'];

    $new_entry = [
            'id' => count($_SESSION['record_entries_list']) + 1, // Unique ID for the entry
            'offense date' => $_POST['offense_date'],
            'type of offense' => $_POST['type_of_offense'],
            'disposition outcome' => $_POST['disposition_outcome'],
            'offense location prefix' => $_POST['offense_location_prefix'],
            'offense location street number' => $_POST['offense_location_street_number'],
            'offense location street name' => $_POST['offense_location_street_name'],
            'offense location street type' => $_POST['offense_location_street_type'],
            'offense location unit' => $_POST['offense_location_unit'],
            'offense location city' => $_POST['offense_location_city'],
            'offense location state' => $_POST['offense_location_state'],
            'offense location zip code' => $_POST['offense_location_zip_code'],
            'offense location county' => $_POST['offense_location_county']
        ];
        
    $_SESSION['record_entries_list'][] = $new_entry; // Add the new entry to the session list
}
//--------------------------------------------------------------------------------------\\
// Multidimensional list reponsible for storing criminal record entries until they are sent
//--------------------------------------------------------------------------------------\\

//--------------------------------------------------------------------------------------\\


function renderOffenseTypeOption() {
$offenseTypes = [
    'Animal Cruelty','Arson','Assault','Battery','Bribery',
    'Burglary','Child Abuse','Child Pornography','Conspiracy','Contempt of Court',
    'Cybercrime','Disorderly Conduct','Domestic Violence','Driving Under the Influence (DUI)',
    'Driving Without a License','Embezzlement','Escape','Extortion','Forgery','Fraud','Hate Crime',
    'Homicide','Human Trafficking','Identity Theft','Illegal Weapons Possession','Kidnapping','Larceny',
    'Manslaughter','Money Laundering','Obstruction of Justice','Perjury','Public Intoxication','Resisting Arrest',
    'Robbery','Sexual Assault','Shoplifting','Smuggling','Solicitation','Soliciting Prostitution','Stalking',
    'Tax Evasion','Terrorism','Theft','Trespassing','Violation of Probation'
];
    
    foreach($offenseTypes as $offense){
        echo "<option value=\"{$offense}\">{$offense}</option>\n ";
    }
}

function renderDispositionOutcomes() {
    $dispositionOutcomes = ['Acquittal','Amnesty','Charges dropped/No charges filed','Commutation',
    'Convicted','Deferred Prosecution','Dismissal','Expungement','Pardon','Pending','Reprieve',
    'Sealed','Suspended sentence','Vacated'
    ];


    foreach($dispositionOutcomes as $disposition){
        echo "<option value=\"{$disposition}\">{$disposition}</option>\n ";
    }
}

function renderOffenseLocationState() {
    $offenseLocation = [
    'ALABAMA','ALASKA','ARIZONA','ARKANSAS','CALIFORNIA','COLORADO','CONNECTICUT','DELAWARE','FLORIDA',
    'GEORGIA','HAWAII','IDAHO','ILLINOIS','INDIANA','IOWA','KANSAS','KENTUCKY','LOUISIANA','MAINE',
    'MARYLAND','MASSACHUSETTS','MICHIGAN','MINNESOTA','MISSISSIPPI','MISSOURI','MONTANA','NEBRASKA',
    'NEVADA','NEW HAMPSHIRE','NEW JERSEY','NEW MEXICO','NEW YORK','NORTH CAROLINA','NORTH DAKOTA',
    'OHIO','OKLAHOMA','OREGON','PENNSYLVANIA','RHODE ISLAND',
    'SOUTH CAROLINA','SOUTH DAKOTA','TENNESSEE','TEXAS',
    'UTAH','VERMONT','VIRGINIA','WASHINGTON',
    'WEST VIRGINIA','WISCONSIN','WYOMING'];
    
    
    foreach ($offenseLocation as $location) {
        echo "<option value=\"{$location}\">{$location}</option>\n ";
    }
}

function renderOffenseLocationStreetType()  {
    $OffenseLocationStreetType = [
        'Avenue','Boulevard','Circle','Court','Drive','Highway',
    'Lane','Parkway','Place','Road','Street','Terrace','Trail','Way'
];


    foreach ( $OffenseLocationStreetType as $location) {
        echo "<option value=\"{$location}\">{$location}</option>\n ";
}
}

function criminalRecordEntries() {
        // Display the list of criminal record entries
    // if (empty($_SESSION['record_entries_list'])) {
    //     echo '<p>No criminal record entries found.</p>';
    // } else {
    //     echo '<p>Criminal Record Entries:</p>';

    // Loop through each entry and display its details

foreach ($_SESSION['record_entries_list'] as $new_entry) {
        echo '<div class="block_image_text">';

        // Display each entry's details

        echo '<p>Offense Date: ', htmlspecialchars($new_entry['offense_date']), '</p>';
        echo '<p>Type of Offense: ', htmlspecialchars($new_entry['type_of_offense']), '</p>';
        echo '<p>Disposition Outcome: ', htmlspecialchars($new_entry['disposition_outcome']), '</p>';
        echo '<p>Offense Location: ', htmlspecialchars($new_entry['offense_location_prefix']), ' ',
            htmlspecialchars($new_entry['offense_location_street_number']), ' ',
            htmlspecialchars($new_entry['offense_location_street_name']), ' ',
            htmlspecialchars($new_entry['offense_location_street_type']), ' ',
            htmlspecialchars($new_entry['offense_location_unit']), ', ',
            htmlspecialchars($new_entry['offense_location_city']), ', ',
            htmlspecialchars($new_entry['offense_location_state']), ' ',
            htmlspecialchars($new_entry['offense_location_zip_code']), ' ',
            htmlspecialchars($new_entry['offense_location_county']), '</p>';

    };
    }


function renderProfileDisplay(
    $var_directory, $var_target_file, $var_first_name,
    $var_middle_name, $var_last_name, $var_date_of_birth,
    $var_state_of_residence) {

    echo    '<img src="', htmlspecialchars($var_directory),htmlspecialchars(basename($var_target_file)),'"></img> <br>';
    echo    '        <div class="block_image_text">';
    echo    '            <p> FIRST NAME: </p>', $var_first_name,' <br>';
    echo    '            <p> MIDDLE NAME: </p>', $var_middle_name,' <br>';
    echo    '            <p> LAST NAME: </p>', $var_last_name,' <br>';
    echo    '            <p> DATE OF BIRTH: </p>', $var_date_of_birth,' <br>';
    echo    '            <p> STATE OF RESIDENCE: </p>', $var_state_of_residence;
    echo    '        </div>';

}
?>

<html>

<head>
    <title>Criminal Profile</title>
    <link rel="stylesheet" href="graphics.css">
</head>

<body>
<div class="block_text">
            <h1>Create a profile</h1>
</div>
<?php 
echo    '<div class="container-row">';
echo    '<div class="container-column">';
echo    '<div class="block_image_text">';
echo    '</div>';


renderProfileDisplay($var_directory, $var_target_file, $var_first_name, $var_middle_name, $var_last_name, $var_date_of_birth, $var_state_of_residence);
echo    '</div>';
echo    '<div class="block_image_text">';

echo    '<h1>Add criminal record entry</h1> <br>';
echo    '<form action="profile_create_next.php" method="POST" enctype="multipart/form-data" id="theform">';

    
echo    '<h2>Date of offense</h2><input name="offense_date[]" type="date"><br><br>';

    
echo    '<h2>Type of offense</h2>';
echo    '<select name="type_of_offense[]" form="theform">';
        renderOffenseTypeOption();
echo    '</select><br><br>';

    
echo    '<h2>Disposition outcome</h2>';
echo    '<select name="disposition_outcome[]" form="theform">';
        renderDispositionOutcomes();
echo    '</select><br><br>';

echo    '<div class="container-column-group">';
echo    '<h2>Location of offense</h2>';
    
echo    'Precisation of location';
echo    '<select name="offense_location_prefix[]" form="theform">';
echo    '<option value="at">AT</option>';
echo    '<option value="in">IN</option>';
echo    '<option value="near">NEAR</option>';
echo    '</select><br>';

echo    'street number';
echo    '<input name="offense_location_street_number[]" type="number"><br>';

echo    'street name';
echo    '<input name="offense_location_street_name[]" type="text"><br>';
    
echo    'street type';
echo    '<select name="offense_location_street_type[]" form="theform">';
        renderOffenseLocationStreetType();
echo    '</select><br>';
echo    'street unit (optional)';
echo    '<input name="offense_location_unit[]"><br>';

echo    'city';
echo    '<input name="offense_location_city[]"><br>';

echo    'state';
echo    '<select name="offense_location_state[]" form="theform">';
        renderOffenseLocationState();
echo    '</select><br>';
echo    'zip code (optional)';
echo    '<input name="offense_location_zip_code[]" type="number"><br>';

echo    'county (optional)';
echo    '<input name="offense_location_county[]" type="text"><br>';

echo    '<input type="hidden" name="form_origin" value="profile_create_next">';
echo    '<input type="hidden" name="first_name" value="', htmlspecialchars($var_first_name), '">';
echo    '<input type="hidden" name="middle_name" value="', htmlspecialchars($var_middle_name), '">';
echo    '<input type="hidden" name="last_name" value="', htmlspecialchars($var_last_name), '">';
echo    '<input type="hidden" name="date_of_birth" value="', htmlspecialchars($var_date_of_birth), '">';
echo    '<input type="hidden" name="state_of_residence" value="', htmlspecialchars($var_state_of_residence), '">';
echo    '<input type="hidden" name="person_picture" value="', htmlspecialchars($var_target_file), '">';
echo    '<div>';
echo    '<br>';
echo    '<br>';
echo    '<input type="submit" name="form_origin" value="profile_create_next">';
echo    '</div>';
echo    '</div>';
echo    '</form>';

echo    '</div>';
echo    '<div class="block_image_text">';
echo    '<h1>Criminal record entries</h1> <br>';
echo    '<form action="profile_finish.php" method="POST">';

    if (isset($_SESSION['record_entries_list'])){
        criminalRecordEntries();
    } else {
        echo '<p>No criminal record entries found.</p>';
    }
    // Loop through each entry and display its details


echo    '</div>';
echo    '<div><input type="submit" value="Finish Profile Creation"></div>';
echo    '</div>';

echo    '</body>';
echo    '</html>';
?>
