<?php
include_once "../compon.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "";
}
if (isset($_GET["message"])) {
    $message = $_GET["message"];
} else {
    $message = "";
}
if (isset($_GET["mediauploaderr"])) {
    $mediauploaderr = $_GET["mediauploaderr"];
} else {
    $mediauploaderr = "";
}
?>
<?php

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Compon::siteTitle("Climate Change Policy Networks"); ?></title>

    <?php Compon::adminStylesSheets(); ?>

    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>
    <section class="dashboard" id="dashboard" class="d-flex">
        <div class="admin-sidebar">
            <?php Compon::adminNavbar(); ?>
        </div>
        <div class="main-content d-flex flex-column align-items-stretch bg-white">

            <!--page header start-->
            <div class="container-fluid border-bottom border-secondary d-flex align-items-center dash-header-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="dash-header pb-2">
                            <h2>Manage Team Member</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!--page header end-->

            <!--response message start-->
            <div class="response-wrapper">
                <?php
                if ($action == "" || ($action == "create" && $message == "" && $mediauploaderr == "") || ($action == "update" && $message == "" && $mediauploaderr == "")) {
                ?>
                    <div class="container-fluid br-0 alert alert-info" role="alert">
                        Kindly fill all required fields*
                    </div>
                <?php
                }
                if ($action == "create" && $message == "success") {
                ?>
                    <div class="container-fluid br-0 alert alert-success" role="alert">
                        <i class="bi bi-check-lg"></i> New team member created successfully.
                    </div>
                <?php
                }
                if ($action == "create" && $message == "failure") {
                ?>
                    <div class="container-fluid br-0 alert alert-danger" role="alert">
                        <i class="bi bi-info-lg"></i> Unexpected error occured. Unable to create new team member.
                    </div>
                <?php
                }
                if ($action == "update" && $message == "success") {
                ?>
                    <div class="container-fluid br-0 alert alert-success" role="alert">
                        <i class="bi bi-check-lg"></i> Team member updated successfully.
                    </div>
                <?php
                }
                if ($action == "update" && $message == "failure") {
                ?>
                    <div class="container-fluid br-0 alert alert-danger" role="alert">
                        <i class="bi bi-info-lg"></i> Unexpected error occured. Unable to update the team member.
                    </div>
                <?php
                }
                if ($action == "delete" && $message == "success") {
                ?>
                    <div class="container-fluid br-0 alert alert-success" role="alert">
                        <i class="bi bi-check-lg"></i> Team member deleted successfully.
                    </div>
                <?php
                }
                if ($action == "delete" && $message == "failure") {
                ?>
                    <div class="container-fluid br-0 alert alert-danger" role="alert">
                        <i class="bi bi-info-lg"></i> Unexpected error occured. Unable to delete the team member.
                    </div>
                <?php
                }
                if ($action == "update" && $mediauploaderr != "") {
                    ?>
                        <div class="container-fluid br-0 alert alert-danger" role="alert">
                            <i class="bi bi-info-lg"></i> <?php echo $mediauploaderr; ?>
                        </div>
                    <?php
                    }
                ?>
            </div>
            <!--response message end-->

            <!--page content wrapper start-->
            <div class="scrollarea">
                <div class="container-fluid">
                    <form name="case-tems-form" action="forms.php" class="g-3" method="post" enctype="multipart/form-data">
                        <?php
                        $form_action = "create";
                        if($action == "update"){
                            $form_action = "update";
                            $id = addslashes(base64_decode($_GET["id"]));
                            $tm = Compon::getCaseTeamMembers("*", "id='$id' LIMIT 1");
                            if(sizeof($tm) > 0) {
                                $p_name = $tm[0]["name"];
                                $p_university = $tm[0]["university"];
                                $p_country = $tm[0]["country"];
                                $p_photo = $tm[0]["photo"];
                                $p_email = $tm[0]["email"];
                                $p_orderno = $tm[0]["orderno"];
                                $p_membertype = $tm[0]["membertype"];
                                $p_website = $tm[0]["website"];
                                $p_linkedin = $tm[0]["linkedin"];
                                $p_twitter = $tm[0]["twitter"];
                                $p_facebook = $tm[0]["facebook"];
                            }
                        }
                        ?>
                        <input type="hidden" name="action" value="<?php echo $form_action; ?>" />
                        <input type="hidden" name="id" value="<?php echo base64_encode($id); ?>" />
                        <input type="hidden" name="oldphoto" value="<?php echo $p_photo; ?>" />
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <div style="width: 150px;">
                                    <img class="img-fluid rounded-circle shadow" src="../images/members/<?php if(isset($p_photo) && $p_photo != "") echo $p_photo; else echo "ct-dummy.jpg"; ?>" />
                                </div>
                            </div>
                            <hr />
                            <div class="col-12 col-md-3">
                                <label for="name" class="form-label">Name*</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php if (isset($p_name)) echo $p_name; ?>" placeholder="Enter team member's name..." required />
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="university" class="form-label">University*</label>
                                <input type="text" class="form-control" name="university" id="university" value="<?php if (isset($p_university)) echo $p_university; ?>" placeholder="Enter university's name..." required />
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="country" class="form-label">Country*</label>
                                <select class="form-select" name="country" id="country" required>
                                    <option value="<?php if (isset($p_country) && $p_country != "") echo $p_country;
                                                    else echo ""; ?>" hidden selected><?php if (isset($p_country) && $p_country != "") echo $p_country;
                                                                                                                                                        else echo "Kindly select country"; ?></option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antartica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Islands">Cocos Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo">Congo, the Democratic Republic of the</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                    <option value="Croatia">Croatia (Hrvatska)</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="France Metropolitan">France, Metropolitan</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                    <option value="Holy See">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran (Islamic Republic of)</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                    <option value="Korea">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia, Federated States of</option>
                                    <option value="Moldova">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint LUCIA">Saint LUCIA</option>
                                    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                    <option value="Span">Spain</option>
                                    <option value="SriLanka">Sri Lanka</option>
                                    <option value="St. Helena">St. Helena</option>
                                    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syrian Arab Republic</option>
                                    <option value="Taiwan">Taiwan, Province of China</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Viet Nam</option>
                                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" name="photo" id="photo" accept="image/png, image/jpeg" />
                                <label style="font-size: 12px; color: #979797; font-weight: 500;">Max size: 512KB, Min dimension: 200Wx200H</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php if (isset($p_email)) echo $p_email; ?>" placeholder="Enter email address..." />
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="orderno" class="form-label">Team Member Order</label>
                                <select name="orderno" id="orderno" class="form-select">
                                    <option selected value="<?php if(isset($p_order) && $p_order !="") echo $p_order; else echo ""; ?>" hidden><?php if(isset($p_order) && $p_order !="") echo $p_order; else echo "Choose order"; ?></option>
                                    <?php
                                        for($i=1; $i<=100; $i++){
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 member-types">
                                <div class="filter-heading mt-0" style="color: #2f3033;"><strong>Member Type</strong></div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="membertype" id="membertype1" value="Case Team Member" <?php if(isset($p_membertype) && $p_membertype == "Case Team Member") echo "checked"; ?>>
                                    <label class="form-check-label" for="membertype1">
                                        Case Team Member
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="membertype" id="membertype2" value="Steering Committee Member" <?php if(isset($p_membertype) && $p_membertype == "Steering Committee Member") echo "checked"; ?>>
                                    <label class="form-check-label" for="membertype2">
                                        Steering Committee Member
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" id="website" value="<?php if (isset($p_website)) echo $p_website; ?>" placeholder="Enter Website's link..." />
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" name="twitter" id="twitter" value="<?php if (isset($p_twitter)) echo $p_twitter; ?>" placeholder="Enter Twitter's profile link..." />
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="linkedin" class="form-label">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php if (isset($p_linkedin)) echo $p_linkedin; ?>" placeholder="Enter Linkedin's profile link..." />
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php if (isset($p_facebook)) echo $p_facebook; ?>" placeholder="Enter Facebook's profile link..." />
                            </div>

                            <div class="col-12">
                                <?php
                                    if($action == "update"){
                                        ?>
                                        <button type="submit" class="btn btn-success" name="submit-teammember"><i class="bi bi-pencil-square"></i> Update Team Member</button>
                                        <a href="manage-case-teams.php" class="btn btn-warning"><i class="bi bi-plus-lg"></i> Create New Team Member</a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button type="submit" class="btn btn-success" name="submit-teammember"><i class="bi bi-send-fill"></i> Submit</button>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="dt-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#SN</th>
                                        <th>Name</th>
                                        <th>University</th>
                                        <th>Country</th>
                                        <th>Email</th>
                                        <th style="min-width: 215px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $teamMembers = Compon::getCaseTeamMembers("*", "id!='' AND status='published' ORDER BY id DESC");
                                    //echo "<pre>"; var_dump($teamMembers); exit;
                                    if (sizeof($teamMembers) > 0) {
                                        $counter = 0;
                                        foreach ($teamMembers as $teamMember) {
                                            $id = base64_encode($teamMember["id"]);
                                    ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><?php echo $teamMember["name"]; ?></td>
                                                <td><?php echo $teamMember["email"]; ?></td>
                                                <td><?php echo $teamMember["country"]; ?></td>
                                                <td><?php echo $teamMember["email"]; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="manage-case-teams.php?action=update&id=<?php echo $id; ?>"><i class="bi bi-pencil-square"></i> Update</a>
                                                    <a class="btn btn-danger" href="forms.php?action=delete-teammembers&id=<?php echo $id; ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="bi bi-trash-fill"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">No records found!</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--page content wrapper end-->

        </div>
    </section>

    <?php Compon::adminScripts(); ?>
</body>

</html>