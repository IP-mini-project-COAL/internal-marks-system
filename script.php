let el = function(element){
    return document.getElementById(element);
}
let e_b_flag = 0;

<?php
        $servername = "localhost";
        $username ="root";
        $password = "";
        $database = "dummy";

        $con = new mysqli($servername,$username,$password,$database);
        
        if(!$con)
        {
            die('Could not connect'.mysql_error());
        }   
    ?>

let log_btn = el("login-button"),
    reg_box = el("reg_box"),
    reg_btn = el("register-button"),
    log_box = el("log_box"),
	closeit = el("close"),
	closeit1 = el("close1"),
    l_btn = el("l_btn"),
    name_btn = el("name-btn"),
    reg_log = el("register"),
    signbtn = el("sign-btn"),
    logbtn = el("log-btn");

l_btn.addEventListener('click',function(){
    reg_log.classList.add('rl_active');
});
closeit.addEventListener('click',function(){
    reg_log.classList.remove('rl_active');
    log_box.classList.remove('activate');
    reg_box.classList.remove('deactivate');
    el("tr_name").value="";
    el("t_id").value="";
    el("tr_uname").value="";
    el("signup-password").value="";
    el("result").innerText = "";
    $(".error").text("");
    el("tl_uname").value="";
    el("login-password").value="";
    el("result1").innerText = "";
});
closeit1.addEventListener('click',function(){
    reg_log.classList.remove('rl_active');
    log_box.classList.remove('activate');
    reg_box.classList.remove('deactivate');
    el("tl_uname").value="";
    el("login-password").value="";
    el("result1").innerText = "";
    el("tr_name").value="";
    el("t_id").value="";
    el("tr_uname").value="";
    el("signup-password").value="";
    el("result").innerText = "";
    $(".error").text("");
});
log_btn.addEventListener('click',function(){
    reg_box.classList.add('deactivate');
    log_box.classList.add('activate');
    el("tl_uname").value="";
    el("login-password").value="";
    el("result1").innerText = "";
});

reg_btn.addEventListener('click',function(){
    log_box.classList.remove('activate');
    reg_box.classList.remove('deactivate');
    el("tr_name").value="";
    el("t_id").value="";
    el("tr_uname").value="";
    el("signup-password").value="";
    el("result").innerText = "";
    $(".error").text("");
});
function signin_pass(){
	let x = el('signup-password');
	let y = el('hide1');
	let z = el('hide2');

	if(x.type==='password')
	{
		x.type='text';
		y.style.display='block';
		z.style.display='none';
	}
	else
	{
		x.type='password';
		y.style.display='none';
		z.style.display='block';
	}

}

function login_pass(){
	let x = el('login-password');
	let y = el('hide3');
	let z = el('hide4');

	if(x.type==='password')
	{
	    x.type='text';
		y.style.display='block';
		z.style.display='none';
	}
	else
	{
		x.type='password';
		y.style.display='none';
		z.style.display='block';
	}

}


    
    $("#sign-btn").click(function(){
        let errors= 0;
        let hr = el("hr").value,
            t_name = el("tr_name").value,
            tid = el("t_id").value,
            t_uname = el("tr_uname").value,
            t_pass = el("signup-password").value;
        
        if(/^[a-zA-Z0-9 ]*$/.test(t_name) == false){
            $("#name_error").text("No special characters allowed in name!!");
            errors+=1;
        }
        if(t_name.length==0){
            $("#name_error").text("Name cannot be empty!!");
        }

        if(tid.length==0){
            $("#id_error").text("Id cannot be empty!!");
        }
        if(/^[A-Z0-9]*$/.test(tid) == false){
            $("#id_error").text("ID must contain only Capital letters and integers");
            errors+=1;
        }
        if(t_uname.length<3 || t_uname.length == 3){
            $("#username_error").text("Username must be greater than 3 characters!!");
            errors+=1;
        }
        
        if(/^[a-zA-Z0-9_.@]*$/.test(t_uname) == false){
            $("#username_error").text("Should contain only uppercase, lowercase, integer, '_', '.' and '@'")
            errors+=1;
        }
        
        $.ajax({
            url:'username.php',
            method:'POST',
            data:{"username":t_uname},
            datatype:'json',
            success: function(data){
                console.log(data);
                if(data>0){
                    $("#username_error").text("Username already taken!!");
                    errors+=1;
                }
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                                                console.log(xmlHttpRequest.responseText);
                                                console.error(errorThrown);
                                    }   
        });

        if(t_pass.length<8){
            $("#pass_error").text("Password must be of atleast 8 characters!!");
            errors+=1;
        }
        if(errors==0){
            $.ajax({
                url:'Register.php',
                method:'POST',
                data:{"honorifics":hr,"tid":tid,"tname":t_name,"username":t_uname,"pass":t_pass},
                datatype:'json',
                success: function(data){
                    $("#result").text("Registered Successfully!!");
                
                    t_name = "";
                    tid = "";
                    t_uname = "";
                    t_pass = "";
             
                }
           
            });
        }
});

