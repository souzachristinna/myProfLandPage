        
    const form = document.querySelector('#e_form')
    const elements = document.querySelector('#sucessMessage');
    var sucess = localStorage.getItem("sucess");
    document.getElementById('sucessMessage').innerHTML=" ";
    console.log(`sucess=${sucess}`);

    //const name=document.getElementById("name");
    //const email='algum@email.com'
    //const message="açslfkaçsflkASFLKasfçlk"

    function createElement() {
      if (sucess != 0 && sucess != null) {
        var p = document.createElement('p');
        p.textContent="Mensagem Enviada com sucesso!";
        elements.appendChild(p);
          Espera();
      } else {
          document.getElementById('sucessMessage').innerHTML=" ";
      }
    }

    var wait;
    function Espera() {
      wait = setTimeout(zeraTudo, 2000);
    }

    function zeraTudo() {
      localStorage.removeItem('sucess');
      window.location.href = 'http://localhost/_myProfLandPage/index.php#contatos';  
  }

    // API SmtpJS.com - Send email from Javascript  (NÃO FUNCIONOU)
    function sendEmail() {

      var fname=form.elements[0].value;
      var femail=form.elements[1].value;
      var fmessage=form.elements[2].value;

      console.log(fname);
      
      Email.send({
        Host : "smtp.gmail.com",
        Username : "ateviloja@gmail.com",
        Password : "senha",
        //SecureToken : "ef5c38fa-3bf7-4675-bcad-37bcacebfe2a",
        To : "ateviloja@gmail.com", 
        From : `${femail}`,
        Subject : `Contato WebLandPage from ${femail}`,
        Body : `<b>De:</b> ${fname} <br> 
                <b>Email:</b> ${femail} <br><br><hr>
                <b>Mensagem:</b> <br>${fmessage} testando mensagem com variável`,
        }).then(
            message => console.log('OK')
        );
      }

      var showOffE = document.querySelector(".btnE"); 
      showOffE.addEventListener("click", function(){
        location.href="#hiddenE";
        document.querySelector("#hiddenE").style.display="block";
      })


      var showOffA = document.querySelector(".btnA"); 
      showOffA.addEventListener("click", function(){
        location.href="#hiddenA";
        document.querySelector("#hiddenA").style.display="block";
      })