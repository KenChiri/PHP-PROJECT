const darkModeToggle = document.getElementById("darkModeToggle");
const body = document.body;

darkModeToggle.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    darkModeToggle.classList.toggle("fa-moon");
    darkModeToggle.classList.toggle("fa-sun");
  });




  const images = document.querySelectorAll('.slideshow-images img');
  const dots = document.querySelectorAll('.dot');
  let currentIndex = 0;
  
  // Function to show the current image
  function showImage(index) {
    images.forEach((image) => (image.style.display = 'none'));
    dots.forEach((dot) => dot.classList.remove('active'));
    images[index].style.display = 'block';
    dots[index].classList.add('active');
  }
  
  // Function to handle dot click event
  function dotClick(index) {
    currentIndex = index;
    showImage(currentIndex);
  }
  
  // Add click event listeners to dots
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => dotClick(index));
  });
  
  // Show the initial image
  showImage(currentIndex); 


  const hamburgericon = document.getElementById("hamburger");
  const sidebar = document.querySelector(".sidebar"); // Get the sidebar element
  const section = document.querySelector(".section"); // Get the section element
  const iconText = document.querySelector(".icon-text");
  
  let isExpanded = true; // Track the state of the sidebar
  
  hamburgericon.addEventListener("click", () => {
    sidebar.classList.toggle("sidebar-expanded");    
      if (isExpanded) {
          sidebar.style.gridColumn = '1 / 4';
          section.style.gridColumn = '4 / -1';
      } else {
          sidebar.style.gridColumn = '1 / 2';
          section.style.gridColumn = '2 / -1';
      }
  
      // Toggle the state
      isExpanded = !isExpanded;
  });
  
  $(document).ready(function(){
    $("#search-form").submit(function(event){
      event.preventDefault(); // Prevent the default form submission
    });
  
    $("#query").keyup(function(event){
      var input = $(this).val().trim();
  
      if(input != ""){
        $.ajax({
          url: "includes/search.inc.php",
          method: "post",
          data: {input:input},
          dataType: "html",
          success:function(data){
            $('#search-results').html(data);
          }
        });
      } else {
        $('#search-results').css("display", "none");
      }
    });
  });
  
  