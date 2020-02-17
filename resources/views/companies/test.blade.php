<form method="post" accept-charset="utf-8" id="company_form" action="/companies/add/">
    <div style="display:none;"><input type="hidden" name="_method" value="POST" /></div>
    <div class="nav-tabs-custom">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="basic_info">Companyinfo</a></li>
            <li><a href="#" id="super_admin">Administrator</a></li>
        </ul>

        <div id="basic_info_div">
            <div class="form-group">
                <div class="input text required"><label class="required" for="company-name">Company</label><input type="text"
                        name="company[name]" class="form-control" required="required" maxlength="50" id="company-name" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input text required"><label class="required" for="company-cname">Contact name</label><input
                        type="text" name="company[cname]" class="form-control required" required="required" maxlength="100"
                        id="company-cname" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input text required"><label class="required" for="company-cemail">Contact email</label><input
                        type="text" name="company[cemail]" class="form-control required" required="required" maxlength="100"
                        id="company-cemail" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input text required"><label class="required" for="company-address1">Address 1</label><input
                        type="text" name="company[address1]" class="form-control required" required="required"
                        maxlength="50" id="company-address1" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input text"><label for="company-address2">Address 2</label><input type="text" name="company[address2]"
                        class="form-control" maxlength="50" id="company-address2" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input text required"><label class="required" for="company-city">City</label><input type="text"
                        name="company[city]" class="form-control required" required="required" maxlength="15" id="company-city" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input text required"><label class="required" for="company-state">State</label><input type="text"
                        name="company[state]" class="form-control required" required="required" maxlength="15" id="company-state" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input select required"><label class="required" for="company-country">Country</label><select
                        name="company[country]" class="form-control required" required="required" id="company-country">
                        <option value="">Select Country</option>
                        <option value="0">Afghanistan</option>
                        <option value="1">Albania</option>
                        <option value="2">Algeria</option>
                        <option value="3">American Samoa</option>
                        <option value="4">Andorra</option>
                        <option value="5">Angola</option>
                        <option value="6">Anguilla</option>
                        <option value="7">Antarctica</option>
                        <option value="8">Antigua and Barbuda</option>
                        <option value="9">Argentina</option>
                        <option value="10">Armenia</option>
                        <option value="11">Aruba</option>
                        <option value="12">Australia</option>
                        <option value="13">Austria</option>
                        <option value="14">Azerbaijan</option>
                        <option value="15">Bahamas</option>
                        <option value="16">Bahrain</option>
                        <option value="17">Bangladesh</option>
                        <option value="18">Barbados</option>
                        <option value="19">Belarus</option>
                        <option value="20">Belgium</option>
                        <option value="21">Belize</option>
                        <option value="22">Benin</option>
                        <option value="23">Bermuda</option>
                        <option value="24">Bhutan</option>
                        <option value="25">Bolivia</option>
                        <option value="26">Bosnia and Herzegowina</option>
                        <option value="27">Botswana</option>
                        <option value="28">Bouvet Island</option>
                        <option value="29">Brazil</option>
                        <option value="30">British Indian Ocean Territory</option>
                        <option value="31">Brunei Darussalam</option>
                        <option value="32">Bulgaria</option>
                        <option value="33">Burkina Faso</option>
                        <option value="34">Burundi</option>
                        <option value="35">Cambodia</option>
                        <option value="36">Cameroon</option>
                        <option value="37">Canada</option>
                        <option value="38">Cape Verde</option>
                        <option value="39">Cayman Islands</option>
                        <option value="40">Central African Republic</option>
                        <option value="41">Chad</option>
                        <option value="42">Chile</option>
                        <option value="43">China</option>
                        <option value="44">Christmas Island</option>
                        <option value="45">Cocos (Keeling) Islands</option>
                        <option value="46">Colombia</option>
                        <option value="47">Comoros</option>
                        <option value="48">Congo</option>
                        <option value="49">Congo, the Democratic Republic of the</option>
                        <option value="50">Cook Islands</option>
                        <option value="51">Costa Rica</option>
                        <option value="52">Cote d&#039;Ivoire</option>
                        <option value="53">Croatia (Hrvatska)</option>
                        <option value="54">Cuba</option>
                        <option value="55">Cyprus</option>
                        <option value="56">Czech Republic</option>
                        <option value="57">Denmark</option>
                        <option value="58">Djibouti</option>
                        <option value="59">Dominica</option>
                        <option value="60">Dominican Republic</option>
                        <option value="61">East Timor</option>
                        <option value="62">Ecuador</option>
                        <option value="63">Egypt</option>
                        <option value="64">El Salvador</option>
                        <option value="65">Equatorial Guinea</option>
                        <option value="66">Eritrea</option>
                        <option value="67">Estonia</option>
                        <option value="68">Ethiopia</option>
                        <option value="69">Falkland Islands (Malvinas)</option>
                        <option value="70">Faroe Islands</option>
                        <option value="71">Fiji</option>
                        <option value="72">Finland</option>
                        <option value="73">France</option>
                        <option value="74">France Metropolitan</option>
                        <option value="75">French Guiana</option>
                        <option value="76">French Polynesia</option>
                        <option value="77">French Southern Territories</option>
                        <option value="78">Gabon</option>
                        <option value="79">Gambia</option>
                        <option value="80">Georgia</option>
                        <option value="81">Germany</option>
                        <option value="82">Ghana</option>
                        <option value="83">Gibraltar</option>
                        <option value="84">Greece</option>
                        <option value="85">Greenland</option>
                        <option value="86">Grenada</option>
                        <option value="87">Guadeloupe</option>
                        <option value="88">Guam</option>
                        <option value="89">Guatemala</option>
                        <option value="90">Guinea</option>
                        <option value="91">Guinea-Bissau</option>
                        <option value="92">Guyana</option>
                        <option value="93">Haiti</option>
                        <option value="94">Heard and Mc Donald Islands</option>
                        <option value="95">Holy See (Vatican City State)</option>
                        <option value="96">Honduras</option>
                        <option value="97">Hong Kong</option>
                        <option value="98">Hungary</option>
                        <option value="99">Iceland</option>
                        <option value="100">India</option>
                        <option value="101">Indonesia</option>
                        <option value="102">Iran (Islamic Republic of)</option>
                        <option value="103">Iraq</option>
                        <option value="104">Ireland</option>
                        <option value="105">Israel</option>
                        <option value="106">Italy</option>
                        <option value="107">Jamaica</option>
                        <option value="108">Japan</option>
                        <option value="109">Jordan</option>
                        <option value="110">Kazakhstan</option>
                        <option value="111">Kenya</option>
                        <option value="112">Kiribati</option>
                        <option value="113">Korea, Democratic People&#039;s Republic of</option>
                        <option value="114">Korea, Republic of</option>
                        <option value="115">Kuwait</option>
                        <option value="116">Kyrgyzstan</option>
                        <option value="117">Lao, People&#039;s Democratic Republic</option>
                        <option value="118">Latvia</option>
                        <option value="119">Lebanon</option>
                        <option value="120">Lesotho</option>
                        <option value="121">Liberia</option>
                        <option value="122">Libyan Arab Jamahiriya</option>
                        <option value="123">Liechtenstein</option>
                        <option value="124">Lithuania</option>
                        <option value="125">Luxembourg</option>
                        <option value="126">Macau</option>
                        <option value="127">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="128">Madagascar</option>
                        <option value="129">Malawi</option>
                        <option value="130">Malaysia</option>
                        <option value="131">Maldives</option>
                        <option value="132">Mali</option>
                        <option value="133">Malta</option>
                        <option value="134">Marshall Islands</option>
                        <option value="135">Martinique</option>
                        <option value="136">Mauritania</option>
                        <option value="137">Mauritius</option>
                        <option value="138">Mayotte</option>
                        <option value="139">Mexico</option>
                        <option value="140">Micronesia, Federated States of</option>
                        <option value="141">Moldova, Republic of</option>
                        <option value="142">Monaco</option>
                        <option value="143">Mongolia</option>
                        <option value="144">Montserrat</option>
                        <option value="145">Morocco</option>
                        <option value="146">Mozambique</option>
                        <option value="147">Myanmar</option>
                        <option value="148">Namibia</option>
                        <option value="149">Nauru</option>
                        <option value="150">Nepal</option>
                        <option value="151">Netherlands</option>
                        <option value="152">Netherlands Antilles</option>
                        <option value="153">New Caledonia</option>
                        <option value="154">New Zealand</option>
                        <option value="155">Nicaragua</option>
                        <option value="156">Niger</option>
                        <option value="157">Nigeria</option>
                        <option value="158">Niue</option>
                        <option value="159">Norfolk Island</option>
                        <option value="160">Northern Mariana Islands</option>
                        <option value="161">Norway</option>
                        <option value="162">Oman</option>
                        <option value="163">Pakistan</option>
                        <option value="164">Palau</option>
                        <option value="165">Panama</option>
                        <option value="166">Papua New Guinea</option>
                        <option value="167">Paraguay</option>
                        <option value="168">Peru</option>
                        <option value="169">Philippines</option>
                        <option value="170">Pitcairn</option>
                        <option value="171">Poland</option>
                        <option value="172">Portugal</option>
                        <option value="173">Puerto Rico</option>
                        <option value="174">Qatar</option>
                        <option value="175">Reunion</option>
                        <option value="176">Romania</option>
                        <option value="177">Russian Federation</option>
                        <option value="178">Rwanda</option>
                        <option value="179">Saint Kitts and Nevis</option>
                        <option value="180">Saint Lucia</option>
                        <option value="181">Saint Vincent and the Grenadines</option>
                        <option value="182">Samoa</option>
                        <option value="183">San Marino</option>
                        <option value="184">Sao Tome and Principe</option>
                        <option value="185">Saudi Arabia</option>
                        <option value="186">Senegal</option>
                        <option value="187">Seychelles</option>
                        <option value="188">Sierra Leone</option>
                        <option value="189">Singapore</option>
                        <option value="190">Slovakia (Slovak Republic)</option>
                        <option value="191">Slovenia</option>
                        <option value="192">Solomon Islands</option>
                        <option value="193">Somalia</option>
                        <option value="194">South Africa</option>
                        <option value="195">South Georgia and the South Sandwich Islands</option>
                        <option value="196">Spain</option>
                        <option value="197">Sri Lanka</option>
                        <option value="198">St. Helena</option>
                        <option value="199">St. Pierre and Miquelon</option>
                        <option value="200">Sudan</option>
                        <option value="201">Suriname</option>
                        <option value="202">Svalbard and Jan Mayen Islands</option>
                        <option value="203">Swaziland</option>
                        <option value="204">Sweden</option>
                        <option value="205">Switzerland</option>
                        <option value="206">Syrian Arab Republic</option>
                        <option value="207">Taiwan, Province of China</option>
                        <option value="208">Tajikistan</option>
                        <option value="209">Tanzania, United Republic of</option>
                        <option value="210">Thailand</option>
                        <option value="211">Togo</option>
                        <option value="212">Tokelau</option>
                        <option value="213">Tonga</option>
                        <option value="214">Trinidad and Tobago</option>
                        <option value="215">Tunisia</option>
                        <option value="216">Turkey</option>
                        <option value="217">Turkmenistan</option>
                        <option value="218">Turks and Caicos Islands</option>
                        <option value="219">Tuvalu</option>
                        <option value="220">Uganda</option>
                        <option value="221">Ukraine</option>
                        <option value="222">United Arab Emirates</option>
                        <option value="223">United Kingdom</option>
                        <option value="224">United States</option>
                        <option value="225">United States Minor Outlying Islands</option>
                        <option value="226">Uruguay</option>
                        <option value="227">Uzbekistan</option>
                        <option value="228">Vanuatu</option>
                        <option value="229">Venezuela</option>
                        <option value="230">Vietnam</option>
                        <option value="231">Virgin Islands (British)</option>
                        <option value="232">Virgin Islands (U.S.)</option>
                        <option value="233">Wallis and Futuna Islands</option>
                        <option value="234">Western Sahara</option>
                        <option value="235">Yemen</option>
                        <option value="236">Yugoslavia</option>
                        <option value="237">Zambia</option>
                        <option value="238">Zimbabwe</option>
                    </select></div>
            </div>

            <div class="form-group">
                <div class="input text required"><label class="required" for="company-postcode">Postcode</label><input
                        type="text" name="company[postcode]" class="form-control required" required="required"
                        maxlength="10" id="company-postcode" /></div>
            </div>

            <div class="form-group">
                <div class="input tel required"><label class="required" for="company-phone">Phone</label><input type="tel"
                        name="company[phone]" class="form-control required" required="required" maxlength="15" id="company-phone" /></div>
            </div>
            <!-- /.form-group -->
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input select required"><label class="required" for="company-timezone">Time Zone</label><select
                        name="company[timezone]" class="form-control" required="required" id="company-timezone">
                        <option value="">Select Time Zone</option>
                        <option value="1">Africa/Abidjan +00:00</option>
                        <option value="2">Africa/Accra +00:00</option>
                        <option value="3">Africa/Addis_Ababa +03:00</option>
                        <option value="4">Africa/Algiers +01:00</option>
                        <option value="5">Africa/Asmara +03:00</option>
                        <option value="6">Africa/Asmera +03:00</option>
                        <option value="7">Africa/Bamako +00:00</option>
                        <option value="8">Africa/Bangui +01:00</option>
                        <option value="9">Africa/Banjul +00:00</option>
                        <option value="10">Africa/Bissau +00:00</option>
                        <option value="11">Africa/Blantyre +02:00</option>
                        <option value="12">Africa/Brazzaville +01:00</option>
                        <option value="13">Africa/Bujumbura +02:00</option>
                        <option value="14">Africa/Cairo +02:00</option>
                        <option value="15">Africa/Casablanca +00:00</option>
                        <option value="16">Africa/Ceuta +01:00</option>
                        <option value="17">Africa/Conakry +00:00</option>
                        <option value="18">Africa/Dakar +00:00</option>
                        <option value="19">Africa/Dar_es_Salaam +03:00</option>
                        <option value="20">Africa/Djibouti +03:00</option>
                        <option value="21">Africa/Douala +01:00</option>
                        <option value="22">Africa/El_Aaiun +00:00</option>
                        <option value="23">Africa/Freetown +00:00</option>
                        <option value="24">Africa/Gaborone +02:00</option>
                        <option value="25">Africa/Harare +02:00</option>
                        <option value="26">Africa/Johannesburg +02:00</option>
                        <option value="27">Africa/Juba +03:00</option>
                        <option value="28">Africa/Kampala +03:00</option>
                        <option value="29">Africa/Khartoum +03:00</option>
                        <option value="30">Africa/Kigali +02:00</option>
                        <option value="31">Africa/Kinshasa +01:00</option>
                        <option value="32">Africa/Lagos +01:00</option>
                        <option value="33">Africa/Libreville +01:00</option>
                        <option value="34">Africa/Lome +00:00</option>
                        <option value="35">Africa/Luanda +01:00</option>
                        <option value="36">Africa/Lubumbashi +02:00</option>
                        <option value="37">Africa/Lusaka +02:00</option>
                        <option value="38">Africa/Malabo +01:00</option>
                        <option value="39">Africa/Maputo +02:00</option>
                        <option value="40">Africa/Maseru +02:00</option>
                        <option value="41">Africa/Mbabane +02:00</option>
                        <option value="42">Africa/Mogadishu +03:00</option>
                        <option value="43">Africa/Monrovia +00:00</option>
                        <option value="44">Africa/Nairobi +03:00</option>
                        <option value="45">Africa/Ndjamena +01:00</option>
                        <option value="46">Africa/Niamey +01:00</option>
                        <option value="47">Africa/Nouakchott +00:00</option>
                        <option value="48">Africa/Ouagadougou +00:00</option>
                        <option value="49">Africa/Porto-Novo +01:00</option>
                        <option value="50">Africa/Sao_Tome +00:00</option>
                        <option value="51">Africa/Timbuktu +00:00</option>
                        <option value="52">Africa/Tripoli +01:00</option>
                        <option value="53">Africa/Tunis +01:00</option>
                        <option value="54">Africa/Windhoek +01:00</option>
                        <option value="55">AKST9AKDT -09:00</option>
                        <option value="56">America/Adak -10:00</option>
                        <option value="57">America/Anchorage -09:00</option>
                        <option value="58">America/Anguilla -04:00</option>
                        <option value="59">America/Antigua -04:00</option>
                        <option value="60">America/Araguaina -03:00</option>
                        <option value="61">America/Argentina/Buenos_Aires -03:00</option>
                        <option value="62">America/Argentina/Catamarca -03:00</option>
                        <option value="63">America/Argentina/ComodRivadavia -03:00</option>
                        <option value="64">America/Argentina/Cordoba -03:00</option>
                        <option value="65">America/Argentina/Jujuy -03:00</option>
                        <option value="66">America/Argentina/La_Rioja -03:00</option>
                        <option value="67">America/Argentina/Mendoza -03:00</option>
                        <option value="68">America/Argentina/Rio_Gallegos -03:00</option>
                        <option value="69">America/Argentina/Salta -03:00</option>
                        <option value="70">America/Argentina/San_Juan -03:00</option>
                        <option value="71">America/Argentina/San_Luis -03:00</option>
                        <option value="72">America/Argentina/Tucuman -03:00</option>
                        <option value="73">America/Argentina/Ushuaia -03:00</option>
                        <option value="74">America/Aruba -04:00</option>
                        <option value="75">America/Asuncion -04:00</option>
                        <option value="76">America/Atikokan -05:00</option>
                        <option value="77">America/Atka -10:00</option>
                        <option value="78">America/Bahia -03:00</option>
                        <option value="79">America/Bahia_Banderas -06:00</option>
                        <option value="80">America/Barbados -04:00</option>
                        <option value="81">America/Belem -03:00</option>
                        <option value="82">America/Belize -06:00</option>
                        <option value="83">America/Blanc-Sablon -04:00</option>
                        <option value="84">America/Boa_Vista -04:00</option>
                        <option value="85">America/Bogota -05:00</option>
                        <option value="86">America/Boise -07:00</option>
                        <option value="87">America/Buenos_Aires -03:00</option>
                        <option value="88">America/Cambridge_Bay -07:00</option>
                        <option value="89">America/Campo_Grande -04:00</option>
                        <option value="90">America/Cancun -06:00</option>
                        <option value="91">America/Caracas -04:30</option>
                        <option value="92">America/Catamarca -03:00</option>
                        <option value="93">America/Cayenne -03:00</option>
                        <option value="94">America/Cayman -05:00</option>
                        <option value="95">America/Chicago -06:00</option>
                        <option value="96">America/Chihuahua -07:00</option>
                        <option value="97">America/Coral_Harbour -05:00</option>
                        <option value="98">America/Cordoba -03:00</option>
                        <option value="99">America/Costa_Rica -06:00</option>
                        <option value="100">America/Creston -07:00</option>
                        <option value="101">America/Cuiaba -04:00</option>
                        <option value="102">America/Curacao -04:00</option>
                        <option value="103">America/Danmarkshavn +00:00</option>
                        <option value="104">America/Dawson -08:00</option>
                        <option value="105">America/Dawson_Creek -07:00</option>
                        <option value="106">America/Denver -07:00</option>
                        <option value="107">America/Detroit -05:00</option>
                        <option value="108">America/Dominica -04:00</option>
                        <option value="109">America/Edmonton -07:00</option>
                        <option value="110">America/Eirunepe -04:00</option>
                        <option value="111">America/El_Salvador -06:00</option>
                        <option value="112">America/Ensenada -08:00</option>
                        <option value="113">America/Fortaleza -03:00</option>
                        <option value="114">America/Fort_Wayne -05:00</option>
                        <option value="115">America/Glace_Bay -04:00</option>
                        <option value="116">America/Godthab -03:00</option>
                        <option value="117">America/Goose_Bay -04:00</option>
                        <option value="118">America/Grand_Turk -05:00</option>
                        <option value="119">America/Grenada -04:00</option>
                        <option value="120">America/Guadeloupe -04:00</option>
                        <option value="121">America/Guatemala -06:00</option>
                        <option value="122">America/Guayaquil -05:00</option>
                        <option value="123">America/Guyana -04:00</option>
                        <option value="124">America/Halifax -04:00</option>
                        <option value="125">America/Havana -05:00</option>
                        <option value="126">America/Hermosillo -07:00</option>
                        <option value="127">America/Indiana/Indianapolis -05:00</option>
                        <option value="128">America/Indiana/Knox -06:00</option>
                        <option value="129">America/Indiana/Marengo -05:00</option>
                        <option value="130">America/Indiana/Petersburg -05:00</option>
                        <option value="131">America/Indiana/Tell_City -06:00</option>
                        <option value="132">America/Indiana/Vevay -05:00</option>
                        <option value="133">America/Indiana/Vincennes -05:00</option>
                        <option value="134">America/Indiana/Winamac -05:00</option>
                        <option value="135">America/Indianapolis -05:00</option>
                        <option value="136">America/Inuvik -07:00</option>
                        <option value="137">America/Iqaluit -05:00</option>
                        <option value="138">America/Jamaica -05:00</option>
                        <option value="139">America/Jujuy -03:00</option>
                        <option value="140">America/Juneau -09:00</option>
                        <option value="141">America/Kentucky/Louisville -05:00</option>
                        <option value="142">America/Kentucky/Monticello -05:00</option>
                        <option value="143">America/Knox_IN -06:00</option>
                        <option value="144">America/Kralendijk -04:00</option>
                        <option value="145">America/La_Paz -04:00</option>
                        <option value="146">America/Lima -05:00</option>
                        <option value="147">America/Los_Angeles -08:00</option>
                        <option value="148">America/Louisville -05:00</option>
                        <option value="149">America/Lower_Princes -04:00</option>
                        <option value="150">America/Maceio -03:00</option>
                        <option value="151">America/Managua -06:00</option>
                        <option value="152">America/Manaus -04:00</option>
                        <option value="153">America/Marigot -04:00</option>
                        <option value="154">America/Martinique -04:00</option>
                        <option value="155">America/Matamoros -06:00</option>
                        <option value="156">America/Mazatlan -07:00</option>
                        <option value="157">America/Mendoza -03:00</option>
                        <option value="158">America/Menominee -06:00</option>
                        <option value="159">America/Merida -06:00</option>
                        <option value="160">America/Metlakatla -08:00</option>
                        <option value="161">America/Mexico_City -06:00</option>
                        <option value="162">America/Miquelon -03:00</option>
                        <option value="163">America/Moncton -04:00</option>
                        <option value="164">America/Monterrey -06:00</option>
                        <option value="165">America/Montevideo -03:00</option>
                        <option value="166">America/Montreal -05:00</option>
                        <option value="167">America/Montserrat -04:00</option>
                        <option value="168">America/Nassau -05:00</option>
                        <option value="169">America/New_York -05:00</option>
                        <option value="170">America/Nipigon -05:00</option>
                        <option value="171">America/Nome -09:00</option>
                        <option value="172">America/Noronha -02:00</option>
                        <option value="173">America/North_Dakota/Beulah -06:00</option>
                        <option value="174">America/North_Dakota/Center -06:00</option>
                        <option value="175">America/North_Dakota/New_Salem -06:00</option>
                        <option value="176">America/Ojinaga -07:00</option>
                        <option value="177">America/Panama -05:00</option>
                        <option value="178">America/Pangnirtung -05:00</option>
                        <option value="179">America/Paramaribo -03:00</option>
                        <option value="180">America/Phoenix -07:00</option>
                        <option value="181">America/Port-au-Prince -05:00</option>
                        <option value="182">America/Porto_Acre -04:00</option>
                        <option value="183">America/Porto_Velho -04:00</option>
                        <option value="184">America/Port_of_Spain -04:00</option>
                        <option value="185">America/Puerto_Rico -04:00</option>
                        <option value="186">America/Rainy_River -06:00</option>
                        <option value="187">America/Rankin_Inlet -06:00</option>
                        <option value="188">America/Recife -03:00</option>
                        <option value="189">America/Regina -06:00</option>
                        <option value="190">America/Resolute -06:00</option>
                        <option value="191">America/Rio_Branco -04:00</option>
                        <option value="192">America/Rosario -03:00</option>
                        <option value="193">America/Santarem -03:00</option>
                        <option value="194">America/Santa_Isabel -08:00</option>
                        <option value="195">America/Santiago -04:00</option>
                        <option value="196">America/Santo_Domingo -04:00</option>
                        <option value="197">America/Sao_Paulo -03:00</option>
                        <option value="198">America/Scoresbysund -01:00</option>
                        <option value="199">America/Shiprock -07:00</option>
                        <option value="200">America/Sitka -09:00</option>
                        <option value="201">America/St_Barthelemy -04:00</option>
                        <option value="202">America/St_Johns -03:30</option>
                        <option value="203">America/St_Kitts -04:00</option>
                        <option value="204">America/St_Lucia -04:00</option>
                        <option value="205">America/St_Thomas -04:00</option>
                        <option value="206">America/St_Vincent -04:00</option>
                        <option value="207">America/Swift_Current -06:00</option>
                        <option value="208">America/Tegucigalpa -06:00</option>
                        <option value="209">America/Thule -04:00</option>
                        <option value="210">America/Thunder_Bay -05:00</option>
                        <option value="211">America/Tijuana -08:00</option>
                        <option value="212">America/Toronto -05:00</option>
                        <option value="213">America/Tortola -04:00</option>
                        <option value="214">America/Vancouver -08:00</option>
                        <option value="215">America/Virgin -04:00</option>
                        <option value="216">America/Whitehorse -08:00</option>
                        <option value="217">America/Winnipeg -06:00</option>
                        <option value="218">America/Yakutat -09:00</option>
                        <option value="219">America/Yellowknife -07:00</option>
                        <option value="220">Antarctica/Casey +11:00</option>
                        <option value="221">Antarctica/Davis +05:00</option>
                        <option value="222">Antarctica/DumontDUrville +10:00</option>
                        <option value="223">Antarctica/Macquarie +11:00</option>
                        <option value="224">Antarctica/Mawson +05:00</option>
                        <option value="225">Antarctica/McMurdo +12:00</option>
                        <option value="226">Antarctica/Palmer -04:00</option>
                        <option value="227">Antarctica/Rothera -03:00</option>
                        <option value="228">Antarctica/South_Pole +12:00</option>
                        <option value="229">Antarctica/Syowa +03:00</option>
                        <option value="230">Antarctica/Vostok +06:00</option>
                        <option value="231">Arctic/Longyearbyen +01:00</option>
                        <option value="232">Asia/Aden +03:00</option>
                        <option value="233">Asia/Almaty +06:00</option>
                        <option value="234">Asia/Amman +03:00</option>
                        <option value="235">Asia/Anadyr +12:00</option>
                        <option value="236">Asia/Aqtau +05:00</option>
                        <option value="237">Asia/Aqtobe +05:00</option>
                        <option value="238">Asia/Ashgabat +05:00</option>
                        <option value="239">Asia/Ashkhabad +05:00</option>
                        <option value="240">Asia/Baghdad +03:00</option>
                        <option value="241">Asia/Bahrain +03:00</option>
                        <option value="242">Asia/Baku +04:00</option>
                        <option value="243">Asia/Bangkok +07:00</option>
                        <option value="244">Asia/Beirut +02:00</option>
                        <option value="245">Asia/Bishkek +06:00</option>
                        <option value="246">Asia/Brunei +08:00</option>
                        <option value="247">Asia/Calcutta +05:30</option>
                        <option value="248">Asia/Choibalsan +08:00</option>
                        <option value="249">Asia/Chongqing +08:00</option>
                        <option value="250">Asia/Chungking +08:00</option>
                        <option value="251">Asia/Colombo +05:30</option>
                        <option value="252">Asia/Dacca +06:00</option>
                        <option value="253">Asia/Damascus +02:00</option>
                        <option value="254">Asia/Dhaka +06:00</option>
                        <option value="255">Asia/Dili +09:00</option>
                        <option value="256">Asia/Dubai +04:00</option>
                        <option value="257">Asia/Dushanbe +05:00</option>
                        <option value="258">Asia/Gaza +02:00</option>
                        <option value="259">Asia/Harbin +08:00</option>
                        <option value="260">Asia/Hebron +02:00</option>
                        <option value="261">Asia/Hong_Kong +08:00</option>
                        <option value="262">Asia/Hovd +07:00</option>
                        <option value="263">Asia/Ho_Chi_Minh +07:00</option>
                        <option value="264">Asia/Irkutsk +09:00</option>
                        <option value="265">Asia/Istanbul +02:00</option>
                        <option value="266">Asia/Jakarta +07:00</option>
                        <option value="267">Asia/Jayapura +09:00</option>
                        <option value="268">Asia/Jerusalem +02:00</option>
                        <option value="269">Asia/Kabul +04:30</option>
                        <option value="270">Asia/Kamchatka +12:00</option>
                        <option value="271">Asia/Karachi +05:00</option>
                        <option value="272">Asia/Kashgar +08:00</option>
                        <option value="273">Asia/Kathmandu +05:45</option>
                        <option value="274">Asia/Katmandu +05:45</option>
                        <option value="275">Asia/Kolkata +05:30</option>
                        <option value="276">Asia/Krasnoyarsk +08:00</option>
                        <option value="277">Asia/Kuala_Lumpur +08:00</option>
                        <option value="278">Asia/Kuching +08:00</option>
                        <option value="279">Asia/Kuwait +03:00</option>
                        <option value="280">Asia/Macao +08:00</option>
                        <option value="281">Asia/Macau +08:00</option>
                        <option value="282">Asia/Magadan +12:00</option>
                        <option value="283">Asia/Makassar +08:00</option>
                        <option value="284">Asia/Manila +08:00</option>
                        <option value="285">Asia/Muscat +04:00</option>
                        <option value="286">Asia/Nicosia +02:00</option>
                        <option value="287">Asia/Novokuznetsk +07:00</option>
                        <option value="288">Asia/Novosibirsk +07:00</option>
                        <option value="289">Asia/Omsk +07:00</option>
                        <option value="290">Asia/Oral +05:00</option>
                        <option value="291">Asia/Phnom_Penh +07:00</option>
                        <option value="292">Asia/Pontianak +07:00</option>
                        <option value="293">Asia/Pyongyang +09:00</option>
                        <option value="294">Asia/Qatar +03:00</option>
                        <option value="295">Asia/Qyzylorda +06:00</option>
                        <option value="296">Asia/Rangoon +06:30</option>
                        <option value="297">Asia/Riyadh +03:00</option>
                        <option value="298">Asia/Saigon +07:00</option>
                        <option value="299">Asia/Sakhalin +11:00</option>
                        <option value="300">Asia/Samarkand +05:00</option>
                        <option value="301">Asia/Seoul +09:00</option>
                        <option value="302">Asia/Shanghai +08:00</option>
                        <option value="303">Asia/Singapore +08:00</option>
                        <option value="304">Asia/Taipei +08:00</option>
                        <option value="305">Asia/Tashkent +05:00</option>
                        <option value="306">Asia/Tbilisi +04:00</option>
                        <option value="307">Asia/Tehran +03:30</option>
                        <option value="308">Asia/Tel_Aviv +02:00</option>
                        <option value="309">Asia/Thimbu +06:00</option>
                        <option value="310">Asia/Thimphu +06:00</option>
                        <option value="311">Asia/Tokyo +09:00</option>
                        <option value="312">Asia/Ujung_Pandang +08:00</option>
                        <option value="313">Asia/Ulaanbaatar +08:00</option>
                        <option value="314">Asia/Ulan_Bator +08:00</option>
                        <option value="315">Asia/Urumqi +08:00</option>
                        <option value="316">Asia/Vientiane +07:00</option>
                        <option value="317">Asia/Vladivostok +11:00</option>
                        <option value="318">Asia/Yakutsk +10:00</option>
                        <option value="319">Asia/Yekaterinburg +06:00</option>
                        <option value="320">Asia/Yerevan +04:00</option>
                        <option value="321">Atlantic/Azores -01:00</option>
                        <option value="322">Atlantic/Bermuda -04:00</option>
                        <option value="323">Atlantic/Canary +00:00</option>
                        <option value="324">Atlantic/Cape_Verde -01:00</option>
                        <option value="325">Atlantic/Faeroe +00:00</option>
                        <option value="326">Atlantic/Faroe +00:00</option>
                        <option value="327">Atlantic/Jan_Mayen +01:00</option>
                        <option value="328">Atlantic/Madeira +00:00</option>
                        <option value="329">Atlantic/Reykjavik +00:00</option>
                        <option value="330">Atlantic/South_Georgia -02:00</option>
                        <option value="331">Atlantic/Stanley -03:00</option>
                        <option value="332">Atlantic/St_Helena +00:00</option>
                        <option value="333">Australia/ACT +10:00</option>
                        <option value="334">Australia/Adelaide +09:30</option>
                        <option value="335">Australia/Brisbane +10:00</option>
                        <option value="336">Australia/Broken_Hill +09:30</option>
                        <option value="337">Australia/Canberra +10:00</option>
                        <option value="338">Australia/Currie +10:00</option>
                        <option value="339">Australia/Darwin +09:30</option>
                        <option value="340">Australia/Eucla +08:45</option>
                        <option value="341">Australia/Hobart +10:00</option>
                        <option value="342">Australia/LHI +10:30</option>
                        <option value="343">Australia/Lindeman +10:00</option>
                        <option value="344">Australia/Lord_Howe +10:30</option>
                        <option value="345">Australia/Melbourne +10:00</option>
                        <option value="346">Australia/North +09:30</option>
                        <option value="347">Australia/NSW +10:00</option>
                        <option value="348">Australia/Perth +08:00</option>
                        <option value="349">Australia/Queensland +10:00</option>
                        <option value="350">Australia/South +09:30</option>
                        <option value="351">Australia/Sydney +10:00</option>
                        <option value="352">Australia/Tasmania +10:00</option>
                        <option value="353">Australia/Victoria +10:00</option>
                        <option value="354">Australia/West +08:00</option>
                        <option value="355">Australia/Yancowinna +09:30</option>
                        <option value="356">Brazil/Acre -04:00</option>
                        <option value="357">Brazil/DeNoronha -02:00</option>
                        <option value="358">Brazil/East -03:00</option>
                        <option value="359">Brazil/West -04:00</option>
                        <option value="360">Canada/Atlantic -04:00</option>
                        <option value="361">Canada/Central -06:00</option>
                        <option value="362">Canada/East-Saskatchewan -06:00</option>
                        <option value="363">Canada/Eastern -05:00</option>
                        <option value="364">Canada/Mountain -07:00</option>
                        <option value="365">Canada/Newfoundland -03:30</option>
                        <option value="366">Canada/Pacific -08:00</option>
                        <option value="367">Canada/Saskatchewan -06:00</option>
                        <option value="368">Canada/Yukon -08:00</option>
                        <option value="369">CET +01:00</option>
                        <option value="370">Chile/Continental -04:00</option>
                        <option value="371">Chile/EasterIsland -06:00</option>
                        <option value="372">CST6CDT -06:00</option>
                        <option value="373">Cuba -05:00</option>
                        <option value="374">EET +02:00</option>
                        <option value="375">Egypt +02:00</option>
                        <option value="376">Eire +00:00</option>
                        <option value="377">EST -05:00</option>
                        <option value="378">EST5EDT -05:00</option>
                        <option value="379">Etc./GMT +00:00</option>
                        <option value="380">Etc./GMT+0 +00:00</option>
                        <option value="381">Etc./UCT +00:00</option>
                        <option value="382">Etc./Universal +00:00</option>
                        <option value="383">Etc./UTC +00:00</option>
                        <option value="384">Etc./Zulu +00:00</option>
                        <option value="385">Europe/Amsterdam +01:00</option>
                        <option value="386">Europe/Andorra +01:00</option>
                        <option value="387">Europe/Athens +02:00</option>
                        <option value="388">Europe/Belfast +00:00</option>
                        <option value="389">Europe/Belgrade +01:00</option>
                        <option value="390">Europe/Berlin +01:00</option>
                        <option value="391">Europe/Bratislava +01:00</option>
                        <option value="392">Europe/Brussels +01:00</option>
                        <option value="393">Europe/Bucharest +02:00</option>
                        <option value="394">Europe/Budapest +01:00</option>
                        <option value="395">Europe/Chisinau +02:00</option>
                        <option value="396">Europe/Copenhagen +01:00</option>
                        <option value="397">Europe/Dublin +00:00</option>
                        <option value="398">Europe/Gibraltar +01:00</option>
                        <option value="399">Europe/Guernsey +00:00</option>
                        <option value="400">Europe/Helsinki +02:00</option>
                        <option value="401">Europe/Isle_of_Man +00:00</option>
                        <option value="402">Europe/Istanbul +02:00</option>
                        <option value="403">Europe/Jersey +00:00</option>
                        <option value="404">Europe/Kaliningrad +03:00</option>
                        <option value="405">Europe/Kiev +02:00</option>
                        <option value="406">Europe/Lisbon +00:00</option>
                        <option value="407">Europe/Ljubljana +01:00</option>
                        <option value="408">Europe/London +00:00</option>
                        <option value="409">Europe/Luxembourg +01:00</option>
                        <option value="410">Europe/Madrid +01:00</option>
                        <option value="411">Europe/Malta +01:00</option>
                        <option value="412">Europe/Mariehamn +02:00</option>
                        <option value="413">Europe/Minsk +03:00</option>
                        <option value="414">Europe/Monaco +01:00</option>
                        <option value="415">Europe/Moscow +04:00</option>
                        <option value="416">Europe/Nicosia +02:00</option>
                        <option value="417">Europe/Oslo +01:00</option>
                        <option value="418">Europe/Paris +01:00</option>
                        <option value="419">Europe/Podgorica +01:00</option>
                        <option value="420">Europe/Prague +01:00</option>
                        <option value="421">Europe/Riga +02:00</option>
                        <option value="422">Europe/Rome +01:00</option>
                        <option value="423">Europe/Samara +04:00</option>
                        <option value="424">Europe/San_Marino +01:00</option>
                        <option value="425">Europe/Sarajevo +01:00</option>
                        <option value="426">Europe/Simferopol +02:00</option>
                        <option value="427">Europe/Skopje +01:00</option>
                        <option value="428">Europe/Sofia +02:00</option>
                        <option value="429">Europe/Stockholm +01:00</option>
                        <option value="430">Europe/Tallinn +02:00</option>
                        <option value="431">Europe/Tirane +01:00</option>
                        <option value="432">Europe/Tiraspol +02:00</option>
                        <option value="433">Europe/Uzhgorod +02:00</option>
                        <option value="434">Europe/Vaduz +01:00</option>
                        <option value="435">Europe/Vatican +01:00</option>
                        <option value="436">Europe/Vienna +01:00</option>
                        <option value="437">Europe/Vilnius +02:00</option>
                        <option value="438">Europe/Volgograd +04:00</option>
                        <option value="439">Europe/Warsaw +01:00</option>
                        <option value="440">Europe/Zagreb +01:00</option>
                        <option value="441">Europe/Zaporozhye +02:00</option>
                        <option value="442">Europe/Zurich +01:00</option>
                        <option value="443">GB +00:00</option>
                        <option value="444">GB-Eire +00:00</option>
                        <option value="445">GMT +00:00</option>
                        <option value="446">GMT+0 +00:00</option>
                        <option value="447">GMT-0 +00:00</option>
                        <option value="448">GMT0 +00:00</option>
                        <option value="449">Greenwich +00:00</option>
                        <option value="450">Hong Kong +08:00</option>
                        <option value="451">HST -10:00</option>
                        <option value="452">Iceland +00:00</option>
                        <option value="453">Indian/Antananarivo +03:00</option>
                        <option value="454">Indian/Chagos +06:00</option>
                        <option value="455">Indian/Christmas +07:00</option>
                        <option value="456">Indian/Cocos +06:30</option>
                        <option value="457">Indian/Comoro +03:00</option>
                        <option value="458">Indian/Kerguelen +05:00</option>
                        <option value="459">Indian/Mahe +04:00</option>
                        <option value="460">Indian/Maldives +05:00</option>
                        <option value="461">Indian/Mauritius +04:00</option>
                        <option value="462">Indian/Mayotte +03:00</option>
                        <option value="463">Indian/Reunion +04:00</option>
                        <option value="464">Iran +03:30</option>
                        <option value="465">Israel +02:00</option>
                        <option value="466">Jamaica -05:00</option>
                        <option value="467">Japan +09:00</option>
                        <option value="468">JST-9 +09:00</option>
                        <option value="469">Kwajalein +12:00</option>
                        <option value="470">Libya +02:00</option>
                        <option value="471">MET +01:00</option>
                        <option value="472">Mexico/BajaNorte -08:00</option>
                        <option value="473">Mexico/BajaSur -07:00</option>
                        <option value="474">Mexico/General -06:00</option>
                        <option value="475">MST -07:00</option>
                        <option value="476">MST7MDT -07:00</option>
                        <option value="477">Navajo -07:00</option>
                        <option value="478">NZ +12:00</option>
                        <option value="479">NZ-CHAT +12:45</option>
                        <option value="480">Pacific/Apia +13:00</option>
                        <option value="481">Pacific/Auckland +12:00</option>
                        <option value="482">Pacific/Chatham +12:45</option>
                        <option value="483">Pacific/Chuuk +10:00</option>
                        <option value="484">Pacific/Easter -06:00</option>
                        <option value="485">Pacific/Efate +11:00</option>
                        <option value="486">Pacific/Enderbury +13:00</option>
                        <option value="487">Pacific/Fakaofo +13:00</option>
                        <option value="488">Pacific/Fiji +12:00</option>
                        <option value="489">Pacific/Funafuti +12:00</option>
                        <option value="490">Pacific/Galapagos -06:00</option>
                        <option value="491">Pacific/Gambier -09:00</option>
                        <option value="492">Pacific/Guadalcanal +11:00</option>
                        <option value="493">Pacific/Guam +10:00</option>
                        <option value="494">Pacific/Honolulu -10:00</option>
                        <option value="495">Pacific/Johnston -10:00</option>
                        <option value="496">Pacific/Kiritimati +14:00</option>
                        <option value="497">Pacific/Kosrae +11:00</option>
                        <option value="498">Pacific/Kwajalein +12:00</option>
                        <option value="499">Pacific/Majuro +12:00</option>
                        <option value="500">Pacific/Marquesas -09:30</option>
                        <option value="501">Pacific/Midway -11:00</option>
                        <option value="502">Pacific/Nauru +12:00</option>
                        <option value="503">Pacific/Niue -11:00</option>
                        <option value="504">Pacific/Norfolk +11:30</option>
                        <option value="505">Pacific/Noumea +11:00</option>
                        <option value="506">Pacific/Pago_Pago -11:00</option>
                        <option value="507">Pacific/Palau +09:00</option>
                        <option value="508">Pacific/Pitcairn -08:00</option>
                        <option value="509">Pacific/Pohnpei +11:00</option>
                        <option value="510">Pacific/Ponape +11:00</option>
                        <option value="511">Pacific/Port_Moresby +10:00</option>
                        <option value="512">Pacific/Rarotonga -10:00</option>
                        <option value="513">Pacific/Saipan +10:00</option>
                        <option value="514">Pacific/Samoa -11:00</option>
                        <option value="515">Pacific/Tahiti -10:00</option>
                        <option value="516">Pacific/Tarawa +12:00</option>
                        <option value="517">Pacific/Tongatapu +13:00</option>
                        <option value="518">Pacific/Truk +10:00</option>
                        <option value="519">Pacific/Wake +12:00</option>
                        <option value="520">Pacific/Wallis +12:00</option>
                        <option value="521">Pacific/Yap +10:00</option>
                        <option value="522">Poland +01:00</option>
                        <option value="523">Portugal +00:00</option>
                        <option value="524">PRC +08:00</option>
                        <option value="525">PST8PDT -08:00</option>
                        <option value="526">ROC +08:00</option>
                        <option value="527">ROK +09:00</option>
                        <option value="528">Singapore +08:00</option>
                        <option value="529">Turkey +02:00</option>
                        <option value="530">UCT +00:00</option>
                        <option value="531">Universal +00:00</option>
                        <option value="532">US/Alaska -09:00</option>
                        <option value="533">US/Aleutian -10:00</option>
                        <option value="534">US/Arizona -07:00</option>
                        <option value="535">US/Central -06:00</option>
                        <option value="536">US/East-Indiana -05:00</option>
                        <option value="537">US/Eastern -05:00</option>
                        <option value="538">US/Hawaii -10:00</option>
                        <option value="539">US/Indiana-Starke -06:00</option>
                        <option value="540">US/Michigan -05:00</option>
                        <option value="541">US/Mountain -07:00</option>
                        <option value="542">US/Pacific -08:00</option>
                        <option value="543">US/Pacific-New -08:00</option>
                        <option value="544">US/Samoa -11:00</option>
                        <option value="545">UTC +00:00</option>
                        <option value="546">W-SU +04:00</option>
                        <option value="547">WET +00:00</option>
                        <option value="548">Zulu +00:00</option>
                    </select></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input file required"><label class="required" for="company-logo">Logo</label><input type="file"
                        name="company[logo]" data-toggle="modal" data-target="#myModal-3" required="required" id="company-logo"></div>
            </div>
            <!-- /.form-group -->
            <ul class="list-unstyled uploaded_files">
                <div class="form-group">
                    <button type="button" class="btn btn-primary tab1Next">Next</button> </div><br />
                <!-- /.form-group -->
            </ul>
        </div>

        <div id="super_admin_div" class="hide">
            <div class="form-group">
                <div class="input select required"><label for="cmsuser-language">Language</label><select name="cmsuser[language]"
                        class="form-control required" required="required" id="cmsuser-language">
                        <option value="en">English</option>
                        <option value="ko">Korean</option>
                        <option value="chi">Chinese</option>
                    </select></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input email required"><label class="required" for="cmsuser-email">E-mail</label><input type="email"
                        name="cmsuser[email]" required="required" pattern="^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$"
                        class="form-control required" maxlength="50" id="cmsuser-email" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input text required"><label class="required" for="cmsuser-username">Username</label><input
                        type="text" name="cmsuser[username]" class="form-control required" required="required" id="cmsuser-username" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input password required"><label class="required" for="cmsuser-password">Password</label><input
                        type="password" name="cmsuser[password]" class="form-control required" required="required" id="cmsuser-password" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <div class="input password required"><label class="required" for="retype_password">Retype password</label><input
                        type="password" name="cmsuser[retype_password]" required="required" oninput="checkRetypePassword(this)"
                        id="retype_password" placeholder="Retype password" class="form-control required" /></div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <button class="btn btn-primary tab3Save" type="submit">Submit</button> </div><br />
            <!-- /.form-group -->
        </div>

    </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.box-body -->
</form>
</div>
