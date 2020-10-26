var el = function(element){
    return document.getElementById(element);
}

let coal_un = localStorage.getItem("coal_username");
$.ajax({
    url:"check_login.php",
    method:"POST",
    data:{"username":coal_un},
    dataType:"json",
    success:function(loggedin){
   
    if(loggedin){
        }else{
            alert("Log In is required");
            window.location.href="fsmp.php";
        }
}
});
let queryString1 = decodeURIComponent(location.search.substring(1)),
a = queryString1.split("&");
let r_flag = a[0];
function update(){
    queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
    window.location.href="update.html"+queryString;
}

function delete_(){
    queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
    window.location.href="delete.html"+queryString;
}

function display_(){
    queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
    window.location.href="display.html"+queryString;
}
let t_flag = 4,
c_flag = 5,

sem_option = el("Sem"),
list = el("stud_name");
if(r_flag == 1){
    let n_flag = 1;
    let semester = a[3];
    el("sem").value = a[3];
el("sem").setAttribute("readonly","true");
function showhint(q){
    //console.log(iv);
    if(q!=""){
    $.ajax({
        url:"testing3.php",
        method:'POST',
        data:{"q":q,"semester":semester,"flag":n_flag},
        dataType:"json",

        success :function(result){
                        
            //console.log(result);
            var len = result.length;
            //console.log(len);
            let list_len = list.childElementCount;
            for( let i =0; i<list_len; i++){
                list.removeChild(list.childNodes[0]);
            }
            if(len==1){
                let op = document.createElement('option');
                op.value = result[0];
                list.appendChild(op);
            }
            else if(len>1){
                for(let i=0;i<len;i++){
                    var op = document.createElement('option');
                    op.value = result[i];
                    list.appendChild(op);
                }
            }                                                                          
        },
        error: function (xmlHttpRequest, textStatus, errorThrown) {
            console.log(xmlHttpRequest.responseText);
            console.error(errorThrown);
        }      
                    
    });
    }
    else{
        let list_len = list.childElementCount;
        for(let i =0; i<list_len; i++){
            list.removeChild(list.childNodes[0]);
        }
    }
}
}
else if(r_flag == 2){
    let n_flag = 2;
    let department = a[3];
    el("dept").value = a[3];
    el("dept").setAttribute("readonly","true");

    function showhint(q){
        //console.log(iv);
        if(q!=""){
        $.ajax({
            url:"testing3.php",
            method:'POST',
            data:{"q":q,"depart":department,"flag":n_flag},
            dataType:"json",
    
            success :function(result){
                            
                //console.log(result);
                var len = result.length;
                //console.log(len);
                let list_len = list.childElementCount;
                for( let i =0; i<list_len; i++){
                    list.removeChild(list.childNodes[0]);
                }
                if(len==1){
                    let op = document.createElement('option');
                    op.value = result[0];
                    list.appendChild(op);
                }
                else if(len>1){
                    for(let i=0;i<len;i++){
                        var op = document.createElement('option');
                        op.value = result[i];
                        list.appendChild(op);
                    }
                }                                                                          
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(xmlHttpRequest.responseText);
                console.error(errorThrown);
            }      
                        
        });
        }
        else{
            let list_len = list.childElementCount;
            for(let i =0; i<list_len; i++){
                list.removeChild(list.childNodes[0]);
            }
        }
    }
}
else if(r_flag == 3){
    let n_flag = 3;
    el("ayear").value = a[3];
    let aca_year = a[3];
    el("ayear").setAttribute("readonly","true");
    function showhint(q){
        //console.log(iv);
        if(q!=""){
        $.ajax({
            url:"testing3.php",
            method:'POST',
            data:{"q":q,"ay":aca_year,"flag":n_flag},
            dataType:"json",
    
            success :function(result){
                            
                //console.log(result);
                var len = result.length;
                //console.log(len);
                let list_len = list.childElementCount;
                for( let i =0; i<list_len; i++){
                    list.removeChild(list.childNodes[0]);
                }
                if(len==1){
                    let op = document.createElement('option');
                    op.value = result[0];
                    list.appendChild(op);
                }
                else if(len>1){
                    for(let i=0;i<len;i++){
                        var op = document.createElement('option');
                        op.value = result[i];
                        list.appendChild(op);
                    }
                }                                                                          
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(xmlHttpRequest.responseText);
                console.error(errorThrown);
            }      
                        
        });
        }
        else{
            let list_len = list.childElementCount;
            for(let i =0; i<list_len; i++){
                list.removeChild(list.childNodes[0]);
            }
        }
    }
}
else if(r_flag == 4){
    let n_flag =4;
    let department = a[4];
    let aca_year = a[3];
    el("dept").value = a[4];
    el("ayear").value = a[3];
    el("dept").setAttribute("readonly","true");
    el("ayear").setAttribute("readonly","true");
    function showhint(q){
        //console.log(iv);
        if(q!=""){
        $.ajax({
            url:"testing3.php",
            method:'POST',
            data:{"q":q,"ay":aca_year,"depart":department,"flag":n_flag},
            dataType:"json",
    
            success :function(result){
                            
                //console.log(result);
                var len = result.length;
                //console.log(len);
                let list_len = list.childElementCount;
                for( let i =0; i<list_len; i++){
                    list.removeChild(list.childNodes[0]);
                }
                if(len==1){
                    let op = document.createElement('option');
                    op.value = result[0];
                    list.appendChild(op);
                }
                else if(len>1){
                    for(let i=0;i<len;i++){
                        var op = document.createElement('option');
                        op.value = result[i];
                        list.appendChild(op);
                    }
                }                                                                          
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(xmlHttpRequest.responseText);
                console.error(errorThrown);
            }      
                        
        });
        }
        else{
            let list_len = list.childElementCount;
            for(let i =0; i<list_len; i++){
                list.removeChild(list.childNodes[0]);
            }
        }
    }
    
}
let subject = a[1];
let heading_name = a[2];
el("logo").innerText = heading_name;
el("header-sub").innerText = subject;
$.ajax({
    url:"filter.php",
    method:'POST',
    data:{"subject":subject,
        "flag":c_flag},
    dataType:"json",

    success :function(data){
        el("sub_cd").value = data;
        el("sub_cd").setAttribute("readonly","true");
    
    }
});

