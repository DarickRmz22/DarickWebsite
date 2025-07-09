// JavaScript Document
// JavaScript Document
var validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

var elFirstName = document.getElementById('firstName');
var elLastName = document.getElementById('lastName');
var elEmail = document.getElementById('email');
var elPhone = document.getElementById('phone');
var elUsername = document.getElementById('username');
var elPassword = document.getElementById('password');
var elComments = document.getElementById('comments');

function checkData(minLength, inputGroup, inputStatus, inputEl, regex = /^[a-zA-Z'-]+$/) {
	var elGroup = document.getElementById(inputGroup);
	var elStatus = document.getElementById(inputStatus);
	var elInput = document.getElementById(inputEl);
	
	if (elInput.value.length >= minLength && regex.test(elInput.value)) {
		elStatus.innerHTML = 'Valid';
		elGroup.classList.remove('has-error');
		elGroup.classList.add('has-success');
	} else {
		elStatus.innerHTML = inputEl.toUpperCase() + ' is invalid';
		elGroup.classList.add('has-error');
		elGroup.classList.remove('has-success');
	}
}

function validateEmail() {
	var elStatus = document.getElementById('emailStatus');
	var elGroup = document.getElementById('emailGroup');
	
	if (elEmail.value.match(validRegex)) {
		elStatus.innerHTML = 'Valid';
		elGroup.classList.remove('has-error');
		elGroup.classList.add('has-success');
	} else {
		elStatus.innerHTML = 'Email is invalid';
		elGroup.classList.add('has-error');
		elGroup.classList.remove('has-success');
	}
}

function validatePhone() {
	var phoneRegex = /^\d{10}$/;
	var elStatus = document.getElementById('phoneStatus');
	var elGroup = document.getElementById('phoneGroup');
	
	if (phoneRegex.test(elPhone.value)) {
		elStatus.innerHTML = 'Valid';
		elGroup.classList.remove('has-error');
		elGroup.classList.add('has-success');
	} else {
		elStatus.innerHTML = 'Phone number is invalid';
		elGroup.classList.add('has-error');
		elGroup.classList.remove('has-success');
	}
}

function checkUsernamePassword(minLength, inputGroup, inputStatus, inputEl) {
	var elGroup = document.getElementById(inputGroup);
	var elStatus = document.getElementById(inputStatus);
	var elInput = document.getElementById(inputEl);
	
	if (elInput.value.length >= minLength) {
		elStatus.innerHTML = 'Valid';
		elGroup.classList.remove('has-error');
		elGroup.classList.add('has-success');
	} else {
		elStatus.innerHTML = inputEl.toUpperCase() + ' must be at least ' + minLength + ' characters';
		elGroup.classList.add('has-error');
		elGroup.classList.remove('has-success');
	}
}

function validateComments() {
	var elStatus = document.getElementById('commentsStatus');
	var elGroup = document.getElementById('commentsGroup');
	
	if (elComments.value.trim() !== '') {
		elStatus.innerHTML = 'Valid';
		elGroup.classList.remove('has-error');
		elGroup.classList.add('has-success');
	} else {
		elStatus.innerHTML = 'Comments cannot be empty';
		elGroup.classList.add('has-error');
		elGroup.classList.remove('has-success');
	}
}

elFirstName.addEventListener('blur', function() {
	checkData(2, 'firstNameGroup', 'firstNameStatus', 'firstName');
}, false);

elLastName.addEventListener('blur', function() {
	checkData(2, 'lastNameGroup', 'lastNameStatus', 'lastName');
}, false);

elEmail.addEventListener('blur', validateEmail, false);

elPhone.addEventListener('blur', validatePhone, false);

elUsername.addEventListener('blur', function() {
	checkUsernamePassword(6, 'usernameGroup', 'usernameStatus', 'username');
}, false);

elPassword.addEventListener('blur', function() {
	checkUsernamePassword(6, 'passwordGroup', 'passwordStatus', 'password');
}, false);

elComments.addEventListener('blur', validateComments, false);
