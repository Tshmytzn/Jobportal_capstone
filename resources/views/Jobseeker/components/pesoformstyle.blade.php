
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
background: linear-gradient(90deg,
    rgba(139, 0, 0, 1) 0%,      /* Dark red (shadow) */
    rgb(207, 74, 74) 25%,       /* Mid-tone red */
    rgb(255, 255, 255) 50%,     /* Highlight (bright white) */
    rgb(207, 74, 74) 75%,       /* Mid-tone red */
    rgba(139, 0, 0, 1) 100%     /* Dark red (shadow) */
);
}

.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 490px;
    background-color: #fff;
    overflow: hidden;
    max-height: 500px; /* Set a maximum height for the form */
    overflow-y: auto;  /* Enable vertical scrolling */
    padding-right: 0;
    margin-right: -10px;
}

.container form::-webkit-scrollbar {
    width: 10px; 
}

.container form::-webkit-scrollbar-track {
    background: #f1f1f1; 
    border-radius: 10px;  
}

.container form::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #a445b2, #d41872); 
    border-radius: 10px; 
    border: 2px solid #f1f1f1; 
}

.container form::-webkit-scrollbar-thumb:hover {
    background-color: #265df2; 
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}

@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
    .container form {
        max-height: 400px; 
        overflow-y: auto;  
    }
    .nextBtn {
        position: relative;
        display: block;
    }

}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
.centered-container {
    display: flex;
    flex-direction: column; /* Align items in a column */
    align-items: center;    /* Center horizontally */
    text-align: center;     /* Center text */
    margin: 20px;          /* Optional: add some margin */
}

</style>