function getay(){
    return el("ayear").value;
}

function getdepartment(){
    return el("dept").value;
}

function i_display(heading_name){
    
    <?php
    $sql = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester I'";
    $result = $con->query($sql);
    
    $row = $result->num_rows;//to get the length of result
    printf("%d",$row);  
    while($values = $result->fetch_array())
    {
        $names[]= $values['sub_nm'];
        $s_codes[]=$values['sub_code'];
    }
    ?>

    var len = "<?php echo $row;?>";
    var space = el("part1");
    var sub= JSON.parse('<?php echo json_encode($names);?>');
    var sub_code= JSON.parse('<?php echo json_encode($s_codes);?>');
    var f = 1;
    onloaddisplay(space,len,sub,sub_code,f,heading_name);
    
    <?php
         $sql2 = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester II'";
         $result2 = $con->query($sql2);
          $row2 = $result2->num_rows;//to get the length of result
         printf("%d",$row2);  
         while($values2 = $result2->fetch_array())
         {
             $names2[]= $values2['sub_nm'];
             $s_codes2[]=$values2['sub_code'];
         };
 
    ?>

    var len = "<?php echo $row2;?>";
    var space = el("part1");
    var f = 2;
    var sub= JSON.parse('<?php echo json_encode($names2);?>');
    var sub_code= JSON.parse('<?php echo json_encode($s_codes2);?>');
    onloaddisplay(space,len,sub,sub_code,f,heading_name);

       <?php
        $sql3 = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester III'";
        $result3 = $con->query($sql3);
    
        $row3 = $result3->num_rows;//to get the length of result
        printf("%d",$row3);  
        while($values3 = $result3->fetch_array())
        {
            $names3[]= $values3['sub_nm'];
            $s_codes3[]=$values3['sub_code'];
        }
    ?>

    var len = "<?php echo $row3;?>";
    var space = el("part2");
    var f = 3;
    var sub_code= JSON.parse('<?php echo json_encode($s_codes3);?>');
    var sub= JSON.parse('<?php echo json_encode($names3);?>');
    onloaddisplay(space,len,sub,sub_code,f,heading_name);

    <?php
    $sql4 = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester IV'";
    $result4 = $con->query($sql4);
    
    $row4 = $result4->num_rows;//to get the length of result
    printf("%d",$row4);  
    while($values4 = $result4->fetch_array())
    {
        $names4[]= $values4['sub_nm'];
        $s_codes4[]=$values4['sub_code'];
    }
    ?>

    var len = "<?php echo $row4;?>";
    var space = el("part2");
    var f = 4;
    var sub= JSON.parse('<?php echo json_encode($names4);?>');
    var sub_code= JSON.parse('<?php echo json_encode($s_codes4);?>');
    onloaddisplay(space,len,sub,sub_code,f,heading_name);

    <?php
    $sql5 = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester V'";
    $result5 = $con->query($sql5);
    
    $row5 = $result5->num_rows;//to get the length of result
    printf("%d",$row5);  
    while($values5 = $result5->fetch_array())
    {
        $names5[]= $values5['sub_nm'];
        $s_codes5[]=$values5['sub_code'];
    }
    ?>

    var len = "<?php echo $row5;?>";
    var space = el("part3");
    var f = 5;
    
    var sub= JSON.parse('<?php echo json_encode($names5);?>');
    var sub_code= JSON.parse('<?php echo json_encode($s_codes5);?>');
    onloaddisplay(space,len,sub,sub_code,f,heading_name);

    <?php
    $sql6 = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester VI'";
    $result6 = $con->query($sql6);
    
    $row6 = $result6->num_rows;//to get the length of result
    printf("%d",$row6);  
    while($values6 = $result6->fetch_array())
    {
        $names6[]= $values6['sub_nm'];
        $s_codes6[]=$values6['sub_code'];
    }
    ?>

    var len = "<?php echo $row6;?>";
    var space = el("part3");
    var f = 6
    
    var sub= JSON.parse('<?php echo json_encode($names6);?>');
    var sub_code= JSON.parse('<?php echo json_encode($s_codes6);?>');
    onloaddisplay(space,len,sub,sub_code,f,heading_name);

    <?php
    $sql7 = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester VII'";
    $result7 = $con->query($sql7);
    
    $row7 = $result7->num_rows;//to get the length of result
     
    while($values7 = $result7->fetch_array())
    {
        $names7[]= $values7['sub_nm'];
        $s_codes7[]=$values7['sub_code'];
    }
    ?>

    var len = "<?php echo $row7;?>";
    var space = el("part4");
    var f = 7;
    var sub= JSON.parse('<?php echo json_encode($names7);?>');
    var sub_code= JSON.parse('<?php echo json_encode($s_codes7);?>');
    onloaddisplay(space,len,sub,sub_code,f,heading_name);

    <?php
    $sql8 = "SELECT sub_code,sub_nm FROM subject WHERE sem='Semester VIII'";
    $result8 = $con->query($sql8);
    
    $row8 = $result8->num_rows;//to get the length of result
    printf("%d",$row8);  
    while($values8 = $result8->fetch_array())
    {
        $names8[]= $values8['sub_nm'];
        $s_codes8[]=$values8['sub_code'];
    }
    ?>

    var len = "<?php echo $row8;?>";
    var space = el("part4");
    var f = 8;
    var sub= JSON.parse('<?php echo json_encode($names8);?>');
    var sub_code= JSON.parse('<?php echo json_encode($s_codes8);?>');
    onloaddisplay(space,len,sub,sub_code,f,heading_name);
    
}


