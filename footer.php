						<hr>
					</div>
				</div>
			</div>
			<hr id="bottom_bar">
			<div style="position:fixed;left:0;bottom:0;z-index:-999;width:100%;">
				<div style="width:960px;margin:0 auto;padding:20px 0;">
					<div id="btn_nav">
<?
	$currentPage = $_SERVER[REQUEST_URI];
	$currentPage = substr($currentPage,1);
	for ($n=0;$n<count($navItems);$n++) {
		$selectedNav = false;
		if ($currentPage == $navItems[$n][1]) {
			$selectedNav = true;
		}
		if ($n > 0) {
			echo ' | ';
		}
		if ($selectedNav) {
			echo '<b>';
		} else {
			echo '<a href="' . $navItems[$n][1] . '">';
		}
		echo $navItems[$n][2];
		if ($selectedNav) {
			echo '</b>';
		} else {
			echo '</a>';
		}
	}
?>
					</div>
					<img src="img/lig_logo_white.png" style="float:left;">
					<div style="color:#ffffff;float:left;margin:0 0 0 40px;padding:20px 0;font-size:10pt;">
						<b><?= $farmName ?></b><br>
						2 W Main St Chester, NJ<br><br>
						<b>Mailing Address</b><br>
						P.O. Box 127<br>
						Chester, NJ 07930
					</div>
					<hr>
				</div>
			</div>
		</div>
    <script type="text/javascript" src="http://maxsegale.com/max.js"></script>
		<script type="text/javascript">
      function newMailingSuccess() {
        var theForm = document.getElementById('mailing_list_form');
        theForm.name.value = '';
        theForm.email.value = '';
        theForm.location.value = '';
        setTimeout(function () {
          alert('Thank you for joining the <?= $farmName ?> mailing list!\n\nStay tunned for updates.');
        }, 0);
      }
      function newMailingSubmit() {
        var theForm = document.getElementById('mailing_list_form'),
          paramObj = {name: theForm.name.value, email: theForm.email.value, location: theForm.location.value};
        if (theForm.email.value === '') {
          alert('Please provide your email address so we can contact you.');
        } else {
          max.request('POST', 'mailing-list-action.php', paramObj, newMailingSuccess);
        }
        return false;
      }
			//var aboutRef=document.getElementById("about_nav");
			//aboutRef.removeAttribute('href');
			//alert(aboutRef.href);
			function checkForm() {
				var formPass = true;
				var failMsg = "Please provide the following information before you sign up:\n\n";
				var theForm = document.csa_form;
				var theName = theForm.name;
				var thePhone = theForm.phone;
				var theEmail = theForm.email;
				var theShare = theForm.share_type;
        var jarClub = theForm.jar_club;
				var thePickUp = theForm.pick_up;
				var thePayment = theForm.pay_type;
				var agreeCheck = theForm.agreement_terms;
				if (theName.value == "") {
					formPass = false;
					failMsg += "- name\n\n";
				}
				if (thePhone.value == "" && theEmail.value == "") {
					formPass = false;
					failMsg += "- email address or phone number\n\n";
				}
				var shareSelected = false;
        if (jarClub.checked) {
          shareSelected = true;
        } else {
  				for (var s = 0; s < theShare.length; s++) {
  					if (theShare[s].checked == true) {
  						shareSelected = true;
  					}
  				}
        }
				if (shareSelected == false) {
					formPass = false;
					failMsg += "- share option\n\n";
				}
				//var pickUpSelected = false;
				//for (var p = 0; p < thePickUp.length; p++) {
				//	if (thePickUp[p].checked == true) {
				//		pickUpSelected = true;
				//	}
				//}
				//if (pickUpSelected == false) {
				//	formPass = false;
				//	failMsg += "- pick-up day\n\n";
				//}
				if (thePayment.checked == false) {
					formPass = false;
					failMsg += "- payment option\n\n";
				}
				if (agreeCheck.checked == false) {
					formPass = false;
					failMsg += "- agreement terms\n\n";
				}
				if (formPass == false) {
					alert(failMsg);
					return false;
				}
				return true;
			}
			function selectOption(checkId){
				var theCheck=document.getElementById(checkId);
				if(theCheck.checked){
					//theCheck.checked=false;
				}
				else{
					//theCheck.checked=true;
				}
			}
			function getTotal() {
				var theForm=document.csa_form;
				var totalDisplay=document.getElementById("csa_total");
				var tdBox=totalDisplay.parentNode;
				var theTotal=0;
				for(var i=0;i<theForm.elements.length;i++){
					var e=theForm.elements[i];
					if(e.type=="radio"||e.type=="checkbox"){
						if(e.checked==true){
							var addValue=e.value;
							if(addValue.indexOf(":")>0){
								var valueArray=addValue.split(":");
								addValue=valueArray[1];
							}
							if(Number(addValue)){
								theTotal+=Number(addValue);
							}
						}
					}
				}
				totalDisplay.innerHTML="$"+theTotal+".00";
				tdBox.style.color="#333333";
			}
			function checkEle(eleName) {
				var ele = document.getElementsByName(eleName);
				var i = ele.length;
				for (var j = 0; j < i; j++) {
					var isValid=false;
					var formEle = ele[j];
					var theBox = formEle.parentNode;
					if((formEle.type=="checkbox"||formEle.type=="radio")&&formEle.checked==true){
						isValid=true;
					}
					else if((formEle.type=="text"||formEle.type=="textarea")&&formEle.value!==""){
						isValid=true;
					}
					if(isValid==true){
						theBox.style.backgroundColor="#fff8e5";
						if(formEle.type=="text"||formEle.type=="textarea"){
							formEle.style.backgroundColor="#fff8e5";
						}
					}
					else{
						theBox.style.backgroundColor="";
						formEle.style.backgroundColor="";
					}
				}
			}
		</script>
	</body>
</html>
