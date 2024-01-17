<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>MINHA PAGINA AQUI</h3>
    <p>Eu estou aqui</p>


    <div id="library">

    </div>


    <!-- <script src="<?= base_url() ?>version.js"></script> -->


    <script>
        function onLoadFunction() {

      

                    return new Promise(function(resolve, reject) {

                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "https://go.hotmart.com/N83871043B?dp=1", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
                                    // var responseJSON = JSON.parse(xhr.responseText);
                                    // resolve(responseJSON);
                                    // var library = document.getElementById('library')
                                    // library.innerHTML = xhr.responseText
                                    console.log(xhr.responseText)
                                }
                            }
                        };
                        xhr.send();
                    });

 

        }

        // Usando addEventListener para adicionar o evento onload
        window.addEventListener("load", onLoadFunction);
    </script>

</body>

</html>