// window.addEventListener('load',()=>{
//     let btn=document.getElementById('modal')
//     btn.click()
//     btn.remove()
// })

// window.setTimeout(()=>{
//     alert('lo')
//     document.getElementById('alert').remove();
// },30000)



// ##################Post delete#########################

function post_delete(id){
    if(confirm('Do you want to Delete')){
        this.document.poster.action.value="Delete_post";
        this.document.poster.pid.value=id;
        this.document.poster.submit();
    }
}

// ######################### Delete Notice##########################

function delete_notice(id){
    if(confirm('Do you want to Delete')){
        this.document.all_notice.action.value="Delete_notice";
        this.document.all_notice.pid.value=id;
        this.document.all_notice.submit();
    }
}

// ######################### Delete Gallery Image##########################

function gallery_delete(id,img){
    if(confirm("Do You Want To Delete")){
        // alert(img)
        this.document.gallery_form.action.value="delete_gallery_image";
        this.document.gallery_form.gid.value=id;
        this.document.gallery_form.gimage.value=img
        this.document.gallery_form.submit();
    }
}

//############################# Fess status ##############################

function fess_status(id,status,e){
    var xttp= new XMLHttpRequest();
    // alert(status)
    xttp.onreadystatechange=function(){
        // alert(xttp.status)
        if(xttp.readyState==4 && xttp.status==200){
        // alert(xttp.responseText)
            // if(status==0)
            // e.innerText=xttp.responseText;
        // else
        // e.innerText=xttp.responseText;
        location.reload()
        }
    }
    xttp.open('get',"database/fess_status.php?q="+id+"&status="+status,true);
    xttp.send();
}   

// ######################## Facilities Delete ###########################

function facilitie_delete(id,table){
    // alert('j')
        if(confirm('Do you Want to Delete')){
        this.document.facilities.action.value="facility_delete";
        this.document.facilities.id.value=id;
        this.document.facilities.table.value=table
        this.document.facilities.submit();
        }
}