$.ajax({
    url:"filter.php",
    method:'POST',
    data:{"subject":subject,
        "flag":t_flag},
    dataType:"json",

    success :function(data){
    
        el("year").value = data;
        
        if(data=="FE"){
            for(let i=0;i<6;i++){
                sem_option.removeChild(sem_option.childNodes[3]);
            }
        }
        else if(data=="SE"){
            
            sem_option.removeChild(sem_option.childNodes[1]);
            sem_option.removeChild(sem_option.childNodes[1]);
            for(let i=0;i<4;i++){
                sem_option.removeChild(sem_option.childNodes[3]);
            }
        }
        else if(data=="TE"){
            
            for(let i=0;i<4;i++){
                sem_option.removeChild(sem_option.childNodes[1]);
            }
            sem_option.removeChild(sem_option.childNodes[3]);
            sem_option.removeChild(sem_option.childNodes[3]);
        }
        else if(data=="BE"){
            
            for(let i=0;i<6;i++){
                sem_option.removeChild(sem_option.childNodes[1]);
            }
        }
    el("year").setAttribute("readonly","true");
    }
});




el("reset").addEventListener('click',function(){
    el("sname").value = "";
    el("rollno").value ="";
    el("ia1").value = "";
    el("ia2").value = "";
    el("q1").value = "";
    el("q2").value = "";
    el("q3").value = "";
    el("q4").value = "";
    el("a1").value = "";
    el("a2").value = "";
    el("a3").value = "";
    el("a4").value = "";
    el("e1").value = "";
    el("e2").value = "";
    el("e3").value = "";
    el("e4").value = "";
    el("e5").value = "";
    el("e6").value = "";
    el("e7").value = "";
    el("e8").value = "";
    el("e9").value = "";
    el("e10").value = "";
    el("proj").value = "";
});



