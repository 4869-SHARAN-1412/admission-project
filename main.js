// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
  apiKey: "AIzaSyCdOB_dtbRMpxvHjSax6n1lENZgT1sRXpA",
  authDomain: "hitamadmissionform.firebaseapp.com",
  projectId: "hitamadmissionform",
  storageBucket: "hitamadmissionform.appspot.com",
  messagingSenderId: "592629128805",
  appId: "1:592629128805:web:f27e20f07ba5fe9620b08c",
  measurementId: "G-YLPE9ZHWCF"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

//reference messages collection
var messagesRef = firebase.database().ref('AdmissionData');


//listen for submitForm
document.getElementById('admissionform').addEventListener('submit', submitForm);

//SubmitForm
function submitForm(e) {
  e.preventDefault();

  //getvalues
  var studentfirstname = getInputval('studentfirstname');
  var studentlastname = getInputval('studentlastname');
  var fatherguardianfullname = getInputval('father/guardianfullname');
  var motherguardianfullname = getInputval('mother/guardianfullname');
  var city = getInputval('city');
  var state = getInputval('state');
  var zip = getInputval('zip');
  var emailaddress = getInputval('emailaddress');
  var phonenumber = getInputval('phonenumber');
  var alternatephonenumber = getInputval('alternatephonenumber');
  var streambranch = getInputval('stream/branch');
  var male = getInputval('male');
  var female = getInputval('female');
  var other = getInputval('other');
  var nationality = getInputval('nationality');
  var community = getInputval('community');
  var HomeAddress1 = getInputval('HomeAddress1');
  var HomeAddress2 = getInputval('HomeAddress2');
  var DOB = getInputval('DOB');
  var passingmonthyearof12th = getInputval('passingmonth&yearof12th');
  var schoolname10th = getInputval('10thschoolname');
  var schoolboard10th = getInputval('10thschoolboard');
  var collegename12th = getInputval('12thcollegename');
  var collegeboard12th = getInputval('12thcollegeboard');
  var cgpa10th = getInputval('10thcgpa');
  var cgpa12th = getInputval('12thcgpa');
  var eamcetrankscore = getInputval('eamcetrank/score');
  var jeemainrankscorepercentage = getInputval('jeemainrank/score/percentage');
  //var certificatefile10th = getInputval('10thcertificatefile');
  //var certificatefile12th = getInputval('12thcertificatefile');
  //var bonafidefile = getInputval('bonafidefile');

  saveMessage(studentfirstname, studentlastname, fatherguardianfullname, motherguardianfullname, city, state, zip, emailaddress, phonenumber, alternatephonenumber, streambranch, male, female, other, nationality, community, HomeAddress1, HomeAddress2, DOB, passingmonthyearof12th, schoolname10th, schoolboard10th, collegename12th, collegeboard12th, cgpa10th, cgpa12th, eamcetrankscore, jeemainrankscorepercentage);

  //show alert
  document.getElementById('alert').style.display='block';

  //hide alert after 3secs
  setTimeout(function(){
    document.getElementById('alert').style.display = 'none'; 
   },5000);

   //clearform
   document.getElementById('admissionform').reset();

}
//function to get form values
function getInputval(id) {
  return document.getElementById(id).value;
}



//function to save the message to firebase
function saveMessage(studentfirstname, studentlastname, fatherguardianfullname, motherguardianfullname, city, state, zip, emailaddress, phonenumber, alternatephonenumber, streambranch, male, female, other, nationality, community, HomeAddress1, HomeAddress2, DOB, passingmonthyearof12th, schoolname10th, schoolboard10th, collegename12th, collegeboard12th, cgpa10th, cgpa12th, eamcetrankscore, jeemainrankscorepercentage) {
  var newMessageRef = messagesRef.push();
  newMessageRef.set({
    studentfirstname: studentfirstname,
    studentlastname: studentlastname,
    fatherguardianfullname: fatherguardianfullname,
    motherguardianfullname: motherguardianfullname,
    city: city,
    state: state,
    zip: zip,
    emailaddress: emailaddress,
    phonenumber: phonenumber,
    alternatephonenumber: alternatephonenumber,
    streambranch: streambranch,
    male: male,
    female: female,
    other: other,
    nationality: nationality,
    community: community,
    HomeAddress1: HomeAddress1,
    HomeAddress2: HomeAddress2,
    DOB: DOB,
    passingmonthyearof12th: passingmonthyearof12th,
    schoolname10th: schoolname10th,
    schoolboard10th: schoolboard10th,
    collegename12th: collegename12th,
    collegeboard12th: collegeboard12th,
    cgpa10th: cgpa10th,
    cgpa12th: cgpa12th,
    eamcetrankscore: eamcetrankscore,
    jeemainrankscorepercentage: jeemainrankscorepercentage,
    //certificatefile10th:certificatefile10th,
    //certificatefile12th:certificatefile12th,
    //bonafidefile:bonafidefile
  });
}
