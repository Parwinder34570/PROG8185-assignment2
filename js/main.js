/*
main.js
*/

function showMessage(){
    var day = new Date();
    var hr = day.getHours();
    var message = "Welcome User, ";
    if(hr >= 5 && hr <12){
        message += "Good Morning";
    }
    else if(hr == 12){
        message += "Good Noon";
    }
    else if(hr>12 && hr<16){
        message += "Good Afternoon";
    }
    else if(hr>16 && hr<21){
        message += "Good Evening";
    }
    else{
        message += "Have a good time";
    }
    document.getElementById("welcomeMessage").innerHTML = message;
}

function checkDetails(){
    var username  = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if(username == "Purvaraj" && password=="12345") {
        window.location.href = "./accounts_summary.html";
    }
    else{
       // alert("Invalid Username or password !! Try again.")
       document.getElementById("error").innerHTML = "Failed Attempt";
    }

}
function formSubmit(){

var e = document.getElementById("account");
var value = e.value;
var text = e.options[e.selectedIndex].text;
console.log(value);



	var amount = document.getElementById('amount').value;
    //var alertBox = document.getElementById('alertDiv').innerHTML;
	if (amount < 5000){
        //alertBox = `Money Send!! You send CAD ${amount}`

		alert(`Money Send!! You send CAD ${amount}`);
	} else{
        //alertBox = 'Not enough Balance';
		alert('Not enough Balance');
	}
}

function showModal(){
    var payeeModal = new bootstrap.Modal(document.getElementById("exampleModal"));
    payeeModal.show();
}

function openSignup(){

}


