var el = function(element){
    return document.getElementById(element);
}
let coal_un = localStorage.getItem("coal_username");
let queryString1 = decodeURIComponent(location.search.substring(1)),
a = queryString1.split("&");
function update(){
    queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
    window.location.href="update.html"+queryString;
}

function add(){
    queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
    window.location.href="add.html"+queryString;
}

function display_(){
    queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
    window.location.href="display.html"+queryString;
}


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

            let r_flag = a[0];
            let t_flag = 4,
                c_flag = 5,
                
                sem_option = el("Sem"),
                list = el("stud_name");


                

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

        el("reset").addEventListener('click',function(){
            el("sname").value = "";
            el("rollno").value ="";
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
            
            let name = el("sname").value,
                rno = el("rollno").value,
                ay = el("ayear").value,
                sem = el("sem").value,
                year =el("year").value,
                sub_code = el("sub_cd").value,
                dept= el("dept").value,
                
                errors=0,
                error_sem=0,
                error_dept=0,
                error_ay=0,
                error_name=0,
                error_rno=0;

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
                    url:"delete.php",
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
                                url:"delete.php",
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
                                            url:"delete.php",
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
                                                        url:"delete.php",
                                                        method:"POST",
                                                        data:{"flag":add_dup_error_flag,"sem":sem,"dept":dept,"ay":ay,"name":name,"rno":rno,"year":year,"sub_code":sub_code},
                                                        dataType:"json",
                                                        success:function(success_result){
                                                            if(success_result==0){
                                                                el("dup_error").innerText="Marks of the given student are not entered!!";
                                                            }
                                                            else{
                                                                $.ajax({
                                                                    url:"delete.php",
                                                                    method:"POST",
                                                                    data:{"flag":add_flag,"sem":sem,"dept":dept,"ay":ay,"name":name,"rno":rno,"year":year,"sub_code":sub_code},
                                                                    dataType:"json",
                                                                    success:function(entry_done){
                                                                        if(entry_done){
                                                                            alert("Deleted Successfully");
                                                                            
                                                                            let queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
                                                                            window.location.href="delete.html"+queryString;
                                                                        }
                                                                        else{
                                                                            alert("ERROR!!");
                                                                            
                                                                            let queryString = "?"+a[0]+"&"+a[1]+"&"+a[2]+"&"+a[3]+"&"+a[4];
                                                                            window.location.href="delete.html"+queryString;
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
                            }   );
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