el("logo").addEventListener('click',function(){
    el("logout").classList.add("rl_active");
    el("namee").innerText= el("logo").innerText;
});

el("close2").addEventListener('click',function(){
    el("logout").classList.remove("rl_active");
});
el("logout-btn").addEventListener('click',function(){
    let logout_flag=3;
    $.ajax({
        url:"valid.php",
        method:"POST",
        data:{
            "username":coal_un,"flag":logout_flag
        },
        dataType:"json",
        success:function(data){
            if(data){
                window.location.href = "fsmp.php";
            }
        }
    });
});
el("submit").addEventListener('click',function(){
    el("name_error").innerText="";
    el("rno_error").innerText="";
    el("ay_error").innerText="";
    el("dept_error").innerText="";
    el("sem_error").innerText="";
    el("dup_error").innerText="";
    el("ia_error").innerText="";
    el("quiz_error").innerText="";
    el("ass_error").innerText="";
    el("exp_error").innerText="";
    el("mp_error").innerText="";
    
    let name = el("sname").value,
        rno = el("rollno").value,
        ay = el("ayear").value,
        sem = el("sem").value,
        year =el("year").value,
        sub_code = el("sub_cd").value,
        dept= el("dept").value,
        ia1 = el("ia1").value,
        ia2 =el("ia2").value,
        q1= el("q1").value,
        q2= el("q2").value,
        q3= el("q3").value,
        q4= el("q4").value,
        a1= el("a1").value,
        a2= el("a2").value,
        a3= el("a3").value,
        a4= el("a4").value,
        e1=el("e1").value,
        e2=el("e2").value,
        e3=el("e3").value,
        e4=el("e4").value,
        e5=el("e5").value,
        e6=el("e6").value,
        e7=el("e7").value,
        e8=el("e8").value,
        e9=el("e9").value,
        e10=el("e10").value,
        mp =el("proj").value,
        errors=0,
        error_sem=0,
        error_dept=0,
        error_ay=0,
        error_name=0,
        error_rno=0;

    if(ia1<0 || ia1>20 || ia2<0 || ia2>20){
        el("ia_error").innerText = "Internal Assessment marks out of range!!";
        errors+=1;
    }
    if(e1<0 || e1>10 ||e2<0 || e2>10 ||e3<0 || e3>10 ||e4<0 || e4>10 ||e5<0 || e5>10 ||e6<0 || e6>10 ||e7<0 || e7>10 ||e8<0 || e8>10 ||e9<0 || e9>10 ||e10<0 || e10>10){
        el("exp_error").innerText = "Experiment marks out of range!!";
        errors+=1;
    }

    if( a1<0 || a1>5 ||a2<0 || a2>5 ||a3<0 || a3>5 ||a4<0 || a4>5 ){
        el("ass_error").innerText = "Assignment marks out of range!!";
        errors+=1;
    }
    if( q1<0 || q1>5 ||q2<0 || q2>5 ||q3<0 || q3>5 ||q4<0 || q4>5 ){
        el("quiz_error").innerText = "Quiz marks out of range!!";
        errors+=1;
    }
    if(mp<0||mp>25){
        el("mp_error").innerText = "Mini-Project marks out of range!!";
        errors+=1;
    }

    if(name.length==0){
        el("name_error").innerText = "Name cannot be empty!!";
        errors+=1;
    }
    if(rno.length==0){
        el("rno_error").innerText = "Roll No. cannot be empty!!";
        errors+=1;
    }
    if(ay.length==0){
        el("ay_error").innerText = "Academic year cannot be empty!!";
        errors+=1;
    }
    if(dept.length==0){
        el("dept_error").innerText = "Department cannot be empty!!";
        errors+=1;
    }
    if(sem.length==0){
        el("sem_error").innerText = "Semester cannot be empty!!";
        errors+=1;
    }
    if(sub_code.length!=0){
        let add_error_flag = 0,
            add_name_error_flag =1,
            add_rno_error_flag =2,
            add_dup_error_flag =3,
            add_flag = 4;
        $.ajax({
            url:"add.php",
            method:"POST",
            data:{"sub_code":sub_code,"flag":add_error_flag,"sem":sem,"dept":dept,"ay":ay},
            dataType:"json",
            success:function(data){
                //console.log(data);
                if(errors==0){
                if(data[0]){
                    error_sem+=1;
                    el("sem_error").innerText= "Invalid Semester!!";
                    errors+=1;
                }
                if(data[1]){
                    error_dept+=1;
                    el("dept_error").innerText = "Invalid Department!!";
                    errors+=1;
                }
                if(data[2]){
                    error_ay+=1;
                    el("ay_error").innerText = "Invalid Academic-Year!!";
                    errors+=1;
                }
                if(error_sem==0 && error_dept==0 && error_ay==0){
                    $.ajax({
                        url:"add.php",
                        method:"POST",
                        data:{"flag":add_name_error_flag,"sem":sem,"dept":dept,"ay":ay,"name":name},
                        dataType:"json",
                        success:function(result){
                            //console.log(result);
                            if(result){
                                el("name_error").innerText="Invalid Name!!";
                                error_name+=1;
                                errors+=1;
                            }
                            if(error_name==0){
                                $.ajax({
                                    url:"add.php",
                                    method:"POST",
                                    data:{"flag":add_rno_error_flag,"sem":sem,"dept":dept,"ay":ay,"name":name,"rno":rno},
                                    dataType:"json",
                                    success:function(success_data){
                                        if(success_data){
                                            el("rno_error").innerText ="Invalid Roll No.!!";
                                            error_rno+=1;
                                            errors+=1;
                                        }
                                        if(errors==0 && error_rno==0){
                                            $.ajax({
                                                url:"add.php",
                                                method:"POST",
                                                data:{"flag":add_dup_error_flag,"sem":sem,"dept":dept,"ay":ay,"name":name,"rno":rno,"year":year,"sub_code":sub_code},
                                                dataType:"json",
                                                success:function(success_result){
                                                    if(success_result>0){
                                                        el("dup_error").innerText="Marks of the given student already entered!!";
                                                    }
                                                    else{
                                                        $.ajax({
                                                            url:"add.php",
                                                            method:"POST",
                                                            data:{"flag":add_flag,"sem":sem,"dept":dept,"ay":ay,"name":name,"rno":rno,"year":year,"sub_code":sub_code,
                                                        "IA1":ia1,"IA2":ia2,"Q1":q1,"Q2":q2,"Q3":q3,"Q4":q4,"A1":a1,"A2":a2,"A3":a3,"A4":a4,"E1":e1,"E2":e2,"E3":e3
                                                        ,"E4":e4,"E5":e5,"E6":e6,"E7":e7,"E8":e8,"E9":e9,"E10":e10, "MP":mp},
                                                            dataType:"json",
                                                            success:function(entry_done){
                                                                if(entry_done){
                                                                    alert("Submitted Successfully");
                                                                    let queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
                                                                    window.location.href="add.html"+queryString;
                                                                }
                                                                else{
                                                                    alert("ERROR!!");
                                                                    let queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
                                                                    window.location.href="add.html"+queryString;
                                                                }
                                                            },
                                    
                                                            error: function (xmlHttpRequest, textStatus, errorThrown) {
                                                                console.log(xmlHttpRequest.responseText);
                                                                console.error(errorThrown);
                                                            }      
                                                        });
                                                    }
                                                },
                        
                                                error: function (xmlHttpRequest, textStatus, errorThrown) {
                                                    console.log(xmlHttpRequest.responseText);
                                                    console.error(errorThrown);
                                                }      
                                            });
                                        }
                                    },
            
                                    error: function (xmlHttpRequest, textStatus, errorThrown) {
                                        console.log(xmlHttpRequest.responseText);
                                        console.error(errorThrown);
                                    }      
                                });
                            }
                        },

                        error: function (xmlHttpRequest, textStatus, errorThrown) {
                            console.log(xmlHttpRequest.responseText);
                            console.error(errorThrown);
                        }      
                    });
                }
            }
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(xmlHttpRequest.responseText);
                console.error(errorThrown);
            }      
        });
    }



    //console.log(name+rno+sub_code+year+ay+sem);
});
