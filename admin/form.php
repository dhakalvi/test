<!DOCTYPE html>
<html>
<head>
<style>
<style>
.disclaimer{display: none;}
*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Quicksand', sans-serif;
}

body{
	height: 100vh;
	width: 100%;
background-color: #DDF7E0;
}

.container{
	position: relative;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 20px 100px;
}

.container:after{
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background: url("../img/bg.jpg") no-repeat center;
	background-size: cover;
	filter: blur(50px);
	z-index: -1;
}
.contact-box{
	max-width: 850px;
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	justify-content: center;
	align-items: center;
	text-align: center;
	background-color: #fff;
	box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
}

.left{
	background: url("../img/dedh.jpg") no-repeat center;
	background-size: cover;
	height: 100%;
}

.right{
	padding: 25px 40px;
width:450px;
margin-top: 30px;
margin-left: auto;
  margin-right: auto;
text-align: center;
background-color: #C6D3EE;
}

h2{
	position: relative;
	padding: 0 0 10px;
	margin-bottom: 10px;
}

h2:after{
	content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 4px;
    width: 50px;
    border-radius: 2px;
    background-color: #2ecc71;
}

.field{
	width: 100%;
	border: 2px solid #682C2B;
	outline: none;
	background-color: #F4E9FD;
	padding: 0.5rem 1rem;
	font-size: 1.1rem;
	margin-bottom:15px;
	transition: .3s;
}

.field:hover{
	background-color: rgba(0, 0, 0, 0.1);
}

textarea{
	min-height: 150px;
}

.btn{
	width: 100%;
	padding: 0.5rem 1rem;
	
	font-size: 1.1rem;
	border: none;
	outline: none;
	cursor: pointer;
	transition: .3s;
}

.btn:hover{
    
}

.field:focus{
    border: 2px solid rgba(30,85,250,0.47);
    background-color: #fff;
}

@media screen and (max-width: 880px){
	.contact-box{
		grid-template-columns: 1fr;
	}
	.left{
		height: 200px;
	}
}

/* The container must be positioned relative: */
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="right" id="addstudentojt">
    <h2>Class (10/12) OJT Record Entry</h2>
    <form action="ojt_submit.php" method="post" onsubmit="return validateForm()">
        <input name="data[NAME]" required type="text" class="field" placeholder="Student Name *">
        <input required type="number" name="data[CLASS]" min="10" max="12" class="field" placeholder="Class *">
        <input name="data[PASSED]" required type="number" class="field" placeholder="Passed Year * (YYYY)" min="2071" max="2090">
        <input name="data[REG_NO]" required type="text" class="field" placeholder="Registration Number *">
        <input name="data[SYMBOL_NO]" type="text" class="field" placeholder="Symbol Number">
        <input name="data[START]" required type="text" class="field" placeholder="Start * (YYYY.MM.DD)" size="10" maxlength="10">
        <input name="data[END]" required type="text" class="field" placeholder="End * (YYYY.MM.DD)" size="10" maxlength="10">
        <select class="field" name="data[REF]">
            <option value="">Duration</option>
            <option value="Absent">Absent</option>
            <option value="1 Mon">1 Mon</option>
            <option value="2 Mon">2 Mon</option>
            <option value="3 Mon">3 Mon</option>
            <option value="4 Mon">4 Mon</option>
            <option value="5 Mon">5 Mon</option>
            <option value="6 Mon">6 Mon</option>
            <option value="7 Mon">7 Mon</option>
            <option value="8 Mon">8 Mon</option>
            <option value="9 Mon">9 Mon</option>
            <option value="10 Mon">10 Mon</option>
            <option value="11 Mon">11 Mon</option>
            <option value="12 Mon">12 Mon</option>
        </select>
        <input name="submit" type="submit" class="btn btn-success">
    </form>
</div>

<script>
function validateForm() {
    const regNo = document.querySelector('input[name="data[REG_NO]"]').value;

    // Simulated check for existing REG NOs (in practice, use AJAX to check on the server)
    let existingRegNos = ["12345", "54321"]; // This should be replaced with real data

    if (existingRegNos.includes(regNo)) {
        alertWithIcon("Error: Registration Number already exists.", "error");
        return false;
    }

    return true;
}

function alertWithIcon(message, type) {
    let icon;
    if (type === "success") {
        icon = '<i class="fas fa-check-circle"></i>';
    } else if (type === "error") {
        icon = '<i class="fas fa-exclamation-circle"></i>';
    } else {
        icon = '<i class="fas fa-exclamation-triangle"></i>';
    }
    alert(icon + " " + message);
}
</script>
</body>
<?php include 'footer.php'; ?>
</html>
