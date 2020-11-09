let base_url = "http://localhost:8080/Ass6/";
let data=null;
let cnt=0;
// $("document").ready(function(){
//     getItemsNameList();
     
// });

function getItemsNameList() {
    $('dname').empty();
    let url = base_url + "delete.php?req=doc_name";
    $.get(url,function(data,success){
        var dl=document.querySelector("#dname");
        var op=document.createElement("option");
        op.value=1;
        op.text="Select DOC Name";
        dl.appendChild(op);
        for(var i=0;i<data.length;i++)
        {
            var dl=document.querySelector("#dname");
            var op=document.createElement("option");
            op.value=i;
            op.text=data[i].docname;
            dl.appendChild(op);
        }
                
        
console.log(data[0]);
var d=document.querySelector("#dname");
d.addEventListener("click",createList);
function createList(e) {
//console.log(data);

var sel=document.getElementById('dname');
    var opt=sel.options[sel.selectedIndex];
    cnt=cnt+1;
    if(cnt%2==0)
    {
    var s=opt.text;	
    console.log(s);
    if(confirm("Do you want to delete "+s+" File"))
    {
        let url1 = base_url + "delete.php?req=delete_item&name="+s;
    $.get(url1,function(data1,success){
        
        
        
        
    });
    alert("Data Deleted Successfully");
    window.location.href = "../index.php";
    console.log("Hello");
    }
    
    

}

}
    });
}






function disp(e)
{
if(e==1)
{
    document.getElementById("home").style.display="block";
    document.getElementById("registeration").style.display="none";
    document.getElementById("details").style.display="none";
    document.getElementById("delete").style.display="none";
}
else if(e==2)
{
    document.getElementById("home").style.display="none";
    document.getElementById("registeration").style.display="block";
    document.getElementById("details").style.display="none";
    document.getElementById("delete").style.display="none";
}
else if(e==3)
{
    document.getElementById("home").style.display="none";
    document.getElementById("registeration").style.display="none";
    document.getElementById("details").style.display="block";
    document.getElementById("delete").style.display="none";
}
else if(e==4)
{
    document.getElementById("home").style.display="none";
    document.getElementById("registeration").style.display="none";
    document.getElementById("details").style.display="none";
    document.getElementById("delete").style.display="block";
    getItemsNameList();
}
}


function loadData()
{

    console.log("Hello");
     $("#display tr:gt(0)").remove();
     let url2=base_url+"readall.php";
     $.get(url2,function(data,success){

        let row=1;
       console.log(data);

       for(var i=0;i<data.length;i++)
       {
           var display=document.getElementById("display");
           var newrow=display.insertRow(row);
           var cell1=newrow.insertCell(0);
           var cell2=newrow.insertCell(1);
           var cell3=newrow.insertCell(2);
           var cell4=newrow.insertCell(3);
           var cell5=newrow.insertCell(4);
           var cell6=newrow.insertCell(5);
           var cell7=newrow.insertCell(6);
           var cell8=newrow.insertCell(7);
           var cell9=newrow.insertCell(8);

               cell1.innerHTML=data[i].time;
               cell2.innerHTML=data[i].faculty;
               cell3.innerHTML=data[i].subject;
               cell4.innerHTML=data[i].coursecode;
               cell5.innerHTML=data[i].dept;
               cell6.innerHTML=data[i].year;
               cell7.innerHTML=data[i].docname;
               cell8.innerHTML=data[i].file_size;
               cell9.innerHTML="<a href='Upload/"+data[i].file_name+"'>"+data[i].file_name+"</a>";
               
 
               row++;
          
       }
       
    });
    
}