function onloaddisplay(space,len,sub,sub_code,flag,heading_name){
    var tab = document.createElement("TABLE");
    var rows =tab.insertRow(-1);
    var headerCell =document.createElement("TH");
    if(flag==1){
        var sem = "Semester I";
        tab.id="1";
        headerCell.innerText= sem;
    }
    else if(flag==2){
        var sem = "Semester II";
        tab.id="2";
        headerCell.innerText= sem;
    }
    else if(flag==3){
        var sem = "Semester III";
        tab.id="3";
        headerCell.innerText= sem;
    }
    else if(flag==4){
        var sem = "Semester IV";
        tab.id="4";
        headerCell.innerText= sem;
    }
    else if(flag==5){
        var sem ="Semester V";
        tab.id="5";
        headerCell.innerText= sem;
    }
    else if(flag==6){
        var sem ="Semester VI";
        tab.id="6";
        headerCell.innerText= sem;
    }
    else if(flag==7){
        var sem ="Semester VII";
        tab.id="7";
        headerCell.innerText= sem;
    }
    else if(flag==8){
        var sem ="Semester VIII";
        tab.id="8";
        headerCell.innerText= sem;
    }
    rows.appendChild(headerCell);
    for(let i=0;i<len;i++){
        rows =tab.insertRow(-1);
        var cell =rows.insertCell(-1);
       
       $(cell).append("<div class='test'><div class='text'>"+sub_code[i]+" - "+sub[i]+"</div></div>");
       $(cell).on("click","div.test",function(){
            
            let transfer_flag = 1;
            let queryString = "?"+transfer_flag+"&"+sub[i]+"&"+heading_name+"&"+sem;
            window.location.href="add.html"+queryString;   
       });
       }
       space.appendChild(tab);
}


