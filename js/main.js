var url=location.href;
var urlBezIndex=location.pathname;
window.onload=function(){
  navigacija();
  (function(){
      $(window).scroll(function() { 
        if ($(document).scrollTop() > 200) { 
          $(".backToTop a").css("display", "block"); 
        } else {
          $(".backToTop a").css("display", "none"); 
        }
     
  })
  })();
}
function navigacija(){
  $("#hamburger").click(function(){
      $("#navigacijaLinkovi").slideToggle();
     
     $(".ham").toggleClass("hamClick");
  });
  console.log("navigacija");
}
function proveraRegistracija(){
    let ime=document.getElementById("ime").value;
    let prezime=document.getElementById("prezime").value;
    let email=document.getElementById("email").value;
    let username = document.getElementById("username").value;
    let lozinka=document.getElementById("lozinka").value;
    let lozinkaPotvrdi=document.getElementById("lozinkaPotvrdi").value;
    let greska=document.getElementsByClassName("greskaKontakt");
    
    let regExpIme=/^[A-Z][a-z]{2,24}$/;
    let regExpPrezime=/^[A-Z][a-z]{2,24}$/;
    let regExpEmail=/^\w+((\,|\-|\_)?\w+)*@\w{2,6}\.\w{2,3}$/;
    let regExpPass=/^.{5,60}$/;
    let regExpUsername=/^.{5,50}$/;
    let greske=[];

    if(!regExpIme.test(ime)){
        greska[0].innerHTML="First letter must be uppercase, max 25 characters *";
        greske.push(1);
    }
    if(!regExpPrezime.test(prezime)){
        greska[1].innerHTML="First letter must be uppercase, max 25 characters *";
        greske.push(2);
    }
    if(!regExpEmail.test(email)){
        greska[2].innerHTML="Invalid email address*";
        greske.push(3);
    }
    if(!regExpUsername.test(username)){
        greska[3].innerHTML="Username must have 5 charackters";
        greske.push(4);
    }
    if(!regExpPass.test(lozinka)){
        greska[4].innerHTML="Password must have 5 charackters*";
        greske.push(5);
    }
    if(lozinka!=lozinkaPotvrdi){
        greska[5].innerHTML="Passwords do not match *";
        greske.push(6);
    }


    if(greske.length){
        return false;
    }
    else{
       
        return true;
    }
}
function proveraLogin(){
let username=document.getElementById("usernameLog").value;
let pass=document.getElementById("passLog").value;
let greska=document.getElementsByClassName("greskaKontakt");

let regExpUsername=/^.{5,50}$/;
let regExpPass=/^.{5,60}$/;

let greske=[];

if(!regExpUsername.test(username)){
    greska[0].innerHTML="Enter valid username format (min 5 / max 60 characters)"
    greske.push(1);
}
if(!regExpPass.test(pass)){
    greska[1].innerHTML="Enter valid password format (min 5 / max 50 characters)"
    greske.push(2);
}


if(greske.length){
    return false;
}
else{
   
    return true;
}
}


if(url.indexOf("contact.php")!=-1){

    function proveraKontaktForma(){
        let ime=document.getElementById("ime").value;
        let prezime=document.getElementById("prezime").value;
        let email=document.getElementById("email").value;
        let comment=document.getElementById("comment").value;
        let greska=document.getElementsByClassName("greskaKontakt");
        let forma=document.getElementById("kontaktForma");

        let regIme=/^[A-Z][a-z]{2,19}$/;
        let regPrezime=/^[A-Z][a-z]{2,20}$/;
        let regEmail=/^\w+((\,|\-|\_)?\w+)*@\w{2,6}\.\w{2,3}$/;
        let greske =[];
       if(!ime.match(regIme)){
            greska[0].innerHTML="First letter must be uppercase, max 20 characters *";
            greske.push("1");
       }
       if(!prezime.match(regPrezime)){
            greska[1].innerHTML="First letter must be uppercase, max 20 characters *";
            greske.push("2");
       }
       if(!email.match(regEmail)){
            greska[2].innerHTML="Invalid email address*";
            greske.push("3");
        }
        if(comment.length<15){
            greska[3].innerHTML="Min 15 characters *";
        }
        if(comment.length>200){
            greska[4].innerHTML="Max 200 characters *";
            greske.push("4");
        } 
        if(greske.length){
            return false;          
        }
        else{
           alert("You successfully sent us a message");
            // forma.reset();
           return true;
       }
    }
}



