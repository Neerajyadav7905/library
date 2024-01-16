
    // script for edit button 
    let edit_btn = document.getElementsByClassName('editbtn');
        edit_btn_len = edit_btn.length;
        for(let i=0; i<edit_btn_len; i++){
            edit_btn[i].addEventListener("click",function(e){
        let edit_btn_popup = document.getElementsByClassName('editpopupcontainer');
        edit_btn_popup[0].style.display="block";
            });
        }
// script for clase button for popup
    let editclosebtn = document.getElementById('editclosebtn').addEventListener('click',function(){
    let edit_btn_popup = document.getElementsByClassName('editpopupcontainer');
        edit_btn_popup[0].style.display="none";  
    });