const supabaseUrl = "???";
const supabaseKey = "???";


const client = supabase.createClient(supabaseUrl, supabaseKey);

async function getdata(){

    const fname = document.getElementById("fname").value.trim();
    const lname = document.getElementById("lname").value.trim();
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const message = document.getElementById("query").value;

    const genderElement = document.querySelector('input[name="gender"]:checked');
    const gender = genderElement ? genderElement.value : "";

    let errors = [];

    //validation for the first name field
    if(fname === "" ){
        errors.push("First Name is Required !");
    }
    if(!/^[A-Za-z]+$/.test(fname)){
    errors.push("First name must contain only letters");
    }

    //validation for last name
    if(lname === "" ){
        errors.push("First Name is Required !");
    }
    if(!/^[A-Za-z]+$/.test(lname)){
    errors.push("First name must contain only letters");
    }

    //validation for email
    if(email === ""){
        errors.push("Email is required");
    }
    else if(!email.includes("@")){
        errors.push("Email is not valid");
    }

    // Phone validation
    if(phone === ""){
        errors.push("Phone number is required");
    }
    else if(phone.length < 11){
        errors.push("Phone number must be at least 11 digits");
    }

    // Gender validation
    if(gender === ""){
        errors.push("Please select gender");
    }

    // Message validation
    if(message === ""){
        errors.push("Message cannot be empty");
    }

    // If errors exist stop and show them
    if(errors.length > 0){
        alert(errors.join("\n"));
        return;
    }

    const { error } = await client
    .from("contacts")
    .insert([
        { fname, lname, email, phone, gender, message }
    ]);

    if(error){
        alert("Data not saved");
        console.log(error);
    }
   else{
    alert("Data saved successfully");

    document.getElementById("fname").value = "";
    document.getElementById("lname").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("query").value = "";

    document.querySelectorAll('input[name="gender"]').forEach(el => el.checked = false);
}
}