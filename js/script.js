document.addEventListener("DOMContentLoaded", function () {
    const step1 = document.getElementById("step1");
    const step2 = document.getElementById("step2");
    const step3 = document.getElementById("step3");
    const step4 = document.getElementById("step4");
    const stepElement = document.getElementById("step");
    const next = document.getElementById("next");
    const prev = document.getElementById("prev");
    const next2 = document.getElementById("next2");
    const prev2 = document.getElementById("prev2");
    const next3 = document.getElementById("next3");

    // Step 1 -> Step 2
    next.addEventListener("click", function () {
        step1.style.display = "none";
        step2.style.display = "block";
        stepElement.innerText = "2";
    });

    // Step 2 -> Step 1
    prev.addEventListener("click", function () {
        step2.style.display = "none";
        step1.style.display = "block";
        stepElement.innerText = "1";
    });

    // Step 2 -> Step 3
    next2.addEventListener("click", function () {
        step2.style.display = "none";
        step3.style.display = "block";
        stepElement.innerText = "3";
    });

    // Step 3 -> Step 2
    prev2.addEventListener("click", function () {
        step3.style.display = "none";
        step2.style.display = "block";
        stepElement.innerText = "2";
    });

    // Step 3 -> Step 4 (Final Step)
    next3.addEventListener("click", function () {
        step3.style.display = "none";
        step4.style.display = "block";
        stepElement.innerText = "4";
    });
});

document.getElementById("next").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Toggle the visibility of section-1 and section-2
        var section1 = document.getElementById("section-1");
        var section2 = document.getElementById("section-2");

        if (section1.style.display === "block") {
            section1.style.display = "none";
            section2.style.display = "block";
        } else {
            section1.style.display = "block";
            section2.style.display = "none";
        }
 });


 function form_submit(){
    if(confirm("Are you sure you want to go ahead with this submission?")){
        form_validate();
    }
}
function form_validate() 
{
    var name = document.forms["contact_form"]["name"].value;
    var email = document.forms["contact_form"]["email"].value;
    var phone = document.forms["contact_form"]["phone"].value;

    if (name == "")
    {
        alert("Field required, please enter your name");
        return false;
    }
    if (email == "")
    {
        alert("Field required, please enter your email");
        return false;
    }
    if (phone == "")
    {
        alert("Field requred, please enter your phone");
        return false;
    }

    alert("Thank you " + name + " for your submission. A response has been sent to your email "+ email +  " or we will call your number "+phone+ ". Thank you and welcome to Report assistant.");
}


const hamburgerIcon = document.getElementById('sidetoggle');

hamburgerIcon.addEventListener('click', () => {
  const sidebar = document.getElementById("sidebar");
  const section = document.getElementById("section");
  
  if (section.style.gridColumn === "1 / 11") {
    sidebar.style.gridColumn = "11 / -1";
    section.style.gridColumn = "1 / 11";
  } else {
    sidebar.style.gridColumn = "12 / -1";
    section.style.gridColumn = "1 / 12";
  }
});



/* if (section.style.gridColumn === "1 / 11") {
    sidebar.style.gridColumn = "12 / -1";
    section.style.gridColumn = "1 / 12";
  } else {
    sidebar.style.gridColumn = "11 / -1";
    section.style.gridColumn = "1 / 11";
  } */



