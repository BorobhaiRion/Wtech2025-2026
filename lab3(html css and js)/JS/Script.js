

function ShowInfo(){
    let  sname = document.getElementById("sName").value.trim();
    let sGpa = document.getElementById("sGpa").value.trim();

    let errors = [];

    if(sname == ""){
        errors.push("Student Name Is Required!");
    }

    if(sGpa == ""){
        errors.push("Student CGPA Is Required!");
    }

    if(errors.length > 0){
        alert(errors.join("\n"));
        return;
    }

    alert(sname +"'s Gpa Is :"+sGpa);
    
   
}