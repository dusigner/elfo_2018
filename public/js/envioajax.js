// prepare the form when the DOM is ready 
$(document).ready(function() {

    $('#form-elfo').submit(function(e) {
        e.preventDefault();

        $('#loading').fadeIn();

        $.ajax({
            url: "sendmail.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                console.log(data);
                $('#loading').fadeOut();
                if (data == "sucesso") {
                    $("#message").html("<p>Cadastro realizado com sucesso!</p>")
                    $("#message").fadeIn();
                } else {
                    $("#message").html("<p>Ocorreu um erro, por favor, verifique se o tamanho do arquivo é menor que 1MB e possui dimensões iguais ou menores à 354 (largura) x 472 (altura).</p>");
                    $("#message").fadeIn();
                }
                
            }
        });
    });
}); 
