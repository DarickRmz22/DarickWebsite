// JavaScript Document
// Declare variables 
var elList, addLink, removeLink, newEl, newText, counter, listItems;
elList = document.getElementById('list'); //loctiona for newly added list items 
addLink = document.getElementById('addToList');//Blind element for event to add item to list
removeLink = document.getElementById('removeFromList');// to remove from list 
counter = document.getElementById('counter');//place to update items in list 

function addItem(e){ //declare function to proccess added item event
	e.preventDefault(); //prevent link action when page is not ready
	newEl = document.createElement('div');// create new div inside our shopping list
	newText = document.createTextNode('New list Item'); //Text to for new item for new div
	newEl.classList.add('alert');//add the alert class to the newly created div 
	newEl.classList.add('alert-info');//add additional class to the newly created div 
	newEl.appendChild(newText);//add text to div
	elList.appendChild(newEl);//add fully configured div to shopping list 
	}
function removeItem(e){
	e.preventDefault();// prevent default action 
	if (elList.lastElementChild) { //Check if there are items to remove
        elList.removeChild(elList.lastElementChild); //Remove the last item in the list
		updateCount();
    }
}
function updateCount(){ //declare funtion to update shopping list
	listItems = elList.getElementsByTagName('div').length; //get the total number of divs inside our list 
	counter.innerHTML=listItems;//update the shopping list count 
	
}
addLink.addEventListener('click', addItem, false);//listen for the click event on the buttom 
removeLink.addEventListener('click', removeItem, false);// listen for the click event on the button
elList.addEventListener('DOMNodeInserted', updateCount, false);//listen for the DOM to be updated
elList.addEventListener('DOMNodeRemoved', updateCount, false);// listen for the dom to be updated
