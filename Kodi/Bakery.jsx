
/*const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');
const email = document.getElementById('email');

form.addEventListener('submit', e =>
{
   e.preventDefault();
     validateInputs();
});
const setError = (element, message) => 
{
   const InputControl = element.parentElement;
   const errorDisplay = InputControl.querySelector('.error');
   errorDisplay.innerText =message;
   InputControl.classList.add('error');
   InputControl.classList.remove('success');
}
const setSuccess =element => 
{
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText='';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
const isValideEmail = email =>
{
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return re.test(String(email).toLowerCase());
}
const validateInputs = () =>
{
    const form = document.getElementById('form');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const cpassword = document.getElementById('cpassword');
    const email = document.getElementById('email');

    if(username === '' )
    {
        setError(username , 'Username is required');
    }
    else
    {
        setSuccess(username);
    }
    if(email === '')
    {
        setError(email , 'email is required');
    }
    else if(!isValideEmail(email))
    {
        setError(emil,'Provide a valid email adress');
    }
    else
    {
       setSuccess(email);
    }

    if(password === '')
    {
        setError(password, 'Password is requred');
    }
    else if (password.length < 8)
    {
        setError(password,'Password must be at least 8 character');
    }
    else{
        setSuccess(password);
    }

    if(cpassword == '')
    {
        setError(cpassword , 'Pleas confir your Password');
    }
    else if(cpassword !== password)
    {
        setError(cpassword , 'Password dosent match');
    }
    else{
        setSuccess(cpassword);
    }
};


*/