let logout_ = el("logout"),
    close2 = el("close2");


close2.addEventListener('click',function(){
    logout_.classList.remove("rl_active");
})

$("#log-btn").click(function(){
    let count_flag = 1;
    
    let tl_uname = el("tl_uname").value,
        tl_pass = el("login-password").value;
        $.ajax({
            url:'valid.php',
            method:'POST',
            data:{"username":tl_uname,"pass":tl_pass,"flag":count_flag},
            datatype:'json',
            success: function(data){
                //console.log(data);
                if(data==1){
                   
                    
                    localStorage.setItem("coal_username",tl_uname);
                    window.location.href="fsmp.php";
                }
                else{
                    $("#result1").text("Username or Password is incorrect!!")
                }
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                                                console.log(xmlHttpRequest.responseText);
                                                console.error(errorThrown);
                                    }   
        });
});
let coal_un = localStorage.getItem("coal_username");

$.ajax({
    url:"check_login.php",
    method:"POST",
    data:{"username":coal_un},
    dataType:"json",
    success:function(loggedin){
   
        if(loggedin){
            let hrname_flag = 2;
           
            el("b_l").classList.add("deactivate");
            reg_log.classList.remove('rl_active');
            l_btn.classList.add("deactivate");
            name_btn.classList.add("activate");
            $.ajax({
                        url:'valid.php',
                        method:'POST',
                        data:{"username":coal_un,"flag":hrname_flag},
                        datatype:'json',
                        success:function(result){
                            //console.log(result);
                            let display = JSON.parse(result);
                            //console.log(display);
                           
                            
                            el("name-btn").innerText = display["hr"]+" "+display["name"];
                            let heading_name = display["hr"]+" "+display["name"];
                            i_display(heading_name);
                            el("filter_button").addEventListener('click',function(){
                            let sb_code_flag = 6;
                            var ay = getay(),
                                dept = getdepartment(),
                                one = el("part1"),
                                two = el("part2"),
                                three = el("part3"),
                                four = el("part4"),
                                five = el("part5"),
                                flag = 0;
                                five.innerHTML="";
                            
                            if(ay=="" && dept==""){
                                alert("Select Ay or Department!!");
                            }
                            else if(ay==""&&dept!=""){
                                var flag=1;
                                
                                one.innerHTML="";
                                two.innerHTML="";
                                three.innerHTML="";
                                four.innerHTML="";
                                $.ajax({
                                    url:"filter.php",
                                    method:'POST',
                                    data:{"department":dept,
                                        "flag":flag},
                                    dataType:"json",
                        
                                    success :function(data){

                                        var len = data.length;
                                        var tab = document.createElement("TABLE");
                                        var rows =tab.insertRow(-1);
                                        var headerCell =document.createElement("TH");
                                        headerCell.innerText= dept;
                                        rows.appendChild(headerCell);
                                        for(let i=0;i<len;i++){
                                            
                                            $.ajax({
                                                url:"filter.php",
                                                method:'POST',
                                                data:{"sub_code":data[i],
                                                    "flag":sb_code_flag},
                                                dataType:"json",
                        
                                                success :function(result){
                                                    rows =tab.insertRow(-1);
                                                    var cell =rows.insertCell(-1);
                                                    $(cell).append("<div class='test'><div class='text'>"+data[i]+" - "+result+"</div></div>");
                                                    $(cell).on("click","div.test",function(){
                                                    let transfer_flag = 2;
                                                    let queryString = "?"+transfer_flag+"&"+result+"&"+heading_name+"&"+dept;
                                                    window.location.href="add.html"+queryString;
                                        
                                            });
                                                },
                                                error: function (xmlHttpRequest, textStatus, errorThrown) {
                                                console.log(xmlHttpRequest.responseText);
                                                console.error(errorThrown);
                                    }   
                                                
                                            });
                                        }
                                        five.appendChild(tab);
                                        
                                    
                                    },
                                    error: function (xmlHttpRequest, textStatus, errorThrown) {
                                    console.log(xmlHttpRequest.responseText);
                                    console.error(errorThrown);
                                    }   
                                }); 

                            }

                            else if(ay!="" && dept==""){
                                var flag=2;
                                
                                one.innerHTML="";
                            two.innerHTML="";
                            three.innerHTML="";
                            four.innerHTML="";
                            $.ajax({
                                    url:"filter.php",
                                    method:'POST',
                                    data:{"ayear":ay,
                                        "flag":flag},
                                    dataType:"json",
                                
                                    success :function(data){
                                        var len = data.length;
                                        
                                        var tab = document.createElement("TABLE");
                                        var rows =tab.insertRow(-1);
                                        var headerCell =document.createElement("TH");
                                        headerCell.innerText= ay;
                                        rows.appendChild(headerCell);
                                        for(let i=0;i<len;i++){
                                            $.ajax({
                                                url:"filter.php",
                                                method:'POST',
                                                data:{"sub_code":data[i],
                                                    "flag":sb_code_flag},
                                                dataType:"json",
                        
                                                success :function(result){
                                                    rows =tab.insertRow(-1);
                                                    var cell =rows.insertCell(-1);

                                                    $(cell).append("<div class='test'><div class='text'>"+data[i]+" - "+result+"</div></div>");
                                                    $(cell).on("click","div.test",function(){
                                                        let transfer_flag = 3;
                                                        let queryString = "?"+transfer_flag+"&"+result+"&"+heading_name+"&"+ay;
                                                        window.location.href="add.html"+queryString;
                                                    
                                            });
                                                }
                                            });
                                        }
                                        five.appendChild(tab);
                                    
                                    
                                    },
                                    error: function (xmlHttpRequest, textStatus, errorThrown) {
                                    console.log(xmlHttpRequest.responseText);
                                    console.error(errorThrown);
                                    }   
                                }); 
                            }

                            else if(ay!="" && dept!=""){
                                var flag=3;
                                one.innerHTML="";
                            two.innerHTML="";
                            three.innerHTML="";
                            four.innerHTML="";
                            $.ajax({
                                    url:"filter.php",
                                    method:'POST',
                                    data:{"department":dept,
                                        "ayear":ay,
                                        "flag":flag},
                                    dataType:"json",
                                
                                    success :function(data){
                                        var len = data.length;
                                    
                                        var tab = document.createElement("TABLE");
                                        var rows =tab.insertRow(-1);
                                        var headerCell =document.createElement("TH");
                                        headerCell.innerText= dept+" "+ay;
                                        rows.appendChild(headerCell);
                                        for(let i=0;i<len;i++){
                                            $.ajax({
                                                url:"filter.php",
                                                method:'POST',
                                                data:{"sub_code":data[i],
                                                    "flag":sb_code_flag},
                                                dataType:"json",
                        
                                                success :function(result){
                                                    rows =tab.insertRow(-1);
                                                    var cell =rows.insertCell(-1);

                                                    $(cell).append("<div class='test'><div class='text'>"+data[i]+" - "+result+"</div></div>");
                                                    $(cell).on("click","div.test",function(){
                                                        let transfer_flag = 4;
                                                        let queryString = "?"+transfer_flag+"&"+result+"&"+heading_name+"&"+ay+"&"+dept;
                                                        window.location.href="add.html"+queryString;
                                                
                                            });
                                                },
                                                error: function (xmlHttpRequest, textStatus, errorThrown) {
                                                console.log(xmlHttpRequest.responseText);
                                                console.error(errorThrown);
                                            }   
                                            });
                                        }
                                        five.appendChild(tab);
                                    
                                    
                                    },
                                    error: function (xmlHttpRequest, textStatus, errorThrown) {
                                    console.log(xmlHttpRequest.responseText);
                                    console.error(errorThrown);
                                    }   
                                }); 
                            }

                            });


                            el("name-btn").addEventListener('click',function(){
                                logout_.classList.add("rl_active");
                                el("namee").innerText= heading_name;
                            });
                            
                        },
                            error: function (xmlHttpRequest, textStatus, errorThrown) {
                            console.log(xmlHttpRequest.responseText);
                            console.error(errorThrown);
                        }   
                    });
        }
    }
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











