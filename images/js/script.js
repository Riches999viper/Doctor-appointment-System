let arr=['images/doctortwo.jpg','images/doctorone.jpg','images/doctorfour.jpg'];
let ind=0;
if(document.getElementById('next')){
document.getElementById('next').addEventListener('click',()=>{
    document.getElementById('img_src').style.opacity = 0;
    setTimeout(()=>{
        ind++;
        if(ind>arr.length-1){
            ind=0;
        }
        document.getElementById('img_src').src=arr[ind];
        document.getElementById('img_src').style.opacity = 1;
    }, 200);
});
}
if(document.getElementById('prev')){
document.getElementById('prev').addEventListener('click',()=>{
    document.getElementById('img_src').style.opacity = 0;
    setTimeout(()=>{
        ind--;
        if(ind<0){
            ind=arr.length-1;
        }
        document.getElementById('img_src').src=arr[ind];
        document.getElementById('img_src').style.opacity = 1;
    }, 200);
}); 
}
if(document.getElementById('img_src')){
setInterval(()=>{
    document.getElementById('img_src').style.opacity = 0;
    setTimeout(()=>{
        ind++;
        if(ind>=arr.length){
            ind=0;
        }
        document.getElementById('img_src').src=arr[ind];
        document.getElementById('img_src').style.opacity = 1;
    }, 200);
}, 4000);
}

// js for button fixed button section 

const scrollBtn=document.getElementById('scroll_top_section');
if(scrollBtn){
scrollBtn.addEventListener('click',()=>{
    window.scrollTo({
        top:0,
        behavior:"smooth"
    });
});
}
window.addEventListener('scroll',()=>{
    if(window.scrollY>300){
        scrollBtn.style.display="flex";
        //  container.classList.remove("remove_register_container");
    }else{
        scrollBtn.style.display="none";
    }
});


// js for registration modal 
const register=document.querySelector("#register");
  const register_container=document.querySelector(".register_container");
  const cross=document.querySelector('.remove_modal_register');
  if(register){
  register.addEventListener('click',(e)=>{
    e.preventDefault();
    register_container.classList.toggle("remove_register_container");
  })
}
if(cross){
  cross.addEventListener('click',(e)=>{
    e.preventDefault();
    register_container.classList.remove("remove_register_container");
  });
}
    // js for login modal 
    const login=document.querySelector("#login");
  const login_container=document.querySelector(".login_container");
  const close=document.querySelector('.remove_modal_login');
  if(login){
  login.addEventListener('click',(e)=>{
    e.preventDefault();
    login_container.classList.toggle("remove_login_container");
  });
}
if(close){
  close.addEventListener('click',(e)=>{
    e.preventDefault();
    login_container.classList.remove("remove_login_container");
  });
}
// modal close while clicking outside the div of modal 
 window.onclick=(event)=>{
    if(!event.target.matches('#login')){
        if(login_container.classList.contains("remove_login_container")){
            login_container.classList.remove('remove_login_container');
        }
    }
     if(!event.target.matches('#register')){
        if(register_container.classList.contains("remove_register_container")){
            register_container.classList.remove('remove_register_container');
        }
    }
 }
 if(login_container){
 login_container.addEventListener('click',(event)=>{
    event.stopPropagation();
  });
}
if(register_container){
  register_container.addEventListener('click',(event)=>{
   event.stopPropagation();
 });
}
// toasts msg 
const booknowlogin=document.querySelector('#booknowlogin');
if(booknowlogin){
  booknowlogin.addEventListener('click',(event)=>{
    event.stopPropagation();
  })
}

function showToast() {
  var toastContainer = document.getElementById("toastContainer");
  toastContainer.innerHTML = `<i class="fa-solid fa-triangle-exclamation" style="margin-right:5px;"></i>You need to login first!!!`;
  toastContainer.classList.add("show");

  setTimeout(function () {
    toastContainer.classList.remove("show");
  }, 3000);
}
if(booknowlogin){
  booknowlogin.addEventListener('click',(e)=>{
    e.preventDefault();
    login_container.classList.toggle("remove_login_container");
  });
}
if(close){
  close.addEventListener('click',(e)=>{
    e.preventDefault();
    login_container.classList.remove("remove_login_container");
  });
}