const supabaseUrl = "???";
const supabaseKey = "???";


const client = supabase.createClient(supabaseUrl, supabaseKey);

async function getdata(){

    const fname = document.getElementById("fname").value;
    const lname = document.getElementById("lname").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const message = document.getElementById("query").value;

    const genderElement = document.querySelector('input[name="gender"]:checked');
    const gender = genderElement ? genderElement.value : "";

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